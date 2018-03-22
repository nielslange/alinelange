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
?>

    <div id="infos" class="space">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
					<?php if ( have_posts() ) : ?>
	                    <?php while ( have_posts() ) : the_post(); ?>
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
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