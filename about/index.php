<?php 
$pageTitle = "About what D'Licious Nails";
$section = "about";
require_once("../inc/config.php");
include(ROOT_PATH . 'inc/head.php');
include(ROOT_PATH . 'inc/header.php'); ?>


    <div class="container">
      <div class="jumbotron">
        <p>
        </p>
        <div class="row">
          <div class="col-md-9">
            <div class="page-header">
              <h2>
                <b>
            The goal of D'Licious Nails
          </b>
              </h2>
              <p class="lead">
                Is to deliver an amazing peice of nail art and a great experience to each
                person that sits in the chair. Undarmaa "Darma" the artist each peice of
                nail art is able to deliver to clients what they need by using her artistic
                foundation and is able to mesh it with her sense of fashion developed thought-out
                her active modeling career.
              </p>
              <p>
              </p>
              <p>
                <a href="<?php echo BASE_URL; ?>about/artist.php" class="btn btn-primary btn-large">Learn more »</a>
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <img src="<?php echo BASE_URL; ?>img/logo.svg" class="img-responsive logo-about-index">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <h2>
            Menu
          </h2>
          <p>
            From a manicure to a backfil customers are able to get what they need
            during a session. The service are performed using high end supplies from
            CND to Young Nails.
          </p>
        
        </div>
        <div class="col-md-4">
          <h2>
            Scheduling an Appointment
          </h2>
          <p>
            Filling an appointment is done by prescheduling your nail art session
            at least three weeks in advance. Appointments are quickly filled up by
            calling to schedule it.
          </p>
          <p>
            <a class="btn btn-primary" href="<?php echo BASE_URL; ?>about/appointment.php" class="btn btn-primary btn-large">Get more info »</a>
          </p>
        </div>
        <div class="col-md-4">
          <h2>
            Quality Promise
          </h2>
          <p>
            Most customers that get full sets done come back only needing backfills.
            In the rare occurence that a nail breaks or chips. It will repaired at
            no additinal cost within the first two weeks.
          </p>
          <p>
            <a class="btn btn-primary" href="<?php echo BASE_URL; ?>about/promise.php" class="btn btn-primary btn-large">More details »</a>
          </p>
        </div>
      </div>
    </div> <!-- /container -->

    
    <?php include(ROOT_PATH . 'inc/scripts.php') ?>





