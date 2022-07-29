<?php if (have_rows('text_video_block2')): ?>
    <?php while (have_rows('text_video_block2')): the_row();
        $full_video_index = 2;
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $video_caption = get_sub_field('video_caption');
        $video_preview = get_sub_field('video_preview');
        //$video_full = get_sub_field('video_full');
        ?>
        <section class="video-text" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="cont">
                <div class="video-text__row" data-ac>
                    <div class="video-text__left-col" data-ae>
                        <?php video_block($full_video_index, $video_preview, $video_caption); ?>
                    </div>
                    <div class="video-text__right-col">
                        <?php if (!empty($upper_caption)) : ?>
                            <span class="video-text__subtitle subtitle" data-ae><?php echo $upper_caption; ?></span>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <h2 class="video-text__title" data-ae><?php echo $caption; ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>
                            <div class="video-text__text text" data-ae>
                                <p><?php echo $text; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>