<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */
$args = array(
	'post_type' => 'portfolio',
	'post_status' => 'publish',
	'orderby' => 'id',
	'order' => 'ASC',	
);
$temp = new WP_Query($args);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container hidden-xs">
        <?php if ($temp->posts) : ?>
            <ul class="menu">
            <?php foreach ($temp->posts as $item) : ?>
                <li><a href="<?php the_permalink($item->ID); ?>" class="<?php echo get_the_title() == get_the_title($item->ID) ? 'active' : ''; ?>"><?php echo get_the_title($item->ID); ?></a></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

	<div class="entry-content hidden-xs">
	   <?php if (have_rows('portfolio_images')) : ?>
	       <div class="flexslider">
                <ul class="slides">
                <?php $i = 1; while (have_rows('portfolio_images')) : the_row(); ?>
               	    <?php $img = wp_get_attachment_image_src(get_sub_field('portfolio_image'), 'portfolio_slider'); ?>
                    <li><img src="<?php echo $img[0]; ?>" class="img-responsive"></li>
                <?php $i++; endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
	</div><!-- .entry-content -->

    <div class="entry-content container visible-xs">
       <?php if (have_rows('portfolio_images')) : ?>
           <div class="flexslider">
                <ul class="slides">
                <?php $i = 1; while (have_rows('portfolio_images')) : the_row(); ?>
                    <?php $img = wp_get_attachment_image_src(get_sub_field('portfolio_image'), 'portfolio_slider'); ?>
                    <li><img src="<?php echo $img[0]; ?>" class="img-responsive"></li>
                <?php $i++; endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div><!-- .entry-content -->

    <div class="container visible-xs">
        <?php if ($temp->posts) : ?>
            <select class="selectpicker" onchange="location = this.options[this.selectedIndex].value;">
            <?php foreach ($temp->posts as $item) : ?>
                <option value="<?php the_permalink($item->ID); ?>" <?php echo get_the_title() == get_the_title($item->ID) ? 'selected' : ''; ?>><?php echo get_the_title($item->ID); ?></option>
                <!--                 <option><a href="<?php the_permalink($item->ID); ?>" class="<?php echo get_the_title() == get_the_title($item->ID) ? 'active' : ''; ?>"><?php echo get_the_title($item->ID); ?></a></option> -->
            <?php endforeach; ?>
            </select>
        <?php endif; ?>
    </div>

</article><!-- #post-## -->

<script>
jQuery(document).ready(function($) {
    $(window).load(function() {
        $('.flexslider').flexslider({
        	animation: "slide",
			animationLoop: true,
			animationSpeed: 1000,
			controlNav: false,
			itemWidth: 320,
			itemMargin: 5,
			minItems: 1,
			maxItems: 4
        });
    });

    $('.selectpicker').selectpicker({
        style: 'btn-turquoise',
    });
});
</script>