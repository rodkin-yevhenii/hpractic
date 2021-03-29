<?php

use Hpr\Entity\Product;

if (empty($args['products'])) :
    return '';
endif;

$products = $args['products'];
$i = 1;
?>
<table>
    <tbody>
    <tr>
        <th>№</th>
        <th><?php _e('Продукт', 'hpractice'); ?></th>
        <th><?php _e('Артикул', 'hpractice'); ?></th>
        <th><?php _e('Кол-во', 'hpractice'); ?></th>
    </tr>
    <tr>
        <?php foreach ($products as $id => $quantity) :
            $product = new Product($id); ?>
            <td><?php echo $i++; ?></td>
            <td>
                <a href="<?php echo $product->getUrl(); ?>">
                    <?php echo $product->getTitle(); ?>
                </a>
            </td>
            <td><?php echo $product->getSku(); ?></td>
            <td><?php echo $quantity; ?></td>
        <?php endforeach; ?>
    </tr>
    </tbody>
</table>
