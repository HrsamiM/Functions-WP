<?php 

/*Single Post Type List Function*/
function get_custom_post_type_template($single_template) {
    global $post;

    if ($post->post_type == 'home-profolio-list'){
         $single_template = dirname( __FILE__ ) . '/template-parts/single-post-type.php';
    }
       elseif($post->post_type == 'web_projects'){
           $single_template = dirname( __FILE__ ) . '/template-parts/single-post-type-wp.php';
       }

    return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );
/*End Function Posttype*/

?>