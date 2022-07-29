<?php
$copyright = get_field('footer_copyright', 'options');
$links = get_field('footer_links', 'options');
?>
<footer class="footer">
    <div class="footer__cont cont">
        <div class="footer__inner">
            <div class="footer__copy"><?php echo !empty($copyright) ? $copyright : null; ?></div>
            <?php if (!empty($links)) : ?>
                <?php foreach ($links as $item) :
                    $link = $item['link'];
                    ?>
                    <?php if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"
                       class="footer__link"><?php echo $link_title; ?></a>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</footer>