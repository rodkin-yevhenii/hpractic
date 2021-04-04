<?php

/*
Template Name: Доставка и оплата.
Template Post Type: page
*/

$menu = get_field('menu', get_the_ID());

get_header();
get_template_part('template-parts/catalog/section-head');
?>
<section class="section section--white">
    <div class="section__menu-wrapper sticky  u-tablet-visible">
        <div class="section__menu">
            <div class="container">
                <?php if (!empty($menu) && is_array($menu)) : ?>
                    <div class="section__menu-content" data-toggle>
                        <button class="btn-icon u-mobile-sm-visible" data-toggle-menu>
                            <svg class="icon icon--sm">
                                <use xlink:href="<?php
                                echo SRC_URI; ?>img/icons-sprite.svg#icon-chevron-right-white"></use>
                            </svg>
                        </button>
                        <div class="section__menu-active u-mobile-sm-visible active" data-toggle-menu>
                            <?php _e('Доставка и оплата', 'hpractice'); ?>
                        </div>
                        <ul>
                            <?php foreach ($menu as $item) : ?>
                                <li>
                                    <a href="#<?php echo $item['anchor']; ?>" data-anchor>
                                        <?php echo $item['text']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section__inner section__inner--tablet-default">
            <?php if (!empty($menu) && is_array($menu)) : ?>
                <div class="section__main section__main--secondary section__main--tablet-default u-tablet-hidden" >
                    <div class="nav sticky">
                        <div class="nav__sub nav__sub--static">
                            <ul>
                                <?php foreach ($menu as $item) : ?>
                                    <li>
                                        <a href="#<?php echo $item['anchor']; ?>" data-anchor>
                                            <?php echo $item['text']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="section__content section__main--secondary section__content--tablet-default">
                <article class="article">
                    <div class="article__content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php get_footer();
