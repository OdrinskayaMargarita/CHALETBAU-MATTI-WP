<?php
function get_members($arr)
{ ?>
    <?php if (!empty($arr)) : ?>
    <div class="team-grid__row">
        <?php foreach ($arr as $id) :
            $title = get_the_title($id);
            $image = get_the_post_thumbnail_url($id);
            $role = get_field('role', $id);
            $editor = get_field('info', $id);
            ?>
            <div class="team__item" data-st>
                <div class="team__card">
                    <div class="team__image-container">
                        <?php if (!empty($image)) : ?>
                            <img src="<?php echo aq_resize($image, 800); ?>" alt="<?php echo $title; ?>"
                                 class="team__image">
                        <?php endif; ?>
                    </div>
                    <div class="team__info">
                        <?php if (!empty($role)) : ?>
                            <span class="team__role"><?php echo $role; ?></span>
                        <?php endif; ?>
                        <?php if (!empty($editor)) : ?>
                            <div class="team__text"><?php echo $editor; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <span class="team__name"><?php echo $title; ?></span>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php }


function video_block($video_id, $video_preview, $video_caption)
{
    ?>

    <div class="media__el media__el--full" data-st>
        <?php if (!empty($video_preview)) : ?>
            <div class="media__el-wrapper" data-popup="<?php echo $video_id; ?>">
                <video class="media__video" src="<?php echo $video_preview . '#t=0.001'; ?>" loop
                       playsinline muted></video>
                <div class="media__btn">
                    <img class="media__icon" src="<?php get_image('i-media-play.svg'); ?>">
                </div>
                <img src="<?php get_image('i-fullscreen.svg'); ?>" alt="" class="media__icon-fullscreen">
            </div>
        <?php endif; ?>
        
        <?php if (!empty($video_caption)) : ?>
            <div class="media__el-label"><?php echo $video_caption; ?></div>
        <?php endif; ?>
    </div>
    <?php
}

function popup_video($video_id, $url)
{
    ?>
    <?php if (!empty($url)) : ?>
    <div class="popup-video" data-video="<?php echo $video_id; ?>">

        <?php if (is_front_page()): ?>
            <?php $languages = icl_get_languages('skip_missing=0&orderby=code'); ?>
            <?php if (!empty($languages)) : ?>
                <ul class="popup-video__lang">
                    <?php foreach ($languages as $l) : ?>
                        <?php if ($l['active']) : ?>
                            <li class="popup-video__lang-item">
                                <a href="<?php echo $l['url'] . '#movie-'.$video_id; ?>" class="popup-video__lang-link popup-video__lang-link--active"><?php echo strtoupper($l['code']); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="popup-video__lang-item">
                                <a href="<?php echo $l['url'] . '#movie-'.$video_id; ?>" class="popup-video__lang-link"><?php echo strtoupper($l['code']); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>

        <div class="popup-video__media">
            <video class="popup-video__element" playsinline controls preload="none">
                <source src="<?php echo $url . '#t=0.001'; ?>" type="video/mp4"/>
            </video>
        </div>
        <div class="popup-video__btn-close">
            <img src="<?php get_image('i-close.svg'); ?>" alt="Icon" class="popup-video__icon-close">
        </div>
    </div>
<?php endif; ?>
    <?php
}


function page_navigation($wrapper)
{
    ?>
    <?php if (have_rows('page_navigation')): ?>
    <?php echo $wrapper ? '<div class="pagenav-wrapper">' : null; ?>
    <div class="page-nav">
        <div class="page-nav__btn">
            <img src="<?php get_image('i-page-nav-open.svg'); ?>" alt="Icon" class="page-nav__icon-open">
            <img src="<?php get_image('i-page-nav-close.svg'); ?>" alt="Icon" class="page-nav__icon-close">
        </div>
        <ul class="page-nav__list">
            <?php while (have_rows('page_navigation')): the_row();
                $scroll_to_section_id = get_sub_field('scroll_to_section_id');
                $link_text = get_sub_field('link_text');
                ?>
                <?php if (!empty($scroll_to_section_id)) : ?>
                    <li class="page-nav__item">
                        <a href="<?php echo '#' . $scroll_to_section_id; ?>"
                           class="page-nav__link"><?php echo $link_text; ?></a>
                    </li>
                <?php endif; ?>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php echo $wrapper ? '</div>' : null; ?>
<?php endif; ?>
    <?php
}