<?php 
/**
 * Template to display the intro section on the homepage
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
                <p>foo bar</p>
                <h1>foo bar</h1>
                <p>foo bar</p>
                <?php the_field('home_intro'); ?>
            </div>
        </div>
    </div>
</div>