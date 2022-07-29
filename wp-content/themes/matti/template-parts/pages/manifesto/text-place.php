<?php if (have_rows('text_place')): ?>
    <section class="text-place">
        <div class="text-place__cont cont">
            <div class="text-place__content">
                <?php while (have_rows('text_place')): the_row();
                    $text = get_sub_field('text');
                    $text_style = get_sub_field('text_style'); //text-place__title, text-place__text
                    $text_position = get_sub_field('text_position');// text-place__column--right
                    ?>
                    <?php if (!empty($text)) : ?>
                        <div class="text-place__column <?php echo $text_position === 'right' ? 'text-place__column--right' : null; ?>">
                            <?php echo $text_style === 'title' ? '<h2 class="text-place__title" data-st>' : null ?>
                            <?php echo $text_style === 'text' ? '<div class="text-place__text" data-st>' : null; ?>
                                <?php echo $text;?>
                            <?php echo $text_style === 'title' ? '</h2>' : null;?>
                            <?php echo $text_style === 'text' ? '</div>' : null;?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>