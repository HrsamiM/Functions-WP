  <?php
  //Funtion Start Rating Reviews
  function star_rating_shortcode($atts) {
    // Establece valor por defecto en 0 si no se pasa el atributo
    $atts = shortcode_atts(array(
        'porcent' => 0
    ), $atts);

    // Sanitiza el valor y lo limita entre 0 y 100
    $percent = max(0, min(100, intval($atts['porcent'])));

    // Devuelve el HTML con la variable CSS personalizada
    return '<div class="star-rating" style="--rating-percent: ' . $percent . '%;"></div>';
}
add_shortcode('star-rating', 'star_rating_shortcode');
//End Funtion Start Rating
//Shortcode:  [star-rating porcent=90]
?>
