<?php
// ----------------------
// Custom Post Type: Careers
// ----------------------
function careers_cpt() {

    $labels = array(
        'name'               => esc_html__( 'Careers' ),
        'singular_name'      => esc_html__( 'Career' ),
        'menu_name'          => esc_html__( 'Careers' ),
        'name_admin_bar'     => esc_html__( 'Career' ),
        'archives'           => esc_html__( 'Career Archives' ),
        'all_items'          => esc_html__( 'All Careers' ),
        'add_new_item'       => esc_html__( 'Add New Career' ),
        'add_new'            => esc_html__( 'Add Career' ),
        'new_item'           => esc_html__( 'New Career' ),
        'edit_item'          => esc_html__( 'Edit Career' ),
        'update_item'        => esc_html__( 'Update Career' ),
        'view_item'          => esc_html__( 'View Career' ),
        'search_items'       => esc_html__( 'Search Careers' ),
        'not_found'          => esc_html__( 'No Careers Found' ),
        'items_list'         => esc_html__( 'Careers List' )
    );

    $args = array(
        'label'              => esc_html__( 'Careers' ),
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 25,
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'revisions',
            'page-attributes'
        ),
        'hierarchical'       => false,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-businessperson',
        'rewrite'            => array( 'slug' => 'careers' ),
        'show_in_rest'       => true
    );

    register_post_type( 'career', $args );

    // ----------------------
    // Taxonomy: Job Location
    // ----------------------
    register_taxonomy( 'job-location', array( 'career' ), array(
        'hierarchical' => true,
        'labels' => array(
            'name'          => esc_html__( 'Job Locations' ),
            'singular_name' => esc_html__( 'Job Location' ),
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array(
            'slug' => 'job-location'
        ),
        'show_in_rest' => true
    ));

    register_taxonomy_for_object_type( 'job-location', 'career' );
}

add_action( 'init', 'careers_cpt' );
