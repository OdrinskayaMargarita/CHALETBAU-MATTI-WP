<?php if (have_rows('hero')): ?>
    <?php while (have_rows('hero')): the_row();
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
        ?>
        <section class="greeting greeting--full">
            <div class="greeting__inner greeting__inner--full">
                <?php if (!empty($caption)) : ?>
                    <div class="greeting__title-wrapper greeting__title-wrapper--center">
                        <h1 class="greeting__title">
                            <span><?php echo $caption; ?></span>
                            <div class="greeting__title-over"><?php echo $caption; ?></div>
                        </h1>
                    </div>
                    
                <?php endif; ?>
                <?php if (!empty($text)) : ?>
                    <p class="greeting__text greeting__text--bottom"><?php echo $text; ?></p>
                <?php endif; ?>
            </div>
            <?php if (!empty($image)) : ?>
                <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>"
                     class="greeting__pic greeting__pic--half">
            <?php endif; ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>