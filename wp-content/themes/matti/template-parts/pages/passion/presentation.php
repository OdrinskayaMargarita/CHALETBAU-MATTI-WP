<?php if (have_rows('images_video')): ?>
    <?php while (have_rows('images_video')): the_row();
        $section_id = get_sub_field('section_id');
        $image = get_sub_field('image');
        $animated_video = get_sub_field('animated_video');
        $animated_caption = get_sub_field('animated_caption');
        ?>
        <section class="presentation" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="presentation__cont cont">
                <div class="presentation__grid" data-ac>
                    <?php if (!empty($image)) : ?>
                        <figure class="presentation__figure js-color-alter" data-ae>
                            <img src="<?php echo aq_resize($image['url'], 1600); ?>" alt="<?php echo $image['alt']; ?>"
                                 class="presentation__img">
                        </figure>
                    <?php endif; ?>
                    <?php if (!empty($animated_video)) : ?>
                        <div class="presentation__cine" data-ae>
                            <div class="presentation__cine-inner js-floating">
                                <div class="cine js-color-alter">
                                    <video class="cine__video" src="<?php echo $animated_video . '#t=0.001'; ?>" loop
                                           muted
                                           playsinline autoplay></video>
                                    <?php if (!empty($animated_caption)) : ?>
                                        <div class="cine__label"><?php echo $animated_caption; ?></div>
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