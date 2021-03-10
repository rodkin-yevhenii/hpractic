<?php

if (empty($args['fields'])) :
    return;
endif;

$fields = $args['fields'];
?>
<section class="section section-about section--white">
    <div class="container">
        <div class="about">
            <div class="about__img">
                <div class="img">
                    <img src="<?php echo $fields['img']['url']; ?>" alt="<?php echo $fields['img']['alt']; ?>">
                </div>
            </div>
            <div class="about__content">
                <h3 class="heading heading--md heading--primary heading--center-tablet">
                    <?php if (!empty($fields['background_text'])) : ?>
                        <span class="heading__overlay heading__overlay--secondary">
                            <?php echo $fields['background_text']; ?>
                        </span>
                    <?php endif;
                    echo $fields['heading']; ?>
                </h3>
                <?php if (!empty($fields['description'])) :
                    echo str_replace('<p>', '<p class="text">', $fields['description']);
                endif; ?>
            </div>
        </div>
        <?php if (!empty($fields['statistics'])) : ?>
            <div class="counters">
                <?php foreach ($fields['statistics'] as $item) : ?>
                    <div class="counters__item">
                        <div class="counters__item-count">
                            <strong class="counter" data-count="<?php echo $item['number']; ?>">0</strong>
                        </div>
                        <div class="counters__item-text"><?php echo $item['description']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
