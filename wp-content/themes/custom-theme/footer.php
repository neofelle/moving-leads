<section class="footer clear footer-a" style="background-color:#d0262b;">
    <div class="container footer-container">
        <div class="col-md-4 footer-content left">
            <h4 class="bold uppercase title">Quick Links</h4>
            <?php 
                $menuargs = array(
                    "theme_location" => "primary",
                    "menu_class" => "s-menu",
                    "menu_id" => "footer-a",
                );
                $footer_items = wp_get_nav_menu_items( 'footer-a', $menuargs); 
            ?>
            <?php foreach( $footer_items as $i ){ ?>           
               <a href="<?php echo $i->url; ?>"><p><?php echo $i->title; ?></p></a>
            <?php } ?> 

        </div>
        <div class="col-md-4 footer-content left">
            <h4 class="bold uppercase title">services</h4>
            <?php                   
                $header_number    = $GLOBALS['cgv']['default-contact-number'];
                $cf_header_number = get_post_meta($post->ID, 'header_contact_number', true);                    
                if( $cf_header_number != "" ){
                    $header_number = $cf_header_number;
                }
            ?>
            <p>PHONE : <?php echo $header_number; ?></p>
            <p>EMAIL : enquiries@OnlineMoving.com</p>
            <br class="clear">
            <div class="col-md-12 social-media no-space">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
              <?php endif; ?>
            </div>
        </div>
        <div class="col-md-4 footer-content left" style="border-right: none !important;">
            <h4 class="bold uppercase title">SEND US A MESSAGE</h4>
             <div class="form no-space" style="position: relative;">
                <div class="col-md-12 no-space">
                    <?php echo do_shortcode( '[contact-form-7 id="38" title="Contact form 1"]' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #ffffff;">
  <div class="container" style="padding-top: 10px;padding-bottom: 4px;">
    <div class="col-md-12 left center copyright-container" style="padding-top: 25px;padding-bottom: 15px; width: 100%;">
          <p class="copyright lato-regular uppercase" style="color: #34495e;font-weight: 400;font-size: 15px;">Copyright © 2017. online moving leads. All rights reserved</p>
    </div>
  </div>
</section>
<?php wp_footer();?>
<!-- jQuery -->
<script src="<?php bloginfo('template_directory'); ?>/assets/bootstrap/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php bloginfo('template_directory'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/owl.carousel.js"></script>
<script>
  $(document).ready(function() {
    $('.owl-1').owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      margin: 10,
      dots: true,
      autoHeight: false
    });

    if ($(window).width() >= 1000) {
        $('.owl-2').owlCarousel({
          items: 3,
          loop: true,
          autoplay: true,
          margin: 10,
          dots: false,
          autoHeight: true
        });
    }
    else if ($(window).width() >= 600){
        $('.owl-2').owlCarousel({
          items: 2,
          loop: true,
          autoplay: true,
          margin: 10,
          dots: false,
          autoHeight: true
        }); 
    }
    else if ($(window).width() >= 200){
        $('.owl-2').owlCarousel({
          items: 1,
          loop: true,
          autoplay: true,
          margin: 10,
          dots: false,
          autoHeight: true
        }); 
    }

  })
</script>
</body>
</html> 