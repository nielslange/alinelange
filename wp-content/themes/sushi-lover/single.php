<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */

get_header(); ?>

<div id="blog">
	<div class="container">
        <?php if ( have_posts() ) : ?>
        	<?php while ( have_posts() ) : the_post(); ?>
                <header>
                    <p class="date"><?php the_date(); ?></p>
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <p class="categories"><?php echo get_the_category_list(', '); ?></p>
                </header>
            <?php endwhile; ?>  
        <?php endif; ?>
    
		<div class="row">
			<div class="col-sm-9">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                        <?php 
						// Previous/next post navigation.
		                the_post_navigation( array(
		                    'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fa fa-fw fa-chevron-left"></i> ' . __( 'Vorheriger Eintrag', 'berlin' ) . '</span> ',
		                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Nächster Eintrag', 'berlin' ) . ' <i class="fa fa-fw fa-chevron-right"></i></span> ',
		                    'screen_reader_text' => ' ',
		                ) );

		                // If comments are open or we have at least one comment, load up the comment template.
		                if ( comments_open() || get_comments_number() ) :
		                comments_template();
		                endif;
		                
		                ?>   
                    <?php endwhile; ?>	
				<?php endif; ?>
			</div>
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
