<?php

use Hpr\Service\Breadcrumbs\Breadcrumbs;

$id          = $args['id'] ?? get_the_ID();
$breadcrumbs = new Breadcrumbs($id);
?>
<div class="head head--secondary">
    <div class="head__top">
        <div class="container">
            <div class="breadcrumbs">
                <?php $breadcrumbs->render(); ?>
            </div>
        </div>
    </div>
</div>
