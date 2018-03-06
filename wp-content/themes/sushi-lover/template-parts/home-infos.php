<?php 
/**
 * Template to display the infos section on the homepage
 * 
 * @author Semantics LLC 
 * @since Sushi Lovers 1.0
 */

$image = wp_get_attachment_image_src(get_field('home_infos_image'), 'medium');

?>

<div id="home-infos">
	<div class="container">
		<div class="row hidden-xs">
			<div class="col-xs-4">
				<p><img alt="" src="<?php echo $image[0]; ?>" class="img-responsive img-circle"></p>
			</div>
			<div class="col-xs-8">
				<?php the_field('home_infos_text'); ?>
			</div>
		</div>
        <div class="row visible-xs">
            <div class="col-xs-6 col-xs-offset-3">
                <p><img alt="" src="<?php echo $image[0]; ?>" class="img-responsive img-circle"></p>
                <br>
            </div>
            <div class="col-xs-12">
                <?php the_field('home_infos_text'); ?>
            </div>
        </div>
	</div>
</div>

<div id="home-infos-subtitle">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 text-center">
				<p><?php the_field('home_infos_subtitle'); ?></p>
			</div>
		</div>
	</div>
</div>

<?php if ( get_field('home_infos_text_more') ) : ?>
<div id="home-quotes">
	<div class="container">
		<div class="row hidden-xs">
			<div class="col-xs-8 col-xs-offset-2">
				<?php the_field('home_infos_text_more'); ?>
			</div>
		</div>
        <div class="row visible-xs">
            <div class="col-xs-12">
                <?php the_field('home_infos_text_more'); ?>
            </div>
        </div>
	</div>
</div>
<?php endif; ?>
	
<div id="home-infos-preise">
	<div class="container">
		<div class="row hidden-xs">
			<?php while (have_rows('home_infos_services_items')) : the_row(); ?>
			<div class="col-sm-4 text-center">
				<?php $image = wp_get_attachment_image_src(get_sub_field('home_infos_services_item_image'), 'medium'); ?>
	        	<p><img alt="<?php the_sub_field('home_infos_services_item_title'); ?>" src="<?php echo $image[0]; ?>" class="img-responsive img-circle"></p>
				<h2><?php the_sub_field('home_infos_services_item_title'); ?></h2>
				<?php the_sub_field('home_infos_services_item_description'); ?>
			</div>
			<?php endwhile; ?>
		</div>
        <div class="row visible-xs">
            <?php while (have_rows('home_infos_services_items')) : the_row(); ?>
                <div class="col-xs-10 col-xs-offset-1 text-center">
	                <?php $image = wp_get_attachment_image_src(get_sub_field('home_infos_services_item_image'), 'medium'); ?>
	                <p><img alt="<?php the_sub_field('home_infos_services_item_title'); ?>" src="<?php echo $image[0]; ?>" class="img-responsive img-circle"></p>
                </div>
                <div class="col-xs-12 text-center">
	                <h2><?php the_sub_field('home_infos_services_item_title'); ?></h2>
	                <?php the_sub_field('home_infos_services_item_description'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        
        <?php if (get_field('home_infos_services_cta')) : ?>
            <div class="lead text-center">
                <br>
                <?php the_field('home_infos_services_cta'); ?>
            </div>
        <?php endif; ?>
        
		<p class="text-center hidden-xs"><a href="<?php the_field('home_infos_services_button_url'); ?>" id="more" class="btn btn-lg btn-turquoise"><?php the_field('home_infos_services_button_text'); ?></a></p>
		<p class="visible-xs"><a href="<?php the_field('home_infos_services_button_url'); ?>" id="more" class="btn btn-block btn-turquoise"><?php the_field('home_infos_services_button_text'); ?></a><br></p>
	</div>
</div>