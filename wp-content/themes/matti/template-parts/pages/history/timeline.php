<?php if (have_rows('timeline')): ?>
    <?php while (have_rows('timeline')): the_row();
        $section_id = get_sub_field('section_id');
        $skip_timeline_text = get_sub_field('skip_timeline_text');
        $upper_caption = get_sub_field('upper_caption');
        $caption = get_sub_field('caption');
        $text = get_sub_field('text');
        $button_text = get_sub_field('button_text');
        ?>
        <section class="timeline" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <?php if (!empty($skip_timeline_text)) : ?>
                <div class="timeline__title js-timeline-skip"><?php echo $skip_timeline_text; ?></div>
            <?php endif; ?>

            <div class="timeline__slides">

                <div class="timeline__slide timeline__slide--main js-color-alter">
                    <div class="timeline__slide-cont cont">
                        <div class="slide-about">
                            <div class="slide-about__grid">
                                <div class="slide-about__main">
                                    <?php if (!empty($upper_caption)) : ?>
                                        <div class="slide-about__pretitle"><?php echo $upper_caption; ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($caption)) : ?>
                                        <div class="slide-about__title"><?php echo $caption; ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($text)) : ?>
                                        <div class="slide-about__text-wrapper">
                                            <div class="slide-about__text"><?php echo $text; ?></div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="slide-about__tl">
                                    <div class="slide-about__btn">
                                        <span><?php echo !empty($button_text) ? $button_text : __('EXPLORER >', 'matti'); ?></span>
                                        <div class="slide-about__tl-deco">
                                            <div class="circles">
                                                <div class="circles__item"></div>
                                                <div class="circles__item"></div>
                                                <div class="circles__item"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (!empty($skip_timeline_text)) : ?>
                                        <div class="slide-about__tl-title js-timeline-skip"><?php echo $skip_timeline_text; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (have_rows('block1')): ?>
                    <?php while (have_rows('block1')): the_row();
                        $image = get_sub_field('image');
                        ?>
                        <div class="timeline__slide js-color-alter">
                            <div class="slide-main">
                                <?php if (!empty($image)) : ?>
                                    <img src="<?php echo aq_resize($image['url'], 1600); ?>"
                                         alt="<?php echo $image['alt']; ?>" class="slide-main__bg">
                                <?php endif; ?>
                                <?php if (have_rows('content')): ?>
                                    <div class="slide-main__text">
                                        <?php while (have_rows('content')): the_row();
                                            $add_offset = get_sub_field('add_offset');
                                            $position = get_sub_field('position');
                                            //default : Default
                                            //slide-main__line--l : Left
                                            //slide-main__line--r : Right
                                            $text = get_sub_field('text');
                                            ?>
                                            <?php if (!empty($text)) : ?>
                                                <div class="slide-main__line <?php echo $position; ?> <?php echo $add_offset ? 'slide-main__line--offset' : null; ?>"><?php echo $text; ?></div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>


                <?php if (have_rows('block2')): ?>
                    <?php while (have_rows('block2')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        ?>
                        <div class="timeline__slide timeline__slide--narrow-m js-color-alter">
                            <div class="slide-a">
                                <div class="slide-a__cont cont">
                                    <div class="slide-a__row">
                                        <?php if (!empty($year)) : ?>
                                            <div class="slide-a__year move-x" data-move="100"><?php echo $year ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($image)) : ?>
                                            <img src="<?php echo aq_resize($image['url'], 600); ?>"
                                                 alt="<?php echo $image['alt']; ?>" class="slide-a__img move-x">
                                        <?php endif; ?>
                                    </div>
                                    <div class="slide-a__row move-x" data-move="30">
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-a__text">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block3')): ?>
                    <?php while (have_rows('block3')): the_row();
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        $image_small = get_sub_field('image_small');
                        ?>
                        <div class="timeline__slide timeline__slide--narrow js-color-alter">
                            <div class="slide-b">
                                <div class="slide-b__cont cont">
                                    <div class="slide-b__grid">
                                        <?php if (!empty($image)) : ?>
                                            <figure class="slide-b__figure move-x">
                                                <img src="<?php echo aq_resize($image['url'], 500); ?>"
                                                     alt="<?php echo $image['alt']; ?>"
                                                     class="slide-b__img-l">
                                            </figure>
                                        <?php endif; ?>
                                        <div class="slide-b__main">
                                            <?php if (!empty($text)) : ?>
                                                <div class="slide-b__text move-x" data-move="50">
                                                    <?php echo $text; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($image_small)) : ?>
                                                <img src="<?php echo aq_resize($image_small['url'], 500); ?>"
                                                     alt="<?php echo $image_small['alt']; ?>"
                                                     class="slide-b__img-r move-x" data-move="110">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block4')): ?>
                    <?php while (have_rows('block4')): the_row();
                        $image = get_sub_field('image');
                        ?>
                        <div class="timeline__slide">
                            <div class="slide-main">
                                <?php if (!empty($image)) : ?>
                                    <img src="<?php echo aq_resize($image['url'], 1600); ?>"
                                         alt="<?php echo $image['alt']; ?>"
                                         class="slide-main__bg slide-main__bg--partial">
                                <?php endif; ?>
                                <?php if (have_rows('content')): ?>
                                    <div class="slide-main__text slide-main__text--dark slide-main__text--wide slide-main__text--sm">
                                        <?php while (have_rows('content')): the_row();
                                            $add_offset = get_sub_field('add_offset');
                                            $position = get_sub_field('position');
                                            //default : Default
                                            //slide-main__line--l : Left
                                            //slide-main__line--r : Right
                                            $text = get_sub_field('text');
                                            ?>
                                            <?php if (!empty($text)) : ?>
                                                <div class="slide-main__line <?php echo $position; ?>"><?php echo $text; ?></div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block5')): ?>
                    <?php while (have_rows('block5')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        ?>
                        <div class="timeline__slide">
                            <div class="slide-c">
                                <div class="slide-c__cont cont">
                                    <?php if (!empty($year)) : ?>
                                        <div class="slide-c__row">
                                            <div class="slide-c__year move-x" data-move="120"><?php echo $year; ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="slide-c__row">
                                        <?php if (!empty($image)) : ?>
                                            <img src="<?php echo aq_resize($image['url'], 600); ?>"
                                                 alt="<?php echo $image['alt']; ?>"
                                                 class="slide-c__img move-x" data-move="20">
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-c__text move-x" data-move="40">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block6')): ?>
                    <?php while (have_rows('block6')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        ?>
                        <div class="timeline__slide">
                            <div class="slide-d">
                                <div class="slide-d__grid">
                                    <?php if (!empty($image)) : ?>
                                        <figure class="slide-d__figure js-color-alter">
                                            <img src="<?php echo aq_resize($image['url'], 1000); ?>"
                                                 alt="<?php echo $image['alt']; ?>"
                                                 class="slide-d__img">
                                        </figure>
                                    <?php endif; ?>

                                    <div class="slide-d__main">
                                        <?php if (!empty($year)) : ?>
                                            <div class="slide-d__year slide-year"><?php echo $year; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-d__text slide-text"><?php echo $text; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>


                <?php if (have_rows('block7')): ?>
                    <?php while (have_rows('block7')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image1 = get_sub_field('image1');
                        $image2 = get_sub_field('image2');
                        $image3 = get_sub_field('image3');
                        ?>
                        <div class="timeline__slide timeline__slide--full">
                            <div class="slide-e">
                                <div class="slide-e__grid">
                                    <?php if (!empty($image1)) : ?>
                                        <div class="slide-e__col">
                                            <img src="<?php echo aq_resize($image1['url'], 600); ?>"
                                                 alt="<?php echo $image1['alt']; ?>" class="slide-e__img move-x" data-move="20">
                                        </div>
                                    <?php endif; ?>
                                    <div class="slide-e__col slide-e__col--mid">
                                        <?php if (!empty($year)) : ?>
                                            <div class="slide-e__year slide-year move-x" data-move="30"><?php echo $year; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($image2)) : ?>
                                            <img src="<?php echo aq_resize($image2['url'], 600); ?>"
                                                 alt="<?php echo $image2['alt']; ?>"
                                                 class="slide-e__img-mid move-x" data-move="100">
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-e__text slide-text move-x" data-move="40">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($image3)) : ?>
                                        <div class="slide-e__col">
                                            <img src="<?php echo aq_resize($image3['url'], 600); ?>"
                                                 alt="<?php echo $image3['alt']; ?>" class="slide-e__img move-x" data-move="20">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>


                <?php if (have_rows('block8')): ?>
                    <?php while (have_rows('block8')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        $image_left = get_sub_field('image_left');
                        ?>
                        <div class="timeline__slide timeline__slide--narrow-s js-color-alter">
                            <?php if (!empty($image)) : ?>
                                <img src="<?php echo aq_resize($image['url'], 800); ?>"
                                     alt="<?php echo $image['alt']; ?>"
                                     class="slide-i__img">
                            <?php endif; ?>
                        </div>
                        <div class="timeline__slide">
                            <div class="slide-d">
                                <div class="slide-d__grid slide-d__grid--narrow">

                                    <div class="slide-d__main">
                                        <?php if (!empty($year)) : ?>
                                            <div class="slide-d__year slide-year move-x" data-move="80"><?php echo $year; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-d__text slide-text move-x" data-move="40"><?php echo $text; ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($image)) : ?>
                                        <figure class="slide-d__pic">
                                            <img src="<?php echo aq_resize($image_left['url'], 600); ?>"
                                                 alt="<?php echo $image_left['alt']; ?>"
                                                 class="" >
                                        </figure>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block9')): ?>
                    <?php while (have_rows('block9')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image1 = get_sub_field('image1');
                        $image2 = get_sub_field('image2');
                        ?>
                        <div class="timeline__slide timeline__slide--full">
                            <div class="slide-f">
                                <div class="slide-f__cont cont">
                                    <div class="slide-f__row slide-f__row--bottom">
                                        <?php if (!empty($image1)) : ?>
                                            <img src="<?php echo aq_resize($image1['url'], 600); ?>"
                                                 alt="<?php echo $image1['alt']; ?>"
                                                 class="slide-f__img slide-f__img--small move-x">
                                        <?php endif; ?>

                                        <?php if (!empty($year)) : ?>
                                            <div class="slide-f__year slide-year move-x" data-move="100"><?php echo $year; ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="slide-f__row">
                                        <?php if (!empty($image2)) : ?>
                                            <img src="<?php echo aq_resize($image2['url'], 800); ?>"
                                                 alt="<?php echo $image2['alt']; ?>"
                                                 class="slide-f__img slide-f__img--big move-x" data-move="30">
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-f__text slide-text move-x" data-move="50">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block10')): ?>
                    <?php while (have_rows('block10')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        ?>

                        <div class="timeline__slide">
                            <div class="slide-i slide-i--full">
                                <img src="<?php echo aq_resize($image['url'], 1600); ?>"
                                     alt="<?php echo $image['alt']; ?>"
                                     class="slide-i__img">
                            </div>
                        </div>

                        <div class="timeline__slide timeline__slide--narrow-xs js-color-alter">
                            <div class="slide-d slide-d--dark">
                                <div class="slide-d__grid">
                                    <div class="slide-d__main slide-d__main--full">
                                        <?php if (!empty($year)) : ?>
                                            <div class="slide-d__year slide-year move-x" data-move="60"><?php echo $year; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-d__text slide-text move-x" data-move="40">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block11')): ?>
                    <?php while (have_rows('block11')): the_row();
                        $year = get_sub_field('year');
                        $text = get_sub_field('text');
                        $image1 = get_sub_field('image1');
                        $image2 = get_sub_field('image2');
                        ?>
                        <div class="timeline__slide timeline__slide--narrow js-color-alter">
                            <div class="slide-g slide-dark">
                                <div class="slide-g__grid">
                                    <?php if (!empty($year)) : ?>
                                        <div class="slide-g__year slide-year move-x" data-move="130"><?php echo $year; ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($image1)) : ?>
                                        <div class="slide-g__col slide-g__col--l">
                                            <img src="<?php echo aq_resize($image1['url'], 500); ?>"
                                                 alt="<?php echo $image1['alt']; ?>" class="slide-g__img-l move-x">
                                        </div>
                                    <?php endif; ?>

                                    <div class="slide-g__col slide-g__col--c">
                                        <?php if (!empty($image2)) : ?>
                                            <img src="<?php echo aq_resize($image2['url'], 500); ?>"
                                                 alt="<?php echo $image2['alt']; ?>" class="slide-g__img-c move-x" data-move="100">
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-g__text slide-text move-x" data-move="40">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="slide-g__col slide-g__col--r"></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('block12')): ?>
                    <?php while (have_rows('block12')): the_row();
                        $year = get_sub_field('year');
                        $caption = get_sub_field('caption');
                        $text = get_sub_field('text');
                        $image1 = get_sub_field('image1');
                        $image2 = get_sub_field('image2');
                        ?>
                        <?php if (!empty($image1)) : ?>
                            <div class="timeline__slide">
                                <div class="slide-i">
                                    <img src="<?php echo aq_resize($image1['url'], 1600); ?>"
                                         alt="<?php echo $image1['alt']; ?>" class="slide-i__img">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="timeline__slide timeline__slide--narrow js-color-alter">
                            <div class="slide-h slide-dark">
                                <div class="slide-h__grid">
                                    <?php if (!empty($year)) : ?>
                                        <div class="slide-h__year slide-year move-x" data-move="40"><?php echo $year; ?></div>
                                    <?php endif; ?>
                                    <div class="slide-h__main move-x" data-move="20">
                                        <?php if (!empty($caption)) : ?>
                                            <div class="slide-h__title slide-title"><?php echo $caption; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($text)) : ?>
                                            <div class="slide-h__text slide-text">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($image2)) : ?>
                            <div class="timeline__slide">
                                <div class="slide-i">
                                    <img src="<?php echo aq_resize($image2['url'], 1600); ?>"
                                         alt="<?php echo $image2['alt']; ?>"
                                         class="slide-i__img">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
