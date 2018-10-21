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
                            <?php the_content(); ?>

		                    <?php if ( have_rows('faqs') ): ?>

                                <?php print( '<hr><h3>FAQs</h3>' ); ?>

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">

                                    <?php while ( have_rows('faqs') ) : the_row(); ?>

                                    <?php $id = substr( md5( get_sub_field( 'question' ) ), 0, 5 ); ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading_<?php echo $id; ?>">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $id; ?>">
	                                                <?php the_sub_field( 'question' ); ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $id; ?>">
                                            <div class="panel-body">
	                                            <?php the_sub_field( 'answer' ); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endwhile; ?>

                                </div>

                            <?php endif; ?>







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