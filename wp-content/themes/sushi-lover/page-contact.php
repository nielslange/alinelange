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
                    <p><a href="#infos" id="more" style="z-index: 100;"><i class="fa-2x fas fa-chevron-down"></i></a></p>
                </div>
                <div class="col-sm-4">
                    <?php

                    //* STAY CONNECTED
                    printf('<h3>%s</h3>', get_field('contact_connected_title'));
                    printf('<p>Mail an: <a href="mailto:%1$s">%1$s</a></br>', get_field('contact_connected_email'));
                    printf('Call me: <a href="tel:%1$s">%1$s</a></p>', get_field('contact_connected_phone'));
                    printf('<p><a href="#" data-toggle="modal" data-target=".newsletter-popup">%s</a></p>', get_field('contact_connected_newsletter_cta'));

                    //* SOCIAL MEDIA
                    printf('<h3>%s</h3>', get_field('contact_social_title'));
                    while ( have_rows('contact_social_links') ) {
                        the_row();
	                    printf('<a href="%1$s" class="social-link"><span class="screen-reader-text">%1$s</span></a> ', get_sub_field('contact_social_link'));
                    }

                    //* CURRENT LOCATION
                    printf('<h3>%s</h3>', get_field('contact_location_title'));
                    printf('<p>%s</p>', get_field('contact_location_entry'));

                    //* FEARLESS LOGO
                    print('<br><a href="https://www.fearlessphotographers.com/photographers.cfm?photogID=1347&aline-lange"><img src="'. get_stylesheet_directory_uri() . '/images/fearlesswhite.jpg" alt="Fearless photograper Aline Lange" class="img-responsive"></a>');

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

    <?php if ( get_field('contact_connected_newsletter_title') && get_field('contact_connected_newsletter_form') ) : ?>
    <div class="modal fade newsletter-popup" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php the_field('contact_connected_newsletter_title'); ?></h4>
                </div>
                <div class="modal-body">
	                <?php echo do_shortcode(get_field('contact_connected_newsletter_form')); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php get_footer(); ?>