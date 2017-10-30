<?php
echo '<nav class="navbar navbar-default">
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
