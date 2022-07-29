<?php if (have_rows('center_quote')): ?>
    <?php while (have_rows('center_quote')): the_row();
        $section_id = get_sub_field('section_id');
        $text = get_sub_field('text');
        $author = get_sub_field('author');
        ?>
        <section class="center-quote" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="center-quote__cont cont">
                <div class="center-quote__container">
                    <?php if (!empty($text)) : ?>
                        <div class="q__quote">
                            <p>
                                <img class="q__quote-deco q__quote-deco--l q__quote-deco--inline" src="<?php get_image('i-quote.svg'); ?>">
                                <?php echo $text; ?>
                                <img class="q__quote-deco q__quote-deco--r" src="<?php get_image('i-quote.svg'); ?>">
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($author)) : ?>
                        <div class="q__author"><?php echo $author; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>