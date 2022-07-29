<?php /* Template Name: Passion */ ?>
<?php get_header();
$full_video_index1 = 1;
$video_full1 = get_field('review_video_full');

$full_video_index2 = 2;
$video_full2 = get_field('workshop_first_block_full_video');

$full_video_index3 = 3;
$video_full3 = get_field('text_video_full_video');
?>
<?php get_template_part('template-parts/pages/passion/passion-greeting'); ?>
<?php page_navigation(true); ?>
<?php get_template_part('template-parts/pages/passion/design'); ?>
<?php get_template_part('template-parts/pages/passion/review'); ?>
<?php get_template_part('template-parts/pages/passion/presentation'); ?>
<?php get_template_part('template-parts/pages/passion/text-c'); ?>
<?php get_template_part('template-parts/pages/passion/nature'); ?>
<?php get_template_part('template-parts/pages/passion/poster'); ?>
<?php get_template_part('template-parts/pages/passion/traditions'); ?>
<?php get_template_part('template-parts/pages/passion/workshop'); ?>
<?php get_template_part('template-parts/pages/passion/business'); ?>
<?php // get_template_part('template-parts/pages/passion/carousel'); ?>
<?php get_template_part('template-parts/blocks/bottom-page-banner'); ?>
<?php popup_video($full_video_index1, $video_full1); ?>
<?php popup_video($full_video_index2, $video_full2); ?>
<?php popup_video($full_video_index3, $video_full3); ?>
<?php get_footer(); ?>
