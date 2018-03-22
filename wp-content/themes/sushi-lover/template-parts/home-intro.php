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

//* Prepare variables
$text        = get_field('home_intro_text');
$link_url    = get_field('home_intro_link_url');
$link_text   = get_field('home_intro_link_url');
?>
<div id="home-intro" class="space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php echo $text; ?>

                <?php if ( $link_url && $link_text ) : ?>
                <div class="text-right">
                    <a href="<?php echo $link_url; ?>">
                        <i class="far fa-long-arrow-right"></i>
                        <?php echo $link_text; ?>
                    </a>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>