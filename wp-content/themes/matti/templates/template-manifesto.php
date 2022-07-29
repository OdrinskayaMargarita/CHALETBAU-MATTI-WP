<?php /* Template Name: Manifesto */ ?>
<?php get_header(); ?>
    <main class="manifesto__main main">
        <?php get_template_part('template-parts/blocks/hero-title'); ?>
        <?php get_template_part('template-parts/pages/manifesto/text-place'); ?>
        <?php get_template_part('template-parts/pages/manifesto/teaser'); ?>
        <?php get_template_part('template-parts/pages/manifesto/quote-auto'); ?>
        <?php get_template_part('template-parts/blocks/page-links'); ?>
    </main>
<?php get_footer(); ?>