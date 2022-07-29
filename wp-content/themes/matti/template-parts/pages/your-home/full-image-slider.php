<?php if (have_rows('full_image_slider')): ?>
    <?php while (have_rows('full_image_slider')): the_row();
        $section_id = get_sub_field('section_id');
        $images = get_sub_field('images');
        ?>
        <?php if (!empty($images)):
            $count_images = count($images);
            ?>
            <section class="full-image-slider" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
                <div class="full-image-slider__container swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($images as $item) :
                            $image = $item['image'];
                            ?>
                            <div class="full-image-slider__item swiper-slide">
                                <img src="<?php echo aq_resize($image['url'], 1600); ?>"
                                     alt="<?php echo $image['alt']; ?>"
                                     class="full-image-slider__image"
                                     data-swiper-parallax="30%">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($count_images > 0) : ?>
                        <div class="swiper-pagination full-image-slider__pagination"></div>
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
