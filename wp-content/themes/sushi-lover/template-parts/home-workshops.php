<?php 
/**
 * Template to display the quotes section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */
?>
<div id="home-workshops">
	<div class="container">
		<div class="row">
			<?php while (have_rows('home_workshops_workshop_items')) : the_row(); ?>
			<div class="col-sm-4">
				<h3 class="text-center"><?php the_sub_field('home_workshops_workshop_item_title'); ?></h3>
				<br>
				<?php the_sub_field('home_workshops_workshop_item_description'); ?>
				<br>
				<p class="visible-xs"><a href="<?php the_sub_field('home_workshops_workshop_item_button_link'); ?>" class="btn btn-block btn-white"><?php the_sub_field('home_workshops_workshop_item_button_text'); ?></a><br><br></p>
			</div>
			<?php endwhile; ?>
		</div>
		<div class="row">
			<?php while (have_rows('home_workshops_workshop_items')) : the_row(); ?>
			<div class="col-sm-4">
				<p class="text-center hidden-xs"><a href="<?php the_sub_field('home_workshops_workshop_item_button_link'); ?>" class="btn btn-lg btn-white"><?php the_sub_field('home_workshops_workshop_item_button_text'); ?></a></p>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>