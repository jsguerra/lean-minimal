<?php
    if ( ! function_exists( 'leanMinimal_setup' ) ) :
    function leanMinimal_setup() {

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 740, 555, array( 'center', 'center')  );

        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'leanMinimal' ),
        ) );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        add_theme_support( 'customize-selective-refresh-widgets' );
    }
    endif;
    add_action( 'after_setup_theme', 'leanMinimal_setup' );

    /**
     * Enqueue scripts and styles.
     */
    function leanMinimal_scripts() {
        wp_enqueue_style( 'leanMinimal-style', get_template_directory_uri() . '/css/style.css' );

        wp_enqueue_script( 'leanMinimal-scripts', get_template_directory_uri() . '/js/site.js', array(), '20170629', true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'leanMinimal_scripts' );