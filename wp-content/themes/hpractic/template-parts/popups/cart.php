<?php
    $policyId = get_field('policy_page', 'option');
    $policyId = pll_get_post($policyId);
?>
<div id="popup-cart" class="popup mfp-with-anim mfp-hide">
    <div class="popup__inner">
        <div class="popup__title heading heading--md popup-title-js">
            <?php _e('Ваш заказ', 'hpractice'); ?>
        </div>
        <div class="popup__content ">
            <div id="cart-form" class="form">
                <form action="">
                    <div class="form__item">
                        <div class="cart">
                            <div class="cart__products">
                                <div class="cart__products-empty">
                                    <svg class="icon icon--extra-lg">
                                        <use xlink:href="<?php
                                        echo SRC_URI; ?>img/icons-sprite.svg#icon-shopping-cart"></use>
                                    </svg>
                                    <p class="text"><?php _e('Ваша корзина пустая', 'hpractice'); ?></p>
                                    <div class="popup__actions">
                                        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">
                                            <?php _e('Продолжить покупки', 'hpractice'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <h4 class="form__title"><?php _e('Контактные данные', 'hpractice'); ?></h4>
                        <div class="form__row">
                            <div class="form__field">
                                <label class="form__label" for="cart-name">
                                    <?php _e('Ваше имя', 'hpractice'); ?>*
                                </label>
                                <input type="text" name="name" id="cart-name" placeholder="Имя" required>
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="cart-phone">
                                    <?php _e('Ваш номер телефона', 'hpractice'); ?>*
                                </label>
                                <input type="text"
                                       name="phone"
                                       id="cart-phone"
                                       placeholder="+38 (___) ___-__-__"
                                       required
                                >
                            </div>
                        </div>
                        <div class="form__field">
                            <label class="form__label" for="cart-email">
                                <?php _e('Ваш e-mail', 'hpractice'); ?>
                            </label>
                            <input type="email" name="email" id="cart-email" placeholder="example@email.com">
                        </div>
                        <div class="form__field">
                            <label class="form__label" for="cart-comment">
                                <?php _e('Комментарий к заказу', 'hpractice'); ?>
                            </label>
                            <textarea name="comment" id="cart-comment" placeholder="Комментарий к заказу"></textarea>
                        </div>
                    </div>
                    <div class="form__note">
                        <div class="form__note-icon">
                            <svg class="icon">
                                <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-info"></use>
                            </svg>
                        </div>
                        <div class="form__note-text">
                            <?php _e(
                                'После нажатия на кнопку «Оформить заказ», на экране отобразится информация о вашем заказе. Так же, на Вашу электронную почту придет подробная информация по заказу',
                                'hpractice'
                            ); ?>
                        </div>
                    </div>
                    <div class="form__agreement">
                        <label class="form__checkbox">
                            <input class="requiredCheckbox" type="checkbox" name="agreement">
                            <i class="form__checkbox__element"></i>
                            <span>
                                <?php _e(
                                    'Нажимая на кнопку «Оформить заказ» вы даете согласие на обработку персональных данных и соглашаетесь с ',
                                    'hpractice'
                                ); ?>
                                <a href="<?php echo get_permalink($policyId); ?>>" target="_blank">
                                    <?php _e('политикой конфиденциальности', 'hpractice'); ?>
                                </a>
                            </span>
                        </label>
                    </div>
                    <div class="form__actions form__actions--offset-top-lg">
                        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">
                            <?php _e('Продолжить покупки', 'hpractice'); ?>
                        </button>
                        <button class="btn btn--primary btn--disabled" type="submit" disabled>
                            <?php _e('ОФОРМИТЬ ЗАКАЗ', 'hpractice'); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
