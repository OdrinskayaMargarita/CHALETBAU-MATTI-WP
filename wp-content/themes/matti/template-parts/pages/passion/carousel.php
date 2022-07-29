<?php if (have_rows('slider_section')): ?>
    <?php while (have_rows('slider_section')): the_row();
        $section_id = get_sub_field('section_id');
        ?>
        <?php
        $index = 0;
        if (have_rows('slider')): ?>
            <section class="carousel">
                <div class="carousel__slider">
                    <div class="carousel__slider-wrapper">
                        <?php while (have_rows('slider')): the_row();
                            $index++;
                            $image_caption = get_sub_field('image_caption');
                            $image = get_sub_field('image');
                            ?>
                            <?php if (!empty($image)) : ?>
                                <div class="carousel__slide">
                                    <div class="carousel__slide-inner">
                                        <?php if (!empty($image_caption)) : ?>
                                            <div class="carousel__label"><?php echo $image_caption; ?></div>
                                        <?php endif; ?>
                                        <figure class="carousel__figure">
                                            <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                                 alt="<?php echo $image['alt']; ?>" class="carousel__img">
                                        </figure>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php if ($index > 1) : ?>
                    <div class="carousel__progress">
                        <?php 
                            // <div class="carousel__progress-bar"></div>
                         ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>