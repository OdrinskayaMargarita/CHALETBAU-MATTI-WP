<?php if (have_rows('hero')): ?>
    <?php while (have_rows('hero')): the_row();
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
        $image_small = get_sub_field('image_small');
        ?>
        <section class="greeting greeting--alt greeting--yh">
            <div class="greeting__inner">
                <?php if (!empty($caption)) : ?>
                    <div class="greeting__title-wrapper">
                        <h1 class="greeting__title">
                            <span><?php echo $caption; ?></span>
                            <div class="greeting__title-over"><?php echo $caption; ?></div>
                        </h1>
                    </div>
                <?php endif; ?>
                <?php if (!empty($text)) : ?>
                    <p class="greeting__text greeting__text--wide"><?php echo $text; ?></p>
                <?php endif; ?>
            </div>
            <?php if (!empty($image_small)) : ?>
                <img src="<?php echo aq_resize($image_small['url'], 600); ?>" alt="<?php echo $image_small['alt']; ?>"
                     class="greeting__pic greeting__pic--small">
            <?php endif; ?>
            <?php if (!empty($image)) : ?>
                <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>"
                     class="greeting__bg">
            <?php endif; ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>