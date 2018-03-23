<?php
/**
 * Template to display the portfolio pages
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 *
 * Template Name: Portfolio
 */
$args = array( 'post_type' => 'portfolio' );
$temp = new WP_Query($args);

get_header();
?>

<div id="portfolio" class="space">
	<div class="container">
		<div class="row">
            <?php if ($temp->posts) : ?>
                <ul>
                <?php foreach ($temp->posts as $item) : ?>
                    <li><a href="<?php the_permalink($item->ID); ?>" class="<?php echo get_the_title() == get_the_title($item->ID) ? 'active' : ''; ?>"><?php echo get_the_title($item->ID); ?></a></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (have_rows('portfolio_images')) : ?>
                <?php $i = 1; while (have_rows('portfolio_images')) : the_row(); ?>
                    <div class="col-sm-2">
                        <?php $img = wp_get_attachment_image_src(get_sub_field('portfolio_image'), 'medium'); ?>
                        <p><img src="<?php echo $img[0]; ?>" class="img-responsive"></p>
                    </div>
                <?php $i++; endwhile; ?>
            <?php endif; ?>
    	</div>
    </div>
    <div class="clearfix"></div>
</div>

<?php get_footer(); ?>