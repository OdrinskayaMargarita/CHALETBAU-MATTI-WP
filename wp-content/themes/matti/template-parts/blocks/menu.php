<?php
$logo = get_field('header_logo', 'options');
$navigation = get_field('header_navigation', 'options');
$bottom_left_menu = get_field('header_bottom_left_menu', 'options');
$bottom_menu = get_field('header_bottom_menu', 'options');
$socials = get_field('socials', 'options');
?>
<div class="menu">
    <div class="menu__cont cont">
        <div class="menu__main">
            <div class="menu__grid">
                <div class="menu__logo-wrapper">
                    <?php if (!empty($logo)) : ?>
                        <a href="<?php echo get_home_url(); ?>" class="menu__logo-link">
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"
                                 class="menu__logo-img">
                        </a>
                    <?php endif; ?>
                </div>
                <?php if (!empty($navigation)) : ?>
                    <nav class="menu__nav">
                        <ul class="menu__nav-list">
                            <?php foreach ($navigation as $item) :
                                $link = $item['link'];
                                ?>
                                <?php if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <li class="menu__nav-item">
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"
                                       class="menu__nav-link"><?php echo $link_title; ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php language_selectors(true); ?>

    <div class="menu__footer">
        <div class="menu__footer-inner">
            <?php if (!empty($bottom_left_menu)) : ?>
                <div class="menu__links">
                    <?php foreach ($bottom_left_menu as $item) :
                        $link = $item['link'];
                        ?>
                        <?php if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"
                           class="menu__link"><?php echo $link_title; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="menu__centered-col">
                <?php if (!empty($bottom_menu)) : ?>
                    <nav class="menu__fnav">
                        <ul class="menu__fnav-list">
                            <?php foreach ($bottom_menu as $item) :
                                $link = $item['link'];
                                ?>
                                <?php if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <li class="menu__fnav-item">
                                    <a
                                        href="<?php echo $link_url; ?>"
                                        target="<?php echo $link_target; ?>"
                                        class="menu__fnav-link"
                                        <?php if (strpos($link_url, 'cbma')) { echo 'data-barba-prevent'; } ?>
                                        ><?php echo $link_title; ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

                <?php if (!empty($socials)) : ?>
                    <ul class="menu__socials">
                        <li class="menu__social-item">
                            <a href="#" class="menu__social-link">
                                <img src="<?php get_image('i-social-yt.svg') ?>"
                                     alt="Video icon"
                                     data-popup="100"
                                     class="menu__social-icon">
                            </a>
                        </li>
                        
                        <?php foreach ($socials as $item) :
                            $icon = $item['icon'];
                            $link = $item['link']; //url
                            ?>
                            <?php if (!empty($link)) : ?>
                            <li class="menu__social-item">
                                <a href="<?php echo $link; ?>" target="_blank" data-barba-prevent class="menu__social-link">
                                    <?php if (!empty($icon)) : ?>
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="menu__social-icon">
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <?php language_selectors(false); ?>

        </div>
    </div>
</div>