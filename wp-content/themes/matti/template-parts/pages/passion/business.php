<?php if (have_rows('text_video')): ?>
    <?php while (have_rows('text_video')): the_row();
        $full_video_index = 3;
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $preview_video = get_sub_field('preview_video');
        $video_caption = get_sub_field('video_caption');
        //$full_video = get_sub_field('full_video');
        ?>
        <section class="business" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="business__cont cont">
                <div class="business__grid grid">
                    <div class="business__content" data-ac>
                        <?php if (!empty($upper_caption)) : ?>
                            <div class="business__pretitle" data-ae><?php echo $upper_caption; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <h2 class="business__title" data-ae><?php echo $caption; ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>
                            <div class="business__text" data-ae><?php echo $text; ?></div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($preview_video)) : ?>
                        <div class="business__media-box" data-ac>
                            <div class="business__media-inner" data-ae>
                                <div class="business__fakebg js-color-alter"></div>
                                <div class="media__el">
                                    <div class="media__el-wrapper"
                                         data-popup="<?php echo $full_video_index; ?>">
                                        <video class="media__video" src="<?php echo $preview_video . '#t=0.001'; ?>"
                                               loop playsinline muted></video>
                                        <div class="media__btn">
                                            <img class="media__icon" src="<?php get_image('i-media-play.svg'); ?>">
                                        </div>
                                        <img src="<?php get_image('i-fullscreen.svg'); ?>" alt="" class="media__icon-fullscreen">
                                    </div>
                                    <?php if (!empty($video_caption)) : ?>
                                        <div class="media__el-label"><?php echo $video_caption; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>