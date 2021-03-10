<?php

if (empty($args['fields'])) :
    return;
endif;

$fields = $args['fields'];
$steps = $fields['steps'];
$counter = 1;

if (empty($steps)) :
    return;
endif;
?>
<section class="section section-steps section--white">
    <div class="container">
        <h3 class="heading heading--md heading--primary heading--center heading--mb-lg">
            <?php if (!empty($fields['background_text'])) : ?>
                <span class="heading__overlay heading__overlay--secondary">
                    <?php echo $fields['background_text']; ?>
                </span>
            <?php endif;
            echo $fields['heading']; ?>
        </h3>
        <div class="cards">
            <div class="grid-container">
                <?php foreach ($steps as $step) : ?>
                    <div class="grid-item-1-of-4">
                        <div class="card card--secondary card--default card--mobile-center">
                            <div class="card__inner">
                                <div class="card__number">
                                    <span><?php echo $counter++ ?></span>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title "><?php echo $step['heading']; ?></h3>
                                    <p class="card__text"><?php echo $step['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
