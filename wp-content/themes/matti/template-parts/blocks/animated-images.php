<?php if (have_rows('animated_images')): ?>
    <?php while (have_rows('animated_images')): the_row();
        $section_id = get_sub_field('section_id');
        $image_left = get_sub_field('image_left');
        $image_right = get_sub_field('image_right');
        ?>
        <?php if (!empty($image_left) && !empty($image_right)) : ?>
            <section class="dual" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
                <div class="dual__cont cont">
                    <div class="dual__grid">
                        <div class="dual__figure dual__figure--l">
                            <img src="<?php echo aq_resize($image_left['url'], 1200); ?>"
                                 alt="<?php echo $image_left['alt']; ?>" class="dual__img">
                        </div>
                        <div class="dual__figure dual__figure--r">
                            <img src="<?php echo aq_resize($image_right['url'], 1200); ?>"
                                 alt="<?php echo $image_right['alt']; ?>" class="dual__img">
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>