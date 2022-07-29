<?php if (have_rows('media')): ?>
    <?php while (have_rows('media')): the_row();
        $full_video_index = 1;
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $preview_video = get_sub_field('preview_video');
        $full_video = get_sub_field('full_video');
        $video_caption = get_sub_field('video_caption');
        ?>
        <section class="media" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="media__cont cont">
                <div class="media__grid" data-ac>
                    <div class="media__heading">
                        <?php if (!empty($upper_caption)) : ?>
                            <div class="media__pretitle" data-ae><?php echo $upper_caption; ?></div>
                        <?php endif; ?>

                        <?php if (!empty($caption)) : ?>
                            <h2 class="media__title" data-ae><?php echo $caption; ?></h2>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($preview_video)) : ?>
                        <div class="media__el" data-ae>
                            <div class="media__el-wrapper" data-popup="<?php echo $full_video_index; ?>">
                                <video class="media__video" src="<?php echo $preview_video . '#t=0.001'; ?>" loop
                                       playsinline muted></video>
                                <div class="media__btn">
                                    <img class="media__icon" src="<?php get_image('i-media-play.svg'); ?>">
                                </div>
                                <img src="<?php get_image('i-fullscreen.svg'); ?>" alt="" class="media__icon-fullscreen">
                            </div>
                            <?php if (!empty($video_caption)) : ?>
                                <div class="media__el-label"><?php echo $video_caption; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($text)) : ?>
                        <div class="media__text" data-ae><?php echo $text; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php popup_video($full_video_index, $full_video); ?>
    <?php endwhile; ?>
<?php endif; ?>
