<?php if (have_rows('text_section')): ?>
    <?php while (have_rows('text_section')): the_row();
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        ?>
        <section class="text-section" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="cont">
                <div class="text-section__row">
                    <div class="text-section__col" data-ac>
                        <?php if (!empty($upper_caption)) : ?>
                            <span class="text-section__subtitle subtitle" data-ae><?php echo $upper_caption; ?></span>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <h2 class="text-section__title h2" data-ae><?php echo $caption; ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>
                            <div class="text-section__text text" data-ae>
                                <p><?php echo $text; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>