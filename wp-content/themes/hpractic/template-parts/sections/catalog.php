<?php

use Hpr\Service\Helpers\Helpers;

if (empty($args['fields'])) :
    return;
endif;

$catalogId = Helpers::getCatalogId();

$pagesIds = get_posts(
    [
        'numberposts' => -1,
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => $catalogId,
        'fields' => 'ids'
    ]
);

$fields = $args['fields'];
?>
<section class="section section-catalog section--white">
    <div class="container">
        <div class="section__inner">
            <div class="section__main">
                <h3 class="heading heading--md heading--primary">
                    <?php echo $fields['heading']; ?>
                </h3>
                <div class="section__controls u-desktop-sm-hidden">
                    <div class="section__controls-group">
                        <span class="btn btn--secondary btn--square btn-arrow btn-arrow--left">
                            <svg class="icon">
                                <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-arrow-left"></use>
                            </svg>
                        </span>
                        <span class="btn btn--secondary btn--square btn-arrow btn-arrow--right">
                            <svg class="icon">
                                <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-arrow-right"></use>
                            </svg>
                        </span>
                    </div>
                    <a href="<?php echo get_permalink($catalogId); ?>" class="btn btn--secondary">
                        <?php _e('Весь каталог', 'hpractice'); ?>
                    </a>
                </div>
            </div>
            <div class="section__slider">
                <div class="slider">
                    <?php foreach ($pagesIds as $id) : ?>
                        <div class="slider__item">
                            <a href="<?php echo get_permalink($id); ?>" class="card">
                                <div class="card__inner">
                                    <div class="card__image">
                                        <?php echo get_the_post_thumbnail($id, 'carousel-item'); ?>
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title card__title--center">
                                            <?php echo get_the_title($id); ?>
                                        </h3>
                                    </div>
                                    <div class="card__actions">
                                        <div class="card__actions-inner">
                                            <span class="btn btn--primary">
                                                <span><?php _e('Подробнее', 'hpractice'); ?></span>
                                                <svg class="icon icon--md">
                                                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-chevron-right-white"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="section__controls u-desktop-sm-visible">
                <div class="section__controls-group">
                    <span class="btn btn--secondary btn--square btn-arrow btn-arrow--left">
                        <svg class="icon">
                            <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-arrow-left"></use>
                        </svg>
                    </span>
                    <span class="btn btn--secondary btn--square btn-arrow btn-arrow--right">
                        <svg class="icon">
                            <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-arrow-right"></use>
                        </svg>
                    </span>
                </div>
                <a href="" class="btn btn--secondary">
                    <?php _e('Весь каталог', 'hpractice'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
