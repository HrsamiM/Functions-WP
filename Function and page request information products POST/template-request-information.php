<?php
/**
* Template Name: Request Information Form
*
*/
get_header(); 

/*Global Vars*/
$headingTitle = get_the_title();
$front_site ="https://digitalenterstudio.com/saenz/productos/";

$product_id = sanitize_text_field( $_POST['hrm_product_id'] );
//$product_id = (isset($product_id) ) ? $product_id : '';

if(!$product_id){
	echo ("<script>location.href='".esc_url($front_site)."'</script>");
	die();
}

$productTitle = get_the_title($product_id);

?>

<?php
  	if( has_post_thumbnail() ) {
    	$imageBnnr = get_the_post_thumbnail_url();
  	}
	else {
  		$imageBnnr = get_stylesheet_directory_uri().'/assets/media/bnner-df.jpg';
	}
?>
  
<div class="hero-section" style="background-image: url(<?php echo esc_url( $imageBnnr ); ?>);">
	<div class="container content-box">
		<div class="row">
			<div class="col-12">
				<?php echo '<h1 class="display-5 fw-bold lh-1 mb-3 heading">'.$headingTitle.'</h1>'; ?>
				<span class="text-center hrm-bcshrt"><?php do_shortcode('[breadcrumbs]'); ?></span>
			</div>
		</div>
	</div>
</div>

<div class="container p-4">
    <div class="row boxed-cont-shadow p-4">
        <div class="col-lg-4 col-md-2 col-sm-12">
			<input type="hidden" id="product_title" value="<?php echo esc_attr( $productTitle ); ?>">
			<img class="img-fluid text-center df-img-pdt" alt="<?php echo esc_attr( $productTitle ); ?>" border="0" data-filename="1-4 yard red Rr2.jpg" src="<?php echo esc_url(get_the_post_thumbnail_url( $product_id )) ?>" title="<?php echo $productTitle; ?>">
		</div> 
		<div class="col-lg-8 col-md-10 col-sm-12 df-title-product">                  
			<div class="post-title_product">
				<span class="badge bg-light text-dark pry-label">Nombre del Producto</span>	
            	<h2 class="product_title display-6"><?php echo $productTitle; ?></h2>
            </div>
		</div>	
			<!-- Input -->
			<div class="container mt-4">
				<div class="row input-group request-info pt-4">
					<span class="text-muted pb-3 fw-bold">Ingrese sus comentarios / preguntas y haga clic en Enviar para enviarnos un correo electrónico.</span>
					
					<form class="form-floating">
					<div class="row pb-3">
					<div class="col-lg-2 col-md-4 col-sm-12 input-label text-muted mb-xs-3"><label class="label-name" for="">Nombre Completo*</label></div>
					<div class="col-lg-10 col-md-8 col-sm-12 input-form-text">
						<input type="text" placeholder="Ingrese su nombre" name="nombre_completo" class="hrm_input" required>
					</div>
					</div>

					<div class="row pb-3">
					<div class="col-lg-2 col-md-4 col-sm-12 input-label text-muted mb-xs-3"><label class="label-name" for="">Compañia</label></div>
					<div class="col-lg-10 col-md-8 col-sm-12 input-form-text">
						<input type="text" placeholder="Nombre de la compañia" name="compania" class="hrm_input">
					</div>
					</div>

					<div class="row pb-3">
					<div class="col-lg-2 col-md-4 col-sm-12 input-label text-muted mb-xs-3"><label class="label-name" for="">Correo*</label></div>
					<div class="col-lg-10 col-md-8 col-sm-12 input-form-text">
						<input type="email" placeholder="Ingrese su correo" name="correo" class="hrm_input" required>
					</div>
					</div>

					<div class="row pb-3">
					<div class="col-lg-2 col-md-4 col-sm-12 input-label text-muted mb-xs-3"><label class="label-name" for="">Teléfono*</label></div>
					<div class="col-lg-10 col-md-8 col-sm-12 input-form-text">
						<input type="tel" placeholder="Numero Teléfonico" name="telefono" class="hrm_input" required>
					</div>
					</div>

					<div class="row pb-3">
					<div class="col-lg-2 col-md-4 col-sm-12 input-label text-muted mb-xs-3"><label class="label-name label-txarea"  for="">Mensaje</label></div>
					<div class="col-lg-10 col-md-8 col-sm-12 input-form-text">
						<textarea placeholder="Deje su comentario" name="mensaje" class="hrm_input" row="3" style="height: 100px"></textarea>
					</div>
					</div>

					<div class="col-lg-12 offset-md-4 offset-lg-2"><button type="submit" class="hrm-btnCPT">Enviar Solicitud</button></div>
					</form>
				</div>
			</div>

		</div>

    </div>
</div>

<?php get_footer(); ?>