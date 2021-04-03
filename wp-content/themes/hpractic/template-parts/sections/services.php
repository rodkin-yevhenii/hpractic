<?php

use Hpr\Admin\ServiceInit;
use Hpr\Entity\Service;
use Hpr\Service\Helpers\Helpers;

$args = [
    'numberposts' => -1,
    'post_type' => ServiceInit::$cptName,
    'post_status' => 'publish',
    'post__in' => Helpers::getServicesIdsList(),
    'fields' => 'ids',
    'orderby' => 'post__in'
];

if (get_post_type(get_the_ID()) === ServiceInit::$cptName) {
    $args['post__in'] = array_filter(
        $args['post__in'],
        function ($id) {
            return $id !== get_the_ID();
        }
    );
}

$pagesIds = get_posts($args);

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
                    <?php echo $fields['heading'] ?? __('ДРУГИЕ НАШИ<br/>УСЛУГИ', 'hpractice'); ?>
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
                </div>
            </div>
            <div class="section__slider">
                <div class="slider">
                    <?php foreach ($pagesIds as $id) :
                        $service = new Service($id); ?>
                        <div class="slider__item">
                            <a href="<?php echo $service->getUrl(); ?>" class="card card--secondary">
                                <div class="card__inner">
                                    <div class="card__content">
                                        <h3 class="card__title "><?php echo $service->getTitle(); ?></h3>
                                        <p class="card__text text">
                                            <?php echo $service->getExcerpt(); ?>
                                        </p>
                                    </div>
                                    <div class="card__actions card__actions--mobile-visible">
                                        <div class="card__actions-inner">
                                            <span class="link link--primary link--bold">
                                                <span class="link__inner">
                                                    <span><?php _e('Подробнее', 'hpractice'); ?></span>
                                                    <svg class="icon icon--md">
                                                        <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-chevron-right-white"></use>
                                                    </svg>
                                                </span>
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
            </div>
        </div>
    </div>
</section>
