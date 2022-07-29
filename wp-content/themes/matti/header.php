<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my-theme
 */

if (class_exists('ACF')) {
    //Services
    $google_analytics = get_field('google_analytics', 'options');
    $google_tag_manager_head = get_field('google_tag_manager_head', 'options');
    $google_tag_manager_body = get_field('google_tag_manager_body', 'options');
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#242424">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="//use.typekit.net/jsz8esp.css">
    <?php if (file_exists(get_template_directory() . '/assets/css/app.css')) : ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/app.css?ver=' . filemtime(get_template_directory() . '/assets/css/app.css') ?>" type="text/css" media="all"/>
    <?php endif; ?>
    <?php echo !empty($google_analytics) ? $google_analytics : false; ?>
    <?php echo !empty($google_tag_manager_head) ? $google_tag_manager_head : false; ?>
    <script crossorigin="anonymous" nomodule src="https://polyfill.io/v3/polyfill.min.js?features=blissfuljs%2Cdefault%2Ces2015%2Ces2016%2Ces2017%2Ces2018%2Ces5%2Ces6%2Ces7%2CNodeList.prototype.forEach%2CIntersectionObserver%2CIntersectionObserverEntry"></script>
</head>

<?php
//Template data page names
$homePage = is_front_page() ? 'homePage' : '';
$blogPage = is_home() ? 'blogPage' : '';
$termsPage = is_page_template('templates/template-terms.php') ? 'TermsOfUsePage' : '';
$contactPage = is_page_template('templates/template-contact.php') ? 'contactPage' : '';
$jobsPage = is_page_template('templates/template-jobs.php') ? 'jobsPage' : '';
$manifestoPage = is_page_template('templates/template-manifesto.php') ? 'manifestoPage' : '';
$passionPage = is_page_template('templates/template-passion.php') ? 'passionPage' : '';
$teamPage = is_page_template('templates/template-team.php') ? 'teamPage' : '';
$yourHomePage = is_page_template('templates/template-your-home.php') ? 'yourHome' : '';
$historyPage = is_page_template('templates/template-history.php') ? 'historyPage' : '';
$errorPage = is_404() ? '404Page' : '';

$pageNameArr = [
    $homePage,
    $blogPage,
    $termsPage,
    $contactPage,
    $jobsPage,
    $manifestoPage,
    $passionPage,
    $teamPage,
    $yourHomePage,
    $historyPage,
    $errorPage,
];
$pageNameArrFilter = array_filter($pageNameArr);

$pageClass = null;
foreach ($pageNameArrFilter as $item) {
    $pageClass .= $item . ' ';
}
?>

<body
<?php if (!is_front_page()){
    body_class();
}?>
data-page-name="<?php foreach ($pageNameArr as $item) if (!empty($item)) {
    echo $item;
} ?>" data-barba="wrapper">
<?php echo !empty($google_tag_manager_body) ? $google_tag_manager_body : false; ?>

<?php get_template_part('template-parts/blocks/loader'); ?>
<?php get_template_part('template-parts/blocks/header'); ?>
<?php get_template_part('template-parts/blocks/navbar'); ?>

<div class="fixed-holder"></div>

<div class="page-wrapper"
     data-home-url="<?php echo get_home_url();?>"
     data-barba="container"
     data-barba-namespace="<?php foreach ($pageNameArr as $item) if (!empty($item)) { echo $item; } ?>">

    <?php  get_template_part('template-parts/blocks/menu'); ?>

    <div class="scroll-wrapper">



