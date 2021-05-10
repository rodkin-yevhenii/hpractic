<?php

/*
Template Name: Поиск
Template Post Type: page
*/

use Hpr\Admin\Pagination;
use Hpr\Admin\ProductInit;
use Hpr\Service\Helpers\Helpers;

global $searchQuery;

$id = get_the_id();
$categoryPagesIds = get_field('products_categories', Helpers::getCatalogId());
$searchQuery = $_GET['search'] ?? '';
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$args = [
    'post_type' => ProductInit::$cptName,
    'post_status' => 'publish',
    'paged' => $paged,
    'fields' => 'ids',
];

if (is_numeric($searchQuery)) {
    $args['meta_query'][] = [
        'key' => 'product_settings_sku',
        'value' => $searchQuery,
        'compare' => 'LIKE'
    ];
} else {
    $args['s'] = $searchQuery;
    $args['sentence'] = 1;
}

$productsQuery = new WP_Query($args);

if (1 === $productsQuery->found_posts) :
    header('Location:' . get_permalink($productsQuery->posts[0]));
endif;

$pagination = new Pagination($paged, (int) $productsQuery->max_num_pages);

get_header();
get_template_part('template-parts/catalog/section-head'); ?>
<section class="section section--white">
    <div class="container">
        <div class="section__inner section__inner--tablet-default">
            <div class="section__main section__main--tablet-default u-tablet-hidden">
                <div class="nav">
                    <div class="nav__sub nav__sub--static">
                        <ul>
                            <?php foreach ($categoryPagesIds as $catId) :
                                $classes = $id === $catId ? ' class="active"' : ''; ?>
                                <li>
                                    <a href="<?php echo get_permalink($catId); ?>"<?php echo $classes; ?>>
                                        <?php echo get_the_title($catId); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section__content section__content--tablet-default">
                <div class="cards cards--tablet-full">
                    <?php if ($productsQuery->have_posts()) : ?>
                        <div class="grid-container">
                            <?php foreach ($productsQuery->posts as $productId) :
                                $product = new \Hpr\Entity\Product($productId); ?>
                                <div class="grid-item-1-of-3">
                                    <a href="<?php echo $product->getUrl(); ?>" class="card card--primary">
                                        <div class="card__inner">
                                            <div class="card__image card__image-1x1">
                                                <?php echo wp_get_attachment_image(
                                                    $product->getGallery()[0],
                                                    'product-catalog-thumbnail'
                                                ); ?>
                                            </div>
                                            <div class="card__content">
                                                <p class="card__part-number">
                                                    <?php _e('Артикул', 'hpractice'); ?> <span>
                                                        <?php echo $product->getSku(); ?>
                                                    </span>
                                                </p>
                                                <h3 class="card__title card__title--sm">
                                                    <?php echo $product->getTitle(); ?>
                                                </h3>
                                                <div class="card__price">
                                                    <?php if ($product->isMinPrice()) :
                                                        echo __('от', 'hpractice') . ' ';
                                                    endif; ?>
                                                    <?php echo number_format(
                                                        $product->getPrice(),
                                                        0,
                                                        '.',
                                                        ' '
                                                    ); ?> <?php _e('грн', 'hpractice'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="cards__message card__message--not-found">
                            <svg class="icon icon--extra-lg">
                                <use xlink:href="<?php echo SRC_URI; ?>/img/icons-sprite.svg#icon-empty-box"></use>
                            </svg>
                            <p>
                                <?php _e('К сожалению, по Вашему запросу нигего не найдено', 'hpractice'); ?>
                            </p>
                        </div>
                    <?php endif;
                    $pagination->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
