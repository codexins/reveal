<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>

    <div id="content" class="main-content-wrapper site-content">
        <div class="container">
            <div class="row">
                <!-- Start Event Single Page -->
                <div class="col-md-5 col-sm-6">
                    
                	<div class="single-event-details"> 
                		<div class="event-schedule">
                			<div class="event-date">June 17, 2017</div>
                		</div>

                		<div class="event-organizer">
                			<h3 class="title">Details:</h3>


                			<!-- Start Event Organizer's Name -->
                			<p class="info-title">Name</p>
                			<p class="info-title-content">Klassy Chick Boutique</p>
                			<!-- End Event Organizer's Name -->

                			<!-- Start Event Organizer contact -->
                			<p class="info-title">Phone</p>
                			<p class="info-title-content">704.293.5423</p>
                			<!-- End Event Organizer contact -->

                			<!-- Start Event Organizer's Email -->
                			<p class="info-title">Email</p>
                			<p class="info-title-content"><a href="mailto:reveal@gmail.com "> reveal@gmail.com </a></p>
                			<!-- End Event Organizer's Email -->

                		</div>

                		<!-- Start Event Schedule -->
                		<div class="event-schedule-info">       
                			<h3 class="title"> Schedule </h3>
                			
                				<p class="info-title"> Date: </p>
                				<p class="info-title-content"> June 17, 2017 - to - June 17, 2017 (4 hours)</p>
                			
                			
                				<p class="info-title">Time:</p>
                				<p class="info-title-content">14:00 - to - 18:00 (UTC0)</p>
                			
                		</div>
                		<!-- End Event Schedule -->
                	</div>
                </div>

                <div class="col-md-7 col-sm-6">
                	<div class="single-event-description"> 
                		<!-- Event Title -->
                		<div class="event-title">
                			<h2>A Taste of Pop Up</h2>
                		</div>

                		<div class="single-event-image">
                				<img src="http://localhost/reveal-theme/wp-content/uploads/2011/07/dsc02085.jpg" class="img-responsive" alt="">
                		</div>

                		
                		<p class="event-description">Come out for a day of fun, shopping, and mingling on Saturday, June 17 at <em>A Taste of Pop Up. </em>We have tons of unique vendors ready to “wow” you with amazing products. You DO NOT want to miss this event!</p>

                		<div class="event-venue">
                			<h4> Venue: </h4>
                			<div class="event-venue-info">
                				<i class="fa fa-map-marker" aria-hidden="true"></i>
                				<span>2734 N Graham St, Charlotte, NC 28206, USA</span>
                			</div>
                			<div class="map"></div>
                		</div>
                    </div>

</div>
<!-- Start Event Single Page -->


            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of #content -->

<?php get_footer(); ?>
