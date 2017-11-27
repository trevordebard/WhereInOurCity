<?php
echo'
<nav class="navbar navbar-default">
  <a class="navbar-brand" href="cityhome.php">
    <img src="images/wiocLogo.png" id="wiocNavbarLogo" alt="">
  </a>
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" id="collapsedCityNavbar" data-toggle="collapse" data-target="#main-navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="main-navbar">
    <div class="col-sm-3 col-md-3">
      <form class="navbar-form" role="search" id="searchBar" action="search.php" method="POST">
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
      <li><a href="#" name="loginBtnCity" class="navbarText underlineAnimate txtBlack" data-toggle="modal" data-target="#login-modal">Log in</a></li>
      <li><a href="signup.php" name="signUpBtnCity" class="navbarText underlineAnimate txtBlack">Sign Up</a></li>
      <li><a href="#" id="contactUsBtnCity" class="navbarText underlineAnimate txtBlack" data-toggle="modal" data-target="#contact-modal">Contact Us</a></li>
      <!--Fix How the underline animation looks when web page is half screened-->
    </ul>
  </div>
</nav>';
?>

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