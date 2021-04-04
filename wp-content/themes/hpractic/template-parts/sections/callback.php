<?php

$shortcode = get_field('callback_shortkod', 'option');

if (empty($shortcode)) :
    return;
endif;
?>
<section class="section section-callback section--grey js-section-callback">
    <div class="container">
        <div class="section__row">
            <div class="section__text">
                <p class="subheading subheading--sm">
                    <?php _e(
                        'Оставьте свой номер телефона. Мы перезвоним Вам и ответим на все возникшие вопросы, поможем составить техническое задание',
                        'hpractice'
                    ); ?>
                </p>
            </div>
            <div class="section__form">
                <div class="form form--inline">
                    <form action="">
                        <div class="form__row">
                            <div class="form__field">
                                <input
                                    type="text"
                                    name="phone"
                                    id="cta-phone"
                                    placeholder="<?php __('Телефон', 'hpractice'); ?>"
                                >
                            </div>
                            <div class="form__actions">
                                <button class="btn btn--primary js-send-callback-form" type="submit">
                                    <?php _e('Отправить', 'hpractice'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
