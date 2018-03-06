<?php 
/**
 * Template to display the aline section on the homepage
 * 
 * @author Semantics LLC 
 * @since Sushi Lovers 1.0
 */

$image_aline  = wp_get_attachment_image_src(get_field('home_aline_image'), 'medium');
$image_travel = wp_get_attachment_image_src(get_field('home_aline_travel_map'), 'large');
				
?>
<div id="home-aline">

	<div id="home-aline-quote">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<p><img alt="" src="<?php echo $image_aline[0]; ?>" class="img-responsive img-circle"></p>
				</div>
				<div class="col-sm-8">
					<?php the_field('home_aline_text'); ?>
				</div>
			</div>
		</div>
	</div>
    
	<div id="home-aline-facts">
		<div class="container">
			<div class="row">
				<?php while (have_rows('home_aline_facts_items')) : the_row(); ?>
				<?php $image = wp_get_attachment_image_src(get_sub_field('home_aline_facts_item_icon'), 'thumb'); ?>
				<div class="col-sm-6 col-md-4">
					<p><img alt="" src="<?php echo $image[0]; ?>" class="icon"> <?php the_sub_field('home_aline_facts_item_text'); ?></p>
				</div>
				<?php endwhile; ?>
				<div class="clearfix visible-sm-block"></div>
				<div class="clearfix visible-sm-block"></div>
				<div class="clearfix visible-sm-block"></div>
			</div>
		</div>
	</div>
    
    <?php if (get_field('home_aline_video')) : ?>
	<div id="home-aline-video">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php the_field('home_aline_video'); ?>"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php endif; ?>
    
	<div id="home-aline-travel">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<br><br>
					<?php while (have_rows('home_aline_travel_items')) : the_row(); ?>
					<?php $image = wp_get_attachment_image_src(get_sub_field('home_aline_travel_items_icon'), 'thumb'); ?>
						<p><img alt="" src="<?php echo $image[0]; ?>" class="icon"> <?php the_sub_field('home_aline_travel_items_text'); ?></p>
					<?php endwhile; ?>
				</div>
				<div class="col-sm-7">
					<p><img alt="" src="<?php echo $image_travel[0]; ?>" class="img-responsive"></p>
				</div>
			</div>
		</div>
	</div>
    
</div>