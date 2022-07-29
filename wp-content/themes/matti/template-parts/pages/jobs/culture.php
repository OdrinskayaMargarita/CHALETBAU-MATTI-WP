<?php
$animated_text_upper_caption = get_field('animated_text_upper_caption');
$animated_text = get_field('animated_text');
?>
<section class="culture">
    <div class="culture__cont cont">
        <?php if (!empty($animated_text_upper_caption)) : ?>
            <span class="culture__overline"><?php echo $animated_text_upper_caption; ?></span>
        <?php endif; ?>
        <?php if (!empty($animated_text)) : ?>
            <div class="culture__amount">
                <?php foreach ($animated_text as $item) :
                    //Positions
                    //Left side - culture__item--left-side
                    //Center - culture__item--center
                    //Start - culture__item--start
                    //Right side - culture__item--right-side
                    //Center image left - culture__item--center-image-left
                    $text = $item['text'];
                    $image = $item['image'];
                    $position = $item['position'];
                    ?>
                    <?php if (!empty($text)) : ?>
                    <div class="culture__item <?php echo $position; ?>">
                        <h2 class="culture__text-container">
                            <span class="culture__text culture__text"><?php echo $text; ?></span>
                            <span class="culture__text culture__text-upper"><?php echo $text; ?></span>
                        </h2>
                        <?php if (!empty($image)) : ?>
                            <div class="culture__image-container">
                                <img src="<?php echo aq_resize($image['url'], 600); ?>" class="culture__image"
                                     alt="<?php echo $image['alt']; ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>