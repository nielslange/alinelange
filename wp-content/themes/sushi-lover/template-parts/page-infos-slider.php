<?php
/**
 * Template to display the information slider page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 *
 * Template Name: Information Slider Page
 */
//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

get_header();
?>

    <div id="infos" class="space">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">

	                <?php if ( have_posts() ) : ?>

		                <?php while ( have_posts() ) : the_post(); ?>

                            <h1><?php the_title(); ?></h1>

                            <?php if ( have_rows('information_slider_entries') ) : ?>
                                <div class="slider hidden-xs">
                                    <?php while ( have_rows('information_slider_entries') ) : the_row(); ?>
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-6 text-right">
                                                    <?php $image = wp_get_attachment_image_src(get_sub_field('information_slider_image'), 'full'); ?>
                                                    <img alt="" src="<?php echo $image[0]; ?>" class="img-responsive">
                                                </div>
                                                <div class="col-sm-6">
                                                    <?php the_sub_field('information_slider_text'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>

                                <div class="visible-xs">
                                    <?php if ( have_rows('information_slider_entries') ) : ?>
                                        <div class="space-top">
                                            <?php while ( have_rows('information_slider_entries') ) : the_row(); ?>
	                                            <?php $image = wp_get_attachment_image_src(get_sub_field('information_slider_image'), 'full'); ?>
                                                <p><img alt="" src="<?php echo $image[0]; ?>" class="img-responsive"></p>
	                                            <?php the_sub_field('information_slider_text'); ?>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
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