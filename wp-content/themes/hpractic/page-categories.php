<?php

/*
Template Name: Каталог (страница категорий)
Template Post Type: page
*/

$id = get_the_id();
$breadcrumbs = new \Hpr\Service\Breadcrumbs\Breadcrumbs($id);
$header = get_field('header', $id);
$shortcode = get_field('callback_shortcode', $id);
$categoryPagesIds = get_posts(
    [
        'numberposts' => -1,
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => $id,
        'fields' => 'ids'
    ]
);

get_header(); ?>
<div class="head">
    <div class="head__top">
        <div class="container">
            <div class="breadcrumbs">
                <?php $breadcrumbs->render(); ?>
            </div>
        </div>
    </div>
    <div class="head__content">
        <div class="container">
            <h2 class="heading heading--lg heading--primary">
                <span class="heading__overlay heading__overlay--secondary heading__overlay--center">
                    <?php echo $header['background_text']; ?>
                </span>
                <?php echo $header['heading']; ?>
            </h2>
        </div>
    </div>
</div>
<section class="section section--white">
    <div class="container">
        <div class="cards">
            <div class="grid-container">
                <?php if (!empty($categoryPagesIds)) :
                    foreach ($categoryPagesIds as $catId) : ?>
                        <div class="grid-item-1-of-4 grid-item-1-of-4--tablet-lg">
                            <a href="<?php echo get_the_permalink($catId); ?>" class="card card--primary ">
                                <div class="card__inner">
                                    <div class="card__image">
                                        <?php echo get_the_post_thumbnail($catId, 'carousel-item'); ?>
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title card__title--center">
                                            <?php echo get_the_title($catId); ?>
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<?php if (!empty($shortcode)) :
    get_template_part('template-parts/sections/callback', null, ['fields' => ['shortcode' => $shortcode]]);
endif; ?>
<div class="section section--white">
    <div class="container">
        <article class="article">
            <?php echo get_the_content(); ?>
        </article>
    </div>
</div>
<?php get_footer();
