<?php

/**
 * Custom modify date format
 */
//add_filter('the_time', 'modify_date_format');
//function modify_date_format(){
//    $month_names = array(1=>'Janvier','Fèvrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');
//    return  get_the_time('j').' '.$month_names[get_the_time('n')].' '.get_the_time('Y');
//}


// TODO: change umg url string to variable
function get_image($filename)
{
    echo get_template_directory_uri() . '/assets/img/' . $filename;
}

function inline_svg($file, $is_fromlibrary = null)
{
    if ($is_fromlibrary) {
        echo file_get_contents($file);
    } else {
        echo file_get_contents(get_template_directory() . '/assets/img/' . $file);
    }
}


/**
 * Get current url
 */
function get_current_url()
{
    if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        $protocol = 'https://';
    } else {
        $protocol = 'http://';
    }
    return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

//echo get_current_url();


/**
 * Get page ID
 */
function get_page_id()
{
    return get_the_ID();
}

/**
 * Gets information about all registered image sizes.
 */
function get_image_sizes($unset_disabled = true)
{
    $wais = &$GLOBALS['_wp_additional_image_sizes'];
    $sizes = array();
    foreach (get_intermediate_image_sizes() as $_size) {
        if (in_array($_size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
            $sizes[$_size] = array(
                'width' => get_option("{$_size}_size_w"),
                'height' => get_option("{$_size}_size_h"),
                'crop' => (bool)get_option("{$_size}_crop"),
            );
        } elseif (isset($wais[$_size])) {
            $sizes[$_size] = array(
                'width' => $wais[$_size]['width'],
                'height' => $wais[$_size]['height'],
                'crop' => $wais[$_size]['crop'],
            );
        }

        // size registered, but has 0 width and height
        if ($unset_disabled && ($sizes[$_size]['width'] == 0) && ($sizes[$_size]['height'] == 0))
            unset($sizes[$_size]);
    }
    return $sizes;
};

/**
 * Custom function for showing var_dump() result decorated on browser
 */
function pvd($var)
{
    echo "<pre style='font-size:16px;'>";
    var_dump($var);
    echo "</pre>";
}

function is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

/**
 * Get youtube video ID from url
 */
function getYoutubeId($ytURL)
{
    $urlData = parse_url($ytURL);
    //echo '<br>'.$urlData["host"].'<br>';
    if($urlData["host"] == 'www.youtube.com') // Check for valid youtube url
    {
        $ytvIDlen = 11; // This is the length of YouTube's video IDs

        // The ID string starts after "v=", which is usually right after
        // "youtube.com/watch?" in the URL
        $idStarts = strpos($ytURL, "?v=");

        // In case the "v=" is NOT right after the "?" (not likely, but I like to keep my
        // bases covered), it will be after an "&":
        if($idStarts === FALSE)
            $idStarts = strpos($ytURL, "&v=");
        // If still FALSE, URL doesn't have a vid ID
        if($idStarts === FALSE)
            die("YouTube video ID not found. Please double-check your URL.");

        // Offset the start location to match the beginning of the ID string
        $idStarts +=3;

        // Get the ID string and return it
        $ytvID = substr($ytURL, $idStarts, $ytvIDlen);

        return $ytvID;
    }
    else
    {
        //echo 'This is not a valid youtube video url. Please, give a valid url...';
        return 0;
    }

}


/**
 * Get vimeo video ID from url
 */
function getVimeoId($url = '') {

    $regs = array();

    $id = '';

    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
        $id = $regs[3];
    }

    return $id;

}

?>
