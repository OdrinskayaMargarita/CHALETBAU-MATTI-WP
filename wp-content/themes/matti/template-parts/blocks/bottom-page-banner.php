<?php
$add_offset = get_field('add_offset'); //teaser--offset
$caption = get_field('caption');
$button_upper_caption = get_field('button_upper_caption');
$button_caption = get_field('button_caption');
$link_url = get_field('link_url'); //url
$image = get_field('image');
?>
<section class="teaser <?php echo $add_offset ? 'teaser--offset' : null; ?>">
    <div class="teaser__cont cont">
        <div class="teaser__inner">
            <?php if (!empty($caption)) : ?>
                <h2 class="teaser__title">
                    <span><?php echo $caption; ?></span>
                    <div class="teaser__title-over"><?php echo $caption; ?></div>
                </h2>
            <?php endif; ?>

            <?php if (!empty($button_upper_caption) && !empty($button_caption)) : ?>
                <div class="teaser__btn">
                    <a href="<?php echo $link_url; ?>" class="teaser__btn-link"></a>
                    <?php if (!empty($button_upper_caption)) : ?>
                        <div class="teaser__btn-pretitle"><?php echo $button_upper_caption; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($button_caption)) : ?>
                        <div class="teaser__btn-title"><?php echo $button_caption; ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($link_url)) : ?>
        <a href="<?php echo $link_url; ?>" class="teaser__link"></a>
    <?php endif; ?>

    <?php if (!empty($image)) : ?>
        <div class="teaser__bg">
            <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>" class="teaser__bg-img">
        </div>
    <?php endif; ?>
</section>