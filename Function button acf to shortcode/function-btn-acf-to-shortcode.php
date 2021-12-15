<?php
//Function LNK descargar manual ACF button
function manual_button_on_product_page() {
	$manual = get_field('pdf_download');
	echo '<a href="'.esc_url($manual).'" target="_blank"> <button type="button" class="hrm-btnCPT">Descargar Manual</button></a>';
}
add_shortcode( 'btn_manual_shortc', 'manual_button_on_product_page' );
?>
