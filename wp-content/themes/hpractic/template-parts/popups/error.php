<div id="popup-error" class="popup popup--sm mfp-with-anim mfp-hide">
    <div class="popup__inner">
        <div class="popup__content ">
            <div class="popup__icon">
                <svg class="icon">
                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-circle-x"></use>
                </svg>
            </div>
            <h6 class="subheading subheading--center subheading--md popup-title-js">
                <?php _e('Что-то пошло не так =(', 'hpractice'); ?>
            </h6>
            <p class="text text--center popup-text-js">
                <?php _e('Возникла ошибка, попробуйте формить заказ немного позже', 'hpractice'); ?>
            </p>
        </div>
        <div class="popup__actions">
            <button class="btn btn--primary" type="button" data-popup-close="popup-error">
                <?php _e('OK', 'hpractice'); ?></button>
        </div>
    </div>
</div>
