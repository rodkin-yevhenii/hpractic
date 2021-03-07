<?php

namespace Hpr\Admin;

/**
 * Class Menu
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class Menu
{
    /**
     * Menu constructor.
     */
    public function __construct()
    {
        $this->registerMenuLocations();
        $this->initHooks();
    }

    /**
     * Register theme menu locations.
     */
    private function registerMenuLocations()
    {
        register_nav_menus(
            [
                'primary-menu' => esc_html__('Primary Menu', 'hpractice'),
                'mobile-menu' => esc_html__('Mobile Menu', 'hpractice'),
            ]
        );
    }

    /**
     * Init menu hooks
     */
    private function initHooks(): void
    {
        //add_filter('nav_menu_submenu_css_class', [$this, 'updateMenuSubmenuCssClass'], 10, 3);
    }
}
