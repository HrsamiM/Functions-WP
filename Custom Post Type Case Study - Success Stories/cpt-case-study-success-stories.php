<?php
// ----------------------
// Custom Post Types
// ----------------------
function case_study_cpt(){
    $labels = array(
        'name'                  => esc_html__( 'Case Study'),
        'singular_name'         => esc_html__( 'Case Study' ),
        'menu_name'             => esc_html__( 'Case Studies'),
        'name_admin_bar'        => esc_html__( 'Case Study'),
        'archives'              => esc_html__( 'Archive Case Study'),
        'all_items'             => esc_html__( 'All Case Study'),
        'add_new_item'          => esc_html__( 'Add new Case Study'),
        'add_new'               => esc_html__( 'Add Case Study' ),
        'new_item'              => esc_html__( 'New Case Study' ),
        'edit_item'             => esc_html__( 'Edit Case Study' ),
        'update_item'           => esc_html__( 'Update Case Study' ),
        'view_item'             => esc_html__( 'View Case Study'),
        'view_items'            => esc_html__( 'View Case Study' ),
        'search_items'          => esc_html__( 'Search Case Study' ),
        'not_found'             => esc_html__( 'Case Study not Found' ),
        'items_list'            => esc_html__( 'Case Study List' )
    );

    $args = array(
        'label'                 => esc_html__( 'Case Study'),
        'labels'                => $labels,
        'public'                => true,
        'menu_position'         => 25,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt','custom-fields','revisions','page-attributes'),
        'hierarchical'          => true,
        'has_archive'           => true,
        'taxonomies'            => array( 'category', 'post_tag' ),
        'menu_icon'             => 'dashicons-open-folder',
        'rewrite'               =>  array('slug' => 'case-study'),
        'show_in_rest'          => true
    );

    register_post_type( 'case-study', $args );

    register_taxonomy( 'categories', array('case-study'), array(
        'hierarchical' => true, 
        'label' => 'Categories',
        'show_ui' => true,
        'singular_label' => 'Category', 
        'rewrite' => array( 'slug' => 'categories')
    ));

    register_taxonomy_for_object_type( 'categories', 'case-study' );
}
add_action('init', 'case_study_cpt');

function success_stories_cpt(){
    $labels = array(
        'name'                  => esc_html__( 'Success Stories'),
        'singular_name'         => esc_html__( 'Success Story' ),
        'menu_name'             => esc_html__( 'Success Stories'),
        'name_admin_bar'        => esc_html__( 'Success Story'),
        'archives'              => esc_html__( 'Success Stories Archive'),
        'all_items'             => esc_html__( 'All Success Stories'),
        'add_new_item'          => esc_html__( 'Add New Success Story'),
        'add_new'               => esc_html__( 'Add Success Story' ),
        'new_item'              => esc_html__( 'New Success Story' ),
        'edit_item'             => esc_html__( 'Edit Success Story' ),
        'update_item'           => esc_html__( 'Update Success Story' ),
        'view_item'             => esc_html__( 'View Success Story'),
        'view_items'            => esc_html__( 'View Success Stories' ),
        'search_items'          => esc_html__( 'Search Success Story' ),
        'not_found'             => esc_html__( 'No Success Story found' ),
        'items_list'            => esc_html__( 'Success Stories List' )
    );

    $args = array(
        'label'                 => esc_html__( 'Success Story'),
        'labels'                => $labels,
        'public'                => true,
        'menu_position'         => 26,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt','custom-fields','revisions','page-attributes'),
        'hierarchical'          => true,
        'has_archive'           => true,
        'taxonomies'            => array('category', 'post_tag'),
        'menu_icon'             => 'dashicons-smiley',
        'rewrite'               => array('slug' => 'success-stories'),
        'show_in_rest'          => true
    );

    register_post_type( 'success-story', $args );

    register_taxonomy( 'success-category', array('success-story'), array(
        'hierarchical' => true,
        'label' => 'Success Categories',
        'show_ui' => true,
        'singular_label' => 'Success Category', 
        'rewrite' => array( 'slug' => 'success-category')
    ));

    register_taxonomy_for_object_type( 'success-category', 'success-story' );
}
add_action('init', 'success_stories_cpt');