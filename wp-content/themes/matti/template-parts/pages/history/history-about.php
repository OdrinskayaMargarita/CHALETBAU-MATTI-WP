<?php if (have_rows('about')): ?>
    <?php while (have_rows('about')): the_row();
        $section_id = get_sub_field('section_id');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
        $counter_caption = get_sub_field('counter_caption');
        $counter_value = get_sub_field('counter_value');
        $after_counter_value = get_sub_field('after_counter_value');
        ?>
        <section class="history-about">

            <?php page_navigation(false); ?>

            <div class="history-about__cont cont" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
                <div class="history-about__grid" data-ac>
                    <div class="history-about__heading">
                        <?php if (!empty($upper_caption)) : ?>
                            <div class="history-about__pretitle" data-ae><?php echo $upper_caption; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <h2 class="history-about__title" data-ae><?php echo $caption; ?></h2>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($text)) : ?>
                        <p class="history-about__text" data-ae><?php echo $text; ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="history-about__mountain">
                <div class="mountain">
                    <?php if (!empty($image)) : ?>
                        <figure class="mountain__figure">
                            <img class="mountain__img" src="<?php echo aq_resize($image['url'], 1600); ?>"
                                 alt="<?php echo $image['alt']; ?>">
                        </figure>
                    <?php endif; ?>

                    <div class="mountain__graph">
                        <img src="<?php get_image('i-mountain.svg'); ?>" alt="Mountain" class="mountain__graph-item">
                        <img src="<?php get_image('i-mountain--black.svg'); ?>" alt="Mountain black"
                             class="mountain__graph-item--over">
                    </div>

                    <div class="mountain__main">
                        <div class="mountain__main-cont cont">
                            <div class="mountain__main-grid">
                                <div class="mountain__main-inner">
                                    <div class="mountain__main-text">
                                        <?php if (!empty($counter_caption)) : ?>
                                            <div class="mountain__title"><?php echo $counter_caption; ?></div>
                                        <?php endif; ?>
                                        <div class="mountain__counter">
                                            <?php if (!empty($counter_value)) : ?>
                                                <span class="mountain__counter-value"><?php echo $counter_value; ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($after_counter_value)) : ?>
                                                <span><?php echo ' ' . $after_counter_value; ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>