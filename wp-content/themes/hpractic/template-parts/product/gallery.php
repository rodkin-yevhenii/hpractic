<?php

$gallery = $args['gallery'] ?? false;

if (!$gallery) {
    return;
}
?>
<div class="product__preview">
    <div class="product__preview-top">
        <div class="slider">
            <?php foreach ($gallery as $imgId) : ?>
                <div class="slider__item">
                    <a
                        href="<?php echo wp_get_original_image_url($imgId); ?>"
                        class="product__img"
                        title="<?php _e('Нажмите для увеличения', 'hpractice'); ?>"
                    >
                        <?php echo wp_get_attachment_image($imgId, 'product-gallery-thumbnail'); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="product__preview-bottom">
        <div class="product__preview-thumbs">
            <div class="slider">
                <?php foreach ($gallery as $imgId) : ?>
                    <div class="slider__item">
                        <span class="product__img">
                            <?php echo wp_get_attachment_image($imgId, 'product-gallery-preview'); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="product__preview-controls">
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
