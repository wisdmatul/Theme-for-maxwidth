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
