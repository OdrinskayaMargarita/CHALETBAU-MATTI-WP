<?php
$logo = get_field('header_logo', 'options');
$icon_black = get_field('header_icon_black', 'options');
$icon_white = get_field('header_icon_white', 'options');
?>
<header class="header">
    <div class="header__cont">
        <div class="header__grid">
            <div class="header__col header__col--l"></div>
            <div class="header__col">
                <a href="<?php echo get_home_url(); ?>" class="header__logo-link">
                    <?php if (!empty($logo)) : ?>
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="header__logo">
                    <?php endif; ?>
                    <?php if (!empty($icon_black)) : ?>
                        <img src="<?php echo $icon_black['url']; ?>" alt="<?php echo $icon_black['alt']; ?>"
                             class="header__logo header__logo--s js-logo-main">
                    <?php endif; ?>
                    <?php if (!empty($icon_white)) : ?>
                        <img src="<?php echo $icon_white['url']; ?>" alt="<?php echo $icon_white['alt']; ?>"
                             class="header__logo header__logo--s header__logo--alt js-logo-over">
                    <?php endif; ?>
                </a>
            </div>
            <div class="header__col header__col--r">
                <div class="header__burger-wrapper">

                    <div class="burger">
                        <div class="burger__line"></div>
                        <div class="burger__line"></div>
                        <div class="burger__line"></div>
                    </div>

                    <div class="burger burger--alt">
                        <div class="burger__line"></div>
                        <div class="burger__line"></div>
                        <div class="burger__line"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>