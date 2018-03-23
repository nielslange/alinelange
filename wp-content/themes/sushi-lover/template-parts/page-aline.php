<?php
/**
 * Template to display the about page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 *
 * Template Name: About Page
 */

//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

//* Prepare variables
$homepage_id = get_option( 'page_on_front' );
$text        = get_field( 'home_intro_text', $homepage_id );
$link_url    = get_field( 'home_intro_link_url', $homepage_id );
$link_text   = get_field( 'home_intro_link_text', $homepage_id );

get_header();
?>

<div id="infos" class="space">
    <div class="container">

        <div class="your-class hidden-xs">
            <div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-2 text-right">
                            <?php the_field('home_aline_text', $homepage_id); ?>
                        </div>
                        <div class="col-sm-6">
                            <?php $image_aline  = wp_get_attachment_image_src(get_field('home_aline_image', $homepage_id), 'medium'); ?>
                            <p><img alt="" src="<?php echo $image_aline[0]; ?>" class="img-responsive"></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ( have_rows('home_aline_facts_items', $homepage_id) ) : ?>
                <div>
                    <div class="row">
                        <?php $i = 1; while ( have_rows('home_aline_facts_items', $homepage_id) ) : the_row(); ?>
                            <?php $image = wp_get_attachment_image_src(get_sub_field('home_aline_facts_item_icon', $homepage_id), 'thumb'); ?>
                            <div class="col-sm-6 col-md-4 col-xs-12">
                                <img alt="" src="<?php echo $image[0]; ?>" class="icon pull-left"> <?php the_sub_field('home_aline_facts_item_text', $homepage_id); ?>
                            </div>
                            <div class="clearfix visible-xs-block">&nbsp;</div>

                            <?php if ( $i %2 == 0 ) : ?>
                                <div class="clearfix visible-sm-block">&nbsp;</div>
                            <?php endif; ?>

                            <?php if ( $i %3 == 0 ) : ?>
                                <div class="clearfix visible-md-block visible-lg-block">&nbsp;</div>
                            <?php endif; ?>

                            <?php $i++; endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( get_field('home_aline_video', $homepage_id) ) : ?>
                <div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php the_field('home_aline_video', $homepage_id); ?>"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <div class="visible-xs">
            <?php $image_aline  = wp_get_attachment_image_src(get_field('home_aline_image', $homepage_id), 'full'); ?>
            <p class="text-center"><img alt="" src="<?php echo $image_aline[0]; ?>" class="img-responsive"></p>
            <?php the_field('home_aline_text'); ?>

            <?php if ( have_rows('home_aline_facts_items', $homepage_id) ) : ?>
                <div class="space-top">
                    <?php $i = 1; while ( have_rows('home_aline_facts_items', $homepage_id) ) : the_row(); ?>
                        <?php $image = wp_get_attachment_image_src(get_sub_field('home_aline_facts_item_icon', $homepage_id), 'thumb'); ?>
                        <p><img alt="" src="<?php echo $image[0]; ?>" class="icon pull-left"> <?php the_sub_field('home_aline_facts_item_text', $homepage_id); ?></p>
                        <p class="clearfix"></p>
                        <?php $i++; endwhile; ?>
                </div>
            <?php endif; ?>

            <?php if ( get_field('home_aline_video') ) : ?>
                <div class="space-top">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php the_field('home_aline_video', $homepage_id); ?>"></iframe>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>