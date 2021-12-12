<?php
//Function LNK descargar manual
function manual_button_on_product_page() {
  $manual = get_field('pdf_download');
 echo '<a href='.$manual.'> <button type="button" class="btn-descargas">Descargar Manual</button></a>';
}
add_shortcode( 'btn_manual_shortc', 'manual_button_on_product_page' );
?>