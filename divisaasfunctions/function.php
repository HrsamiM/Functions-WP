<?php

function hrm_load_snnipet(){ 
    ?>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".services-swiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,

        autoplay: {
            delay: 8000,
            disableOnInteraction: false,
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        /*pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },*/

        breakpoints: {
            0: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            }
          }
        });
    });
    </script>

    <?php
}


//Function Menu Shortcode 
function custom_menu_shortcode($atts) {
  $atts = shortcode_atts(array(
      'name' => '', // Default menu name is empty
  ), $atts);

  // Get the menu name from the ‘name’ attribute of the shortcode
  $menu_name = $atts['name'];

  // Get the menu items
  $menu_items = wp_get_nav_menu_items($menu_name);

  if (!$menu_items)
      return false;

  // Build the menu's HTML using your own formatting
  $menu_html = '<ul class="foo-menu">';

  foreach ($menu_items as $menu_item) {
      $menu_html .= '<li><i class="bi bi-arrow-right bficons" aria-hidden="true"></i><a href="' . esc_url($menu_item->url) . '">' . esc_html($menu_item->title) . '</a></li>';
  }

  $menu_html .= '</ul>';

  return $menu_html;
}

add_shortcode('menu', 'custom_menu_shortcode');

//End Function [menu name="main-menu"]
//

// ----------------------
// Dual BTN Function [ciw_dual_buttons]
// ----------------------
function ciw_dual_buttons_shortcode() {

    ob_start(); ?>

    <div class="ciw-dual-buttons mt2">

        <!-- Botón Estimate -->
        <a href="/contact-us/" class="ciw-btn ciw-btn-estimate">
            Get a Free Estimate
        </a>

        <!-- Botón Call -->
        <a href="#" class="ciw-btn ciw-btn-call btncall">
            Call Now
        </a>

    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('ciw_dual_buttons', 'ciw_dual_buttons_shortcode');


// ----------------------
// Custom Post Types Hide
// ----------------------
function subservices_cpt() {

    register_post_type('subservice', array(
        'labels' => array(
            'name' => 'Sub Services',
            'singular_name' => 'Sub Service'
        ),
        'public' => false,
        'show_ui' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-screenoptions'
    ));

    register_taxonomy('service_category', 'subservice', array(
        'label' => 'Service Categories',
        'hierarchical' => true,
        'show_ui' => true
    ));
}
add_action('init', 'subservices_cpt');

// ----------------------
// Metabox
// ----------------------
function subservice_metabox() {
    add_meta_box(
        'subservice_fields',
        'Sub Service Info',
        'subservice_fields_callback',
        'subservice',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'subservice_metabox');

function subservice_fields_callback($post) {
    $excerpt = get_post_meta($post->ID, '_excerpt', true);
    ?>

    <p>
        <label>Excerpt</label><br>
        <textarea name="sub_excerpt" style="width:100%;"><?php echo esc_textarea($excerpt); ?></textarea>
    </p>

    <p>
        <label>Button URL</label><br>
        <?php
            $link = get_post_meta($post->ID, '_link', true);
                if (empty($link)) {
                    $link = '/contact-us/';
                }
        ?>
        <input type="text" name="sub_link" value="<?php echo esc_attr($link); ?>" style="width:100%;">
    </p>

    <?php
}
// ----------------------
// Save Data CPT
// ----------------------
function save_subservice_meta($post_id) {

    if (array_key_exists('sub_excerpt', $_POST)) {
        update_post_meta($post_id, '_excerpt', $_POST['sub_excerpt']);
    }
    if (array_key_exists('sub_link', $_POST)) {
        update_post_meta($post_id, '_link', esc_url_raw($_POST['sub_link']));
    }

}
add_action('save_post', 'save_subservice_meta');


// ----------------------
// ShortCodes [services_carousel category="seo"]
// ----------------------
function services_carousel_shortcode($atts) {

    $atts = shortcode_atts(array(
        'category' => ''
    ), $atts);

    $args = array(
        'post_type' => 'subservice',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'service_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        )
    );

    $query = new WP_Query($args);
    $total_posts = $query->post_count;
    ob_start();

    if ($query->have_posts()) {

        ?>
    <div class="carousel-wrapper">

    <div class="swiper services-swiper <?php echo ($total_posts <= 2) ? 'few-items' : ''; ?>">
        <div class="swiper-wrapper">
            <?php while ($query->have_posts()) : $query->the_post(); 
            $excerpt = get_post_meta(get_the_ID(), '_excerpt', true);
            $link = get_post_meta(get_the_ID(), '_link', true); ?> 
                <div class="swiper-slide"> 
                        <div class="service-card"> 
                            <div class="img-svcard">
                                <?php if (has_post_thumbnail()) : ?> 
                                <?php the_post_thumbnail('full'); ?> 
                            </div>

                            <div class="info-svcard">
                                <?php endif; ?> <h3><?php the_title(); ?></h3> 
                                    <p class="mb2"><?php echo esc_html($excerpt); ?></p> 
                                <?php if ($link) : ?>
                                    <a href="<?php echo esc_url($link); ?>" class="btn-contact">Contact Us</a>
                                <?php endif; ?>
                            </div>
                        </div> 
                </div> 
            <?php endwhile; ?>
        </div>
    </div>

        <!-- arrows OUTSIDE -->
        <?php if ($total_posts > 3): ?>
            <!-- arrows OUTSIDE -->
            <div class="swiper-button-prev custom-arrow">
                <i class="bi bi-arrow-left-square-fill"></i>
            </div>

            <div class="swiper-button-next custom-arrow">
                <i class="bi bi-arrow-right-square-fill"></i>
            </div>
        <?php endif; ?>
    </div>
<?php

    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('services_carousel', 'services_carousel_shortcode');

// ----------------------
// View Port Function
// ----------------------
function fix_viewport_meta() {
    remove_action('wp_head', 'et_add_viewport_meta');
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
}
add_action('wp_head', 'fix_viewport_meta', 1);
