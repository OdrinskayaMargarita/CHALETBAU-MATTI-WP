<?php if (have_rows('video_quote2')): ?>
    <?php while (have_rows('video_quote2')): the_row();
        $section_id = get_sub_field('section_id');
        $video = get_sub_field('video');
        $video_caption = get_sub_field('video_caption');
        $text = get_sub_field('text');
        $author = get_sub_field('author');
        ?>
        <div class="bottom-quote">
            <div class="cont">
                <div class="bottom-quote__container">
                    <?php if (!empty($video)) : ?>
                        <div class="bottom-quote__image-container" data-st>
                            <video class="bottom-quote__video" src="<?php echo $video . '#t=0.001'; ?>" loop muted playsinline autoplay></video>
                            <?php if (!empty($video_caption)) : ?>
                                <span class="bottom-quote__text"><?php echo $video_caption ?></span>
                            <?php endif; ?>

                            <?php if (!empty($text)) : ?>
                                <span class="bottom-quote__image-blockquote blockquote quote__animation"><?php echo $text; ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($text)) : ?>
                        <blockquote class="bottom-quote__blockquote blockquote quote__animation">
                            <?php echo $text; ?>

                            <?php if (!empty($author)) : ?>
                                <div class="q__author" style="opacity: 1;"><?php echo $author; ?></div>
                            <?php endif; ?>
                        </blockquote>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>