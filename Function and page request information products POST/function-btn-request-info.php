<?php
//Function BTN Request Information method POST

function my_extra_button_on_product_page() {
  global $product;
  echo '<form action="'.esc_url(get_bloginfo("url")).'/informacion" method="post">
            <input type="hidden" name="hrm_product_id" value="'.esc_attr(get_the_ID()).'">
            <input style="background-color: #002E5D; width: 100%; color:#FFF;" type="submit" class="request_information hrm-btnCPT" value="Solicitar Información">
        </form>';
}
add_shortcode( 'btn_request_shortc', 'my_extra_button_on_product_page' );
?>