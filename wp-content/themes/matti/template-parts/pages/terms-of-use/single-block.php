<?php
$title = get_the_title();
$editor = get_field('editor');
?>
<div class="single-block">
    <div class="single__cont cont">
        <div class="single__content">
            <h1 class="single__title"><?php echo $title; ?></h1>
            <?php if (!empty($editor)) : ?>
                <div class="single__text richtext"><?php echo $editor; ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>