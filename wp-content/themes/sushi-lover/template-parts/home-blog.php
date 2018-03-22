<?php 
/**
 * Template to display the aline section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */

//* Return if ACF hasn't been activated
if ( !class_exists('acf') ) return;

//* Prepare variables
$title = get_field('home_blog_title');

//* Prepare recent blog posts
$count = get_field('home_blog_visible_posts');
$args = array(
	'numberposts' 	=> $count,
	'orderby' 		=> 'post_date',
	'order' 		=> 'desc',
	'post_type' 	=> 'post',
	'post_status'   => 'publish',
);
$recent_posts = wp_get_recent_posts($args);
?>
<div id="home-blog" class="space">
	<div class="container">

        <?php if ( $title ) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if ( have_rows('home_blog_posts') ) : ?>

            <div class="row visible-xs">
                <?php while ( have_rows('home_blog_posts') ) : the_row(); ?>
                    <?php $id = get_sub_field('home_blog_post'); ?>
                    <div class="col-xs-12">
			            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full'); ?>
                        <p><a href="<?php echo get_permalink($id);?>"><img src="<?php echo $thumb[0]; ?>" alt="<?php echo get_the_excerpt($id);?>" class="img-responsive"></a></p>
                        <p><a href="<?php echo get_permalink($id);?>"><?php echo get_the_title($id); ?></a></p>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="row hidden-xs">
	            <?php while ( have_rows('home_blog_posts') ) : the_row(); ?>
		            <?php $id = get_sub_field('home_blog_post'); ?>
                    <div class="col-sm-4">
			            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'blog_horizontal'); ?>
                        <ul class="caption-style-1">
                            <li>
                                <a href="<?php echo get_permalink($id);?>">
                                    <img src="<?php echo $thumb[0]; ?>" alt="<?php echo get_the_excerpt($id);?>" class="img-responsive">
                                    <div class="caption">
                                        <div class="blur"></div>
                                        <div class="caption-text">
                                            <h1><?php echo get_the_title($id); ?></h1>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
	            <?php endwhile; ?>
            </div>

		<?php endif; ?>

		<?php wp_reset_query(); ?>
        
	</div>
</div>