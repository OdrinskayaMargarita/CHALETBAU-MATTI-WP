<?php if (have_rows('design')): ?>
    <?php while (have_rows('design')): the_row();
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
        $animated_video = get_sub_field('animated_video');
        $animated_video_caption = get_sub_field('animated_video_caption');
        ?>
        <section class="design" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="design__cont cont">
                <div class="design__grid" data-ac>
                    <div class="design__main">
                        <div class="design__main-grid">
                            <?php if (!empty($upper_caption)) : ?>
                                <div class="design__pretitle" data-ae><?php echo $upper_caption; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($caption)) : ?>
                                <h2 class="design__title" data-ae><?php echo $caption; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($text)) : ?>
                                <div class="design__text" data-ae><?php echo $text; ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($animated_video)) : ?>
                            <div class="design__cine" data-ae>
                                <div class="cine js-color-alter">
                                    <video class="cine__video" src="<?php echo $animated_video . '#t=0.001'; ?>" loop
                                           muted
                                           playsinline autoplay></video>
                                    <?php if (!empty($animated_video_caption)) : ?>
                                        <div class="cine__label"><?php echo $animated_video_caption; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($image)) : ?>
                        <figure class="design__figure" data-ae>
                            <img src="<?php echo aq_resize($image['url'], 1200); ?>" alt="<?php echo $image['alt']; ?>"
                                 class="design__figure-img js-color-alter">
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
            <div class="design__fake-bg js-color-alter"></div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>