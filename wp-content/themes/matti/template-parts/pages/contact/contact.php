<?php if (have_rows('addresses')): ?>
    <?php while (have_rows('addresses')): the_row(); ?>
        <?php
        $index = 0;
        if (have_rows('tabs')): ?>
            <section class="contact">
                <div class="contact__cont cont">
                    <div class="contact__grid grid">
                        <div class="contact__figure">
                            <div class="contact__slider">
                                <div class="contact__slider-wrapper">
                                    <?php while (have_rows('tabs')): the_row();
                                        $image = get_sub_field('image');
                                        $map_image = get_sub_field('map_image');
                                        $map_image_link = get_sub_field('map_image_link');
                                        ?>
                                        <div class="contact__slide">
                                            <div class="contact__slide-inner">
                                                <img src="<?php echo aq_resize($image['url'], 600); ?>"
                                                     alt="<?php echo $image['alt']; ?>"
                                                     class="contact__img">

                                                <?php echo !empty($map_image_link) ? '<a href="' . $map_image_link . '" target="_blank" class="contact__img-map">' : '<div class="contact__img-map">'; ?>
                                                <img src="<?php echo aq_resize($map_image['url'], 300); ?>"
                                                     alt="<?php echo $map_image['alt']; ?>"
                                                     class="contact__img-map">
                                                <?php echo !empty($map_image_link) ? '</a>' : '</div>'; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>

                        <div class="contact__main">
                            <div class="contact__btns">
                                <?php while (have_rows('tabs')): the_row();
                                    $index++;
                                    $tab_text = get_sub_field('tab_text');
                                    ?>
                                    <?php if (!empty($tab_text)) : ?>
                                        <div class="contact__btn <?php echo $index === 1 ? 'contact__btn--active' : null; ?>"><?php echo $tab_text; ?></div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>

                            <div class="contact__tabs">
                                <div class="contact__tabs-wrapper">
                                    <?php while (have_rows('tabs')): the_row();
                                        $text = get_sub_field('text');
                                        $links = get_sub_field('links');
                                        ?>
                                        <div class="contact__tab">
                                            <?php if (!empty($text)) : ?>
                                                <div class="contact__text"><?php echo $text; ?></div>
                                            <?php endif; ?>
                                            <?php if (!empty($links)) : ?>
                                                <div class="contact__links">
                                                    <?php foreach ($links as $item) :
                                                        $link = $item['link'];
                                                        $add_link_underline = $item['add_link_underline'];
                                                        ?>
                                                        <?php if ($link) :
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                        <a href="<?php echo $link_url; ?>"
                                                           target="<?php echo $link_target; ?>"
                                                           class="contact__link <?php echo $add_link_underline ? 'contact__link--deco' : null; ?>"><?php echo $link_title; ?></a>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>