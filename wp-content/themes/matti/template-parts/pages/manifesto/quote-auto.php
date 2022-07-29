<?php if (have_rows('quote')): ?>
    <?php while (have_rows('quote')): the_row();
        $text = get_sub_field('text');
        $author = get_sub_field('author');
        ?>
        <section class="quote-auto">
            <div class="cont">
                <div class="quote-auto__content">
                    <?php if (!empty($text)) : ?>
                        <blockquote class="blockquote quote-auto__blockquote"><?php echo $text; ?></blockquote>
                    <?php endif; ?>
                    <?php if (!empty($author)) : ?>
                        <span class="quote-auto__author"><?php echo $author; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>