<?php if (have_rows('video_quote1')): ?>
    <?php while (have_rows('video_quote1')): the_row();
        $section_id = get_sub_field('section_id');
        $video = get_sub_field('video');
        $video_caption = get_sub_field('video_caption');
        $text = get_sub_field('text');
        $author = get_sub_field('author');
        ?>
        <section class="image-quote" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="cont">
                <div class="image-quote__row">
                    <div class="image-quote__left-col">
                        <?php if (!empty($video)) : ?>
                            <div class="image-quote__picture-container" data-st>
                                <video class="image-quote__video" src="<?php echo $video . '#t=0.001'; ?>" loop muted
                                       playsinline autoplay></video>
                                <?php if (!empty($video_caption)) : ?>
                                    <span class="image-quote__text"><?php echo $video_caption; ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="image-quote__right-col">
                        <?php if (!empty($text)) : ?>
                            <blockquote class="image-quote__blockquote blockquote quote__animation"><?php echo $text; ?></blockquote>
                        <?php endif; ?>
                        <?php if (!empty($author)) : ?>
                            <div class="q__author" style="opacity: 1;"><?php echo $author; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>