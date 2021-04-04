<?php

/*
Template Name: Контакты.
Template Post Type: page
*/

use Hpr\Service\Helpers\Helpers;

$footer = get_field('footer', 'option');
$phones = $footer['phones'] ?? [];
$emails = $footer['emails'] ?? [];
$schedule = $footer['schedule'] ?? [];
$address = $footer['address_' . pll_current_language()] ?? '';
$telegram = $footer['telegram_id'] ?? '';
$viber = Helpers::getMessengerPhone('viber', true);

get_header();
get_template_part('template-parts/catalog/section-head');
?>
<section class="section section--white">
    <div class="container">
        <div class="contacts">
            <div class="contacts__inner">
                <div class="contacts__info">
                    <h4 class="subheading subheading--md subheading--mb-md">
                        <?php _e('Контактная информация', 'hpractice'); ?>
                    </h4>
                    <div class="contacts__info-list">
                        <?php if (!empty($phones)) : ?>
                            <div class="contacts__info-item list">
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
                                            } ?>
                                            <li>
                                                <a
                                                    href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', $phone['phone']); ?>"
                                                    class="link link--secondary link--md"
                                                    <?php echo $messenger; ?>
                                                >
                                                    <?php echo $phone['phone']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif;

                        if (!empty($emails)) : ?>
                            <div class="contacts__info-item list">
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
                        <?php endif;

                        if (!empty($schedule)) :?>
                            <div class="contacts__info-item list">
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
                        <?php endif;

                        if (!empty($address)) : ?>
                            <div class="contacts__info-item list">
                                <div class="list__icon">
                                    <svg class="icon icon--pointer">
                                        <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-pointer"></use>
                                    </svg>
                                </div>
                                <div class="list__element">
                                    <ul>
                                        <li>
                                             <span class="link link--secondary link--md">
                                                <?php _e('Юридический адрес', 'hpractice'); ?>: <br>
                                                <?php echo $address; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif;

                        if (!empty($telegram) || !empty($viber)) : ?>
                            <div class="contacts__info-item socials">
                                <div class="socials__title">
                                    <h4 class="subheading subheading--sm">
                                        <?php _e('Мы на связи', 'hpractice'); ?>:
                                    </h4>
                                </div>
                                <div class="socials__list">
                                    <ul>
                                        <?php if ($viber) : ?>
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
                        <?php endif; ?>
                    </div>
                </div>
                <div id="contacts-form" class="contacts__form" >
                    <div class="form">
                        <form action="">
                            <h4 class="subheading subheading--md subheading--mb-md form__title">
                                <?php _e('Отправьте нам сообщение', 'hpractice'); ?>
                            </h4>
                            <div class="form__row">
                                <div class="form__field">
                                    <label class="form__label" for="contacts-name">
                                        <?php _e('Ваше имя', 'hpractice'); ?>*
                                    </label>
                                    <input type="text" name="name" id="contacts-name" placeholder="Имя" required>
                                </div>
                                <div class="form__field">
                                    <label class="form__label" for="contacts-phone">
                                        <?php _e('Ваш номер телефона', 'hpractice'); ?>*
                                    </label>
                                    <input
                                        type="text"
                                        name="phone"
                                        id="contacts-phone"
                                        placeholder="+38 (___) ___-__-__"
                                        required
                                    >
                                </div>
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="contacts-email">
                                    <?php _e('Ваш e-mail', 'hpractice'); ?>
                                </label>
                                <input type="email" name="email" id="contacts-email" placeholder="example@email.com">
                            </div>
                            <div class="form__field">
                                <label class="form__label" for="contacts-message">
                                    <?php _e('Сообщение', 'hpractice'); ?>
                                </label>
                                <textarea
                                    name="comment"
                                    id="contacts-message"
                                    placeholder="<?php _e('Ваше сообщение', 'hpractice'); ?>"
                                ></textarea>
                            </div>
                            <div class="form__actions form__actions--left">
                                <button class="btn btn--primary js-send-mail" type="submit">
                                    <?php _e('ОТПРАВИТЬ', 'hpractice'); ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();
