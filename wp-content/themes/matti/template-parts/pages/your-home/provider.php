<section class="provider provider--dark">
    <div class="provider__fake-bg js-color-alter"></div>

    <?php if (have_rows('text_video_block1')): ?>
        <?php while (have_rows('text_video_block1')): the_row();
            $full_video_index = 1;
            $section_id = get_sub_field('section_id');
            $upper_caption = get_sub_field('upper_caption');
            $caption = get_sub_field('caption');
            $text = get_sub_field('text');
            $video_caption = get_sub_field('video_caption');
            $video_preview = get_sub_field('video_preview');
            //$video_full = get_sub_field('video_full');
            ?>
            <div class="provider__video-text-block">
                <div class="cont">
                    <div class="provider__row">
                        <div class="provider__left-col" data-ac>
                            <?php if (!empty($upper_caption)) : ?>
                                <span class="provider__subtitle subtitle" data-ae><?php echo $upper_caption; ?></span>
                            <?php endif; ?>

                            <?php if (!empty($caption)) : ?>
                                <h2 class="provider__title h2" data-ae><?php echo $caption; ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($text)) : ?>
                                <div class="provider__text text" data-ae>
                                    <p><?php echo $text; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="provider__right-col" data-st>
                            <?php video_block($full_video_index, $video_preview, $video_caption); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/pages/your-home/image-full-width'); ?>
    <?php get_template_part('template-parts/pages/your-home/bottom-quote'); ?>

</section>