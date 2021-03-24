<?php

/*
Template Name: Тест письма
Template Post Type: page
*/
$to = 'rodkin.yevhenii@gmail.com';
$subject = 'Тест отправки письма';
$message = 'Привет, это тест отправки почты.';
$headers = array(
    'From: Practice House <info@hpractic.com>',
    'content-type: text/html',
);

get_header();

if (wp_mail($to, $subject, $message, $headers)) {
    echo '<h1>Письмо отправлено :)</h2>';
} else {
    echo '<h1>Ошибка :(</h2>';
}

get_footer();
