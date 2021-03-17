<?php

namespace Hpr\Service\Helpers;

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
        $langSlug = pll_current_language();
        $catalogPageId = get_field('shop_page_' . $langSlug, 'option');

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
        $langSlug = pll_current_language();
        $catalogPageId = get_field('service_page_' . $langSlug, 'option');

        if (empty($catalogPageId)) {
            return null;
        }

        return $catalogPageId;
    }

    /**
     * Add uk to site url for ukrainian language.
     *
     * @param string $siteUrl
     *
     * @return string
     */
    public static function addSiteUrlTranslation(string $siteUrl): string
    {
        if ('uk' === pll_current_language()) {
            return $siteUrl . '/uk/';
        }

        return $siteUrl;
    }
}
