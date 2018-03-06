<div id="footer">
	<div id="footer-upper">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>
					<div id="sidebar-footer-1" class="col-sm-3 sidebar-footer-1 widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
					</div><!-- #sidebar-footer-1 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
					<div id="sidebar-footer-2" class="col-sm-3 sidebar-footer-2 widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
					</div><!-- #sidebar-footer-2 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
					<div id="sidebar-footer-3" class="col-sm-3 sidebar-footer-3 widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
					</div><!-- #sidebar-footer-3 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
					<div id="sidebar-footer-4" class="col-sm-3 sidebar-footer-4 widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
					</div><!-- #sidebar-footer-4 -->
				<?php endif; ?>

			</div>
		</div>
	</div>
	<div id="footer-lower">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<p>
						&copy; <?php echo date('Y'); ?> aline lange FOTOGRAFIE |

                        <?php if (is_page_template('landing-page.php')) : ?>
                          <a href="/impressum">Impressum</a> | 
                        <?php endif; ?>

						Entwickelt mit <abbr title="December 19, 2015 &bull; Bali, Indonesia"><i class="fa fa-heart"></i></abbr> durch <strong><a href="https://nielslange.com/" target="_blank" title="Niels Lage - WordPress Developer">Niels Lange</a></strong>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<a href="#" class="scrollup">
	<i class="fa fa-lg fa-chevron-up"></i>
</a>

<?php wp_footer(); ?>
</body>
</html>
