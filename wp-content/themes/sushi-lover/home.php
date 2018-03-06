<?php
/**
 * Template to display the blog page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */
get_header(); ?>

<div id="blog">
	<div class="container">
        <div class="row">
			<div class="col-sm-9">
				<?php if ( have_posts() ) : ?>
				
					<div class="row visible-lg">
						<?php $i = 1; while ( have_posts() ) : the_post(); ?>
							<div class="col-sm-6">
		                        <div class="image-holder">
		                            <a href="<?php echo get_permalink();?>">
			                            <img alt="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog_horizontal'); ?>" class="img-responsive">
		                                <span><?php the_title(); ?></span> 
		                            </a>
		                        </div>
							</div>
							<?php if ($i % 2 == 0) : ?>
								</div><div class="row visible-lg">		
							<?php endif; ?>
						<?php $i++; endwhile; ?>
					</div>
	
	                <div class="row visible-md visible-sm">
	                    <?php while ( have_posts() ) : the_post(); ?>
		                    <div class="col-sm-6">
		                        <div class="image-holder-xs">
		                            <a href="<?php echo get_permalink();?>">
		                                <img alt="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog_horizontal'); ?>" class="img-responsive">
		                            </a>
		                        </div>
				                <p class="text-center">
				                    <a href="<?php echo get_permalink(); ?>" class="btn btn-turquoise btn-block">
		                                <span style="height: auto;">Beitrag lesen</span> 
				                    </a>
				                </p>                            
		                    </div>
		                <?php endwhile; ?>
	                </div>
	
	                <div class="row visible-xs">
	                    <?php while ( have_posts() ) : the_post(); ?>
		                    <div class="col-xs-12">
		                        <div class="image-holder-xs">
		                            <a href="<?php echo get_permalink();?>">
		                                <img alt="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog_horizontal'); ?>" class="img-responsive">
		                            </a>
		                        </div>
				                <p class="text-center">
				                    <a href="<?php echo get_permalink(); ?>" class="btn btn-turquoise btn-block">
		                                <span>Beitrag lesen</span> 
				                    </a>
				                </p>                            
		                    </div>
		                <?php endwhile; ?>
	                </div>
	
					<?php the_posts_navigation(); ?>
				
				<?php endif; ?>
			</div>
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
        </div>
	</div>
</div>


<?php get_footer(); ?>