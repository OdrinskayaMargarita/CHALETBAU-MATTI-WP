<?php if (have_rows('quote')): ?>
    <?php while (have_rows('quote')): the_row();
        $image = get_sub_field('image');
        $author = get_sub_field('author');
        $text = get_sub_field('text');
        ?>
        <section class="single-quote">
            <span class="single-quote__line"></span>
            <div class="single-quote__cont cont">
                <div class="single-quote__row">
                    <?php if (!empty($image)) : ?>
                        <div class="single-quote__image-container">
                            <img src="<?php echo aq_resize($image['url'], 600); ?>" alt="<?php echo $image['alt']; ?>"
                                 class="single-quote__image">
                        </div>
                    <?php endif; ?>
                    <div class="single-quote__column">
                        <?php if (!empty($author)) : ?>
                            <span class="single-quote__overline"><?php echo $author; ?></span>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>
                            <blockquote class="single-quote__blockquote blockquote"><?php echo $text;?></blockquote>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>