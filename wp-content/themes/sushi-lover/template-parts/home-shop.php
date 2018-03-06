<?php
/**
 * Template to display the shop section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */
?>
<div id="home-shop">
	<div class="container">
		
        <div class="row visible-lg">
			<?php $i = 0; while (have_rows('home_shop_items')) : the_row(); ?>
			<?php $image = wp_get_attachment_image_src(get_sub_field('home_shop_item_image'), 'large'); ?>
			<div class="col-sm-<?php echo $i <= 2 ? 4 : 6; ?>">
                <div class="image-holder">
                    <a href="<?php echo get_term_link(get_sub_field('home_shop_item_link')); ?>">
                        <img alt="<?php the_sub_field('home_shop_item_title'); ?>" src="<?php echo $image[0]; ?>" class="img-responsive">
                        <span><?php the_sub_field('home_shop_item_title'); ?></span> 
                    </a>
                </div>
			</div>
            <?php if ($i == 2) : ?>
                </div><div class="row visible-lg">    
            <?php endif; ?>
			<?php $i++; endwhile; ?>
		</div>
        
        <div class="row visible-sm visible-md">
            <?php $i = 0; while (have_rows('home_shop_items')) : the_row(); ?>
            <?php $image = wp_get_attachment_image_src(get_sub_field('home_shop_item_image'), 'large'); ?>
            <div class="col-sm-<?php echo $i <= 2 ? 4 : 6; ?>">
                <div class="image-holder-sm">
                    <a href="<?php echo get_term_link(get_sub_field('home_shop_item_link')); ?>">
                        <img alt="<?php the_sub_field('home_shop_item_title'); ?>" src="<?php echo $image[0]; ?>" class="img-responsive">
                        <span><?php the_sub_field('home_shop_item_title'); ?></span> 
                    </a>
                </div>
            </div>
            <?php if ($i == 2) : ?>
                </div><div class="row visible-sm visible-md">    
            <?php endif; ?>
            <?php $i++; endwhile; ?>
        </div>
        
        <div class="row visible-xs">
            <?php while (have_rows('home_shop_items')) : the_row(); ?>
            <?php $image = wp_get_attachment_image_src(get_sub_field('home_shop_item_image'), 'medium'); ?>
            <div class="col-xs-12">
                <div class="image-holder-xs">
                    <a href="<?php echo get_term_link(get_sub_field('home_shop_item_link')); ?>">
                        <img alt="<?php the_sub_field('home_shop_item_title'); ?>" src="<?php echo $image[0]; ?>" class="img-responsive">
                    </a>
                </div>
                <p class="text-center">
                    <a href="<?php echo get_term_link(get_sub_field('home_shop_item_link')); ?>" class="btn btn-turquoise btn-block">
                        <span><?php the_sub_field('home_shop_item_title'); ?></span> 
                    </a>
                </p>
            </div>
            <?php $i++; endwhile; ?>
        </div>

		<br>
        
		<p class="text-center">
	        <a href="<?php the_field('home_shop_button_link'); ?>" class="btn btn-lg btn-turquoise">
	            <?php the_field('home_shop_button_text'); ?>
	        </a>
        </p>
        
	</div>
</div>