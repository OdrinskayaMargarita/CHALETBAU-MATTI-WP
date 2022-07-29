<?php
$logo = get_field('header_logo', 'options');
?>
<div class="loader">
    <?php if (!empty($logo)) : ?>
        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="loader__logo">
    <?php endif; ?>
    <div class="loader__overlay">
        <div class="loader__line"></div>
        <div class="loader__bg loader__bg--l"></div>
        <div class="loader__bg loader__bg--r"></div>
    </div>
</div>