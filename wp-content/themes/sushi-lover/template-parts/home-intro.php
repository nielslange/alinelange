<?php 
/**
 * Template to display the intro section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 3.0
 */

//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

?>
<div id="home-intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php the_field('home_intro_text'); ?>

                <?php if ( get_field('home_intro_link_url') && get_field('home_intro_link_text') ) : ?>

                <div class="text-right">
                    <a href="<?php the_field('home_intro_link_url'); ?>">
                        <i class="fa fa-long-arrow-right"></i>
                        <?php the_field('home_intro_link_text'); ?>
                    </a>
                </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>