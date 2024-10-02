<?php

use Hpr\Service\Helpers\Helpers;

$footer = get_field('footer', 'option');
$emails = $footer['emails'] ?? [];
$phones = $footer['phones'] ?? [];
$schedule = $footer['schedule'] ?? [];
$telegram = $footer['telegram_id'] ?? '';
?>
<div id="popup-success" class="popup mfp-with-anim mfp-hide">
    <div class="popup__inner">
        <div class="popup__content ">
            <div class="popup__icon">
                <svg class="icon">
                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-circle-check"></use>
                </svg>
            </div>
            <div class="popup__title heading heading--md heading--center">
                <?php _e('Спасибо за заказ', 'hpractice'); ?>
            </div>
            <div class="popup__order">
                <p><strong><?php _e('Ваш заказ', 'hpractice'); ?>:</strong></p>
                <h6 class="subheading subheading--center subheading--md">
                    № <span class="order-value-js popup-text-js"></span>
                </h6>
            </div>
            <p>
                <?php _e(
                    'Заказы, оформленные через корзину сайта в выходные и праздничные дни, будут по очереди обработаны в первый рабочий день.',
                    'hpractice'
                ); ?>
            </p>
            <p>
                <?php _e(
                    'Реквизиты для оплаты',
                    'hpractice'
                ); ?> UA203515330000026006052125804
            </p>
            <p>
                <?php _e(
                    'Внимание. Обязательно отправьте квитанцию об оплате в Telegram или SMS.',
                    'hpractice'
                ); ?>
            </p>
            <?php if (!empty($schedule)) : ?>
                <br>
                <p><?php _e('Рабочие дни', 'hpractice'); ?>:</p>
                <div class="list">
                    <div class="list__icon">
                        <svg class="icon">
                            <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-clock"></use>
                        </svg>
                    </div>
                    <div class="list__element">
                        <ul>
                            <?php foreach ($schedule as $item) : ?>
                                <li>
                                    <span class="link link--secondary link--md">
                                        <?php echo $item['text']; ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <p><strong><?php _e('С уважением, компания', 'hpractice'); ?> «Plastic House» </strong></p>
            <div class="popup__contacts">
                <p><?php _e('Если у вас возникнут вопросы, просто свяжитесь с нами', 'hpractice'); ?>:</p>
                <div class="popup__contacts-items">
                    <?php if (!empty($phones)) : ?>
                        <div class="popup__contacts-item">
                            <div class="list">
                                <div class="list__icon">
                                    <svg class="icon">
                                        <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-phone"></use>
                                    </svg>
                                </div>
                                <div class="list__element">
                                    <ul>
                                        <?php foreach ($phones as $phone) :
                                            $messenger = '';
                                            if ($phone['is_viber'] ?? false) {
                                                $messenger = 'data-title="Viber"';
                                            } elseif ($phone['is_telegram'] ?? false) {
                                                $messenger = 'data-title="Telegram"';
                                            }
                                            ?>
                                            <li>
                                                <a
                                                    href="tel:
                                                    <?php echo str_replace(
                                                        [' ', '(', ')', '-'],
                                                        '',
                                                        $phone['phone']
                                                    ); ?>"
                                                    class="link link--primary link--md"
                                                    <?php echo $messenger; ?>
                                                >
                                                    <?php echo $phone['phone']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif;

                    if (!empty($emails)) : ?>
                        <div class="popup__contacts-item">
                            <div class="list">
                                <div class="list__icon">
                                    <svg class="icon">
                                        <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-mail"></use>
                                    </svg>
                                </div>
                                <div class="list__element">
                                    <ul>
                                        <?php foreach ($emails as $item) : ?>
                                            <li>
                                                <a href="mailto:<?php echo $item['email']; ?>"
                                                   class="link link--secondary link--md"
                                                >
                                                    <?php echo $item['email']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="popup__contacts-item">
                        <div class="socials__list">
                            <ul>
                                <?php
                                $viber = Helpers::getMessengerPhone('viber', true);

                                if ($viber) : ?>
                                    <li>
                                        <a href="viber://chat?number=<?php echo $viber; ?>"
                                           class="icon"
                                           target="_blank"
                                        >
                                            <img src="<?php echo SRC_URI; ?>img/icons/viber.svg"
                                                 alt="<?php _e('Мы в вайбере', 'hpractice'); ?>"
                                            >
                                        </a>
                                    </li>
                                <?php endif;

                                if (!empty($telegram)) : ?>
                                    <li>
                                        <a href="tg://resolve?domain=<?php echo $telegram; ?>"
                                           class="icon"
                                           target="_blank"
                                        >
                                            <img src="<?php echo SRC_URI; ?>img/icons/telegram.svg"
                                                 alt="<?php _e('Мы в телеграмм', 'hpractice'); ?>"
                                            >
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
