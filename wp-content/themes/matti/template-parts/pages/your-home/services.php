<?php if (have_rows('services')): ?>
    <?php while (have_rows('services')): the_row();
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        ?>
        <section class="services" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="services__cont cont">
                <div class="services__title-block">
                    <div class="services__row">
                        <div class="services__half-col" data-ac>
                            <?php if (!empty($upper_caption)) : ?>
                                <span class="services__subtitle" data-ae><?php echo $upper_caption; ?></span>
                            <?php endif; ?>
                            <?php if (!empty($caption)) : ?>
                                <h2 class="services__main-title" data-ae><?php echo $caption; ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if (have_rows('blocks')): ?>
                    <div class="services__items-block">
                        <div class="services__row">
                            <div class="services__half-col">
                                <div class="services__left">
                                    <?php while (have_rows('blocks')): the_row();
                                        $image = get_sub_field('image');
                                        ?>
                                        <div class="services__image">
                                            <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                                 alt="<?php echo $image['alt']; ?>"
                                                 class="services__item-image">
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="services__right-col">
                                <div class="services__right">
                                    <?php while (have_rows('blocks')): the_row();
                                        $caption = get_sub_field('caption');
                                        $text = get_sub_field('text');
                                        ?>
                                        <div class="services__item-text">
                                            <?php if (!empty($caption)) : ?>
                                                <h3 class="services__title"><?php echo $caption; ?></h3>
                                            <?php endif; ?>
                                            <?php if (!empty($text)) : ?>
                                                <span class="services__text text"><?php echo $text ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>