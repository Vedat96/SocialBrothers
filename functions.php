<?php
    // style and scripts
	function socialbrothers_styles(){
		wp_enqueue_style('socialbrothers-style', get_template_directory_uri() . "/style.css", array('socialbrothers-bootsrap'), '1.0', 'all');
		wp_enqueue_style('socialbrothers-bootsrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
		wp_enqueue_style('socialbrothers-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

	}
	add_action('wp_enqueue_scripts', 'socialbrothers_styles');

	function socialbrothers_scripts(){
		wp_enqueue_script('socialbrothers-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
        wp_enqueue_script('socialbrothers-jquery1', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '3.4.1', true);
        wp_enqueue_script('socialbrothers-jquery2', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '3.4.1', true);
        wp_enqueue_script('socialbrothers-jquery3', get_template_directory_uri() . "js/main.js", array('socialbrothers-bootsrap'), '1.0', true);

	}
	add_action('wp_enqueue_scripts', 'socialbrothers_scripts');


    // adding header image

    add_theme_support( 'custom-header' );
    	
    add_action( 'after_setup_theme', 'themename_custom_header_setup' );

    	function themename_custom_header_setup() {
        $defaults = array(
            // Default Header Image to display
            'default-image'         => get_template_directory_uri() . '/images/headers/banner.png',
            // Display the header text along with the image
            'header-text'           => false,
            // Header text color default
            'default-text-color'        => '000',
            // Header image width (in pixels)
            'width'             => 1000,
            // Header image height (in pixels)
            'height'            => 198,
            // Header image random rotation default
            'random-default'        => false,
            // Enable upload of image file in admin 
            'uploads'       => false,
            // function to be called in theme head section
            'wp-head-callback'      => 'wphead_cb',
            //  function to be called in preview page head section
            'admin-head-callback'       => 'adminhead_cb',
            // function to produce preview markup in the admin screen
            'admin-preview-callback'    => 'adminpreview_cb',
            );
    	}

    // adding logo
    add_theme_support( 'custom-logo' );

    function themename_custom_logo_setup() {
        $defaults = array(
            'height'               => 50,
            'width'                => 200,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true, 
        );
     
        add_theme_support( 'custom-logo', $defaults );
    }
     
    add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
    
    add_theme_support('post-formats');
    function wpdocs_custom_excerpt_length( $length ) {
    return 12;
    }

    add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

    add_theme_support('post-thumbnails');


    function socialbrothers_menus(){
        $locations = array(
            'primary' => 'primary top',
            'footer' => 'footer'
        );
        register_nav_menus($locations);
    }
    add_action('init', 'socialbrothers_menus');


    if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

    // Do some minor form validation to make sure there is content
    if (isset ($_POST['title'])) {
        $title =  $_POST['title'];
    } else {
        echo 'Please enter a  title';
    }
    if (isset ($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        echo 'Please enter the content';
    }
    $tags = $_POST['post_tags'];

    // Add the content of the form to $post as an array
    $new_post = array(
        'post_title'    => $title,
        'post_content'  => $description,
        // 'post_thumbnail'  => $post_thumbnail,
        'post_category' => array($_POST['cat']),  // Usable for custom taxonomies too
        'tags_input'    => array($tags),
        'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
        'post_type' => 'post'  //'post',page' or use a custom post type if you want to
    );
    //save the new post
    $post_id = wp_insert_post($new_post); 

    # Set Thumbnail

      require_once(ABSPATH . "wp-admin" . '/includes/image.php');
      require_once(ABSPATH . "wp-admin" . '/includes/file.php');
      require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attachment_id = media_handle_upload('thumbnail', $post_id);

    if (!is_wp_error($attachment_id)) { 
            set_post_thumbnail($post_id, $attachment_id);
            header("Location: " . $_SERVER['HTTP_REFERER'] . "/?files=uploaded");
    }
}

    // set the options to change
    $option = array(
        // we don't want no description
        'blogdescription'               => '',
        // change category base
        'category_base'                 => '/cat',
        // change tag base
        'tag_base'                      => '/label',
        // disable comments
        'default_comment_status'        => 'closed',
        // disable trackbacks
        'use_trackback'                 => '',
        // disable pingbacks
        'default_ping_status'           => 'closed',
        // disable pinging
        'default_pingback_flag'         => '',
        // change the permalink structure
        'permalink_structure'           => '/%postname%/',
        // dont use year/month folders for uploads 
        'uploads_use_yearmonth_folders' => '',
        // don't use those ugly smilies
        'use_smilies'                   => ''
    );
     
    // change the options!
    foreach ( $option as $key => $value ) {  
        update_option( $key, $value );
    }
     
    // flush rewrite rules because we changed the permalink structure
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
     
    // delete the default comment, post and page
    wp_delete_comment( 1 );
    wp_delete_post( 1, TRUE );
    wp_delete_post( 2, TRUE );
     
    // we need to include the file below because the activate_plugin() function isn't normally defined in the front-end
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    // activate pre-bundled plugins
    activate_plugin( 'wp-super-cache/wp-cache.php' );
    activate_plugin( 'wordpress-seo/wp-seo.php' );
    activate_plugin( 'contact-form-7/wp-contact-form-7.php' );
     
    // switch the theme to "SocialBrothers"
    switch_theme( 'SocialBrothers' );

    // switch theme with plugin
    add_filter('option_active_plugins',  function($plugins){

        $myplugin = "custom-plugin.php";

        if (!in_array($myplugin, $plugins)) {
            $plugins[] = $myplugin;
        }
        return $plugins;
    });

?>