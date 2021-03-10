<?php

if (empty($args['fields'])) :
    return;
endif;

$fields = $args['fields'];
$reasons = $fields['reasons'];

if (empty($reasons)) :
    return;
endif; ?>
<section class="section section-advantages section--white">
    <div class="container">
        <h3 class="heading heading--md heading--primary">
            <?php if (!empty($fields['background_text'])) : ?>
                <span class="heading__overlay heading__overlay--secondary">
                            <?php echo $fields['background_text']; ?>
                        </span>
            <?php endif;
            echo $fields['heading']; ?>
        </h3>
        <div class="advantages">
            <div class="advantages__img">
                <div class="img">
                    <img src="<?php echo $fields['img']['url']; ?>" alt="<?php echo $fields['img']['alt']; ?>">
                </div>
            </div>
            <div class="advantages__content">
                <div class="advantages__list">
                    <?php foreach ($reasons as $reason) : ?>
                        <div class="advantages__item">
                            <h4 class="advantages__item-title subheading subheading--md">
                                <span><?php echo $reason['heading']; ?></span>
                            </h4>
                            <div class="advantages__item-text">
                                <p><?php echo $reason['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
