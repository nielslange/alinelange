<?php 
/**
 * Template to display the contact section on the homepage
 * 
 * @author Semantics LLC 
 * @since Sushi Lovers 1.0
 */

$image = wp_get_attachment_image_src(get_field('home_contact_image'), 'medium');

?>
<div id="home-contact">
	<div class="container">
		<div class="row hidden-xs">
			<div class="col-sm-4">
				<p><img alt="" src="<?php echo $image[0]; ?>" class="img-responsive"></p>
			</div>
			<div class="col-sm-8">
				<?php the_field('home_contact_form'); ?>
        	</div>
		</div>
        <div class="row visible-xs">
            <div class="col-xs-10 col-xs-offset-1">
                <p><img alt="" src="<?php echo $image[0]; ?>" class="img-responsive"></p>
            </div>
            <div class="col-xs-12">
                <?php the_field('home_contact_form_xs'); ?>
            </div>
        </div>
	</div>
</div>