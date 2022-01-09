<?php 

//FUNCTIONS ICONS BENEFITS BOXES

  function benefits_boxes_hm( $atts ){
    ob_start();
    extract( shortcode_atts( array (
      'category' => ''
  ), $atts ) );

    $args = array(
       'post_type' => 'service-box',
       'posts_per_page' => 4,
       'order' => 'ASC',
       'category_name' => $category
   );
   
   $the_query = new WP_Query( $args ); ?>
       <?php if ( $the_query->have_posts() ) : ?>
           <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
           <div class="col-6 wd-100-mv my-2">
               <div class="card cardnobr h-100 mx-2 border border-1">
                   <div class="card-icon-box">
                      <?php the_field('select_to_icon_cpt'); ?>
                   </div>
               <div class="card-body">
                   <h3><?php the_title(); ?></h3>
                   <p><?php the_excerpt(); ?></p>                
               </div>
           </div>
       </div>
       <?php endwhile; ?>
       <?php wp_reset_postdata(); ?>
       <?php endif;
   }
   add_shortcode('shrt_bnfts_bxs','benefits_boxes_hm');

  //END FUNCTION ICONS BENEFITS BOXES
  //

?>