<?php 
/**
 * Template to display the facts section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 3.0
 */
//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

?>
<div id="home-facts" class="space">
    <div class="container">

        <div class="sli hidden-xs">
            <div>
                <div class="row">
                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 text-right">
			                <?php the_field('home_aline_text'); ?>
                        </div>
                        <div class="col-sm-5">
			                <?php $image_aline  = wp_get_attachment_image_src(get_field('home_aline_image'), 'medium'); ?>
                            <p><img alt="" src="<?php echo $image_aline[0]; ?>" class="img-responsive"></p>
                        </div>
                    </div>
                </div>
            </div>

	        <?php if ( have_rows('home_aline_facts_items') ) : ?>
            <div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 home_aline_facts_items">
                        <div class="row">
                            <?php $i = 1; while ( have_rows('home_aline_facts_items') ) : the_row(); ?>
                                <?php $image = wp_get_attachment_image_src(get_sub_field('home_aline_facts_item_icon'), 'thumb'); ?>
                                <div class="col-sm-6 col-md-4 col-xs-12">
                                    <img alt="" src="<?php echo $image[0]; ?>" class="icon pull-left"> <?php the_sub_field('home_aline_facts_item_text'); ?>
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
                </div>
            </div>
	        <?php endif; ?>

	        <?php if ( get_field('home_aline_video') ) : ?>
            <div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 home_aline_facts_items">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php the_field('home_aline_video'); ?>"></iframe>
                        </div>
                    </div>
                </div>
            </div>
	        <?php endif; ?>

        </div>

        <div class="visible-xs">
            <?php $image_aline  = wp_get_attachment_image_src(get_field('home_aline_image'), 'full'); ?>
            <p class="text-center"><img alt="" src="<?php echo $image_aline[0]; ?>" class="img-responsive"></p>
            <?php the_field('home_aline_text'); ?>

	        <?php if ( have_rows('home_aline_facts_items') ) : ?>
                <div class="space-top">
                    <?php $i = 1; while ( have_rows('home_aline_facts_items') ) : the_row(); ?>
                        <?php $image = wp_get_attachment_image_src(get_sub_field('home_aline_facts_item_icon'), 'thumb'); ?>
                        <p><img alt="" src="<?php echo $image[0]; ?>" class="icon pull-left"> <?php the_sub_field('home_aline_facts_item_text'); ?></p>
                        <p class="clearfix"></p>
                    <?php $i++; endwhile; ?>
                </div>
	        <?php endif; ?>

	        <?php if ( get_field('home_aline_video') ) : ?>
                <div class="space-top">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php the_field('home_aline_video'); ?>"></iframe>
                    </div>
                </div>
	        <?php endif; ?>
        </div>

    </div>
</div>



