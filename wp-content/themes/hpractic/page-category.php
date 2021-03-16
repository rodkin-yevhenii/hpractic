<?php

/*
Template Name: Категория товаров.
Template Post Type: page
*/

use Hpr\Service\Helpers\Helpers;

$id = get_the_id();
$categoryPagesIds = get_field('products_categories', Helpers::getCatalogId());
$productsIds = get_field('products_list', $id);
$shortcode = get_field('callback_shortcode', $id);

$productsQuery = new WP_Query(
    [
        'post_type' => \Hpr\Admin\ProductInit::$cptName,
        'post__in' => $productsIds,
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'paged' => 1,
        'fields' => 'ids',
        'orderby' => 'post__in',
        'order' => 'ASC'
    ]
);

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
                                                    <?php echo get_the_post_thumbnail(
                                                        $productId,
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
                                                        <?php echo $product->getPrice(); ?> <?php _e('грн', 'hpractice'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>
                        <?php the_posts_pagination(); ?>
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
