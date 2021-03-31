<div id="popup-cart" class="popup mfp-with-anim mfp-hide">
    <div class="popup__inner">
        <div class="popup__title heading heading--md popup-title-js">Ваш заказ</div>
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
                                    <p class="text">Ваша корзина пустая</p>
                                    <div class="popup__actions">
                                        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">Продолжить покупки</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <h4 class="form__title">Контактные данные</h4>
                        <div class="form__row">
                            <div class="form__field">
                                <label class="form__label" for="cart-name">
                                    Ваше имя*
                                </label>
                                <input type="text" name="name" id="cart-name" placeholder="Имя" required>
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="cart-phone">
                                    Ваш номер телефона*
                                </label>
                                <input type="text" name="phone" id="cart-phone" placeholder="+38 (___) ___-__-__" required>
                            </div>
                        </div>
                        <div class="form__field">
                            <label class="form__label" for="cart-email">
                                Ваш e-mail
                            </label>
                            <input type="email" name="email" id="cart-email" placeholder="example@email.com">
                        </div>
                        <div class="form__field">
                            <label class="form__label" for="cart-comment">
                                Комментарий к заказу
                            </label>
                            <textarea name="comment" id="cart-comment" placeholder="Комментарий к заказу"></textarea>
                        </div>
                    </div>
                    <div class="form__note">
                        <div class="form__note-icon">
                            <svg class="icon">
                                <use xlink:href="<?php
                                        echo SRC_URI; ?>img/icons-sprite.svg#icon-info"></use>
                            </svg>
                        </div>
                        <div class="form__note-text">
                            После нажатия на кнопку «Оформить заказ», на экране отобразится информация о вашем заказе.
                            Так же, на Вашу электронную почту придет подробная информация по заказу
                        </div>
                    </div>
                    <div class="form__actions form__actions--offset-top-lg">
                        <button class="btn btn--secondary" type="button" data-popup-close="popup-cart">Продолжить покупки</button>
                        <button class="btn btn--primary btn--disabled" type="submit" disabled>ОФОРМИИТЬ ЗАКАЗ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
