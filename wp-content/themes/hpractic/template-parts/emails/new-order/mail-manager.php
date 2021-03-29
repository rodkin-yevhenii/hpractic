<?php

use Hpr\Entity\Order;

/**
 * @var $order Order
 */
$order = $args['order'] ?? false;

if (!$order) :
    return '';
endif;
?>
<p>На сайте <a href="<?php echo
    site_url(); ?>wp-admin/edit.php?post_type=order" title="Админка">Practice House</a> оформлен новый заказ:</p>
<ul>
    <li><?php echo $order->getCustomer(); ?></li>
    <li><?php echo $order->getPhone(); ?></li>
    <li><?php echo $order->getEmail(); ?></li>
    <li>Комментарий: <?php echo $order->getCustomerComment(); ?></li>
</ul>

<?php get_template_part(
    'template-parts/emails/new-order/products-list',
    null,
    ['products' => $order->getOrderItems()]
);
