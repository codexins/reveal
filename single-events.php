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

                <div class="col-md-5 col-sm-6">
                    <!-- Start Event Single Page -->
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
                			<p class="info-title-content"><a href="mailto:klassychickboutique@gmail.com "> klassychickboutique@gmail.com </a></p>
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

            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of #content -->

<?php get_footer(); ?>
