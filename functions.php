<?php 

function mainStyle()
{
    wp_enqueue_style('myStyle', get_theme_file_uri("./src/output.css" ));
    wp_enqueue_style( 'flowbite',get_theme_file_uri("./node_modules/flowbite/dist/flowbite.min.css" ) );
    wp_enqueue_script( 'flowbitejs', get_theme_file_uri("./node_modules/flowbite/dist/flowbite.min.js",[],'3.0.1',false ) );
}
add_action( 'wp_enqueue_scripts','mainStyle');

function supportTheme()
{
    // Menu
    register_nav_menu( 'top_menu', 'Menu Atas');
    add_theme_support( 'custom-logo',);
    add_theme_support( 'post-thumbnails',);
}

add_action( 'after_setup_theme', 'supportTheme');

function postTypeSlide() {
    $labels = array(
        'name'               => 'Slide',
        'singular_name'      => 'Slide',
        'menu_name'          => 'Slide',
        'add_new'            => 'Tambah Slide Baru',
        'add_new_item'       => 'Tambah Slide Baru',
        'edit_item'          => 'Edit Slide',
        'new_item'           => 'Slide Baru',
        'view_item'          => 'Lihat Slide',
        'search_items'       => 'Cari Slide',
        'not_found'          => 'Tidak ditemukan slide',
        'not_found_in_trash' => 'Tidak ditemukan slide di tempat sampah',
        'parent_item_colon'  => 'Induk Slide',
        'all_items'          => 'Semua Slide',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slide' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-index-card',
        'supports'           => array( 'title', 'author', 'thumbnail'),
    );

    register_post_type( 'slide', $args );
}

add_action( 'init', 'postTypeSlide' );
