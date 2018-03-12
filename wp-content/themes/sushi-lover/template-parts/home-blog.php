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
<div id="home-blog">
	<div class="container">

        <?php if ( get_field('home_blog_title') ) : ?>
            <h2><?php the_field('home_blog_title'); ?></h2>
        <?php endif; ?>

		<div class="row hidden-xs">
			<?php $i = 1; foreach ($recent_posts as $post) : ?>
			<div class="col-sm-4">
				<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post['ID']), 'blog_horizontal'); ?>
                <ul class="caption-style-1">
                    <li>
                        <img src="<?php echo $thumb[0]; ?>" alt="<?php echo $post['post_excerpt'];?>" class="img-responsive">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1><?php echo $post['post_title']; ?></h1>
                            </div>
                        </div>
                    </li>
                </ul>
			</div>
			<?php if ($i % 3 == 0 && $i != $count) : ?>
			</div><div class="row">
			<?php endif; ?>
			<?php $i++; endforeach; ?>
		</div>
	
        <div class="row visible-xs">
            <?php $i = 1; foreach ($recent_posts as $post) : ?>
            <div class="col-sm-4">
                <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post['ID']), 'blog_horizontal'); ?>
                <a href="<?php echo get_permalink($post['ID']);?>">
                    <img src="<?php echo $thumb[0]; ?>" alt="<?php echo $post['post_excerpt'];?>" class="img-responsive">
                </a>
                <h3><a href="<?php echo get_permalink($post['ID']);?>"><?php echo $post['post_title']; ?></a></h3>
                <br>
            </div>
            <?php if ($i % 3 == 0 && $i != $count) : ?>
            </div><div class="row">
            <?php endif; ?>
            <?php $i++; endforeach; ?>
        </div>

		<?php wp_reset_query(); ?>
        
	</div>
</div>