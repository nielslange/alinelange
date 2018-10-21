<?php
/**
 * Template to display the information page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 *
 * Template Name: Information Page
 */
//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

get_header();

$banner = get_the_post_thumbnail_url( get_queried_object_id(), full );

if ( $banner ) {
    printf( '<img src="%s" alt="aline lange FOTOGRAFIE" style="width:100%%;">', $banner );
}

?>
    <div id="infos" class="space">
        <div class="container">

            <div class="row">
                <div class="col-sm-9">
					<?php if ( have_posts() ) : ?>
	                    <?php while ( have_posts() ) : the_post(); ?>
                            <h1><?php the_title(); ?></h1>
                            <?php

                            the_content();

		                    if ( have_rows('faqs') ):

			                    print( '<hr><h3>FAQs</h3>' );

                                while ( have_rows('faqs') ) : the_row();
                                    printf( '<h4>%s</h4>', get_sub_field('question') );
	                                the_sub_field( 'answer' );
                                endwhile;

                             endif;

                            ?>
		                <?php endwhile; ?>
					<?php endif; ?>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-3">
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>