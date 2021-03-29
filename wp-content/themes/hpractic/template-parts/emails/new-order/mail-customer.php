<?php

$message = get_field('customer-new-order-message', 'option');
$products = $args['products'] ?? [];

if (empty($products)) :
    return '';
endif;

if (!empty($message)) :
    echo $message;
else : ?>
    <p>
        <?php echo sprintf(
            __('Здравствуйте, <strong>{{{customer}}}</strong>. Детали вашего заказа на сайте %s:', 'hpractice'),
            '<a href="' . site_url() . '">Practice House</a>'
        ); ?>
    </p>
<?php endif;

get_template_part(
    'template-parts/emails/new-order/products-list',
    null,
    ['products' => $products]
);
