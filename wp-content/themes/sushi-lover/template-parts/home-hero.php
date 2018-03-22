<?php 
/**
 * Template to display the hero section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */
//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

$logo = wp_get_attachment_image_src(get_field('home_logo'), 'large');

?>

<div id="home-hero">
	<img id="home-hero-logo" alt="" src="<?php echo $logo[0]; ?>">
	<header id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="" data-interval="10000">
	    <div class="carousel-inner">
	    	<?php $i = 0; while (have_rows('home_slider_items')) : the_row(); ?>
	    	<?php $image = wp_get_attachment_image_src(get_sub_field('home_slider_item'), 'full'); ?>
	        <div class="item <?php echo $i == 0 ? 'active' : ''; ?>">
	            <div class="fill" style="background-image:url(<?php echo $image[0]; ?>);"></div>
	        </div>
	    	<?php $i++; endwhile; ?>
	    </div>
	    <a class="left carousel-control" href="#heroCarousel" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left fa fa-chevron-left" aria-hidden="true"></span>
	    </a>
	    <a class="right carousel-control" href="#heroCarousel" data-slide="next">
	    	<span class="glyphicon glyphicon-chevron-right fa fa-chevron-right" aria-hidden="true"></span>
	    </a>
	</header>
	<a href="#home-intro" id="more" style="z-index: 100;"><i class="fa-2x fas fa-chevron-down"></i></a>
</div>