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
                          <h1 class="color-white lato-regular uppercase">Attention Movers! <br/> Need More Movings Jobs?</h1>                             
                          <p>We help moving companies get more business.</p>                             
                          <a href="#">TALK TO US</a>
                          <?php echo $i->post_excerpt; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>  
<section class="content-1 clear" style="padding-top: 10px;">
  <div class="container home center">
      <h2 class="uppercase lato-black color-blue">WHAT WE DO</h2>
      <br/>
      <p class="lato-regular color-blue">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.  Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
      <br/>
      <ul style="list-style-position: inside;">
        <li class="color-blue">Aenean sollicitudin, lorem quis bibendum auctor.</li>
        <li class="color-blue">Nisi elit consequat ipsum, nec sagittis sem nibh id elit.</li>
        <li class="color-blue">Duis sed odio sit amet nibh vulputate cursus.</li>
      </ul>
  </div>
</section>
<section class="content-2 clear" style="padding-top: 60px;background-image: url('http://localhost/luke/git/online-moving-leads/wp-content/themes/custom-theme/assets/images/home/bg-content-1.png');background-size: cover;background-position: center;">
  <div class="container home center">
      <h2 class="uppercase lato-black color-white">HOW WE DO IT</h2>
      <br/>
      <p class="lato-regular color-white">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.  Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
      <br/>
      <ul style="list-style-position: inside;">
        <li class="color-white">Aenean sollicitudin, lorem quis bibendum auctor.</li>
        <li class="color-white">Nisi elit consequat ipsum, nec sagittis sem nibh id elit.</li>
        <li class="color-white">Duis sed odio sit amet nibh vulputate cursus.</li>
      </ul>
  </div>
</section>
<section class="content-3 clear" style="padding-top:60px;">
  <div class="container home center">
      <h2 class="uppercase lato-black color-blue">WHO WE ARE</h2>
      <br/>
      <p class="lato-regular color-blue">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.  Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
      <br/>
      <ul style="list-style-position: inside;">
        <li class="color-blue">Aenean sollicitudin, lorem quis bibendum auctor.</li>
        <li class="color-blue">Nisi elit consequat ipsum, nec sagittis sem nibh id elit.</li>
        <li class="color-blue">Duis sed odio sit amet nibh vulputate cursus.</li>
      </ul>
  </div>
</section>
<section class="testimonial clear" style="padding-top: 60px;background-image: url('http://localhost/luke/git/online-moving-leads/wp-content/themes/custom-theme/assets/images/home/bg-content-2.png');background-size: cover;background-position: center;">
    <div class="container content home">
       <h2 class="uppercase lato-black color-white">WHAT MOVERS ARE SAYING ABOUT US</h2>
      
        <div class="row" style="margin-top:80px !important;padding-bottom:60px;">
          <div class="owl-carousel owl-2 owl-theme">

                  <div class="item testimonial-container testimonial"> 
                    <div class="quote-box">                           
                      <p class="color-blue">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                    </div>
                    <img style="width: 46px;height: 29px;position: relative;left:18px;bottom:5px;" src="<?php echo get_template_directory_uri() . "/assets/images/home/arrow-down.png"; ?>">
                    <h2 class="color-white">Jon Snow</h2>
                    <h3 class="color-white">Golden Online Moving</h3>
                  </div>

           </div>
         </div>
    </div>
</section>

<?php get_footer(); ?>