<?php 
/**
 * Template to display the quotes section on the homepage
 * 
 * @author Semantics LLC 
 * @since Sushi Lovers 1.0
 */
$c = count(get_field('home_quotes_quote_items'));
?>

<div id="home-quotes">
	<div class="container">
		<div id="home-quotes-carousel" class="carousel slide carousel-fade">
			<div class="carousel-inner" role="listbox">
				<?php $i = 1; $j = $i-2; while (have_rows('home_quotes_quote_items')) : the_row(); ?>
				<?php $image = wp_get_attachment_image_src(get_sub_field('home_quotes_quote_item_image'), 'shop_single'); ?>
				<div class="item <?php echo $i == 1 ? 'active' : ''; ?>">
    				<div class="row">
    					<div class="col-sm-6">
		      				<p><img src="<?php echo $image[0]; ?>" alt="" class="img-responsive"></p>
                            <p class="visible-sm">
	                            <a data-target="#home-quotes-carousel" data-slide-to="<?php echo $i == 1 ? $c-1 : $j; ?>"><i class="fa fa-chevron-left"></i> Vorheriges Zitat</a> | 
	                            <a data-target="#home-quotes-carousel" data-slide-to="<?php echo $i == $c ? 0 : $i; ?>">Nächstes Zitat <i class="fa fa-chevron-right"></i></a>
                            </p>
    					</div>
    					<div class="col-sm-6">
    						<div>
	    						<?php the_sub_field('home_quotes_quote_item_description'); ?>
    						</div>
    					</div>
    				</div>
                    <p id="navigation" class="hidden-sm">
		                <a data-target="#home-quotes-carousel" data-slide-to="<?php echo $i == 1 ? $c-1 : $j; ?>"><i class="fa fa-chevron-left"></i> Vorheriges Zitat</a> |
	                    <a data-target="#home-quotes-carousel" data-slide-to="<?php echo $i == $c ? 0 : $i; ?>">Weiteres Zitat <i class="fa fa-chevron-right"></i></a>
                    </p>
    			</div>
				<?php $i++; $j++; endwhile; ?>
			</div>
		</div>
	</div>
</div>