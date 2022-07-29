<?php if (have_rows('full_width_image')): ?>
    <?php while (have_rows('full_width_image')): the_row();
        $section_id = get_sub_field('section_id');
        $image = get_sub_field('image');
        ?>
        <?php if (!empty($image)) : ?>
            <section class="poster" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
                <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>"
                     class="poster__img">
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>