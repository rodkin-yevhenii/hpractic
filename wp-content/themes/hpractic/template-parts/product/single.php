<?php

use Hpr\Entity\Product;
use Hpr\Service\Breadcrumbs\Breadcrumbs;

$id = $args['id'] ?? get_the_ID();
$product = new Product($id);
$delivery = get_field('delivery-types-' . pll_current_language(), 'option');
$payments = get_field('payment-types-' . pll_current_language(), 'option');
$breadcrumbs = new Breadcrumbs($id);
?>
<div class="head head--secondary">
    <div class="head__top">
        <div class="container">
            <div class="breadcrumbs">
                <?php $breadcrumbs->render(); ?>
            </div>
        </div>
    </div>
</div>
<div class="product">
    <div class="product__head">
        <div class="container">
            <div class="product__head-inner">
                <?php
                get_template_part('template-parts/product/gallery', null, ['gallery' => $product->getGallery()]);
                get_template_part(
                    'template-parts/product/details',
                    null,
                    [
                        'product' => $product,
                        'delivery' => $delivery,
                        'payments' => $payments
                    ]
                );

                if (!empty($delivery) || !empty($payments)) : ?>
                    <div class="product__info u-desktop-lg-visible">
                        <?php if (!empty($delivery)) : ?>
                            <div class="product__info-item">
                                <div class="product__info-head">
                                    <svg class="icon">
                                        <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-car"></use>
                                    </svg>
                                    <span><?php _e('Доставка', 'hpractice'); ?></span>
                                </div>
                                <div class="product__info-body">
                                    <ul>
                                        <?php foreach ($delivery as $item) : ?>
                                            <li><?php echo $item['type']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif;

                        if (!empty($payments)) : ?>
                            <div class="product__info-item">
                                <div class="product__info-head">
                                    <svg class="icon">
                                        <use xlink:href="<?php
                                        echo SRC_URI; ?>img/icons-sprite.svg#icon-credit-cards"></use>
                                    </svg>
                                    <span><?php _e('Оплата', 'hpractice'); ?></span>
                                </div>
                                <div class="product__info-body">
                                    <ul>
                                        <?php foreach ($payments as $item) : ?>
                                            <li><?php echo $item['type']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="product__body">
        <div class="tabs">
            <div class="tabs__nav">
                <div class="container">
                    <div class="tabs__nav-inner">
                        <div class="tabs__nav-item" data-tab="description">
                            <span><?php _e('Описание', 'hpractice'); ?></span>
                        </div>
                        <?php if (!empty($product->getCharacteristic())) : ?>
                            <div class="tabs__nav-item" data-tab="characteristic">
                                <span><?php _e('Характеристики', 'hpractice'); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="tabs__items article">
                <div class="container">
                    <div class="tabs__items-inner">
                        <div class="tabs__items-tab" data-tab="description">
                            <?php the_content(); ?>
                        </div>
                        <?php if (!empty($product->getCharacteristic())) : ?>
                            <div class="tabs__items-tab" data-tab="characteristic">
                                <figure class="table-container">
                                    <table>
                                        <tbody>
                                            <?php foreach ($product->getCharacteristic() as $item) : ?>
                                                <tr>
                                                    <td><?php echo $item['label']; ?></td>
                                                    <td><?php echo $item['value']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <figcaption><?php _e('Характеристики изделия', 'hpractice'); ?></figcaption>
                                </figure>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
