<?php if (have_rows('innovations')): ?>
    <?php while (have_rows('innovations')): the_row();
        $section_id = get_sub_field('section_id');
        ?>
        <section class="innovations" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="cont">
                <?php if (have_rows('image__text')): ?>
                    <?php while (have_rows('image__text')): the_row();
                        $image = get_sub_field('image');
                        $upper_caption = get_sub_field('upper_caption');
                        $caption = get_sub_field('caption');
                        $text = get_sub_field('text');
                        ?>
                        <div class="innovations__image-text-row" data-ac>
                            <?php if (!empty($image)) : ?>
                                <div class="innovations__large-image-container" data-ae>
                                    <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                         alt="<?php echo $image['alt']; ?>"
                                         class="innovations__large-image-picture">
                                </div>
                            <?php endif; ?>
                            <div class="innovations__text-column">
                                <?php if (!empty($upper_caption)) : ?>
                                    <span class="innovations__subtitle subtitle"
                                          data-ae><?php echo $upper_caption; ?></span>
                                <?php endif; ?>
                                <?php if (!empty($caption)) : ?>
                                    <h2 class="innovations__title h2" data-ae><?php echo $caption; ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($text)) : ?>
                                    <div class="innovations__text text--sm" data-ae>
                                        <p><?php echo $text; ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('text_video')): ?>
                    <?php while (have_rows('text_video')): the_row();
                        $full_video_index = 3;
                        $video_caption = get_sub_field('video_caption');
                        $video_preview = get_sub_field('video_preview');
                        $video_full = get_sub_field('video_full');
                        ?>
                        <div class="innovations__video-text-row" data-ac>
                            <div class="innovations__grid">
                                <?php
                                $block_index = 0;
                                if (have_rows('blocks')): ?>
                                    <?php while (have_rows('blocks')): the_row();
                                        $block_index++;
                                        $caption = get_sub_field('caption');
                                        $text = get_sub_field('text');
                                        ?>
                                        <div class="innovations__left-col <?php echo $block_index === 1 ? 'innovations__left-col' : 'innovations__center-col'; ?>">
                                            <div class="text-column">
                                                <?php if (!empty($caption)) : ?>
                                                    <h3 class="text-column__title" data-ae><?php echo $caption; ?></h3>
                                                <?php endif; ?>
                                                <?php if (!empty($text)) : ?>
                                                    <div class="text-column__text text--sm" data-ae>
                                                        <p><?php echo $text; ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="innovations__right-col" data-ae>
                                    <?php video_block($full_video_index, $video_preview, $video_caption); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>