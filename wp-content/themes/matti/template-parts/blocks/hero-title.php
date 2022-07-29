<?php
$upper_caption = get_field('upper_caption');
$caption = get_field('caption');
$button = get_field('button');
?>
<section class="hero-title">
    <div class="hero__cont cont">
        <div class="hero__content">
            <?php if (!empty($upper_caption)) : ?>
                <span class="hero__overline"><?php echo $upper_caption; ?></span>
            <?php endif; ?>
            <?php if (!empty($caption)) : ?>
                <h1 class="hero__title"><?php echo $caption; ?></h1>
            <?php endif; ?>
            <?php if ($button) :
                $link_url = $button['url'];
                $link_title = $button['title'];
                $link_target = $button['target'] ? $button['target'] : '_self';
                ?>

                <!-- TODO: remove ACF fields href is hardcoded -->
                <a
                    href="#jobs-list"
                    class="btn btn--orange js-anchor"><?php echo $link_title; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>