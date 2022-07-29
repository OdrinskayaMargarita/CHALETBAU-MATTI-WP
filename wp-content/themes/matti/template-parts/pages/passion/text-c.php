<?php if (have_rows('centered_text')): ?>
    <?php while (have_rows('centered_text')): the_row();
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        ?>
        <section class="text-c" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="text-c__cont cont">
                <div class="text-c__grid">
                    <div class="text-c__inner" data-ac>
                        <?php if (!empty($upper_caption)) : ?>
                            <div class="text-c__pretitle" data-ae><?php echo $upper_caption; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <h2 class="text-c__title" data-ae><?php echo $caption; ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>
                            <div class="text-c__p" data-ae><?php echo $text; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>