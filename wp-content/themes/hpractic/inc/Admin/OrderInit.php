<?php

namespace Hpr\Admin;

/**
 * Class OrderInit
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class OrderInit
{
    public static string $cptName = 'orders';

    /**
     * OrderInit constructor.
     */
    public function __construct()
    {
        $this->registerPostType();
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
                'menu_icon' => 'dashicons-products',
                'show_in_rest' => true,
                'supports' => [
                    'title',
                    'custom-fields',
                ],
            ]
        );
    }
}
