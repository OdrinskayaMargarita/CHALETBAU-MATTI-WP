<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package my-theme
 */

get_header();
?>
    <main class="error-page__main">
        <?php get_template_part('template-parts/pages/404/error-block'); ?>
    </main>
<?php get_footer(); ?>