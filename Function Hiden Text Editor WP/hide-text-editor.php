<?php
//In All Pages General
//Function Hiden Text Editor
add_action('init', 'my_remove_editor_from_post_type');
function my_remove_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
}
//End Function



//Function Specific Templates.php
//Function Hiden Text Editor

add_action( 'admin_init', 'hide_editor' );

  function hide_editor() {
  
          // Get the Post ID.
          if ( isset ( $_GET['post'] ) )
          $post_id = $_GET['post'];
          else if ( isset ( $_POST['post_ID'] ) )
          $post_id = $_POST['post_ID'];
  
      if( !isset ( $post_id ) || empty ( $post_id ) )
          return;
  
      // Get the name of the Page Template file.
      $template_file = get_post_meta($post_id, '_wp_page_template', true);
  
      if($template_file == 'front-page.php' || $template_file == 'what-is-alpha.php' || $template_file == 'insights.php' || $template_file == 'services.php' || $template_file == 'talk-alpha.php' || $template_file == 'team.php' || $template_file == 'vision-mission.php'){ // edit the template name
          remove_post_type_support('page', 'editor');
      }
  
  }

//End

?>