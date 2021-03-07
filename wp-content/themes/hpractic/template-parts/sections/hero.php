<?php

if (empty($args['fields'])) :
    return;
endif;

$fields = $args['fields'];
?>
<section class="section section-hero section--grey">
    <div class="container">
        <div class="hero">
            <div class="hero__content">
                <h2 class="heading heading--lg heading--primary">
                    <?php if (!empty($fields['background_text'])) : ?>
                        <span class="heading__overlay heading__overlay--secondary">
                            <?php echo $fields['background_text']; ?>
                        </span>
                    <?php endif;
                    echo $fields['heading']; ?>
                </h2>
                <?php if (!empty($fields['description'])) : ?>
                    <p class="text">
                        <?php echo $fields['description']; ?>
                    </p>
                <?php endif; ?>
                <div class="hero__actions">
                    <a href="<?php echo get_permalink($fields['link']); ?>" class="btn btn--primary">
                        <?php _e('Смотреть каталог', 'hpractice'); ?>
                    </a>
                </div>
            </div>
            <div class="hero__image">
                <img src="<?php echo $fields['img']['url']; ?>" alt="<?php echo $fields['img']['alt']; ?>">
            </div>
        </div>
    </div>
</section>
