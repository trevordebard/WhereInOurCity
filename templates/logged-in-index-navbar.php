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
      <li class="dropdown"><a href="#" id="drop1" data-toggle="dropdown" class="dropdown-toggle underlineAnimate navbarText" role="button">'.$_SESSION['u_username'].'<b class="caret"></b></a>
          <ul role="menu" class="dropdown-menu" aria-labelledby="drop1">
            <li role="presentation"><a href="profilePage.php" role="menuitem">Profile</a></li>
            <li role="presentation"><a href="#" role="menuitem">Notifications</a></li>
            <li role="presentation"><a href="#" id="logout" role="menuitem">Log Out</a></li>
          </ul>
      </li>
      <li><a href="#ourMissionHeader" id="ourMissionBtn" class="underlineAnimate navbarText">Our Mission</a></li>
      <li><a href="#" id="contactUsBtn" class="underlineAnimate navbarText" data-toggle="modal" data-target="#contact-modal">Contact Us</a></li>
      <li><form action="includes/logout.inc.php" method="POST">
        <li><button style="display:none" type="submit" id="logoutBtn" name="logoutBtn">Log Out</button></li>
      </form></li>
    </ul>
  </div>
</nav>';
?>
<script>
$("#logout").click(function() {
  $("#logoutBtn").trigger("click");
});
</script>
