<?php if (have_rows('image__text_grid')): ?>
    <?php while (have_rows('image__text_grid')): the_row();
        $section_id = get_sub_field('section_id');
        ?>
        <section class="nature" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="nature__cont cont">

                <?php if (have_rows('first_block')): ?>
                    <?php while (have_rows('first_block')): the_row();
                        $image = get_sub_field('image');
                        $upper_caption = get_sub_field('upper_caption');
                        $caption = get_sub_field('caption');
                        $text = get_sub_field('text');
                        ?>
                        <div class="nature__row">
                            <?php if (!empty($image)) : ?>
                                <div class="nature__fig nature__fig--l">
                                    <div class="img-scroll">
                                        <img src="<?php echo aq_resize($image['url'], 1200); ?>"
                                             alt="<?php echo $image['alt']; ?>"
                                             class="img-scroll__el-holder">
                                        <img src="<?php echo aq_resize($image['url'], 1200); ?>"
                                             alt="<?php echo $image['alt']; ?>" class="img-scroll__el">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="nature__content nature__content--c" data-ac>
                                <?php if (!empty($upper_caption)) : ?>
                                    <div class="nature__pretitle" data-ae><?php echo $upper_caption; ?></div>
                                <?php endif; ?>

                                <?php if (!empty($caption)) : ?>
                                    <h2 class="nature__title" data-ae>
                                        <span><?php echo $caption; ?></span>
                                        <div class="nature__title-over"><?php echo $caption; ?></div>
                                    </h2>
                                <?php endif; ?>
                                <?php if (!empty($text)) : ?>
                                    <div class="nature__p" data-ae><?php echo $text; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('second_block')): ?>
                    <?php while (have_rows('second_block')): the_row();
                        $image = get_sub_field('image');
                        $image_small = get_sub_field('image_small');
                        $upper_caption = get_sub_field('upper_caption');
                        $caption = get_sub_field('caption');
                        $text = get_sub_field('text');
                        ?>
                        <div class="nature__row">
                            <div class="nature__content nature__content--l" data-ac>
                                <?php if (!empty($upper_caption)) : ?>
                                    <div class="nature__pretitle" data-ae><?php echo $upper_caption; ?></div>
                                <?php endif; ?>
                                <?php if (!empty($caption)) : ?>
                                    <h2 class="nature__title" data-ae><?php echo $caption; ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($text)) : ?>
                                    <div class="nature__p" data-ae><?php echo $text; ?></div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($image)) : ?>
                                <div class="nature__fig nature__fig--r js-color-alter">
                                    <div class="img-scroll">
                                        <img src="<?php echo aq_resize($image['url'], 1000); ?>"
                                             alt="<?php echo $image['alt']; ?>" class="img-scroll__el-holder">
                                        <img src="<?php echo aq_resize($image['url'], 1000); ?>"
                                             alt="<?php echo $image['alt']; ?>" class="img-scroll__el">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($image_small)) : ?>
                            <div class="nature__row">
                                <div class="nature__fig nature__fig--small">
                                    <div class="img-scroll">
                                        <img src="<?php echo aq_resize($image_small['url'], 500); ?>"
                                             alt="<?php echo $image_small['alt']; ?>" class="img-scroll__el-holder">
                                        <img src="<?php echo aq_resize($image_small['url'], 500); ?>"
                                             alt="<?php echo $image_small['alt']; ?>" class="img-scroll__el">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>