<?php

$shortcode = get_field('callback_shortkod', 'option');

if (empty($shortcode)) :
    return;
endif;
?>
<section class="section section-callback section--grey">
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
                    <?php echo do_shortcode($shortcode); ?>
                </div>
            </div>
        </div>
    </div>
</section>
