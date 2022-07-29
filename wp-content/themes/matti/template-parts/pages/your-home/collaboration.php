<?php if (have_rows('collaboration')): ?>
    <?php while (have_rows('collaboration')): the_row();
        $section_id = get_sub_field('section_id');
        ?>
        <section class="collaboration" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <?php if (have_rows('text__images1')): ?>
                <?php while (have_rows('text__images1')): the_row();
                    $image = get_sub_field('image');
                    $image_small = get_sub_field('image_small');
                    $upper_caption = get_sub_field('upper_caption');
                    $caption = get_sub_field('caption');
                    $text = get_sub_field('text');
                    ?>
                    <div class="cont">
                        <div class="collaboration__row">
                            <div class="collaboration__image-col">
                                <?php if (!empty($image)) : ?>
                                    <div class="collaboration__image-container img-scroll" data-st >
                                        <img src="<?php echo aq_resize($image['url'], 1200); ?>"
                                             class="collaboration__image img-scroll__el" alt="<?php echo $image['alt']; ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="collaboration__text-col" data-ac>
                                <?php if (!empty($upper_caption)) : ?>
                                    <span class="collaboration__subtitle subtitle"
                                          data-ae><?php echo $upper_caption; ?></span>
                                <?php endif; ?>
                                <?php if (!empty($caption)) : ?>
                                    <h2 class="collaboration__title h2" data-ae><?php echo $caption; ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($text)) : ?>
                                    <div class="collaboration__text--sm text--sm" data-ae><?php echo $text; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($image_small)) : ?>
                            <div class="collaboration__image-container--small img-scroll" data-st>
                                <img src="<?php echo aq_resize($image_small['url'], 500); ?>"
                                     class="collaboration__image--small img-scroll__el" alt="<?php echo $image_small['alt']; ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>


            <?php
            $slider_index = 0;
            if (have_rows('text__image_slider')): ?>
                <?php while (have_rows('text__image_slider')): the_row();
                    $caption = get_sub_field('caption');
                    $text = get_sub_field('text');
                    ?>
                    <div class="collaboration-wrapper js-color-alter">
                        <div class="collaboration-cont cont">
                            <div class="collaboration__row-center">
                                <div class="collaboration__col-left">
                                    <div class="collaboration__text-cont" data-ac>
                                        <?php if (!empty($caption)) : ?>
                                            <h2 class="collaboration__slider-title h3"
                                                data-ae><?php echo $caption; ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="collaboration__slider-text--sm text--sm" data-ae>
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if (have_rows('slider')): ?>
                                    <div class="collaboration__col-right">
                                        <div class="collaboration__slider swiper-container">
                                            <div class="swiper-wrapper">
                                                <?php while (have_rows('slider')): the_row();
                                                    $slider_index++;
                                                    $image = get_sub_field('image');
                                                    ?>
                                                    <div class="collaboration__slider-item swiper-slide">
                                                        <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                                             alt="<?php echo $image_small['alt']; ?>"
                                                             data-swiper-parallax="30%"
                                                             class="collaboration__slider-image">
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                            <?php if ($slider_index > 1) : ?>
                                                <div class="swiper-navigation">
                                                    <div class="swiper-button-prev"></div>
                                                    <div class="swiper-button-next"></div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if (have_rows('text__images2')): ?>
                <?php while (have_rows('text__images2')): the_row();
                    $image_large = get_sub_field('image_large');
                    $image_small = get_sub_field('image_small');
                    $image_medium = get_sub_field('image_medium');
                    $image_top_small = get_sub_field('image_top_small');
                    $caption = get_sub_field('caption');
                    $text = get_sub_field('text');
                    ?>
                    <div class="image-flex">
                        <div class="cont">
                            <div class="image-flex__row">
                                <div class="image-flex__col-left">
                                    <?php if (!empty($image_large)) : ?>
                                        <div class="image-flex__large-cont img-scroll" data-st>
                                            <img src="<?php echo aq_resize($image_large['url'], 1000); ?>"
                                                 alt="<?php echo $image_large['alt']; ?>"
                                                 class="img-scroll__el">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($image_small)) : ?>
                                        <div class="image-flex__small-cont js-floating" data-offset="60">
                                            <img src="<?php echo aq_resize($image_small['url'], 500); ?>"
                                                 alt="<?php echo $image_small['alt']; ?>"
                                                 class="image-flex__img" data-st>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($image_medium)) : ?>
                                        <div class="image-flex__medium-cont img-scroll" data-st>
                                            <img src="<?php echo aq_resize($image_medium['url'], 600); ?>"
                                                 alt="<?php echo $image_medium['alt']; ?>"
                                                 class="img-scroll__el">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="image-flex__col-right">
                                    <?php if (!empty($image_top_small)) : ?>
                                        <div class="image-flex__xsmall-cont" data-st>
                                            <img src="<?php echo aq_resize($image_top_small['url'], 500); ?>"
                                                 alt="<?php echo $image_top_small['alt']; ?>"
                                                 class="image-flex__img">
                                        </div>
                                    <?php endif; ?>
                                    <div class="image-text-flex__medium-col" data-ac>
                                        <?php if (!empty($caption)) : ?>
                                            <h3 class="image-text-flex__title h3" data-ae><?php echo $caption; ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="image-text-flex__text--sm text--sm"
                                                 data-ae><?php echo $text; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>