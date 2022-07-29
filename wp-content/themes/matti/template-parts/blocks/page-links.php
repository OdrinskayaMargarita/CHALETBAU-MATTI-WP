<?php if (have_rows('links')): ?>
    <section class="page-links">
        <div class="cont">
            <div class="page-links__row" data-ac>
                <?php while (have_rows('links')): the_row();
                    $url = get_sub_field('url');
                    $caption = get_sub_field('caption');
                    $subcaption = get_sub_field('subcaption');
                    ?>
                    <?php if (!empty($url)) : ?>
                        <a href="<?php echo $url; ?>" class="page-links__item" data-ae>
                            <?php if (!empty($caption)) : ?>
                                <span class="page-links__title"><?php echo $caption; ?></span>
                            <?php endif; ?>
                            <?php if (!empty($subcaption)) : ?>
                                <span class="page-links__description"><?php echo $subcaption; ?></span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>