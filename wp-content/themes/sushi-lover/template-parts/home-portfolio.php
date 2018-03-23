<?php 
/**
 * Template to display the infos section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */

$wedding_vertical 		= wp_get_attachment_image_src(get_field('home_portfolio_wedding_image'), 'portfolio_vertical');
$wedding_horizontal 	= wp_get_attachment_image_src(get_field('home_portfolio_wedding_image'), 'portfolio_horizontal');
$portraits_horizontal 	= wp_get_attachment_image_src(get_field('home_portfolio_portraits_image'), 'portfolio_horizontal');
$baby_horizontal 		= wp_get_attachment_image_src(get_field('home_portfolio_baby_image'), 'portfolio_horizontal');
$kids_horizontal 		= wp_get_attachment_image_src(get_field('home_portfolio_kids_image'), 'portfolio_horizontal');
$personal_horizontal 	= wp_get_attachment_image_src(get_field('home_portfolio_personal_image'), 'portfolio_horizontal');
$newborn_horizontal 	= wp_get_attachment_image_src(get_field('home_portfolio_newborn_image'), 'portfolio_horizontal');
$families_horizontal 	= wp_get_attachment_image_src(get_field('home_portfolio_families_image'), 'portfolio_horizontal');

?>
<div id="home-portfolio" class="space">
	<div class="container">
		<div class="row visible-lg">
			<div class="col-sm-4">
                <div class="image-holder">
                    <a href="<?php the_field('home_portfolio_wedding_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_wedding_title'); ?>" src="<?php echo $wedding_vertical[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_wedding_title'); ?></span> 
                    </a>
                </div>
			</div>
			<div class="col-sm-4">
                <div class="image-holder">
				    <a href="<?php the_field('home_portfolio_portraits_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_portraits_title'); ?>" src="<?php echo $portraits_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_portraits_title'); ?></span> 
                    </a>
                </div>
                <div class="image-holder">
				    <a href="<?php the_field('home_portfolio_baby_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_baby_title'); ?>" src="<?php echo $baby_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_baby_title'); ?></span>
                    </a>
                </div>
                <div class="image-holder">
				    <a href="<?php the_field('home_portfolio_kids_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_kids_title'); ?>" src="<?php echo $kids_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_kids_title'); ?></span>
                    </a>
                </div>
			</div>
			<div class="col-sm-4">
                <div class="image-holder">
	                <a href="<?php the_field('home_portfolio_personal_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_personal_title'); ?>" src="<?php echo $personal_horizontal[0]; ?>" class="img-responsive">
	                    <span><?php the_field('home_portfolio_personal_title'); ?></span>
                    </a>
                </div>
				<div class="image-holder">
					<a href="<?php the_field('home_portfolio_newborn_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_newborn_title'); ?>" src="<?php echo $newborn_horizontal[0]; ?>" class="img-responsive">
	                    <span><?php the_field('home_portfolio_newborn_title'); ?></span>
                    </a>
                </div>
                <div class="image-holder">
					<a href="<?php the_field('home_portfolio_families_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_families_title'); ?>" src="<?php echo $families_horizontal[0]; ?>" class="img-responsive">
	                    <span><?php the_field('home_portfolio_families_title'); ?></span>
                    </a>
                </div>
			</div>
		</div><!-- .row -->
        
        <div class="row visible-sm visible-md">
            <div class="col-sm-4">
                <div class="image-holder-sm vertical">
                    <a href="<?php the_field('home_portfolio_wedding_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_wedding_title'); ?>" src="<?php echo $wedding_vertical[0]; ?>" class="img-responsive img-vertical">
                        <span><?php the_field('home_portfolio_wedding_title'); ?></span> 
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="image-holder-sm">
                    <a href="<?php the_field('home_portfolio_portraits_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_portraits_title'); ?>" src="<?php echo $portraits_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_portraits_title'); ?></span> 
                    </a>
                </div>
                <div class="image-holder-sm">
                    <a href="<?php the_field('home_portfolio_baby_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_baby_title'); ?>" src="<?php echo $baby_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_baby_title'); ?></span>
                    </a>
                </div>
                <div class="image-holder-sm">
                    <a href="<?php the_field('home_portfolio_kids_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_kids_title'); ?>" src="<?php echo $kids_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_kids_title'); ?></span>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="image-holder-sm">
                    <a href="<?php the_field('home_portfolio_personal_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_personal_title'); ?>" src="<?php echo $personal_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_personal_title'); ?></span>
                    </a>
                </div>
                <div class="image-holder-sm">
                    <a href="<?php the_field('home_portfolio_newborn_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_newborn_title'); ?>" src="<?php echo $newborn_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_newborn_title'); ?></span>
                    </a>
                </div>
                <div class="image-holder-sm">
                    <a href="<?php the_field('home_portfolio_families_link'); ?>">
                        <img alt="<?php the_field('home_portfolio_families_title'); ?>" src="<?php echo $families_horizontal[0]; ?>" class="img-responsive">
                        <span><?php the_field('home_portfolio_families_title'); ?></span>
                    </a>
                </div>
            </div>
        </div><!-- .row -->

        <div class="row visible-xs">
            <div class="col-xs-12">
	            <div class="image-holder-xs">
	                <a href="<?php the_field('home_portfolio_wedding_link'); ?>">
	                	<img alt="<?php the_field('home_portfolio_wedding_title'); ?>" src="<?php echo $wedding_horizontal[0]; ?>" class="img-responsive">
	                </a>
	           </div>
	           <p class="text-center">
	                <a href="<?php the_field('home_portfolio_wedding_link'); ?>" class="btn btn-turquoise btn-block">
	                    <span><?php the_field('home_portfolio_wedding_title'); ?></span> 
	                </a>
	           </p>
            </div>
            <div class="col-xs-12">
                <div class="image-holder-xs">
	                <a href="<?php the_field('home_portfolio_portraits_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_portraits_title'); ?>" src="<?php echo $portraits_horizontal[0]; ?>" class="img-responsive">
	                </a>
                </div>
	            <p class="text-center">
	                <a href="<?php the_field('home_portfolio_portraits_link'); ?>" class="btn btn-turquoise btn-block">
	                    <span><?php the_field('home_portfolio_portraits_title'); ?></span> 
	                </a>
	            </p>
            </div>
            <div class="col-xs-12">
                <div class="image-holder-xs">
	                <a href="<?php the_field('home_portfolio_baby_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_baby_title'); ?>" src="<?php echo $baby_horizontal[0]; ?>" class="img-responsive">
	                </a>
                </div>
                <p class="text-center">
	                <a href="<?php the_field('home_portfolio_baby_link'); ?>" class="btn btn-turquoise btn-block">
	                    <span><?php the_field('home_portfolio_baby_title'); ?></span> 
	                </a>
                </p>
            </div>
            <div class="col-xs-12">
                <div class="image-holder-xs">
	                <a href="<?php the_field('home_portfolio_kids_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_kids_title'); ?>" src="<?php echo $kids_horizontal[0]; ?>" class="img-responsive">
	                </a>
	            </div>
	            <p class="text-center">
	                <a href="<?php the_field('home_portfolio_kids_link'); ?>" class="btn btn-turquoise btn-block">
	                	<span><?php the_field('home_portfolio_kids_title'); ?></span> 
	                </a>
	            </p>
            </div>
            <div class="col-xs-12">
	            <div class="image-holder-xs">
	                <a href="<?php the_field('home_portfolio_personal_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_personal_title'); ?>" src="<?php echo $personal_horizontal[0]; ?>" class="img-responsive">
	                </a>
	            </div>
	            <p class="text-center">
	                <a href="<?php the_field('home_portfolio_personal_link'); ?>" class="btn btn-turquoise btn-block">
	                    <span><?php the_field('home_portfolio_personal_title'); ?></span> 
	                </a>
	            </p>
            </div>
            <div class="col-xs-12">
	            <div class="image-holder-xs">
	                <a href="<?php the_field('home_portfolio_newborn_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_newborn_title'); ?>" src="<?php echo $newborn_horizontal[0]; ?>" class="img-responsive">
	                </a>
	            </div>
	            <p class="text-center">
	                <a href="<?php the_field('home_portfolio_newborn_link'); ?>" class="btn btn-turquoise btn-block">
	                    <span><?php the_field('home_portfolio_newborn_title'); ?></span> 
	                </a>
	            </p>
            </div>
            <div class="col-xs-12">
	            <div class="image-holder-xs">
	                <a href="<?php the_field('home_portfolio_families_link'); ?>">
	                    <img alt="<?php the_field('home_portfolio_families_title'); ?>" src="<?php echo $families_horizontal[0]; ?>" class="img-responsive">
	                </a>
	            </div>
	            <p class="text-center">
	                <a href="<?php the_field('home_portfolio_families_link'); ?>" class="btn btn-turquoise btn-block">
	                    <span><?php the_field('home_portfolio_families_title'); ?></span>
	                </a>
	            </p>
            </div>
        </div><!-- .row -->
        
    </div>
</div>