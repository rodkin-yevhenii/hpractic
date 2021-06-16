<?php

namespace Hpr\Admin;

use Hpr\Entity\Product;
use Hpr\Service\Helpers\Helpers;

/**
 * Class ProductInit
 *
 * @author Rodkin Yevhenii <rodkin.yevhenii@gmail.com>
 * @package Hpr\Admin
 */
class ProductInit
{
    public static string $cptName = 'product';
    public static string $cptTaxonomy = 'product_category';

    /**
     * ProductInit constructor.
     */
    public function __construct()
    {
        $this->registerPostType();
        $this->registerTaxonomies();
        $this->registerHooks();
        $this->registerColumns();
    }

    /**
     * Register product post-type.
     */
    private function registerPostType(): void
    {
        register_post_type(
            self::$cptName,
            [
                'label'             => null,
                'labels'            => [
                    'name'          => __('Продукты', 'hpractice'),
                    'singular_name' => __('Продукт', 'hpractice'),
                    'add_new'       => __('Добавить продукт', 'hpractice'),
                    'add_new_item'  => __('Добавить новый продукт', 'hpractice'),
                    'edit_item'     => __('Редактировать продукт', 'hpractice'),
                    'new_item'      => __('Новый продукт', 'hpractice'),
                    'view_item'     => __('Просмотреть продукт', 'hpractice'),
                    'search_items'  => __('Искать продукт', 'hpractice'),
                    'not_found'     => __('Продукты не найдены', 'hpractice'),
                    'menu_name'     => __('Продукты', 'hpractice'),
                ],
                'public'            => true,
                'has_archive'       => false,
                'show_ui'           => true,
                'show_in_menu'      => true,
                'rewrite'           => ['slug' => 'products', 'with_front' => false, 'feeds' => false],
                'show_in_nav_menus' => true,
                'menu_icon'         => 'dashicons-products',
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

    /**
     * Register products taxonomies (e.g. Categories).
     */
    private function registerTaxonomies(): void
    {
        register_taxonomy(
            self::$cptTaxonomy,
            [self::$cptName],
            [
                'labels'            => [
                    'name'          => __('Категории продуктов', 'hpractice'),
                    'singular_name' => __('Категория продуктов', 'hpractice'),
                    'search_items'  => __('Искать в категории продуктов', 'hpractice'),
                    'all_items'     => __('Все категории', 'hpractice'),
                    'view_item '    => __('Просмотреть категорию', 'hpractice'),
                    'edit_item'     => __('Редактировать категорию', 'hpractice'),
                    'update_item'   => __('Обновить категорию', 'hpractice'),
                    'add_new_item'  => __('Добавить категорию', 'hpractice'),
                    'new_item_name' => __('Новая категория', 'hpractice'),
                    'menu_name'     => __('Категории продуктов', 'hpractice'),
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

    /**
     * Register hooks.
     */
    private function registerHooks(): void
    {
        add_filter(
            'acf/fields/relationship/query/name=products_categories',
            [$this, 'updateProductsCategoriesQuery'],
            10
        );

        add_filter(
            'acf/load_field/name=products_list',
            [$this, 'updateProductsListQuery'],
            10
        );

        add_filter('acf/fields/post_object/result', [$this, 'updateProductsTitle'], 10, 3);
        add_filter('acf/fields/post_object/query', [$this, 'updateAcfProductsSearch'], 10, 2);

        add_action('wp_ajax_get_cart_items', [Helpers::class, 'getCartItemsCallback']);
        add_action('wp_ajax_nopriv_get_cart_items', [Helpers::class, 'getCartItemsCallback']);
    }

    /**
     * Register new columns.
     */
    private function registerColumns(): void
    {
        // Create columns
        add_filter('manage_' . self::$cptName . '_posts_columns', [$this, 'addSkuColumn'], 4);

        // Fill columns
        add_action('manage_' . self::$cptName . '_posts_custom_column', [$this, 'fillNewColumns'], 5, 2);

        // Change columns width.
        add_action('admin_head', [$this, 'addColumnsCss']);
    }

    /**
     * Show only shop subpages in products categories field.
     *
     * @param array $args Query args.
     *
     * @return array
     */
    public function updateProductsCategoriesQuery(array $args): array
    {
        $catalogPageId       = Helpers::getCatalogId();
        $args['post_parent'] = $catalogPageId;

        return $args;
    }

    /**
     * Show only shop subpages in products categories field.
     *
     * @param array $args Query args.
     *
     * @return array
     */
    public function updateProductsListQuery(array $field): array
    {
        $terms = get_terms(['taxonomy' => self::$cptTaxonomy, 'hide_empty' => true]);

        if (is_wp_error($terms) || empty($terms)) {
            return $field;
        }

        foreach ($terms as $term) {
            $field['taxonomy'][] = self::$cptTaxonomy . ':' . $term->slug;
        }

        return $field;
    }

    /**
     * Add sku to product title in products repeater on order page.
     *
     * @param string $text Product title.
     * @param \WP_Post $post Product post.
     * @param array $field ACF field.
     *
     * @return string
     */
    public function updateProductsTitle($text, $post, $field)
    {
        if ('product' !== $post->post_type || 'field_6060a0aa90436' !== $field['key']) {
            return $text;
        }

        $product = new Product($post->ID);

        return $product->getSku() . ' - ' . $text;
    }

    /**
     * Use search by SKU instead of product title for ACF field.
     *
     * @param array $args Query params.
     * @param array $field ACF field.
     *
     * @return mixed
     */
    public function updateAcfProductsSearch(array $args, array $field)
    {
        if ('field_6060a0aa90436' !== $field['key'] || ! isset($args['s'])) {
            return $args;
        }
        $args['meta_query'][] = [
            'key'     => 'product_settings_sku',
            'value'   => $args['s'],
            'compare' => 'LIKE'
        ];

        unset($args['s']);

        return $args;
    }

    /**
     * Add column with product SKU.
     *
     * @param array $columns
     *
     * @return array
     */
    public function addSkuColumn(array $columns): array
    {
        $newColumns = [
            'sku' => __('Артикул', 'hpractice'),
        ];

        return array_slice($columns, 0, 1) + $newColumns + array_slice($columns, 1);
    }

    /**
     * Add content to new columns.
     *
     * @param $colname
     * @param $id
     */
    public function fillNewColumns($colname, $id): void
    {
        if ($colname === 'sku') {
            $product = new Product($id);
            echo $product->getSku();
        }
    }

    /**
     * Change new columns styles.
     */
    public function addColumnsCss(): void
    {
        echo '<style type="text/css">.column-sku{ width:10%; }</style>';
    }
}
