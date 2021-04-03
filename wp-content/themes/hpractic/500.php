<?php

get_header();
get_template_part('template-parts/error/single', null, ['error' => 500]);
get_footer();
