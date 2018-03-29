<?php
/**
 * Template to display the contact page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 *
 * Template Name: Contact Page
 */
//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

//* Prepare variables
$hero_image = wp_get_attachment_image_url(get_field('contact_hero_image'), 'full');

get_header();

?>

    <div id="hero" style="background-image: url(<?php print($hero_image); ?>);" class="space">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php the_field('contact_text') ?>
                </div>
                <div class="col-sm-4">
                    <?php

                    //* STAY CONNECTED
                    printf('<h3>%s</h3>', get_field('contact_connected_title'));
                    printf('<p><i class="fas fa-envelope fa-fw"></i> <a href="mailto:%1$s">%1$s</a><br>', get_field('contact_connected_email'));
                    printf('<i class="fas fa-phone fa-fw"></i> <a href="tel:%1$s">%1$s</a></p>', get_field('contact_connected_phone'));

                    //* SOCIAL MEDIA
                    printf('<h3>%s</h3>', get_field('contact_social_title'));
                    while ( have_rows('contact_social_links') ) {
                        the_row();
	                    printf('<a href="%1$s" class="social-link"><span class="screen-reader-text">%1$s</span></a> ', get_sub_field('contact_social_link'));
                    }

                    //* CURRENT LOCATION
                    printf('<h3>%s</h3>', get_field('contact_location_title'));
                    printf('<p>%s</p>', get_field('contact_location_entry'));

                    ?>
                </div>
            </div>
        </div>
    </div>


    <div id="infos" class="space">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <?php echo do_shortcode('[gravityform id="1" title="true" description="true"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <!--
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
    -->

<?php get_footer(); ?>