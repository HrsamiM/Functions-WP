<?php


//My jQuery function Autoscroll

function hrm_autoscroll_jq(){
    ?>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
      <script>
      jQuery(document).ready(function(){
        jQuery('.carrusel').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          arrows: false,
          dots: false,
          centerPadding: '1px',
          autoplaySpeed: 3000,

            responsive: [
            {
              breakpoint: 1025,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '20px',
                slidesToShow: 2
              }
            },
              {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '20px',
                    slidesToShow: 1
                  }
              }
            ]

        });
      });
      </script>
    <?php
  }

  add_action('wp_footer','hrm_autoscroll_jq');

  //End Function jQuery



//Add My Style File CSS
  function my_style_template(){
    wp_enqueue_style('slick-css','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
  }
add_action( 'wp_enqueue_scripts', 'my_style_template',5 );
//End MyStyle Function

<?