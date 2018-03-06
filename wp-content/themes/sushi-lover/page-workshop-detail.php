<?php
/**
 * Template to display the workshop detail pages
 *
 * Template Name: Workshop Detail Page
 *
 * @package Sushi Lovers
 * @since Sushi Lovers 1.0
 */
?>

<?php get_header(); ?>

    <div id="workshop" class="content-area">

        <div class="container">

			<?php the_title('<h1>', '</h1>'); ?>
                
			<div class="breadcrumb"><?php get_breadcrumb(); ?></div>                
                
			<?php if ( wc_memberships_is_user_active_member(get_current_user_id(), 'workshop') ||
					   wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-manual') ||
					   wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic') ||
					   wc_memberships_is_user_active_member(get_current_user_id(), 'workshop-automatic-no-bonus')) : ?>

                <?php if ( have_posts() ) : ?>
                
                	<?php while ( have_posts() ) : the_post(); ?>
                	
                		<?php the_content(); ?>
                	
                	<?php endwhile; ?>
                	
                <?php endif; ?>
                
                <div class="row">
                	<div class="col-sm-12">
		                <?php getWorkshopNavigation(); ?>
                	</div>
                </div>

            <?php else : ?>

                <?php the_content(); ?>

            <?php endif; ?>

        </div>

    </div>

<?php get_footer(); ?>