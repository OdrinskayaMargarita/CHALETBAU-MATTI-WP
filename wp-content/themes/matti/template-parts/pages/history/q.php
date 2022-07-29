<?php if (have_rows('quote')): ?>
    <?php while (have_rows('quote')): the_row();
        $section_id = get_sub_field('section_id');
        $text = get_sub_field('text');
        $author = get_sub_field('author');
        ?>
        <section class="q" <?php echo !empty($section_id) ? 'id="' . $section_id . '"' : null; ?>>
            <div class="q__cont cont">
                <div class="q__grid">
                    <div class="q__main">
                        <?php if (!empty($text)) : ?>
                            <div class="q__quote">
                                <p><?php echo $text; ?><img class="q__quote-deco q__quote-deco--r" src="<?php get_image('i-quote.svg'); ?>"></p>
                                <img class="q__quote-deco q__quote-deco--l" src="<?php get_image('i-quote.svg'); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($author)) : ?>
                            <div class="q__author"><?php echo $author ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>