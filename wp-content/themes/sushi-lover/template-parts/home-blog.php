<?php 
/**
 * Template to display the aline section on the homepage
 * 
 * @author Semantics LLC 
 * @since Sushi Lovers 1.0
 */

$count = get_field('home_blog_visible_posts');
$args = array(
	'numberposts' 		=> $count,
	'orderby' 			=> 'post_date',
	'order' 			=> 'desc',
	'post_type' 		=> 'post',
	'post_status' 		=> 'publish',
	);
$recent_posts = wp_get_recent_posts($args);
?>
<div id="home-blog">
	<div class="container">
    
		<div class="row hidden-xs">
			<?php $i = 1; foreach ($recent_posts as $post) : ?>
			<div class="col-sm-4">
				<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post['ID']), 'blog_horizontal'); ?>
                <div class="image-holder">
					<a href="<?php echo get_permalink($post['ID']);?>">
                        <img alt="" src="<?php echo $thumb[0]; ?>" class="img-responsive">
                        <span><?php echo $post['post_title']; ?></span> 
                    </a>
                </div>
				<h3><?php echo $post['post_title']; ?></h3>
				<p><?php echo $post['post_excerpt'];?> <a href="<?php echo get_permalink($post['ID']);?>">weiterlesen</a></p>
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
                <div class="image-holder-xs">
                    <a href="<?php echo get_permalink($post['ID']);?>">
                        <img alt="" src="<?php echo $thumb[0]; ?>" class="img-responsive">
                    </a>
                </div>
                <h3><?php echo $post['post_title']; ?></h3>
                <p><?php echo $post['post_excerpt'];?></p>
	            <p class="text-center">
	                <a href="<?php echo get_permalink($post['ID']);?>" class="btn btn-turquoise btn-block">weiterlesen</a>
	            </p>
            </div>
            <?php if ($i % 3 == 0 && $i != $count) : ?>
            </div><div class="row">
            <?php endif; ?>
            <?php $i++; endforeach; ?>
            
            
        </div>

    	<br>
        
		<?php wp_reset_query(); ?>
        
		<p class="text-center">
	        <a href="<?php the_field('home_blog_button_link'); ?>" class="btn btn-lg btn-turquoise">
	            <?php the_field('home_blog_button_title'); ?>
	        </a>
        </p>
        
	</div>
</div>