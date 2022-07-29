<?php if (have_rows('review')): ?>
    <?php while (have_rows('review')): the_row();
        $full_video_index = 1;
        $section_id = get_sub_field('section_id');
        $text = get_sub_field('text');
        $author = get_sub_field('author');
        $video_preview = get_sub_field('video_preview');
        $video_caption = get_sub_field('video_caption');
        $video_full = get_sub_field('video_full');
        ?>
        <section class="review" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="review__cont cont">
                <div class="review__grid">
                    <?php if (!empty($video_preview)) : ?>
                        <div class="review__media" data-st>
                            <div class="media__el">
                                <div class="media__el-wrapper" data-popup="<?php echo $full_video_index; ?>">
                                    <video class="media__video" src="<?php echo $video_preview . '#t=0.001'; ?>" loop
                                           playsinline
                                           muted></video>
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
                    <?php endif; ?>
                    <div class="review__content">
                        <?php if (!empty($text)) : ?>
                            <div class="q__quote">
                                <p>
                                    <?php echo $text;?>
                                    <img class="q__quote-deco q__quote-deco--r" src="<?php get_image('i-quote.svg'); ?>">
                                </p>
                                <img class="q__quote-deco q__quote-deco--l" src="<?php get_image('i-quote.svg'); ?>">
                            </div>
                            <?php if (!empty($author)) : ?>
                                <div class="q__author"><?php echo $author ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>