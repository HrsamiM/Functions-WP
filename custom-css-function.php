<?php
//Add My Style File CSS
function my_style_template(){
    wp_enqueue_style( 'style-template', get_stylesheet_directory_uri() . '/assets/css/style-template.css' );
}
add_action( 'wp_enqueue_scripts', 'my_style_template',5 );
//End MyStyle Function

//Font Awesome Icons Function
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

function enqueue_load_fa() {
wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}

?>
