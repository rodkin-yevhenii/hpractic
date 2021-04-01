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
                <?php if (!empty($footer['text_' . pll_current_language()])) : ?>
                    <div class="footer__item footer__about">
                        <p class="text">
                            <?php echo $footer['text_' . pll_current_language()]; ?>
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
                            <?php _e('Контактная информация', 'hpractice'); ?>
                        </h4>
                        <div class="list">
                            <div class="list__icon">
                                <svg class="icon">
                                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-phone"></use>
                                </svg>
                            </div>
                            <div class="list__element">
                                <ul>
                                    <?php foreach ($footer['phones'] ?? [] as $item) :
                                        $formattedNumber = str_replace(
                                            ['(', ')', '+3', '-', ' '],
                                            '',
                                            $item['phone']
                                        ); ?>
                                        <li>
                                            <a href="tel:+3<?php echo $formattedNumber; ?>"
                                               class="link link--secondary link--md"
                                            >
                                                <?php echo $item['phone']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="list">
                            <div class="list__icon">
                                <svg class="icon">
                                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-mail"></use>
                                </svg>
                            </div>
                            <div class="list__element">
                                <ul>
                                    <?php foreach ($footer['emails'] ?? [] as $item) : ?>
                                        <li>
                                            <a href="mailto:<?php echo $item['email']; ?>"
                                               class="link link--secondary link--md"
                                            >
                                                <?php echo $item['email']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="footer__item footer__schedule">
                    <?php if (!empty($footer['schedule'])) : ?>
                        <h4 class="subheading subheading--sm">
                            <?php _e('График работы', 'hpractice'); ?>
                        </h4>
                        <div class="list">
                            <div class="list__icon">
                                <svg class="icon">
                                    <use xlink:href="<?php echo SRC_URI; ?>img/icons-sprite.svg#icon-clock"></use>
                                </svg>
                            </div>
                            <div class="list__element">
                                <ul>
                                    <?php foreach ($footer['schedule'] as $item) : ?>
                                        <li><?php echo $item['text']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="socials">
                        <div class="socials__title">
                            <h4 class="subheading subheading--sm">Мы на связи:</h4>
                        </div>
                        <div class="socials__list">
                            <ul>
                                <?php if (!empty($footer['viber_phone'])) : ?>
                                    <li>
                                        <a href="viber://chat?number=<?php echo $footer['viber_phone']; ?>"
                                           class="icon"
                                           target="_blank"
                                        >
                                            <img src="<?php echo SRC_URI; ?>img/icons/viber.svg"
                                                 alt="<?php _e('Мы в вайбере', 'hpractice'); ?>"
                                            >
                                        </a>
                                    </li>
                                <?php endif;

                                if (!empty($footer['telegram_id'])) : ?>
                                    <li>
                                        <a href="tg://resolve?domain=<?php echo $footer['telegram_id']; ?>"
                                           class="icon"
                                           target="_blank"
                                        >
                                            <img src="<?php echo SRC_URI; ?>img/icons/telegram.svg"
                                                 alt="<?php _e('Мы в телеграмм', 'hpractice'); ?>"
                                            >
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
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

<?php
get_template_part('template-parts/popups/cart');
get_template_part('template-parts/popups/success');
get_template_part('template-parts/popups/error');

wp_footer(); ?>
</body>
</html>
