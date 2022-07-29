<?php /* Template Name: Your Home */ ?>
<?php get_header();

$full_video_index1 = 1;
$video_full1 = get_field('text_video_block1_video_full');

$full_video_index2 = 2;
$video_full2 = get_field('text_video_block2_video_full');

$full_video_index3 = 3;
$video_full3 = get_field('innovations_text_video_video_full');
?>
    <main class="your-home__main">
        <?php get_template_part('template-parts/pages/your-home/your-home-greeting'); ?>
        <?php page_navigation(true); ?>
        <?php get_template_part('template-parts/pages/your-home/services'); ?>
        <?php get_template_part('template-parts/pages/your-home/image-quote'); ?>
        <?php get_template_part('template-parts/pages/your-home/provider'); ?>
        <?php get_template_part('template-parts/pages/your-home/video-text'); ?>
        <?php get_template_part('template-parts/blocks/animated-images'); ?>
        <?php get_template_part('template-parts/pages/your-home/inserted-images'); ?>
        <?php get_template_part('template-parts/pages/your-home/text-section'); ?>
        <?php get_template_part('template-parts/pages/your-home/full-image-slider'); ?>
        <?php get_template_part('template-parts/pages/your-home/center-quote'); ?>
        <?php get_template_part('template-parts/pages/your-home/innovations'); ?>

        <?php get_template_part('template-parts/pages/your-home/multiple'); ?>
        <?php get_template_part('template-parts/pages/your-home/collaboration'); ?>
        <?php get_template_part('template-parts/blocks/bottom-page-banner'); ?>
    </main>
<?php popup_video($full_video_index1, $video_full1); ?>
<?php popup_video($full_video_index2, $video_full2); ?>
<?php popup_video($full_video_index3, $video_full3); ?>
<?php get_footer(); ?>