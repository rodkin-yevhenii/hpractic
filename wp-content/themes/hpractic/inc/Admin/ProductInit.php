<?php

namespace Hpr\Admin;

/**
 * Class ProductInit
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class ProductInit
{
    public static string $cptName = 'product';

    /**
     * ProductInit constructor.
     */
    public function __construct()
    {
        $this->registerPostType();
        $this->registerTaxonomies();
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
                    'name' => __('Products', 'hpractice'),
                    'singular_name' => __('Product', 'hpractice'),
                    'add_new' => __('Add product', 'hpractice'),
                    'add_new_item' => __('Add new product', 'hpractice'),
                    'edit_item' => __('Edit product', 'hpractice'),
                    'new_item' => __('New product', 'hpractice'),
                    'view_item' => __('View product', 'hpractice'),
                    'search_items' => __('Search product', 'hpractice'),
                    'not_found' => __('Any products not found', 'hpractice'),
                    'menu_name' => __('Products', 'hpractice'),
                ],
                'public' => true,
                'has_archive' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'rewrite' => ['slug' => 'products', 'with_front' => false, 'feeds' => false],
                'show_in_nav_menus' => true,
                'menu_icon' => 'dashicons-products',
                'show_in_rest' => true,
                'supports' => [
                    'title',
                    'editor',
                    'custom-fields',
                    'thumbnail',
                ],
            ]
        );
    }

    /**
     * Register products taxonomies (e.g. Categories).
     */
    private function registerTaxonomies(): void
    {
        register_taxonomy(
            'product_category',
            [self::$cptName],
            [
                'labels'            => [
                    'name'          => __('Product Categories', 'hpractice'),
                    'singular_name' => __('Product Category', 'hpractice'),
                    'search_items'  => __('Search in Product Categories', 'hpractice'),
                    'all_items'     => __('All Product Categories', 'hpractice'),
                    'view_item '    => __('View Product Category', 'hpractice'),
                    'edit_item'     => __('Edit Product Category', 'hpractice'),
                    'update_item'   => __('Update Product Category', 'hpractice'),
                    'add_new_item'  => __('Add Product Category', 'hpractice'),
                    'new_item_name' => __('New Product Category', 'hpractice'),
                    'menu_name'     => __('Product Categories', 'hpractice'),
                ],
                'has_archive'       => true,
                'hierarchical'      => true,
                'public'            => false,
                'show_ui'           => true,
                'show_admin_column' => true,
                'show_in_nav_menus' => false,
                'rewrite'           => false,
                'query_var'         => true,
                'show_in_rest'      => true
            ]
        );
    }
}
