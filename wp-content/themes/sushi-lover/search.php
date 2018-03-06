
<?php
/**
 * The search template file.
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

global $wp_query;
query_posts( wp_parse_args( $wp_query->query, array( 'posts_per_page' => -1 ))
);

get_header(); ?>

<div id="search" class="content-area service-page">
	<div class="container">	
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
	
				<div class="row">
	
					<div class="col-sm-12">
	
						<header class="page-header">
							<h1 class="page-title text-center"><?php _e( 'Okay, here we go ...', 'sushilovers' ); ?></h1>
						</header>
			
						<div class="page-wrapper">
							<div class="page-content">
	
							<?php
							if ( have_posts() ) :
					
								/* Start the Loop */
								print('<ul>');
								while ( have_posts() ) : the_post();
					
									printf('<li><a href="%s">%s</a></li>', get_permalink(), get_the_title());
					
								endwhile;
								print('</ul>');
								
							else :
					
								get_template_part( 'template-parts/content', 'none' );
					
							endif; 
							?>
	
							</div><!-- .page-content -->
						</div><!-- .page-wrapper -->

					</div>

				</div>
	
			</div><!-- #content -->
		</div><!-- #primary -->
	
	</div>
</div>


<?php
//get_sidebar();
get_footer();
