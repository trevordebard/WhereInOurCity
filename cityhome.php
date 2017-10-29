<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

    /*Also couldnt figure out how to change background color of the navbar when the webpage is half the computer screen*/
  </style>
</head>
<body style="width: 100%">
  <?php
    include("templates/login-modal.html");
    include("templates/contact-us-modal.html");
      if(isset($_SESSION['u_username'])){
        echo '<nav class="navbar navbar-default">
                <a class="navbar-brand" href="cityhome.php">
                  <img src="images/wiocLogo.png" id="wiocNavbarLogo" alt="">
                </a>
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" id="collapsedCityNavbar" data-toggle="collapse" data-target="#cityNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="cityNavbar">
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="username" class="navbarText">'.$_SESSION[u_username].'</a></li>
                    <li><a href="#ourMissionHeader" id="ourMissionBtn" class="underlineAnimate navbarText">Our Mission</a></li>
                    <li><a href="#" id="contactUsBtn" class="underlineAnimate navbarText" data-toggle="modal" data-target="#contact-modal">Contact Us</a></li>
                    <li><form action="includes/logout.inc.php" method="POST">
                      <li><button type="submit" name="logoutBtn">Log Out</button></li>
                    </form></li>
                  </ul>
                </div>
              </nav>';
      }
      else{
        include("templates/main-navbar.html");
      }
    ?>

  <div style="margin: 0 auto; width: 25%; text-align: center">
    <h3>Baton Rouge</h3>
    <hr style="margin: 3px; border-top: 0.9px solid #959494;">
    <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Change city</a>
  </div>
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
  <script>
  $("#inputSearchBar").focus(function() {
    $("#inputSearchBar").animate({
      width: "300px"
    });
  });
  $("#inputSearchBar").focusout(function() {
    console.log("test");
    $("#inputSearchBar").animate({
      width: "100px",
    });
  });
  </script>

</body>
</html>
