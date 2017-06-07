<?php
/**
Template Name: Blog
 */
?>
<style>
.entry-content p{
    text-align: left !important;
}
</style>
<?php get_header(); ?>
<section class="page-section">
    <div class="col-md-12 no-space" style="background-color: white;">
        <div class="container page-content">
            <h1><?php the_title();?></h1>
            <br>
            <div class="col-md-12 no-space left">
                <div class="blog-section">
                    <?php                
                        $args=array(  'category' => 3,  'post_status' => 'publish',  'posts_per_page' => 5,  'caller_get_posts'=> 1);
                         
                        $the_query = new WP_Query( $args );
                         
                        if ( $the_query->have_posts() ) {                    
                        while ( $the_query->have_posts() ) {                    
                        $the_query->the_post();
                    ?>            
                        <div class="col-md-12 clear service-page-block" style="margin-bottom: 25px;">
                                    <div class="col-md-3 left pull-left">
                                        <?php 
                                        $image = "";
                                    
                                        if (has_post_thumbnail( $post->ID ) ){
                                            $a_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
                                            $image = $a_image['0'];
                                        }else{
                                            $upload_dir = wp_upload_dir(); 
                                            $image = $upload_dir['baseurl'] . "/2017/05/logo.png";
                                        }
                                        ?>
                                        <img style="width: 95%;" src="<?php echo $image; ?>">
                                    </div>
                                    <div class="col-md-9 left page-description" style="padding-top:5px;padding-right: 25px;">
                                        <h2 style="margin-bottom: 0px;"><?php echo get_the_title(); ?></h2>
                                        <p class="date"><?php echo date('F d, Y',strtotime($post->post_date)); ?></p>
                                        <p><?php echo the_excerpt(); ?></p>
                                         <a class="read-more        " href="<?php echo get_permalink(); ?>">Read More <i class="fa fa-angle-double-right r-icon" aria-hidden="true"></i></a>
                                    </div>
                             
                        </div>   
                         <br class="clear"><br class="clear">       
                    <?php
                        }
                        } else {
                        // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();         
                    ?>
                </div>   

            </div>
            
        </div>
    </div>
 </section>
<?php get_footer(); ?>