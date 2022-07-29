<?php if (have_rows('text_image')): ?>
    <?php while (have_rows('text_image')):
        the_row();
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
        ?>
        <section class="traditions" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="traditions__cont cont">
                <div class="traditions__grid">
                    <div class="traditions__content" data-ac>
                        <?php if (!empty($upper_caption)) : ?>
                            <div class="traditions__pretitle" data-ae><?php echo $upper_caption; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <h2 class="traditions__title" data-ae><?php echo $caption; ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>
                            <div class="traditions__text" data-ae><?php echo $text; ?></div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($image)) : ?>
                        <figure class="traditions__figure js-floating">
                            <img
                                class="traditions__img js-color-alter"
                                src="<?php echo aq_resize($image['url'], 800); ?>"
                                alt="<?php echo $image['alt']; ?>">
                            <!-- <div class="img-scroll js-color-alter">
                                <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                     alt="<?php echo $image['alt']; ?>" class="img-scroll__el-holder">
                                <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                     alt="<?php echo $image['alt']; ?>" class="img-scroll__el">
                            </div> -->
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>