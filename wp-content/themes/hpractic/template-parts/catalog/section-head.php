<?php
global $searchQuery;

$id = $args['id'] ?? get_the_id();
$breadcrumbs = new \Hpr\Service\Breadcrumbs\Breadcrumbs($id);
$header = get_field('header', $id);
$header = !empty($header['heading']) ? $header['heading'] : get_the_title($id);
?>
<div class="head">
    <div class="head__top">
        <div class="container">
            <div class="breadcrumbs">
                <?php $breadcrumbs->render(); ?>
            </div>
        </div>
    </div>
    <div class="head__content">
        <div class="container">
            <h2 class="heading heading--lg heading--primary">
                <span class="heading__overlay heading__overlay--secondary heading__overlay--center">
                    <?php _e('PRACTICE<br/>HOUSE', 'hpractice'); ?>
                </span>
                <?php echo $header;

                if (!empty($searchQuery)) :
                    echo '<br/><small>"' . $searchQuery . '"</small>';
                endif; ?>
            </h2>
        </div>
    </div>
</div>
