<?php

use Hpr\Service\Helpers\Helpers;

$error = $args['error'] ?? 404;

if (500 === $error) {
    $img = '<img src="' . SRC_URI . 'img/500.svg" alt="500. ' . __('Внутренняя ошибка сервера', 'hpractice') . '!">';
    $text = __(
        'Произошла ошибка сервера при формировани страницы.<br>Пожалуйста, сообщите админстратору сайта.<br>
К сожалению текущая страница будет недоступна до исправления ошибки.',
        'hpractice'
    );
} else {
    $img = '<img src="' . SRC_URI . 'img/404.svg" alt="404. ' . __('Страница не найдена', 'hpractice') . '!">';
    $text = __(
        'Запрашиваемая Вами страница не найдена.<br>Возможно страница была удалена<br>
или вы сделали опечатку в наборе адреса страницы',
        'hpractice'
    );
}
?>
<section class="section section--white">
    <div class="container">
        <div class="section__message">
            <div class="section__message-head">
                <h1 class="heading heading--lg heading--primary heading--center">
                    <span
                        class="heading__overlay heading__overlay--lg heading__overlay--secondary heading__overlay--center"
                    >
                        Practice <br> House
                    </span>
                    <span class="heading__number">
                        <?php echo $img; ?>
                    </span>
                </h1>
                <p>
                    <strong><?php _e('Упс! Что-то пошло не так', 'hpractice'); ?> ...</strong>
                </p>
                <p>
                    <?php echo $text; ?>
                </p>
            </div>
            <div class="section__message-footer">
                <p>
                    <strong><?php _e('Но не беспокойтесь!', 'hpractice'); ?></strong>
                    <br>
                    <?php _e('У нас есть много других предложений для вас', 'hpractice'); ?>:
                </p>
                <ul>
                    <li>
                        <?php printf(__('Прейти на <a href="%s">главную страницу</a>', 'hpractice'), home_url()); ?>
                    </li>
                    <li>
                        <?php printf(
                            __('Познакомитьсся с <a href="%s">нашей продукцией</a>', 'hpractice'),
                            get_permalink(Helpers::getCatalogId())
                        ); ?>
                    </li>
                    <li>
                        <?php printf(
                            __('Посмотреть <a href="%s">услуги</a>', 'hpractice'),
                            get_permalink(Helpers::getServicePageId())
                        ); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
