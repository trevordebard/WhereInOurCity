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
<body>
  <nav class="navbar navbar-default">
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
		<div class="col-sm-3 col-md-3">
			<form class="navbar-form" role="search" id="searchBar">
			<div class="input-group">
				<input id="inputSearchBar" type="text" class="form-control" placeholder="Search..." name="searchNewCity">
        <!--Maybe try to center this search bar?-->
				<div class="input-group-btn">
					<button id="inputSearchBtn" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
			</div>
			</form>
		</div>
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="#" name="loginBtnCity" class="navbarText underlineAnimate txtBlack" data-toggle="modal" data-target="#cityLogin-modal">Log in</a></li>
		  <li><a href="signup.php" name="signUpBtnCity" class="navbarText underlineAnimate txtBlack">Sign Up</a></li>
		  <li><a href="#" id="contactUsBtnCity" class="navbarText underlineAnimate txtBlack" data-toggle="modal" data-target="#cityContactUs-modal">Contact Us</a></li>
      <!--Fix How the underline animation looks when web page is half screened-->
		</ul>
	  </div>
	</nav>


  <div class="modal fade" id="cityLogin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="loginmodal-container">
        <!--<img src="images/wiocLogo.png" style="width: 20px; height: 15px;">-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h1>Log in to Your Account</h1><br>
        <form>
          <input type="text" name="loginUsername" id="loginUsername" class="loginSignUpText" placeholder="Username">
          <input type="password" name="loginPassword" id="loginPassword" class="loginSignUpText" placeholder="Password">
          <input type="submit" name="loginSubmitBtn" id="loginSignUpSubmitBtn" class="login" value="Log In">
        </form>
        <div>
          <p id="forgotPasswordText"><a href="#">Forgot Password?</a></p>
        </div>
        <hr id="loginSignUpModalHR">
        <div>
          <p id="signUpLoginModalText">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="cityContactUs-modal" tabindex="-1" role="dialog" aria-labelledby="contactUsTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h2 class="modal-title" id="contactUsNewMessageText">Contact Us</h2>
            <p class="modal-title" id="contactUsNewMessageText">We love feedback. Send us some.</p>
          </div>
          <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="sender-name" class="form-control-label contactUsTitle">Name:</label>
              <input type="text" class="form-control" id="sender-name">
              <br>
              <label for="sender-email" class="form-control-label contactUsTitle">Email:</label>
              <input type="text" class="form-control" id="sender-email">
              <br>
              <label for="subject-name" class="form-control-label contactUsTitle">Subject:</label>
              <input type="text" class="form-control " id="subject-name">
              <br>
              <label for="message-text" class="form-control-label contactUsTitle">Message:</label>
              <textarea class="form-control " id="message-text"></textarea>
            </div>
          </form>
          </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="contactUsCloseBtn" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="contactUsSubmitBtn">Submit</button>
          </div>
        </div>
      </div>
  </div>

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