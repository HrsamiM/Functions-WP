<?php
//Function Menu Shortcode 

function custom_menu_shortcode($atts) {
  $atts = shortcode_atts(array(
      'name' => '', // Nombre del menú por defecto vacío
  ), $atts);

  // Obtener el nombre del menú del atributo 'name' del shortcode
  $menu_name = $atts['name'];

  // Obtener los elementos del menú
  $menu_items = wp_get_nav_menu_items($menu_name);

  if (!$menu_items)
      return false;

  // Construir el HTML del menú con tu propio formato
  $menu_html = '<ul class="foo-menu">';

  foreach ($menu_items as $menu_item) {
      $menu_html .= '<li><i class="fa fa-chevron-right bficons" aria-hidden="true"></i><a href="' . esc_url($menu_item->url) . '">' . esc_html($menu_item->title) . '</a></li>';
  }

  $menu_html .= '</ul>';

  return $menu_html;
}

add_shortcode('menu', 'custom_menu_shortcode');

//End Function [menu name="main-menu"]
//