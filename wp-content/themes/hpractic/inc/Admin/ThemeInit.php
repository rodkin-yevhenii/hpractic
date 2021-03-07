<?php

namespace Hpr\Admin;

use Hpr\Front\Assets;

/**
 * Class ThemeInit
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class ThemeInit
{
    public static $instance;

    /**
     * ThemeInit constructor.
     */
    public function __construct()
    {
        $this->initAcfFields();
        $this->initProduct();
        $this->initService();
        $this->initAssets();
        $this->initMenu();

        $this->registerThemeSettings();
        $this->registerThemeSupport();

        // Register mime types.
        add_filter('upload_mimes', [$this, 'registerAdditionalMimeTypes'], 1, 1);

        // Disable auto <br/> for CF7.
        add_filter('wpcf7_autop_or_not', '__return_false');

        flush_rewrite_rules();
    }

    /**
     * Return ThemeInit Instance.
     *
     * @return ThemeInit
     */
    public static function getInstance(): ThemeInit
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Init styles and scripts enqueuing.
     */
    private function initAssets(): void
    {
        new Assets();
    }

    /**
     * Init theme menus.
     */
    private function initMenu(): void
    {
        new Menu();
    }

    /**
     * Product post-type initialization.
     */
    private function initProduct(): void
    {
        new ProductInit();
    }

    /**
     * Service post-type initialization.
     */
    private function initService(): void
    {
        new ServiceInit();
    }

    /**
     * Register ACF options page
     */
    private function registerThemeSettings()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(
                [
                    'page_title' => __('Theme Settings', 'hpractice'),
                    'menu_title' => __('Theme Settings', 'hpractice'),
                    'menu_slug' => 'theme-settings',
                    'capability' => 'edit_posts',
                    'redirect' => false,
                ]
            );
        }
    }

    /**
     * Add theme support
     */
    private function registerThemeSupport(): void
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }

    /**
     * Register ACF forms for admin side.
     */
    private function initAcfFields()
    {
        new AcfFieldsInit();
    }

    /**
     * Add support for extra mime-types.
     *
     * @param array $mimeTypes      Registered mime-types.
     *
     * @return array
     */
    public function registerAdditionalMimeTypes(array $mimeTypes): array
    {
        $mimeTypes['webp'] = 'image/webp';     // Adding .webp extension

        return $mimeTypes;
    }
}
