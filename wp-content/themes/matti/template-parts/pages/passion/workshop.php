<?php if (have_rows('workshop')): ?>
    <?php while (have_rows('workshop')): the_row();
        $section_id = get_sub_field('section_id');
        ?>
        <section class="workshop" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="workshop__fakebg js-color-alter"></div>
            <div class="workshop__cont cont">
                <?php if (have_rows('first_block')): ?>
                    <?php while (have_rows('first_block')): the_row();
                        $full_video_index = 2;
                        $upper_caption = get_sub_field('upper_caption');
                        $caption = get_sub_field('caption');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        $preview_video = get_sub_field('preview_video');
                        $video_caption = get_sub_field('video_caption');
                        //$full_video = get_sub_field('full_video');
                        ?>
                        <div class="workshop__precision">
                            <div class="workshop__precision-grid grid">
                                <?php if (!empty($image)) : ?>
                                    <div class="workshop__figure workshop__figure--l">
                                        <div class="img-scroll">
                                            <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                                 alt="<?php echo $image['alt']; ?>"
                                                 class="img-scroll__el-holder">
                                            <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                                 alt="<?php echo $image['alt']; ?>" class="img-scroll__el">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="workshop__content" data-ac>
                                    <div class="workshop__content-grid grid">
                                        <?php if (!empty($upper_caption)) : ?>
                                            <div class="workshop__pretitle" data-ae><?php echo $upper_caption; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($caption)) : ?>
                                            <h2 class="workshop__title" data-ae><?php echo $caption; ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="workshop__text workshop__text--offset"
                                                 data-ae><?php echo $text; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if (!empty($preview_video)) : ?>
                                    <div class="workshop__media workshop__media--c">
                                        <div class="media__el-wrapper" data-popup="<?php echo $full_video_index; ?>">
                                            <video class="media__video"
                                                   src="<?php echo $preview_video . '#t=0.001' ?>"
                                                   loop
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

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('second_block')): ?>
                    <?php while (have_rows('second_block')): the_row();
                        $upper_caption = get_sub_field('upper_caption');
                        $caption = get_sub_field('caption');
                        $text = get_sub_field('text');
                        $first_image = get_sub_field('first_image');
                        $second_image = get_sub_field('second_image');
                        ?>

                        <div class="workshop__perfection">
                            <div class="workshop__perfection-grid grid">

                                <div class="workshop__content workshop__content--l" data-ac>
                                    <div class="workshop__content-grid grid">
                                        <?php if (!empty($upper_caption)) : ?>
                                            <div class="workshop__pretitle" data-ae><?php echo $upper_caption; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($caption)) : ?>
                                            <h2 class="workshop__title" data-ae><?php echo $caption; ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="workshop__text workshop__text--l"
                                                 data-ae><?php echo $text; ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($first_image)) : ?>
                                        <div class="workshop__figure workshop__figure--mob">
                                            <div class="img-scroll">
                                                <img src="<?php echo aq_resize($first_image['url'], 800); ?>"
                                                     alt="<?php echo $first_image['alt']; ?>"
                                                     class="img-scroll__el-holder">
                                                <img src="<?php echo aq_resize($first_image['url'], 800); ?>"
                                                     alt="<?php echo $first_image['alt']; ?>" class="img-scroll__el">
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($second_image)) : ?>
                                        <div class="workshop__figure workshop__figure--l workshop__figure--narrow">
                                            <div class="img-scroll">
                                                <img src="<?php echo aq_resize($second_image['url'], 800); ?>"
                                                     alt="<?php echo $second_image['alt']; ?>"
                                                     class="img-scroll__el-holder">
                                                <img src="<?php echo aq_resize($second_image['url'], 800); ?>"
                                                     alt="<?php echo $second_image['alt']; ?>" class="img-scroll__el">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($first_image)) : ?>
                                    <div class="workshop__figure workshop__figure--r">
                                        <div class="img-scroll">
                                            <img src="<?php echo aq_resize($first_image['url'], 800); ?>"
                                                 alt="<?php echo $first_image['alt']; ?>" class="img-scroll__el-holder">
                                            <img src="<?php echo aq_resize($first_image['url'], 800); ?>"
                                                 alt="<?php echo $first_image['alt']; ?>" class="img-scroll__el">
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>