<?php
/**
 * Template to display the workshop landing page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 *
 * Template Name: Workshop Landing Page
 */
?>

<?php get_header(); ?>

<div id="workshop" class="content-area">

	<?php if ( wc_memberships_is_user_active_member(get_current_user_id(), 'workshop') ||
			   wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-manual') ||
			   wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic') ||
			   wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic-no-bonus')) : ?>

        <div class="container">

			<div class="row">
				<div class="col-sm-12">
					<?php the_title('<h1>', '</h1>'); ?>
					<div class="breadcrumb"><?php get_breadcrumb(); ?></div>                
					<?php if ( get_field('workshop_modules_description') ) : ?>
						<?php the_field('workshop_modules_description'); ?>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( have_rows('workshop_modules_lessons') ) : ?>
            
            	<div id="workshop-archive" class="row hidden-xs">
					<?php while ( have_rows('workshop_modules_lessons') ) : the_row(); ?>
							<?php if ( wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic') ||
									 ( wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic-no-bonus') && !get_sub_field('workshop_modules_lessons_bonus')) ) : ?>
							<div class="col-md-4 col-lg-3">
								<?php $image = wp_get_attachment_image_src(get_sub_field('workshop_modules_lessons_image'), 'blog_horizontal'); ?>
	                            <div class="image-holder">
	                            	<a href="<?php the_sub_field('workshop_modules_lessons_page'); ?>">
									    <img src="<?php echo $image[0]; ?>" class="img-responsive" alt="<?php the_sub_field('workshop_modules_lessons_title'); ?>" class="img-responsive">
					                    <span><?php the_sub_field('workshop_modules_lessons_title'); ?></span> 
					                </a>
					        	</div>
	                        </div>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
				
				<div id="workshop-archive" class="row visible-xs">
					<?php while ( have_rows('workshop_modules_lessons') ) : the_row(); ?>
						<?php $image = wp_get_attachment_image_src(get_sub_field('workshop_modules_lessons_image'), 'blog_horizontal'); ?>
						<div class="col-xs-12">
							<?php if ( wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic') ||
									 ( wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic-no-bonus') && !get_sub_field('workshop_modules_lessons_bonus')) ) : ?>
					            <div class="image-holder-xs">
					                <a href="<?php the_sub_field('workshop_modules_lessons_page'); ?>">
					                	<img alt="<?php the_sub_field('workshop_modules_lessons_title'); ?>" src="<?php echo $image[0]; ?>" class="img-responsive">
					                </a>
					           </div>
					           <p class="text-center">
					                <a href="<?php the_sub_field('workshop_modules_lessons_page'); ?>" class="btn btn-turquoise btn-block">
					                    <span><?php the_sub_field('workshop_modules_lessons_title'); ?></span> 
					                </a>
					           </p>
							<?php endif; ?>
                        </div>
					<?php endwhile; ?>
				</div>
		
			<?php endif; ?>
        
			<div class="row">
				<div class="col-sm-12">
					<?php if ( get_field('workshop_modules_description_bottom') ) : ?>
						<?php the_field('workshop_modules_description_bottom'); ?>
					<?php endif; ?>
				</div>
			</div>

        </div>

	<?php else : ?>
	
		<div class="container">

			<div class="row">
				<div class="col-sm-12">
					<?php the_title('<h1>', '</h1>'); ?>
					<?php if ( get_field('workshop_expired_message') ) : ?>
						<?php the_field('workshop_expired_message'); ?>
					<?php endif; ?>
				</div>
			</div>
			
		</div>

	<?php endif; ?>

</div>

<?php get_footer(); ?>