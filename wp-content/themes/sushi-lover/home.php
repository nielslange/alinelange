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

<div id="blog" class="space">
	<div class="container">
        <div class="row">
			<div class="col-sm-9">
				<?php if ( have_posts() ) : ?>

                    <div class="row hidden-xs">
                        <?php $i = 1; while ( have_posts() ) : the_post(); ?>
                            <div class="col-sm-6 col-xs-12">
                                <ul class="caption-style-1">
                                    <li>
                                        <a href="<?php echo get_permalink();?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog_horizontal'); ?>" class="img-responsive" alt="<?php the_title(); ?>">
                                            <div class="caption">
                                                <div class="blur"></div>
                                                <div class="caption-text">
                                                    <h1><?php the_title(); ?></h1>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
						<?php $i++; endwhile; ?>
                    </div>

                    <div class="row visible-xs">
	                    <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-xs-12">
								<p><a href="<?php echo get_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog_horizontal'); ?>" class="img-responsive" alt="<?php the_title(); ?>"></a></p>
                                <p><a href="<?php echo get_permalink();?>"><?php echo get_the_title(); ?></a></p>
                            </div>
	                    <?php endwhile; ?>
                    </div>

					<?php

					the_posts_navigation(
						array(
							'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="far fa-fw fa-chevron-left"></i> ' . __( 'Ältere Beiträge', 'berlin' ) . '</span> ',
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Neuere Beiträge', 'berlin' ) . ' <i class="far fa-fw fa-chevron-right"></i></span> ',
							'screen_reader_text' => ' ',
						)
					);

					?>
				
				<?php endif; ?>
                <div class="clearfix"></div>
			</div>
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
        </div>
	</div>
</div>

<?php get_footer(); ?>