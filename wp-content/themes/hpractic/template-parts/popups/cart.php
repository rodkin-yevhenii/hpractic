<?php
$policyId = get_field( 'policy_page', 'option' );
$policyId = pll_get_post( $policyId );
?>
<div id="popup-cart" class="popup mfp-with-anim mfp-hide">
    <div class="popup__inner">
        <div class="popup__title heading heading--md popup-title-js">
            <?php _e( 'Ваш заказ', 'hpractice' ); ?>
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
                                    <p class="text"><?php _e( 'Ваша корзина пустая', 'hpractice' ); ?></p>
                                    <div class="popup__actions">
                                        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">
                                            <?php _e( 'Продолжить покупки', 'hpractice' ); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <h4 class="form__title"><?php _e( 'Контактные данные', 'hpractice' ); ?></h4>
                        <div class="form__row">
                            <div class="form__field">
                                <label class="form__label" for="cart-surname">
                                    <?php _e( 'Фамилия', 'hpractice' ); ?>*
                                </label>
                                <input type="text" name="surname" id="cart-surname" required>
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="cart-name">
                                    <?php _e( 'Имя', 'hpractice' ); ?>*
                                </label>
                                <input type="text" name="name" id="cart-name" required>
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="form__field">
                                <label class="form__label" for="cart-phone">
                                    <?php _e( 'Номер телефона', 'hpractice' ); ?>*
                                </label>
                                <input type="text"
                                       name="phone"
                                       id="cart-phone"
                                       placeholder="+38 (___) ___-__-__"
                                       required
                                >
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="cart-email">
                                    <?php _e( 'E-mail', 'hpractice' ); ?>
                                </label>
                                <input type="email" name="email" id="cart-email" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <h4 class="form__title"><?php _e( 'Способ доставки', 'hpractice' ); ?></h4>
                        <div class="form__row form__row--vertical">
                            <label class="form__radio">
                                <input type="radio" name="delivery-type" value="new-post-department" checked>
                                <i class="form__radio__element"></i>
                                <span>
                                    <?php _e( 'Отделение Новой почты', 'hpractice' ); ?>
                                </span>
                            </label>
                            <label class="form__radio">
                                <input type="radio" name="delivery-type" value="new-post-address-delivery">
                                <i class="form__radio__element"></i>
                                <span>
                                    <?php _e( 'Адресная доставка Новой почтой', 'hpractice' ); ?>
                                </span>
                            </label>
                            <label class="form__radio">
                                <input type="radio" name="delivery-type" value="pickup">
                                <i class="form__radio__element"></i>
                                <span>
                                    <?php _e( 'Самовывоз', 'hpractice' ); ?>
                                </span>
                            </label>
                            <label class="form__radio">
                                <input type="radio" name="delivery-type" value="local-address">
                                <i class="form__radio__element"></i>
                                <span>
                                    <?php _e( 'Курьерская доставка по г. Харьков', 'hpractice' ); ?>
                                </span>
                            </label>
                        </div>

                        <div id="new-post-department" class="form__row js-radio-collapsed-item">
                            <div class="form__field">
                                <label class="form__label" for="cart-city">
                                    <?php _e( 'Город', 'hpractice' ); ?>*
                                </label>
                                <input type="text" name="city" id="cart-city">
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="cart-new-post-office">
                                    <?php _e( 'Номер отделения', 'hpractice' ); ?>*
                                </label>
                                <input type="text" name="new-post-office" id="cart-new-post-office">
                            </div>
                        </div>

                        <div id="new-post-address-delivery" class="form__row js-radio-collapsed-item" style="display: none">
                            <div class="form__field">
                                <label class="form__label" for="cart-delivery-address">
                                    <?php _e( 'Адрес доставки', 'hpractice' ); ?>*
                                </label>
                                <textarea
                                    name="delivery-address"
                                    id="cart-delivery-address"
                                    placeholder="<?php _e( 'Область, район, город, улица, номер дома, этаж', 'hpractice' ); ?>"
                                ></textarea>
                            </div>
                        </div>

                        <div id="local-address" class="form__row js-radio-collapsed-item" style="display: none">
                            <div class="form__field">
                                <label class="form__label" for="cart-local-address">
                                    <?php _e( 'Адрес доставки', 'hpractice' ); ?>*
                                </label>
                                <textarea
                                    name="local-address"
                                    id="cart-local-address"
                                    placeholder="<?php _e( 'Улица, номер дома, этаж', 'hpractice' ); ?>"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <h4 class="form__title"><?php _e( 'Способ оплаты', 'hpractice' ); ?></h4>
                        <div class="form__row form__row--vertical">
                            <label class="form__radio">
                                <input type="radio" name="payment-type" value="cod" checked>
                                <i class="form__radio__element"></i>
                                <span>
                                    <?php _e( 'Наложенный платеж', 'hpractice' ); ?>
                                </span>
                            </label>
                            <label class="form__radio">
                                <input type="radio" name="payment-type" value="prepaid">
                                <i class="form__radio__element"></i>
                                <span>
                                    <?php _e( 'По предоплате 100%', 'hpractice' ); ?>
                                </span>
                            </label>
                            <label class="form__radio">
                                <input type="radio" name="payment-type" value="by-invoice">
                                <i class="form__radio__element"></i>
                                <span>
                                    <?php _e( 'По счет-фактуре', 'hpractice' ); ?>
                                </span>
                            </label>
                        </div>
                        <div class="form__row">
                            <div class="form__note">
                                <div class="form__note-icon">
                                    <svg class="icon">
                                        <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-info"></use>
                                    </svg>
                                </div>
                                <div id="cod" class="form__note-text js-radio-collapsed-item">
                                    <?php _e(
                                        'Осуществляется по предоплате 50% от суммы заказа, остаток оформляется наложенным платежом',
                                        'hpractice'
                                    ); ?>
                                </div>
                                <div id="prepaid" class="form__note-text js-radio-collapsed-item" style="display:none;">
                                    <?php _e(
                                        'Предоплата 100% на банковскую карту по реквизитам',
                                        'hpractice'
                                    ); ?>
                                </div>
                                <div id="by-invoice" class="form__note-text js-radio-collapsed-item" style="display:none;">
                                    <?php _e(
                                        'Предоплата 100% по счет-фактуре, в комментариях необходимо указать Плательщика',
                                        'hpractice'
                                    ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <div class="form__field">
                            <label class="form__label" for="cart-comment">
                                <?php _e( 'Комментарий к заказу', 'hpractice' ); ?>
                            </label>
                            <textarea name="comment" id="cart-comment"></textarea>
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
                                <a href="<?php echo get_permalink( $policyId ); ?>>" target="_blank">
                                    <?php _e( 'политикой конфиденциальности', 'hpractice' ); ?>
                                </a>
                            </span>
                        </label>
                    </div>
                    <div class="form__actions form__actions--offset-top-lg">
                        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">
                            <?php _e( 'Продолжить покупки', 'hpractice' ); ?>
                        </button>
                        <button class="btn btn--primary btn--disabled" type="submit" disabled>
                            <?php _e( 'ОФОРМИТЬ ЗАКАЗ', 'hpractice' ); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
