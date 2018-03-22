<?php
/**
 * Template to display the info page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 *
 * Template Name: Info Page
 */
//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

get_header();
?>

<div id="infos" class="space">
	<div class="container">

        <?php if ( have_rows(items) ) : ?>

        <div class="your-class">
            <?php while ( have_rows(items) ) : the_row(); ?>
            <div>
                <div class="row">
                    <div class="col-sm-4">
                        <p><img src="<?php the_sub_field('item_image'); ?>" class="img-responsive"></p>
                    </div>
                    <div class="col-sm-8">
	                    <?php the_sub_field('item_text'); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <?php endif; ?>

    </div>
    <div class="clearfix"></div>
</div>

<?php get_footer(); ?>