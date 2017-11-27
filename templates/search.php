
<!--Comments incomplete-->
<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <style>
    /******Navbar*******/
    .navbarText {
      font-size: 15px;
      font-weight: bold;
      padding: 15px 10px;
      font-family: helvetica, sans-serif;
      margin-left: 1px;
      position:relative;
      top:0;
    }
    .nav.navbar-nav.navbar-right li a {
      color: #464646;
    }
    .nav.navbar-nav.navbar-right li a:hover {
      color: #000000;
    }
    #wiocNavbarLogo{
      positon:relative;
      top:2px;
    }
    .navbar-brand>img{
      margin-top:-23px;
      height:60px;
      width:auto;
    }
    /*Puts the Baton Rouge Banner underneath the navbar*/
    #BRBanner {
      position: relative;
      top:-15px;
      width: 100%;
    }

    /*Style for forming the boxes that house the the questions*/
    .list-group-item {
      margin: 3px;
      margin-top: 0px;
      border-radius: 5px;
    }
      .search-tabs-content{
        margin-left: 50px;
        margin-bottom: 20px;
      }
      .tab-content a{
        display:inline-block;
      }
    /*Also couldnt figure out how to change background color of the navbar when the webpage is half the computer screen*/
  </style>
</head>
<body style="width: 100%">
  <?php
    /*Imports the login-modal, contact-us-modal, and question-modal into the file so that they can be called upon later*/
    include("templates/login-modal.html");
    include("templates/contact-us-modal.html");


      /*If the session variable u_username is set (i.e. the user is logged in), then include the navbar that shows the
      users username. Else import the navbar for a not logged in user*/
      if(isset($_SESSION['u_username'])){
         include("templates/logged-in-cityhome-navbar.php");
      }
      else{
         include("templates/main-navbar.php");
      }
     ?>

  <!--This div houses the Baton Rouge banner-->>
  <div>
    <img src="images/BRBanner.png" id="BRBanner">
  </div>

  <!--I don't think this div should exist -Logan -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-body">
           <a href="cityhome.php"><button class="btn btn-primary horizontal-center brBtn">Baton Rouge</button></a>
         </div>
       </div>
     </div>
  </div>
  
  <div style="width: 100%; float:left; border-radius:5px";>
      <div id="questions-container" class="list-group">
        <?php

      echo '
		  <ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#postInfo-tab">Posts</a></li>
			<li><a data-toggle="tab" href="#commentInfo-tab">Comments</a></li>
		  </ul>
		  <div class="tab-content">
			<div id="postInfo-tab" class="tab-pane fade in active">
			  <h3 class="search-tabs-content" style = "margin-left:18%;"> Posts:</h3>';
			  include("includes/retrieve-post-results.inc.php"); 
			echo '</div>
			<div id="commentInfo-tab" class="tab-pane fade">
			  <h3 class="search-tabs-content" style = "margin-left:18%;"> Comments:</h3>';
			  include("includes/retrieve-comment-results.inc.php"); 
       echo' </div>
      </div>';
    ?>
      </div>
    </div>
	
</body>
</html>

