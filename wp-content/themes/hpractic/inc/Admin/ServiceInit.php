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
                    'name'          => __('Услуги', 'hpractice'),
                    'singular_name' => __('Услуга', 'hpractice'),
                    'add_new'       => __('Добавить услугу', 'hpractice'),
                    'add_new_item'  => __('Добавить новую услугу', 'hpractice'),
                    'edit_item'     => __('Редактировать услугу', 'hpractice'),
                    'new_item'      => __('Новая услуга', 'hpractice'),
                    'view_item'     => __('Просмотреть услугу', 'hpractice'),
                    'search_items'  => __('Искать услугу', 'hpractice'),
                    'not_found'     => __('Услуги не найдены', 'hpractice'),
                    'menu_name'     => __('Услуги', 'hpractice'),
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
                    'excerpt'
                ],
            ]
        );
    }
}
