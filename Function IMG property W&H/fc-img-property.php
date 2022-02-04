//IMAGE PROPERTY FUNCTION
<?php
  function add_img_size($content){
    $pattern = '/<img [^>]*?src="(https?:\/\/[^"]+?)"[^>]*?>/iu';
    preg_match_all($pattern, $content, $imgs);
    foreach ( $imgs[0] as $i => $img ) {
      if ( false !== strpos( $img, 'width=' ) && false !== strpos( $img, 'height=' ) ) {
        continue;
      }
      $img_url = $imgs[1][$i];
      $img_size = @getimagesize( $img_url );
        
      if ( false === $img_size ) {
        continue;
      }
      $replaced_img = str_replace( '<img ', '<img ' . $img_size[3] . ' ', $imgs[0][$i] );
      $content = str_replace( $img, $replaced_img, $content );
    }
    return $content;
  }
  add_filter('the_content','add_img_size');
  ?>
  //END FUNCTION IMAGE PROPERTY