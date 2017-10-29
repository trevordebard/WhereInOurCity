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
    #BRBanner {
      position: relative;
      top:-15px;
      width: 100%;
    }
    .list-group-item {
      margin: 3px;
      margin-top: 0px;
      border-radius: 5px;
    }

    /*Also couldnt figure out how to change background color of the navbar when the webpage is half the computer screen*/
  </style>
</head>
<body style="width: 100%">
  <?php
    include("templates/login-modal.html");
    include("templates/contact-us-modal.html");
<<<<<<< HEAD
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
=======
    include("templates/question-modal.html");
    ?>
  <div>
    <img src="images/BRBanner.png" id="BRBanner">
  </div>
  <div>
    <div style="float:right; margin-right:9%">
      <a style="cursor: pointer; float: center;" data-toggle="modal" data-target="#question-modal"><button class="btn btn-primary btn-lg">ASK A QUESTION</button></a>
    </div>
    <div align="center" style="margin: 0 auto; width: 25%; text-align: center">
>>>>>>> efe0f7a55e85fd26319ecc8fb00db96bf947c1cb

      <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Change City</a>
    </div>
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
  <div style="margin-top: 4%;">
    <div style="width: 64%; float:left; margin: 2%; margin-top: 0%; border-radius:5px";>
      <div class="list-group">
        <a href="#" class="list-group-item" >
          <h2>Does anyone know where I can download TeamStats?</h2>
          <p>I found this fantastic app called TeamStats last May but I can no longer find it on the Google Play Store.</p>
          <div>
            <button class="btn">Helpful?</button>
          </div>
        </a>
        <a href="#" class="list-group-item">
          <h2>Can someone help me find my son Chet Rodrigue?</h2>
          <p>He was last seen talking about fantasy football</p>
          <div>
            <button class="btn">Helpful?</button>
          </div>
        </a>
        <a href="#" class="list-group-item">
          <h2>Fellas</h2>
          <p>Is it gay to install TeamStats? I mean you're literally installing an app created by dudes!</p>
          <div>
            <button class="btn">Helpful?</button>
          </div>
        </a>
      </div>
    </div>
    <div>
      <div style="width: 30%; float:right; background-color: #ff6347; margin-right: 1%;  border-radius: 5px";>
        <h3>Too many questions? Try narrowing down what you see!</h3>
        <div align="center">
          <select class="selectpicker">
            <option>Pick A Category</option>
            <option>Date Night</option>
            <option>Italian</option>
            <option>Family Friendly</option>
            <option>Team Stats</option>
          </select>
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
