<?php

namespace Hpr\Admin;

use Hpr\Service\Email\Email;

/**
 * Class OrderInit
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class OrderInit
{
    public static string $cptName = 'order';
    private static array $ordersStatuses = [
        'new',
        'pending-payment',
        'processing',
        'sent',
        'completed',
        'cancelled'
    ];

    /**
     * OrderInit constructor.
     */
    public function __construct()
    {
        $this->registerPostType();
        $this->registerHooks();
    }

    /**
     * Register product post-type.
     */
    private function registerPostType(): void
    {
        register_post_type(
            self::$cptName,
            [
                'label' => null,
                'labels' => [
                    'name' => __('Заказы', 'hpractice'),
                    'singular_name' => __('Заказ', 'hpractice'),
                    'add_new' => __('Добавить заказ', 'hpractice'),
                    'add_new_item' => __('Добавить новый заказ', 'hpractice'),
                    'edit_item' => __('Редактировать заказ', 'hpractice'),
                    'new_item' => __('Новый заказ', 'hpractice'),
                    'view_item' => __('Посмотреть заказ', 'hpractice'),
                    'search_items' => __('Искать заказ', 'hpractice'),
                    'not_found' => __('Заказы не найдены', 'hpractice'),
                    'menu_name' => __('Заказы', 'hpractice'),
                ],
                'public' => false,
                'has_archive' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'rewrite' => false,
                'menu_icon' => 'dashicons-store',
                'show_in_rest' => true,
                'supports' => [
                    'title',
                    'custom-fields',
                ],
            ]
        );
    }

    /**
     * Register hooks.
     */
    private function registerHooks(): void
    {
        add_action('wp_ajax_create_order', [$this, 'createOrderCallback']);
        add_action('wp_ajax_nopriv_create_order', [$this, 'createOrderCallback']);
        add_action('manage_order_posts_columns', [$this, 'addOrderColumns']);
        add_action('manage_order_posts_custom_column', [$this, 'fillOrderColumns'], 10, 2);
        add_action('restrict_manage_posts', [$this, 'addTableFilters']);
        add_action('pre_get_posts', [$this, 'addTableFiltersHandler']);
        add_action('init', [$this, 'adminViewedOrder']);
        add_action('admin_menu', [$this, 'addNewOrdersNotification'], 99);
        add_action('add_meta_boxes', [$this, 'addConnectionMetaBox']);
    }

    /**
     * Create new order.
     */
    public function createOrderCallback(): void
    {
        $response = [
            'status' => false,
            'error' => [
                'title' => __('Упс... Что-то пошло не так =(', 'hpractice'),
                'message' => __(
                    'Возникла ошибка, попробуйте оформить заказ еще раз или свяжитесь с нашим менеджером',
                    'hpractice'
                ),
            ],
            'data' => []
        ];
        $customer = $_POST['customer'] ?? false;
        $email = $_POST['email'] ?? false;
        $phone = $_POST['phone'] ?? '';
        $comment = $_POST['comment'] ?? '';
        $products = $_POST['products'] ?? [];

        if (!$customer || !$phone) {
            $response['error']['title'] = __('Ошибка заполнения данных', 'hpractice');
            $response['error']['message'] = __('Не заполненно поле имени или номера телефона', 'hpractice');

            wp_send_json($response);
        }

        if (empty($products)) {
            $response['message'] = __('Корзина пуста. Добавьте товары в корзину', 'hpractice');

            wp_send_json($response);
        }

        $orderData = [
            'post_title' => __('Новый заказ', 'hpractice'),
            'post_type' => static::$cptName,
        ];

        $orderId = wp_insert_post($orderData);

        if (is_wp_error($orderId) || ! $orderId) {
            wp_send_json($response);
        }

        $orderId = wp_insert_post(
            [
                'ID' => $orderId,
                'post_type' => static::$cptName,
                'post_title' => __('Заказ', 'hpractice') . ' №' . $orderId,
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
            ]
        );

        if (is_wp_error($orderId) || ! $orderId) {
            $response['message'] = __('Ошибка создания заказа! Пожалуйста, свяжитесь с нашим менеджером', 'hpractice');
        }

        update_field('customer', $customer, $orderId);
        update_field('phone', str_replace(['+38', ' ', '(', ')', '-'], '', $phone), $orderId);
        update_field('email', $email, $orderId);
        update_field('customer_comment', $comment, $orderId);
        update_field('status', 'new', $orderId);

        foreach ($products as $product) {
            if (empty($product['id'])) {
                continue;
            }

            add_row('order-items', ['id' => $product['id'], 'quantity' => $product['count'] ?? 1], $orderId);
        }

        $email = new Email();
        $email->sendNewOrderManagerMail($orderId);
        $isSent = $email->sendNewOrderCustomerMail($orderId);

        if ($isSent) {
            update_field('customer_email', true, $orderId);
        }

        $response['status'] = true;
        $response['data'] = ['orderId' => $orderId];

        unset($response['error']);

        wp_send_json($response);
    }

    /**
     * Add new columns to orders list page.
     *
     * @param array $columns
     *
     * @return array
     */
    public function addOrderColumns(array $columns): array
    {
        $columns['status'] = __('Статус', 'hpractice');
        $columns['cost'] = __('Стоимость', 'hpractice');
        $columns['isSentMail'] = __('Письмо пользователю', 'hpractice');

        return $columns;
    }

    /**
     * Fill orders columns.
     *
     * @param string $column
     * @param int $orderId
     */
    public function fillOrderColumns(string $column, int $orderId): void
    {
        switch ($column) {
            case 'status':
                $status = get_field('status', $orderId);
                static::renderStatusColumn($status);
                break;
            case 'cost':
                $cost = get_field('cost', $orderId);

                if (!empty($cost)) {
                    echo '<strong>' . number_format($cost, 0, '.', ' ') . '</strong> грн';
                } else {
                    echo "<strong>0</strong> грн";
                }
                break;
            case 'isSentMail':
                $isSent = get_field('customer_email', $orderId);

                if ($isSent) {
                    echo '<span style="color: green;"><strong>' . __('Отправлено', 'hpractice') . '</strong></span>';
                } else {
                    echo '<span style="color: red;"><strong>' . __('Не отправлено', 'hpractice') . '</strong></span>';
                }
                break;
        }
    }

    /**
     * Render order status column content.
     *
     * @param string $status
     */
    public static function renderStatusColumn(string $status): void
    {
        ?>
        <span style="
            color: <?php echo static::getStatusColor($status); ?>;
            border: 1px <?php echo static::getStatusColor($status); ?> solid;
            border-radius: 6px;
            padding: 3px 5px;
        ">
            <?php echo static::getStatusLabel($status); ?>
        </span>
        <?php
    }

    /**
     * Get order status label.
     *
     * @param string $status
     *
     * @return string
     */
    public static function getStatusLabel(string $status): string
    {
        switch ($status) {
            case 'new':
                return '<strong>' . __('Новый', 'hpractice') . '</strong>';
            case 'pending-payment':
                return __('Ожидание оплаты', 'hpractice');
            case 'processing':
                return __('Обработка', 'hpractice');
            case 'sent':
                return __('Выдано перевозчику', 'hpractice');
            case 'completed':
                return __('Завершен', 'hpractice');
            case 'cancelled':
                return __('Отменён', 'hpractice');
            default:
                return '<strong>' . __('Неизвестный статус', 'hpractice') . '</strong>';
        }
    }

    /**
     * Get order status label.
     *
     * @param string $status
     *
     * @return string
     */
    public static function getStatusColor(string $status): string
    {
        switch ($status) {
            case 'new':
                return 'black';
            case 'pending-payment':
            case 'cancelled':
                return 'grey';
            case 'processing':
                return 'green';
            case 'sent':
                return 'deepskyblue';
            case 'completed':
                return 'blue';
            default:
                return 'red';
        }
    }

    /**
     * Added orders filters.
     *
     * @param $postType
     */
    public function addTableFilters($postType): void
    {
        if ('order' !== $postType) {
            return;
        }
        ?>
        <select name="order_status">
            <option value="none"><?php _e('- Все статусы -', 'hpractice'); ?></option>
            <?php foreach (static::$ordersStatuses as $status) : ?>
                <option value="<?php
                echo $status; ?>" <?php selected($status, $_GET['order_status'] ?? ''); ?>
                >
                    <?php echo static::getStatusLabel($status); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php
    }

    /**
     * Orders table filters handler.
     * @param $query
     */
    public function addTableFiltersHandler($query): void
    {
        $cs = function_exists('get_current_screen') ? get_current_screen() : null;

        if (!is_admin() || empty($cs->post_type) || $cs->post_type != 'order' || $cs->id != 'edit-order') {
            return;
        }

        if (empty($_GET['order_status']) || $_GET['order_status'] === 'none') {
            return;
        }

        $status = $_GET['order_status'] ?? '';
        $query->set(
            'meta_query',
            [
                [
                    'key' => 'status',
                    'value' => $status
                ]
            ]
        );
    }

    /**
     * Mark order as viewed.
     */
    public function adminViewedOrder(): void
    {
        global $pagenow;

        if (
            !is_admin()
            || $pagenow !== 'post.php'
            || !isset($_GET['post'])
            || 'order' !== get_post_type($_GET['post'])
        ) {
            return;
        }

        $orderId = $_GET[ 'post' ] ?? 0;

        // Check if the meta data already exists.
        if (!metadata_exists('post', $orderId, '_viewed_by_admin')) {
            add_post_meta($orderId, '_viewed_by_admin', true, true);
        }
    }

    /**
     * Get unread orders number.
     *
     * @return int
     */
    private function getUnreadOrdersCount(): int
    {
        $query = new \WP_Query(
            [
                'posts_per_page' => -1,
                'post_type' => 'order',
                'meta_query' => [
                    [
                        'key' => '_viewed_by_admin',
                        'compare' => 'NOT EXISTS',
                    ]
                ]
            ]
        );

        return $query->post_count;
    }

    /**
     * Add notification bubble to orders menu item.
     */
    public function addNewOrdersNotification(): void
    {
        global $menu;

        foreach ($menu as &$item) {
            if ('menu-posts-order' !== $item[5] ?? '') {
                continue;
            }

            $unreadOrders = $this->getUnreadOrdersCount();

            if (empty($unreadOrders)) {
                return;
            }

            $item[0] = sprintf(
                __('Заказы %s', 'hpractice'),
                '<span class="awaiting-mod">' . $unreadOrders . '</span>'
            );

            return;
        }
    }

    /**
     * Get orders statuses.
     *
     * @return array|string[]
     */
    public static function getOrderStatuses(): array
    {
        return static::$ordersStatuses;
    }

    /**
     * Register messengers metabox.
     */
    public function addConnectionMetaBox(): void
    {
        add_meta_box('myplugin_sectionid', 'Мессенджеры', [$this, 'renderConnectionMetaBox'], ['order'], 'side');
    }

    /**
     * Render messengers metabox view.
     *
     * @param \WP_Post $post
     * @param array $meta
     */
    public function renderConnectionMetaBox(\WP_Post $post, array $meta): void
    {
        $phone = get_field('phone', $post->ID);
        ?>
        <div class="wrap">
            <a href="viber://chat?number=+38<?php echo $phone; ?>">Написать в Viber</a>
        </div>
        <?php
    }
}
