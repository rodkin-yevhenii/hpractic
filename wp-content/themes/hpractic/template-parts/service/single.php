<?php

use Hpr\Admin\ServiceInit;
use Hpr\Entity\Service;
use Hpr\Service\Helpers\Helpers;

$id = $args['id'] ?? get_the_ID();
$services = get_posts(
    [
        'numberposts' => -1,
        'post_type' => ServiceInit::$cptName,
        'post_status' => 'publish',
        'post__in' => Helpers::getServicesIdsList(),
        'fields' => 'ids',
        'orderby' => 'post__in'
    ]
);

get_header();

get_template_part('template-parts/catalog/section-head');
?>
<section class="section section--white">
    <div class="container">
        <div class="section__inner section__inner--tablet-default">
            <?php if (!empty($services)) : ?>
                <div class="section__main section__main--secondary  section__main--tablet-default u-tablet-hidden">
                    <div class="nav">
                        <div class="nav__sub nav__sub--static">
                            <ul>
                                <?php foreach ($services as $serviceId) :
                                    $service = new Service($serviceId); ?>
                                    <li>
                                        <a href="<?php echo $service->getUrl(); ?>"
                                           <?php echo $serviceId === $id ? 'class="active"' : ''; ?>
                                        >
                                            <?php echo $service->getTitle(); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="section__content section__content--secondary section__content--tablet-default">
                <article class="article">
                    <div class="article__content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php
get_template_part('template-parts/sections/callback');
get_template_part('template-parts/sections/services');

get_footer();
