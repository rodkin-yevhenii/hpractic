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
                    'view_item' => __('Просмотреть заказ', 'hpractice'),
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
    }

    /**
     * Create new order.
     */
    public function createOrderCallback(): void
    {
//        $customer = $_POST['customer'] ?? false;
//        $email = $_POST['email'] ?? false;
//        $phone = $_POST['phone'] ?? '';
//        $comment = $_POST['comment'] ?? '';
//        $products = $_POST['products'] ?? [];

        // TODO: Delete testing data after tests.
        $customer = 'Евгений';
        $email = 'rodkin.yevhenii@gmail.com';
        $phone = '+380673568883';
        $comment = 'Test comment';
        $products = [
            202 => 2,
            200 => 1,
            20 => 8
        ];

        if (!$customer || !$phone) {
            // TODO: Send false response.
        }

        if (empty($products)) {
            // TODO: Send false response.
        }

        $orderData = [
            'post_title'   => __('Новый заказ', 'hpractice'),
            'post_type' => static::$cptName,
        ];

        $orderId = wp_insert_post($orderData);

        if (is_wp_error($orderId) || ! $orderId) {
            // TODO: Send false response.
        }

        $orderId = wp_insert_post(
            [
                'ID'          => $orderId,
                'post_type' => static::$cptName,
                'post_title'  => __('Заказ', 'hpractice') . ' №' . $orderId,
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
            ]
        );

        if (is_wp_error($orderId) || ! $orderId) {
            // TODO: Send false response.
        }

        update_field('customer', $customer, $orderId);
        update_field('phone', preg_replace('/^(\+380|380|80)/', 0, $phone), $orderId);
        update_field('email', $email, $orderId);
        update_field('customer_comment', $comment, $orderId);
        update_field('status', 'new', $orderId);

        foreach ($products as $id => $quantity) {
            add_row('order-items', ['id' => $id, 'quantity' => $quantity], $orderId);
        }

        $email = new Email();
        $email->sendNewOrderManagerMail($orderId);
        $isSent = $email->sendNewOrderCustomerMail($orderId);

        if ($isSent) {
            update_field('customer_email', true, $orderId);
        }

        wp_send_json(['test' => 'message']);
    }
}
