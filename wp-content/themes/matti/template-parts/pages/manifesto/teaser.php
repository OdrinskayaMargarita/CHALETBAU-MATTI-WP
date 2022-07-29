<?php if (have_rows('image_banner')): ?>
    <?php while (have_rows('image_banner')): the_row();
        $caption = get_sub_field('caption');
        $image = get_sub_field('image');
        ?>
        <section class="teaser teaser--bottom-text">
            <div class="teaser__cont cont">
                <div class="teaser__inner">
                    <?php if (!empty($caption)) : ?>
                        <h2 class="teaser__title">
                            <span><?php echo $caption; ?></span>
                            <div class="teaser__title-over"><?php echo $caption; ?></div>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($image)) : ?>
                <div class="teaser__bg">
                    <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>"
                         class="teaser__bg-img">
                </div>
            <?php endif; ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>