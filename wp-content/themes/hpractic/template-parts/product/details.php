<?php
/**
* @var $product \Hpr\Entity\Product
 */
$product = $args['product'] ?? false;
$delivery = $args['delivery'] ?? [];
$payments = $args['payments'] ?? [];

if (!$product) {
    return;
}
?>
<div class="product__details">
    <h3 class="product__title">
        <?php echo $product->getTitle(); ?>
    </h3>
    <div class="product__part-number"><?php echo __('Артикул', 'hpractice') . ' ' . $product->getSku(); ?></div>
    <div class="product__price">
        <?php if ($product->isMinPrice()) :
            echo __('от', 'hpractice') . ' ';
        endif; ?>
        <strong class="value">
            <?php echo number_format($product->getPrice(), 0, '.', ' '); ?> <?php _e('грн', 'hpractice'); ?>
        </strong>
    </div>
    <div class="product__list">
        <ul>
            <?php if ($product->isUnderOrder()) : ?>
                <li><?php echo $product->getUnderOrderTimeText(); ?></li>
            <?php else: ?>
                <li><span class="stock-status stock-status__in-stock"><?php _e('В наличии', 'hpractice') ; ?></span></li>
            <?php endif;

            if ($product->isMinOrder()) : ?>
            <li><?php echo $product->getMinOrder(); ?></li>
            <?php endif;?>
            <li><?php echo $product->getSellingType(); ?></li>
        </ul>
        <?php if (!empty($product->getAdditionalText())) : ?>
            <p><?php echo $product->getAdditionalText(); ?></p>
        <?php endif;?>
    </div>
    <div class="product__count">
        <div class="quantity">
            <button class="quantity__btn quantity__btn--minus" type="button" data-type="minus"></button>
            <button class="quantity__btn quantity__btn--plus" type="button" data-type="plus"></button>
            <input class="quantity__input" type="text" value="1" name="count" min="1" max="99">
        </div>
    </div>
    <button
        type="button"
        data-popup-open="#popup-cart"
        data-product-id="<?php echo $product->getId(); ?>"
        class="btn btn--primary btn-add-product-js"
    >
        <?php _e('Заказать', 'hpractice'); ?>
    </button>
    <?php if (!empty($delivery) || !empty($payments)) : ?>
        <div class="product__info u-desktop-lg-hidden">
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
                            <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-credit-cards"></use>
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
