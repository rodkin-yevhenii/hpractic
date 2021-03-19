<?php

$id = $args['id'] ?? get_the_ID();

get_header();

get_template_part('template-parts/catalog/section-head');

get_footer();
