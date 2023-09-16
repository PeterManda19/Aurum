<?php

    session_start();

?>

<head>
    <link rel="stylesheet" href="css/Firstcampaign.css">


	<!-- Modernizr JS -->
	<script src="js/Firstcampaign.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="source/main.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	  <link rel="stylesheet" href="css/bootstrap.css">

    <style>
      body{
        overflow-x: hidden;
      }
    </style>
    <title>WithU</title>
</head>

<div class="head-menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="d-none d-md-block col-md-3">
                    <a class="navbar-brands" href="Firstcampaign.php">
                        <img class="d-nones d-md-block img-fluid" src="images/logo.png" alt="">
                        <img class="d-block d-md-none" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="col-12 col-md-9">
                    <nav class="navbar navbar-expand-md navbar-light">
                      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                      </button>
                    
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav w-100 d-flex justify-content-between">
                          <li class="nav-item">
                            <a class="nav-link" href="Firstcampaign.php">HOME</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              CAUSES 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="allcampaign.php">All Campaigns</a>
                              <a class="dropdown-item" href="createcampaignMali.php">Create campaign</a>
                            </div>
                          </li>
                          
                         
                          
                          <li class="nav-item">
                            <a class="nav-link" href="leaderboard.php">LEADERBOARD</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="contactus.php">CONTACT US</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="faq.php">FAQ</a>
                          </li>
                          <li class="nav-item dropdown">
                            <?Php 
                              if(isset($_SESSION["id"])){
                                echo '
                                  <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ' .$_SESSION["Fname"].'
                                  </a>
                                ';
                              }else{
                                echo '
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Account
                                </a>
                                ';
                              }
                            ?>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                              <?Php 
                                if(isset($_SESSION["id"])){
                                  echo '
                                  <a class="dropdown-item" href="includes/logout.inc.php">Logout</a>
                                  <a class="dropdown-item" href="profile.php">Profile</a>
                                  ';
                                }else{
                                  echo '
                                  <a class="dropdown-item" href="login.php">Login</a>
                                  <a class="dropdown-item" href="signup.php">Sign Up</a>
                                  ';
                                }
                              ?>

                              <!-- <a class="dropdown-item" href="login.php">Login</a> -->
                              <!-- <a class="dropdown-item" href="signup.php">Sign Up</a> -->
                              
                            </div>
                          </li>
                          <li class="nav-item menu-btn d-none d-md-block">
                            <ul class="menu-btn list-inline">
                                <li class="list-inline-item">
                                    <a class="nav-link" href="javascript:;" title="">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="d-none d-lg-block btn btn-warning btn-lg text-white" href="donation_form.php" title="">
                                        DONATE
                                    </a>
                                </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="source/r.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  
	<script src="js/modernizr-2.6.2.min.js"></script>
  
  <script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>