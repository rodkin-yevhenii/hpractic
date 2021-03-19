<?php

use Hpr\Admin\ProductInit;
use Hpr\Admin\ServiceInit;

$post = get_post(get_the_ID());
get_header();

switch ($post->post_type) {
    case ProductInit::$cptName:
        get_template_part('template-parts/product/single', null, ['id' => $post->ID]);
        break;
    case ServiceInit::$cptName:
        get_template_part('template-parts/service/single', null, ['id' => $post->ID]);
        break;
    default:
        the_content();
}

get_footer();
