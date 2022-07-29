<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if (!function_exists('my_setup')) :
    function my_setup()
    {
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        ## disable create thumbnail for this sizes
        add_filter('intermediate_image_sizes', 'delete_intermediate_image_sizes');
        function delete_intermediate_image_sizes($sizes)
        {
            // remove this sizes
            return array_diff($sizes, array(
                'medium_large',
                'large',
                '1536x1536',
                '2048x2048',
            ));
        }

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'header-menu' => 'Primary',
        ));

        //Register Sidebar
//        if (function_exists('register_sidebar')) {
//            register_sidebar(array(
//                    'id' => 'sidebar',
//                    'name' => 'Sidebar',
//                )
//            );
//        }

    }
endif;
add_action('after_setup_theme', 'my_setup');


// remove_json_api
function remove_json_api()
{

    // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');

    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Remove all embeds rewrite rules.
    // add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}

add_action('after_setup_theme', 'remove_json_api');
// end remove_json_api

// disable_json_api
function disable_json_api()
{

    // Filters for WP-API version 1.x
    add_filter('json_enabled', '__return_false');
    add_filter('json_jsonp_enabled', '__return_false');

    // Filters for WP-API version 2.x
    add_filter('rest_enabled', '__return_false');
    add_filter('rest_jsonp_enabled', '__return_false');

}

add_action('after_setup_theme', 'disable_json_api');
// end disable_json_api

function translations()
{
    // Load the text domain and translations
    $lang_dir = get_stylesheet_directory() . '/languages';
    load_theme_textdomain('matti', $lang_dir);
}

add_action('after_setup_theme', 'translations');

/**
 * @param $adaptive
 * $class - menu__lang, menu__lang-mob
 */
function language_selectors($adaptive)
{
    //Todo frontend need write script for change active language code for barba
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if (!empty($languages)) :?>
        <div class="<?php echo $adaptive ? 'menu__lang-mob' : 'menu__lang'; ?>">
            <div class="lang">
                <div class="lang__btn">
                    <?php if ($adaptive) : ?>
                        <div class="lang__btn-pre"><?php _e('LANGUAGE:', 'matti'); ?></div>
                    <?php endif; ?>
                    <?php foreach ($languages as $l) : ?>
                        <?php if ($l['active']) : ?>
                            <span><?php echo strtoupper($l['code']); ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="lang__icon-close"></div>
                </div>
                <div class="lang__popup">
                    <div class="lang__popup-label"><?php _e('Choisissez votre langue:', 'matti'); ?></div>
                    <?php foreach ($languages as $l) : ?>
                        <?php if ($l['active']) : ?>
                            <a href="<?php echo $l['url']; ?>" class="lang__popup-item lang__popup-item--active"><?php echo $l['translated_name']; ?></a>
                        <?php else: ?>
                            <a href="<?php echo $l['url']; ?>"
                               class="lang__popup-item"><?php echo $l['translated_name']; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    <?php endif; ?>
<?php }

/**
 * Css/Js includes
 */
function my_theme_scripts()
{
    wp_enqueue_style('css_style', get_stylesheet_uri(), array(), '');
}

add_action('wp_enqueue_scripts', 'my_theme_scripts');
?>
