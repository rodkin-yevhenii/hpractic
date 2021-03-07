<?php
$logo = get_field('site_logo', 'option');
$footer = get_field('footer', 'option');
?>
</main>
<footer class="footer">
    <div class="container">
        <?php if (!empty($logo)) : ?>
            <div class="footer__logo">
                <a href="<?php echo site_url(); ?>" class="logo">
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                </a>
            </div>
        <?php endif; ?>
        <div class="footer__content">
            <div class="footer__content-row">
                <?php if (!empty($footer['text'])) : ?>
                    <div class="footer__item footer__about">
                        <p class="text">
                            <?php echo $footer['text']; ?>
                        </p>
                    </div>
                <?php endif; ?>
                <div class="footer__item footer__nav">
                    <?php wp_nav_menu(
                        [
                            'theme_location'  => 'footer-menu',
                            'container'       => 'nav',
                            'container_class' => 'nav',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 1,
                            'walker'          => '',
                        ]
                    ); ?>
                </div>
                <?php if (!empty($footer['phones']) && !empty($footer['emails'])) : ?>
                    <div class="footer__item footer__contacts">
                        <h4 class="subheading subheading--sm">
                            <?php _e('Контактная информация', 'hpractice'); ?>К
                        </h4>
                        <ul>
                            <?php foreach ($footer['phones'] ?? [] as $item) :
                                $formattedNumber = str_replace(['(', ')', '+3', '-', ' '], '', $item['phone']); ?>
                                <li>
                                    <a href="tel:+3<?php echo $formattedNumber; ?>"
                                        class="link link--secondary link--md">
                                        <span class="link__inner">
                                            <svg class="icon">
                                                <use xlink:href="<?php
                                                echo SRC_URI; ?>img/icons-sprite.svg#icon-phone"></use>
                                            </svg>
                                            <span><?php echo $item['phone']; ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach;

                            foreach ($footer['emails'] ?? [] as $item) : ?>
                                <li>
                                    <a href="mailto:<?php echo $item['email']; ?>"
                                       class="link link--secondary link--md"
                                    >
                                        <span class="link__inner">
                                            <svg class="icon">
                                                <use xlink:href="<?php
                                                echo SRC_URI; ?>img/icons-sprite.svg#icon-mail"></use>
                                            </svg>
                                            <span><?php echo $item['email']; ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif;

                if (!empty($footer['schedule'])) : ?>
                    <div class="footer__item footer__schedule">
                        <h4 class="subheading subheading--sm">
                            <?php _e('График работы', 'hpractice'); ?>
                        </h4>
                        <ul>
                            <?php foreach ($footer['schedule'] as $item) : ?>
                                <li>
                                    <span class="link link--secondary link--md">
                                        <span class="link__inner">
                                            <svg class="icon">
                                                <use xlink:href="<?php
                                                echo SRC_URI; ?>img/icons-sprite.svg#icon-clock"></use>
                                            </svg>
                                            <span><?php echo $item['text']; ?></span>
                                        </span>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer__copyright">
            <p class="text">Copyright &copy; <?php echo date('Y'); ?> Practice House, <?php
            _e('Все права защищены', 'hpractice'); ?></p>
        </div>
    </div>
</footer>
<button class="btn-to-top btn btn--secondary btn--square">
    <svg class="icon">
        <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-arrow-right"></use>
    </svg>
</button>
</div>

<?php wp_footer(); ?>
</body>
</html>
