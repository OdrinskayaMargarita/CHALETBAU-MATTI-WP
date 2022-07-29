<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my-theme
 */

?>
<?php if (!is_front_page()): ?>
    <?php get_template_part('template-parts/blocks/footer'); ?>
    <?php get_template_part('template-parts/blocks/main-video'); ?>
<?php endif; ?>
</div>
</div>


<?php wp_footer(); ?>

<?php if (file_exists(get_template_directory() . '/assets/js/app.js')) : ?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/app.js?ver=<?php echo filemtime(get_template_directory() . '/assets/js/app.js') ?>"></script>
<?php endif; ?>
</body>
</html>
