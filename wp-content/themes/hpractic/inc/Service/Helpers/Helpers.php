<?php

namespace Hpr\Service\Helpers;

use Hpr\Entity\Message;
use Hpr\Entity\Product;
use Hpr\Service\Email\Email;

/**
 * Class Helpers
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Service\Helpers
 */
class Helpers
{
    /**
     * Language switcher render.
     */
    public static function showLanguageSwitcher(): void
    {
        if (!function_exists('pll_the_languages')) {
            return;
        }

        $languages = pll_the_languages(
            [
                'display_names_as'       => 'slug',
                'hide_if_no_translation' => 1,
                'raw'                    => true
            ]
        );

        if (empty($languages)) {
            return;
        }

        ob_start(); ?>
        <ul>
            <?php foreach ($languages as $language) :
                // Variables containing language data
                $url = $language['url'];
                $classes = $language['current_lang'] ? 'link link--secondary active' : 'link link--secondary';
                $title = 'ru' === $language['slug'] ? __('Рус', 'hpractice') : __('Укр', 'hpractice');

                if ($language['no_translation']) :
                    continue;
                endif; ?>
                <li>
                    <a href="<?php echo $url; ?>" class="<?php echo $classes; ?>">
                        <?php echo $title ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php echo ob_get_clean();
    }

    /**
     * Get catalog page id.
     *
     * @return int|null
     */
    public static function getCatalogId(): ?int
    {
        $catalogPageId = get_field('shop_page', 'option');
        $catalogPageId = pll_get_post($catalogPageId);

        if (empty($catalogPageId)) {
            return null;
        }

        return $catalogPageId;
    }

    /**
     * Get service page id.
     *
     * @return int|null
     */
    public static function getServicePageId(): ?int
    {
        $servicePageId = get_field('service_page', 'option');
        $servicePageId = pll_get_post($servicePageId);

        if (empty($servicePageId)) {
            return null;
        }

        return $servicePageId;
    }

    /**
     * Get search page id.
     *
     * @return int|null
     */
    public static function getSearchPageId(): ?int
    {
        $searchPageId = get_field('search_page', 'option');
        $searchPageId = pll_get_post($searchPageId);

        if (empty($searchPageId)) {
            return null;
        }

        return $searchPageId;
    }

    /**
     * Get cart items data by products IDs.
     */
    public static function getCartItemsCallback(): void
    {
        $response['status'] = false;
        $response['data'] = [];
        $ids = $_POST['cartItems'] ?? [];

        if (empty($ids)) {
            $response['error']['title'] = __('Упс... Что-то пошло не так =(', 'hpractice');
            $response['error']['message'] = __('Корзина пуста, сначала добавьте товары в корзину', 'hpractice');

            wp_send_json($response);
        }

        foreach ($ids as $id) {
            $id = pll_get_post($id);
            $product = new Product($id);
            $price = $product->getPrice() . ' ' . __('грн/шт.', 'hpractice');
            $gallery = $product->getGallery();

            if ($product->isMinPrice()) {
                $price = __('от', 'hpractice') . ' ' . $price;
            }

            $response['data'][] = [
                'id' => $product->getId(),
                'sku' => $product->getSku(),
                'name' => $product->getTitle(),
                'img' => empty($gallery) ? false : wp_get_attachment_image_url($gallery[0]),
                'price' => $price
            ];
        }

        $response['status'] = true;

        wp_send_json($response);
    }

    /**
     * Get phone with messenger.
     *
     * @param string $messenger messenger program (viber or telegram).
     *
     * @return string
     */
    public static function getMessengerPhone(string $messenger, bool $isClean = false): string
    {
        if (!in_array($messenger, ['viber', 'telegram'])) {
            return '';
        }

        $footer = get_field('footer', 'option');

        if ('viber' === $messenger) {
            $key = 'is_viber';
        } else {
            $key = 'is_telegram';
        }

        foreach ($footer['phones'] ?? [] as $item) {
            if ($item[$key] ?? false) {
                return $isClean ? str_replace([' ', '(', ')', '-'], '', $item['phone']) : $item['phone'];
            }
        }

        return '';
    }

