<?php get_header(); ?>
<br class="clear" /><br/> 
<section class="page-section">
    <div class="container">
        <div class="col-md-12 left page-content">
            <h1 class="uppercase title"><?php the_title();?></h1>
            <br>
            <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/page/content', 'page' );
                    the_content();
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.


            ?>
        </div>
    </div>
 </section>
<?php get_footer(); ?>