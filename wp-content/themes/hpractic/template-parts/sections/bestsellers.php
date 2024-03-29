<?php

use Hpr\Entity\Product;
use Hpr\Service\Helpers\Helpers;

if (empty($args['fields'])) :
    return;
endif;

$catalogId = Helpers::getCatalogId();
$fields = $args['fields'];
$productsIds = $fields['products'];

if (empty($productsIds)) :
    return;
endif; ?>
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
                        <?php _e('В каталог', 'hpractice'); ?>
                    </a>
                </div>
            </div>
            <div class="section__slider">
                <div class="slider">
                    <?php foreach ($productsIds as $id) :
                        $product = new Product($id); ?>
                        <div class="slider__item">
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
                                            <?php _e('Артикул', 'hpractice'); ?>
                                            <span><?php echo $product->getSku(); ?></span>
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
                <a href="<?php echo get_permalink($catalogId); ?>" class="btn btn--secondary">
                    <?php _e('Весь каталог', 'hpractice'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
