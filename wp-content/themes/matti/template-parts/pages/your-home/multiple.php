<?php if (have_rows('text_tab_slider_images')): ?>
    <?php while (have_rows('text_tab_slider_images')): the_row();
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        ?>
        <section class="multiple" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="cont">
                <div class="multiple__row">
                    <div class="multiple__left-col">
                        <div class="multiple__text-column" data-ac>
                            <?php if (!empty($upper_caption)) : ?>
                                <span class="multiple__subtitle subtitle" data-ae><?php echo $upper_caption; ?></span>
                            <?php endif; ?>
                            <?php if (!empty($caption)) : ?>
                                <h2 class="multiple__title h2" data-ae><?php echo $caption; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($text)) : ?>
                                <div class="multiples__text text" data-ae>
                                    <p><?php echo $text; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $index_slider = 0;
                    $index_tab = 0;
                    if (have_rows('tabs')): ?>
                        <div class="multiple__right-col">
                            <div class="multiple__slider-amount">
                                <div class="multiple__slider-navigation">
                                    <?php while (have_rows('tabs')): the_row();
                                        $index_tab++;
                                        $caption = get_sub_field('caption');
                                        $lowercase_caption = strtolower($caption);
                                        $preview_image = get_sub_field('preview_image');
                                        ?>
                                        <button type="button"
                                                class="multiple__slider-tab <?php echo $index_tab === 1 ? 'multiple__slider-tab--active' : null; ?>"
                                                data-slider-tab="<?php echo $lowercase_caption; ?>">
                                            <?php if (!empty($preview_image)) : ?>
                                                <span class="multiple__tab-image">
                                                    <img src="<?php echo aq_resize($preview_image['url'], 100); ?>"
                                                         class="multiple__tab-picture"
                                                         alt="<?php echo $preview_image['alt']; ?>">
                                                </span>
                                            <?php endif; ?>
                                            <?php if (!empty($caption)) : ?>
                                                <span class="multiple__tab-text"><?php echo $caption; ?></span>
                                            <?php endif; ?>
                                        </button>
                                    <?php endwhile; ?>
                                </div>

                                <div class="multiple__slider-wrapper">
                                    <?php while (have_rows('tabs')): the_row();
                                        $index_slider++;
                                        $caption = get_sub_field('caption');
                                        $lowercase_caption = strtolower($caption);
                                        ?>
                                        <?php if (have_rows('slider')): ?>
                                            <div class="multiple__slider swiper-container <?php echo $index_slider === 1 ? 'multiple__slider--active' : null; ?>"
                                                 data-slider-tab="<?php echo $lowercase_caption; ?>">
                                                <div class="swiper-wrapper">
                                                    <?php while (have_rows('slider')): the_row();
                                                        $image = get_sub_field('image');
                                                        ?>
                                                        <?php if (!empty($image)) : ?>
                                                            <div class="multiple__slider-item swiper-slide">
                                                                <img src="<?php echo aq_resize($image['url'], 1200); ?>"
                                                                     alt="<?php echo $image['alt']; ?>"
                                                                     class="multiple__slider-image"
                                                                     data-swiper-parallax="30%">
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endwhile; ?>
                                                </div>
                                                <div class="swiper-navigation">
                                                    <div class="swiper-button-prev"></div>
                                                    <div class="swiper-button-next"></div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>