<?php if (have_rows('image_full_width')): ?>
    <?php while (have_rows('image_full_width')): the_row();
        $section_id = get_sub_field('section_id');
        $image = get_sub_field('image');
        ?>
        <div class="image-full-width" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>"
                 class="image-full-width__picture">
        </div>
    <?php endwhile; ?>
<?php endif; ?>