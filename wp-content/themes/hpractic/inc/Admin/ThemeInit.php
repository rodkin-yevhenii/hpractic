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
        $this->initOrder();
        $this->initAssets();
        $this->initMenu();

        $this->registerThemeSettings();
        $this->registerThemeSupport();
        $this->registerImagesSizes();

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
     * Order post-type initialization.
     */
    private function initOrder(): void
    {
        new OrderInit();
    }

    /**
     * Register ACF options page
     */
    private function registerThemeSettings()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(
                [
                    'page_title' => __('Настройки темы', 'hpractice'),
                    'menu_title' => __('Настройки темы', 'hpractice'),
                    'menu_slug' => 'theme-settings',
                    'capability' => 'edit_posts',
                    'redirect' => false,
                ]
            );
        }

        if (function_exists('acf_add_options_sub_page')) {
            acf_add_options_sub_page(
                [
                    'page_title'  => __('Настройки продукта'),
                    'menu_title'  => __('Настройки продукта'),
                    'parent_slug' => 'theme-settings',
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
        add_post_type_support('page', array('excerpt'));
        add_theme_support('editor-styles');
        add_editor_style('editor-style.css');
    }

    /**
     * Add new images sizes.
     */
    private function registerImagesSizes(): void
    {
        add_image_size('carousel-item', 328, 358, true);
        add_image_size('product-catalog-thumbnail', 320, 320, true);
        add_image_size('product-gallery-thumbnail', 608, 608, true);
        add_image_size('product-gallery-preview', 94, 94, true);
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
