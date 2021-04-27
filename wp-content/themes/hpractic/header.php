<?php

use Hpr\Admin\MainMenuWalker;
use Hpr\Admin\MobileMenuWalker;
use Hpr\Service\Helpers\Helpers;

$postId = get_the_ID();
$logo = get_field('site_logo', 'option');
$faviconUrl = get_field('favicon', 'option');
?>
<!DOCTYPE html>
<html lang="<?php echo pll_current_language(); ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#F39200">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php if (!empty($faviconUrl)) : ?>
        <link href="<?php echo $faviconUrl; ?>" rel="shortcut icon" type="image/x-icon">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo get_permalink($postId); ?>">
    <meta property="fb:app_id" content="257953674358265"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <?php wp_head(); ?>
</head>
<body>
<div class="root" id="root">
    <header class="header" <?php echo is_user_logged_in() ? 'style="top:32px;"' : '';?>>
        <div class="container">
            <div class="header__content">
                <?php if (!empty($logo)) : ?>
                    <div class="header__logo">
                        <a href="<?php echo home_url(); ?>" class="logo">
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                        </a>
                    </div>
                <?php endif; ?>
                <div class="header__nav u-desktop-sm-hidden">
                    <nav class="nav">
                        <?php wp_nav_menu(
                            [
                                'theme_location'  => 'primary-menu',
                                'container'       => 'nav',
                                'container_class' => 'nav',
                                'echo'            => true,
                                'fallback_cb'     => '__return_empty_string',
                                'items_wrap'      => '<ul>%3$s</ul>',
                                'depth'           => 2,
                                'walker'          => new MainMenuWalker(),
                            ]
                        ); ?>
                    </nav>
                </div>
                <div class="header__search">
                    <span class="btn btn-search btn--bordered btn--square u-mobile-visible">
                        <svg class="icon">
                            <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-search"></use>
                        </svg>
                    </span>
                    <form class="form"
                          action="<?php echo get_permalink(Helpers::getSearchPageId()); ?>"
                          method="GET"
                          role="search"
                    >
                        <div class="form__field">
                            <button type="submit" class="form__field-icon">
                                <svg class="icon">
                                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-search"></use>
                                </svg>
                            </button>
                            <input
                                type="text"
                                name="search"
                                id="header-search-input"
                                placeholder="<?php _e('Поиск', 'hpractice'); ?>"
                            >
                        </div>
                    </form>
                </div>
                <div class="header__languages languages u-mobile-hidden">
                    <?php Helpers::showLanguageSwitcher() ?>
                </div>
                <div class="header__btn">
                    <button class="btn-icon" type="button" data-popup-open="#popup-cart">
                        <svg class="icon">
                            <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-shopping-cart"></use>
                        </svg>
                        <span class="btn-icon__badge product-count-js"></span>
                    </button>
                </div>
                <div class="header__btn u-desktop-sm-visible">
                    <button class="btn-menu">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="menu-mobile">
        <div class="menu-mobile__inner">
            <div class="menu-mobile__content">
                <div class="menu-mobile__nav">
                    <nav class="nav">
                        <?php wp_nav_menu(
                            [
                                'theme_location'  => 'mobile-menu',
                                'container' => 'nav',
                                'container_class' => 'nav',
                                'echo' => true,
                                'fallback_cb' => '__return_empty_string',
                                'items_wrap' => '<ul>%3$s</ul>',
                                'depth' => 2,
                                'walker' => new MobileMenuWalker(),
                            ]
                        ); ?>
                    </nav>
                </div>
                <div class="menu-mobile__languages languages u-mobile-visible">
                    <?php Helpers::showLanguageSwitcher() ?>
                </div>
            </div>
        </div>
    </div>
    <main class="main">