    /**
     * Get configured services list.
     *
     * @return array
     */
    public static function getServicesIdsList(): array
    {
        $ids = get_field('services_list', 'option');
        $services = [];

        if (empty($ids) || !is_array($ids)) {
            return [];
        }

        foreach ($ids as $id) {
            $services[] = pll_get_post($id);
        }

        return $services;
    }

    /**
     * Send contact form.
     */
    public static function sendContactFormCallback(): void
    {
        $response = [
            'status' => false,
            'error' => [
                'title' => __('Упс... Что-то пошло не так =(', 'hpractice'),
                'message' => __(
                    'Возникла ошибка при отправке сообщения. Свяжитесь с менеджером через телефон или мессенджер',
                    'hpractice'
                ),
            ],
            'data' => []
        ];

        $name = $_POST['name'] ?? false;
        $phone = $_POST['phone'] ?? false;
        $email = $_POST['email'] ?? '';
        $comment = $_POST['comment'] ?? '';

        if (!$name || !$phone) {
            $response['error'] = [
                'title' => __('Ошибка заполнения формы', 'hpractice'),
                'message' => __(
                    'Пожалуйста, заполните обязательные поля (имя и телефон).',
                    'hpractice'
                ),
            ];

            wp_send_json($response);
        }

        $messageBody = "Покупатель: $name<br/>";
        $messageBody .= "Телефон: $phone<br/>";
        $messageBody .= "Email: $email<br/>";
        $messageBody .= "Комментарий: <br/>$comment";

        $email = new Email();
        $message = new Message();

        $message->setSubject('Новое сообщение из формы контактов')
            ->setBody($messageBody);

        $managersEmails = get_field('managers-emails', 'option');

        if (empty($managersEmails)) {
            wp_send_json($response);
        }

        $isSent = false;

        foreach ($managersEmails as $manager) {
            $message->setTo($manager['email']);

            $result = $email->send($message);

            if ($result) {
                $isSent = true;
            }
        }

        if (!$isSent) {
            wp_send_json($response);
        }

        $response['status'] = true;
        $response['data'] = [
            'title' => __('Спасибо за обращение', 'hpractice'),
            'message' => __('Менеджер свяжется с Вами в ближайшее рабочее время', 'hpractice'),
        ];

        unset($response['error']);
        wp_send_json($response);
    }

    /**
     * Send callback form.
     */
    public static function sendCallbackFormCallback(): void
    {
        $response = [
            'status' => false,
            'error' => [
                'title' => __('Упс... Что-то пошло не так =(', 'hpractice'),
                'message' => __(
                    'Возникла ошибка при отправке сообщения. Свяжитесь с менеджером через телефон или мессенджер',
                    'hpractice'
                ),
            ],
            'data' => []
        ];

        $phone = $_POST['phone'] ?? false;

        if (!$phone) {
            $response['error'] = [
                'title' => __('Ошибка заполнения формы', 'hpractice'),
                'message' => __(
                    'Пожалуйста введите Ваш телефон',
                    'hpractice'
                ),
            ];

            wp_send_json($response);
        }

        $email = new Email();
        $message = new Message();

        $message->setSubject('Новый запрос обратного звонка')
                ->setBody($phone);

        $managersEmails = get_field('managers-emails', 'option');

        if (empty($managersEmails)) {
            wp_send_json($response);
        }

        $isSent = false;

        foreach ($managersEmails as $manager) {
            $message->setTo($manager['email']);

            $result = $email->send($message);

            if ($result) {
                $isSent = true;
            }
        }

        if (!$isSent) {
            wp_send_json($response);
        }

        $response['status'] = true;
        $response['data'] = [
            'title' => __('Спасибо за обращение', 'hpractice'),
            'message' => __('Менеджер свяжется с Вами в ближайшее рабочее время', 'hpractice'),
        ];

        unset($response['error']);
        wp_send_json($response);
    }
}
