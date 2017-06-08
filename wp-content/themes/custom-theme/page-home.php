<?php
/**
Template Name: Homepage
 */
?>
<?php get_header(); ?>
<section class="slider clear" style="position: relative;bottom: 51px;">
    <div class="large-12 columns">
        <?php 
            $slider_data = $wpdb->get_results("SELECT  meta_value FROM wp_postmeta WHERE post_id =31 AND meta_key ='nivo_settings' LIMIT 1"); 
            $slider_settings   = unserialize($slider_data[0]->meta_value);
            $slider_images_ids = $slider_settings['manual_image_ids'];
            $slider_images     = $wpdb->get_results("SELECT  guid, post_excerpt FROM wp_posts WHERE id IN(" . $slider_images_ids . ")");                
        ?>
        <div class="owl-carousel owl-1 owl-theme">
            <?php foreach( $slider_images as $i ){ ?>
               <div class="item slider-bg" style="height:550px;display: block;background-size:cover;background-image: url('<?php echo $i->guid; ?>')">   
                    <div class="container owl-slider owl-content">
                        <div class="row banner center">
                          <?php echo $i->post_excerpt; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>  
<section class="content-1 clear" style="padding-top: 10px;">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-1') ) : ?>
      <?php endif; ?>
</section>
<section class="content-2 clear" style="padding-top: 60px;background-image: url('<?php echo get_template_directory_uri() . "/assets/images/home/bg-content-1.png"; ?>');background-size: cover;background-position: center;">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-2') ) : ?>
      <?php endif; ?>
</section>
<section class="content-3 clear" style="padding-top:60px;">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('page-1') ) : ?>
      <?php endif; ?>
</section>
<section class="testimonial clear" style="padding-top: 60px;background-image: url('<?php echo get_template_directory_uri() . "/assets/images/home/bg-content-2.png"; ?>');background-size: cover;background-position: center;">
    <div class="container content home">
       <h2 class="uppercase lato-black color-white">WHAT MOVERS ARE SAYING ABOUT US</h2>
        <?php $testimonials = $wpdb->get_results("SELECT  ID, post_content, post_title FROM wp_posts WHERE post_type = 'wpm-testimonial' LIMIT 5");  ?>
        <div class="row" style="margin-top:80px !important;padding-bottom:60px;">
          <div class="owl-carousel owl-2 owl-theme">
          <?php foreach( $testimonials as $t ){ $client_name = ""; $company_name = ""; $client_email = ""; $client_website = ""; ?>
                  <?php 
                      //Get Post Meta
                      $testimonial_meta  = $wpdb->get_results("SELECT  meta_key, meta_value, post_id FROM wp_postmeta WHERE post_id =" . $t->ID . " AND (meta_key ='client_name' OR meta_key ='company_name' OR meta_key ='email' OR meta_key ='company_website' OR meta_key ='_thumbnail_id')");         
                      $uploads           = wp_upload_dir(); 
                      $testimonial_image = "";

                  ?>
                  <?php foreach( $testimonial_meta as $tm ){  ?>
                      <?php 
                          if( $tm->meta_key == 'client_name' ){
                              $client_name = $tm->meta_value;
                          }elseif( $tm->meta_key == 'email'  ){
                              $client_email = $tm->meta_value;
                          }elseif( $tm->meta_key == 'company_name' ){
                              $company_name = $tm->meta_value;
                          }elseif( $tm->meta_key == 'company_website' ){
                              $client_website = $tm->meta_value;
                          }elseif( $tm->meta_key == '_thumbnail_id' ){
                              $thumb_meta_id = $tm->meta_value;
                              $testimonial_thumb_meta = $wpdb->get_results("SELECT  post_id, meta_key, meta_value FROM wp_postmeta WHERE post_id =" . $thumb_meta_id );
                              foreach( $testimonial_thumb_meta as $thumb ){
                                  if( $thumb->meta_key == '_wp_attached_file' ){
                                      $testimonial_image = $uploads['baseurl'] . "/" . $thumb->meta_value;        
                                  }
                              }
                              
                          }
                      ?>
                  <?php } ?>                   
                  <div class="item testimonial-container testimonial"> 
                    <div class="quote-box">                           
                      <p class="color-blue"><?php echo $t->post_content;?></div>
                    <img style="width: 46px;height: 29px;position: relative;left:18px;bottom:5px;" src="<?php echo get_template_directory_uri() . "/assets/images/home/arrow-down.png"; ?>">
                    <h2 class="color-white"><?php echo $client_name; ?></h2>
                    <h3 class="color-white"><?php echo $company_name; ?></h3>
                  </div>                
          <?php } ?>
           </div>
         </div>
    </div>
</section>
<section class="content-4 clear" style="padding-top:60px;padding-bottom: 60px;">
  <div class="container home">
      <h2 class="uppercase lato-black color-blue">HOW IT WORKS</h2>
      <div class="col-md-12 no-space" style="padding: 25px;">
        
        <div class="col-sm-6 service-block no-space left">
          <div class="col-sm-4 no-space left service">
            <img style="max-width: 250px;"" class="cover left" src="<?php echo get_template_directory_uri() . "/assets/images/home/icon-content-1.png"; ?>">
          </div>
          <div class="col-sm-6 left service" style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right: 20px;">
            <h3>Web Design</h3>
            <p>Do eiusmod tempor incididunt ut labore et dolore magna</p>
          </div>
        </div>

        <div class="col-sm-6 service-block no-space left">
          <div class="col-sm-4 no-space left service">
            <img style="max-width: 250px;"" class="cover left" src="<?php echo get_template_directory_uri() . "/assets/images/home/icon-content-2.png"; ?>">
          </div>
          <div class="col-sm-6 left service" style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right: 20px;">
            <h3>SEO</h3>
            <p>Do eiusmod tempor incididunt ut labore et dolore magna</p>
          </div>
        </div>

        <div class="col-sm-6 service-block no-space left">
          <div class="col-sm-4 no-space left service">
            <img style="max-width: 250px;"" class="cover left" src="<?php echo get_template_directory_uri() . "/assets/images/home/icon-content-3.png"; ?>">
          </div>
          <div class="col-sm-6 left service" style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right: 20px;">
            <h3>PPC</h3>
            <p>Do eiusmod tempor incididunt ut labore et dolore magna</p>
          </div>
        </div>


        <div class="col-sm-6 service-block no-space left">
          <div class="col-sm-4 no-space left service">
            <img style="max-width: 250px;"" class="cover left" src="<?php echo get_template_directory_uri() . "/assets/images/home/icon-content-4.png"; ?>">
          </div>
          <div class="col-sm-6 left service" style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right: 20px;">
            <h3>Pay Per Lead</h3>
            <p>Do eiusmod tempor incididunt ut labore et dolore magna</p>
          </div>
        </div>

      </div>
      <br class="clear"><br class="clear">
      <div class="col-md-12 center">
        <a class="callback-button" href="#">REQUEST A CALLBACK</a>
      </div>
  </div>
</section>
<?php get_footer(); ?>