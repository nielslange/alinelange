<?php 
/**
 * Template to display the facts section on the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 3.0
 */
?>
<div id="home-facts">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="factsCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="" data-interval="10000">
                    <div class="row">
                        <div class="col-sm-1">

                        </div>
                        <div class="col-sm-10">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div>
                                        <?php the_field('home_aline_text'); ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <div>
                                        <?php the_field('home_aline_image'); ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <div>
                                        <?php the_field('home_aline_video'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <a class="left carousel-control" href="#factsCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left fal fa-long-arrow-left" aria-hidden="true"></span>
                    </a>
                    <a class="right carousel-control" href="#factsCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right fal fa-long-arrow-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>