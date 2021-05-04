<?php

/*
Template Name: Категория товаров.
Template Post Type: page
*/

use Hpr\Admin\Pagination;
use Hpr\Service\Helpers\Helpers;

$id = get_the_id();
$categoryPagesIds = get_field('products_categories', Helpers::getCatalogId());
$productsIds = get_field('products_list', $id);
$shortcode = get_field('callback_shortcode', $id);
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$productsQuery = new WP_Query(
    [
        'post_type' => \Hpr\Admin\ProductInit::$cptName,
        'post__in' => $productsIds,
        'post_status' => 'publish',
        'paged' => $paged,
        'fields' => 'ids',
        'orderby' => 'post__in',
        'order' => 'ASC'
    ]
);

$pagination = new Pagination($paged, (int) $productsQuery->max_num_pages);

get_header();

get_template_part('template-parts/catalog/section-head');

if (!empty($categoryPagesIds)) : ?>
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
                        <div class="grid-container">
                            <?php if ($productsQuery->have_posts()) :
                                foreach ($productsQuery->posts as $productId) :
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
                                                        endif;

                                                        echo number_format($product->getPrice(), 0, '.', ' '); ?> <?php _e('грн', 'hpractice'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>
                        <?php $pagination->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;

if (!empty($shortcode)) :
    get_template_part('template-parts/sections/callback', null, ['fields' => ['shortcode' => $shortcode]]);
endif; ?>
<div class="section section--white">
    <div class="container">
        <article class="article">
            <?php the_content(); ?>
        </article>
    </div>
</div>
<?php get_footer();
