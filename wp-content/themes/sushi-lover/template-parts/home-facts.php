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
<div id="home-infos">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <header id="factsCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="" data-interval="10000">
                    <div class="row">
                        <div class="col-sm-1">

                        </div>
                        <div class="col-sm-10">
                            <div class="carousel-inner">
                                <div class="item <?php echo $i == 0 ? 'active' : ''; ?>">
                                    <div>
                                        <br><br>
                                        <br><br>
                                        FACTS
                                        <br><br>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">

                        </div>
                    </div>
                    <a class="left carousel-control" href="#heroCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left fa fa-long-arrow-left" aria-hidden="true"></span>
                    </a>
                    <a class="right carousel-control" href="#heroCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right fa fa-long-arrow-right" aria-hidden="true"></span>
                    </a>
                </header>
            </div>
        </div>
    </div>
</div>