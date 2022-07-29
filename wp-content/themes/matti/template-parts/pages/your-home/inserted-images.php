<?php if (have_rows('inserted_images')): ?>
    <?php while (have_rows('inserted_images')): the_row();
        $section_id = get_sub_field('section_id');
        $image = get_sub_field('image');
        $image_small = get_sub_field('image_small');
        ?>
        <section class="inserted-images" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>"
                 class="inserted-images__image-large">
            <?php if (!empty($image_small)) : ?>
                <div class="cont">
                    <div class="inserted-images__image-container">
                        <img src="<?php echo aq_resize($image_small['url'], 800); ?>" alt="<?php echo $image_small['alt']; ?>" class="inserted-images__image-small">
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>