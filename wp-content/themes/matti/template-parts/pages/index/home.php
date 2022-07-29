<?php if (have_rows('hero')): ?>
    <?php while (have_rows('hero')): the_row();
        $full_video_index = 100;
        $caption = get_sub_field('caption');
        $videos = get_sub_field('videos');
        $links = get_sub_field('links');
        $open_popup_button = get_field('popup_video_open_popup_button');
        $video_full = get_field('popup_video_video');
        ?>
        <section class="home">


            <?php if (!empty($videos)) :
                $videos_index = 0;
                ?>
                <div class="home__slides">
                    <?php $languages = icl_get_languages('skip_missing=0&orderby=code'); ?>
                    <?php if (!empty($languages)) : ?>
                        <ul class="popup-video__lang">
                            <?php foreach ($languages as $l) : ?>
                                <?php if ($l['active']) : ?>
                                    <li class="popup-video__lang-item">
                                        <a href="<?php echo $l['url']; ?>" class="popup-video__lang-link popup-video__lang-link--active"><?php echo strtoupper($l['code']); ?></a>
                                    </li>
                                <?php else: ?>
                                    <li class="popup-video__lang-item">
                                        <a href="<?php echo $l['url']; ?>" class="popup-video__lang-link"><?php echo strtoupper($l['code']); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php foreach ($videos as $item) :
                        $videos_index++;
                        $video = $item['video'];
                        $image = $item['image'];
                        $link_url = $item['link_url'];
                        $video_class = null;
                        if ($videos_index === 1) {
                            $video_class = 'home__slide--l home__slide--darken';
                        } elseif ($videos_index === 2) {
                            $video_class = 'home__slide--r';
                        }
                        ?>
                        <div class="home__slide <?php echo $video_class; ?>">
                            <?php if (!empty($link_url)) : ?>
                                <a href="<?php echo $link_url; ?>" class="home__slide-link"></a>
                            <?php endif; ?>
                            <?php if (!empty($image)) : ?>
                                <img src="<?php echo aq_resize($image['url'], 1600); ?>"
                                     alt="<?php echo $image['alt']; ?>" class="home__slide-bg">
                            <?php endif; ?>
                            <?php if (!empty($video)) : ?>
                                <video class="home__slide-video"
                                       src="<?php echo $video . '#t=0.001'; ?>"
                                       playsinline loop muted preload="none"></video>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="home__content">
                <?php if (!empty($caption)) : ?>
                    <h1 class="home__title"><?php echo $caption; ?></h1>
                <?php endif; ?>
                <div class="home__btn-wrapper">
                    <?php if (!empty($open_popup_button)) : ?>
                        <button class="home__btn btn" data-popup="<?php echo $full_video_index; ?>">
                            <?php inline_svg('icon-play.svg'); ?>
                            <span class="btn__label"><?php echo $open_popup_button; ?></span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($links)) :
                $links_index = 0;
                ?>
                <div class="home__links">
                    <?php foreach ($links as $item) :
                        $links_index++;
                        $link = $item['link'];
                        $add_link_icon = $item['add_link_icon'];
                        $link_class = null;
                        if ($links_index === 1) {
                            $link_class = 'home__link--l';
                        } elseif ($links_index === 2) {
                            $link_class = 'home__link--b';
                        } elseif ($links_index === 3) {
                            $link_class = 'home__link--r';
                        }
                        ?>
                        <?php if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"
                           class="home__link <?php echo $link_class; ?>">
                            <span><?php echo $link_title; ?></span>
                            <?php if ($add_link_icon) : ?>
                                <img src="<?php get_image('i-link-chevron.svg'); ?>" alt="Icon" class="home__link-icon">
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <?php popup_video($full_video_index, $video_full); ?>

    <?php endwhile; ?>
<?php endif; ?>