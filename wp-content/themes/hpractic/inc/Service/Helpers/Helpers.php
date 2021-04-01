<?php

namespace Hpr\Service\Helpers;

use Hpr\Entity\Product;

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
     * Get service page id.
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
            $response['error']['message'] = __('Корзина пуста, сначала добавьте товары в корзину.', 'hpractice');

            wp_send_json($response);
        }

        foreach ($ids as $id) {
            $product = new Product($id);
            $price = $product->getPrice() . ' ' . __('грн/шт', 'hpractice');
            $gallery = $product->getGallery();

            if ($product->isMinPrice()) {
                $price = __('от', 'hpractice') . ' ' . $price;
            }

            $price = "<strong>$price</strong>";
            $response['data'][] = [
                'id' => $product->getId(),
                'title' => $product->getTitle(),
                'img' => empty($gallery) ? false : wp_get_attachment_image_src($gallery[0]),
                'price' => $price
            ];
        }

        $response['result'] = true;

        wp_send_json($response);
    }
}
