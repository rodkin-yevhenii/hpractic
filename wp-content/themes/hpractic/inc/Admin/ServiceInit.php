<?php

namespace Hpr\Admin;

/**
 * Class ServiceInit
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class ServiceInit
{
    public static string $cptName = 'service';

    public function __construct()
    {
        $this->registerPostType();
    }

    /**
     * Register service post-type.
     */
    private function registerPostType(): void
    {
        register_post_type(
            self::$cptName,
            [
                'label'             => null,
                'labels'            => [
                    'name'          => __('Services', 'hpractice'),
                    'singular_name' => __('Service', 'hpractice'),
                    'add_new'       => __('Add Service', 'hpractice'),
                    'add_new_item'  => __('Add new Service', 'hpractice'),
                    'edit_item'     => __('Edit Service', 'hpractice'),
                    'new_item'      => __('New Service', 'hpractice'),
                    'view_item'     => __('View Service', 'hpractice'),
                    'search_items'  => __('Search Service', 'hpractice'),
                    'not_found'     => __('Any Services not found', 'hpractice'),
                    'menu_name'     => __('Services', 'hpractice'),
                ],
                'public'            => true,
                'has_archive'       => false,
                'show_ui'           => true,
                'show_in_menu'      => true,
                'rewrite'           => ['slug' => 'services', 'with_front' => false, 'feeds' => false],
                'show_in_nav_menus' => true,
                'menu_icon'         => 'dashicons-hammer',
                'show_in_rest'      => true,
                'supports'          => [
                    'title',
                    'editor',
                    'custom-fields',
                    'thumbnail',
                ],
            ]
        );
    }
}