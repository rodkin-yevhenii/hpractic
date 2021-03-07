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
        <div class="header__languages u-mobile-hidden">
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
        </div>
        <?php echo ob_get_clean();
    }
}
