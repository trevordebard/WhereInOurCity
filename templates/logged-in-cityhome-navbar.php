<?php
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
            <li><a href="#" id="username" class="navbarText">'.$_SESSION['u_username'].'</a></li>
            <li><a href="#ourMissionHeader" id="ourMissionBtn" class="underlineAnimate navbarText">Our Mission</a></li>
            <li><a href="#" id="contactUsBtn" class="underlineAnimate navbarText" data-toggle="modal" data-target="#contact-modal">Contact Us</a></li>
            <li><form action="includes/logout.inc.php" method="POST">
              <li><button type="submit" name="logoutBtn">Log Out</button></li>
            </form></li>
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
