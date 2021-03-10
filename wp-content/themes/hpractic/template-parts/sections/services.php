<?php

use Hpr\Service\Helpers\Helpers;

if (empty($args['fields'])) :
    return;
endif;

$servicePageId = Helpers::getServicePageId();

$pagesIds = get_posts(
    [
        'numberposts' => -1,
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => $servicePageId,
        'fields' => 'ids'
    ]
);

if (empty($pagesIds)) :
    return;
endif;

$fields = $args['fields'];
?>
<section class="section section-services section--white">
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
                    <a href="<?php echo get_permalink($servicePageId); ?>" class="btn btn--secondary">
                        <?php _e('Все услуги', 'hpractice'); ?>
                    </a>
                </div>
            </div>
            <div class="section__slider">
                <div class="slider">
                    <?php foreach ($pagesIds as $id) : ?>
                        <div class="slider__item">
                            <a href="<?php echo get_permalink($id); ?>" class="card card--secondary">
                                <div class="card__inner">
                                    <div class="card__content">
                                        <h3 class="card__title "><?php echo get_the_title($id); ?></h3>
                                        <p class="card__text text">
                                            <?php echo get_the_excerpt($id); ?>
                                        </p>
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
                                    <span class="link link--primary link--bold u-desktop-sm-visible">
                                        <span class="link__inner">
                                            <span><?php _e('Подробнее', 'hpractice'); ?></span>
                                            <svg class="icon icon--md">
                                                <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-chevron-right-white"></use>
                                            </svg>
                                        </span>
                                    </span>
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
                <a href="<?php echo get_permalink($servicePageId); ?>" class="btn btn--secondary">
                    <?php _e('Все услуги', 'hpractice'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
