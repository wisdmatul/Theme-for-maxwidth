<?php

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {

	function twenty_twenty_one_setup() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

        add_theme_support( 'responsive-embeds' );

        add_theme_support( 'editor-styles' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'Primary-template' ),
				'footer'  => esc_html__( 'Secondary menu', 'Primary-template' ),
			)
		);
		
		
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
	}

    add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );
}

if(! function_exists( 'register_style' )){

    function register_style(){

        wp_enqueue_style('style', get_stylesheet_uri());
        
        //for full_width
        if(is_page_template('max_width.php'))
        {
            wp_enqueue_style('max_width_styles',get_template_directory_uri().'/max_width.css',false,1.0,'all');
        }
    }
    add_action('wp_enqueue_scripts','register_style');

}


//adding custom image size
add_action( 'after_setup_theme', 'custom_image_sizes' );
function custom_image_sizes() {
    add_image_size( 'custom_img', 300,250,true);
}


function custom_post_type_menu_item( $items, $args ) {
    if ( $args->theme_location == 'header-menu' ) {
        $items .= '<li><a href="' . get_post_type_archive_link( 'custom_post_type' ) . '">Courses</a></li>';
        $items .= '<li><a href="' . get_post_type_archive_link( 'custom_post_type' ) . '">Session</a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'custom_post_type_menu_item', 10, 2 );

// function generate_custom_image_size( $metadata, $attachment_id ) {
//     $upload_dir = wp_upload_dir();
//     $file = get_attached_file( $attachment_id );
//     $image = wp_get_image_editor( $file );
//     if ( ! is_wp_error( $image ) ) {
//         $image->resize( 300, 250, true );
//         $image->save( $file );
//         $metadata['sizes']['custom-size'] = array(
//             'file' => 'custom-size.png',
//             'width' => 300,
//             'height' => 250,
//             'mime-type' => 'image/jpeg'
//         );
//     }
//     return $metadata;
// }
// add_filter( 'wp_generate_attachment_metadata', 'generate_custom_image_size', 10, 2 );
