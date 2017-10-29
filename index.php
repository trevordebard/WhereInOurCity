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
    #btn-choose-location {
        border-color: white;
        width: 600px;
        background-color: #247BA0;
        font-family: helvetica, sans-serif;
        margin-left:50%;
        transform: translateX(-50%);
    }
    #btn-choose-location:hover {
      background-color: #0A678F;
    }
    /*****Underline Animation****/
    .nav a {
      color: black;
      font-size: 15px;
      font-weight: bold;
      padding: 15px 10px;
      font-family: helvetica, sans-serif;
      margin-left: 1px;
      text-decoration: none;
    }

    /*************************/
    .space{
      margin-top: 35%;
    }
    .textCentered{
      text-align:center;
    }
    #ourMissionHR{
      width:75%;
      border-color:#247BA0;
    }
    .ourMissionText{
      margin:auto;
      max-width:75%;
    }
    #ourMissionHeader{
        text-decoration: none;
        color:#247BA0;
    }
    #message-text {
      resize: vertical;
    }
    </style>
  </head>
  <body>
    <?php
      include("templates/login-modal.html");
      include("templates/contact-us-modal.html");
      if(isset($_SESSION['u_username'])){
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
              <li><a href="signup.php" id="signUpBtn" class="underlineAnimate navbarText">Sign Up</a></li>
              <li><a href="#" id="loginBtn" class="underlineAnimate navbarText" data-toggle="modal" data-target="#login-modal">Log In</a></li>
              <li><a href="#ourMissionHeader" id="ourMissionBtn" class="underlineAnimate navbarText">Our Mission</a></li>
              <li><a href="#" id="contactUsBtn" class="underlineAnimate navbarText" data-toggle="modal" data-target="#contact-modal">Contact Us</a></li>
            </ul>
          </div>
        </nav>';
      }
    ?>

    <div id="logo-header" align="center">
      <img src="images/wiocLogo.png" style="width: 200px; height: 150px; margin-top: 5%;">
    </div>

    <div id="cont-search-location">
      <button type="button" id="btn-choose-location" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Choose a Location
      </button>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <a href="cityhome.php"><button class="btn btn-primary horizontal-center brBtn">Baton Rouge</button></a>
          </div>
        </div>
      </div>
    </div>

    <div id="ourMissionText">
      <hr id="ourMissionHR" class="space">
      <h2 class="textCentered"><a id="ourMissionHeader">Our Mission</a></h2>
      <br>
      <p class="ourMissionText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque, metus id porta pellentesque, mauris nisl viverra orci, at vulputate quam est ut leo. Duis eros nibh, faucibus sed feugiat nec, fermentum eget massa. Nullam convallis, ante nec consequat ultricies, nulla lectus tristique elit, vulputate varius arcu risus nec libero. Nulla maximus aliquet dolor tempor posuere. Proin consectetur et arcu a laoreet. Sed eget ultricies ipsum. Cras ac rutrum velit, ut posuere nunc. Aliquam euismod urna at lacus vulputate volutpat. Donec feugiat velit vitae dolor venenatis, vitae pretium neque tempus. Phasellus in mauris at odio consectetur mattis eget vitae lectus. Pellentesque porttitor massa a tempor ultricies. Duis in nibh ac lorem pretium fringilla id at nulla. Sed egestas purus in nibh convallis, vitae commodo ligula placerat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ullamcorper, lacus nec sodales euismod, sem dui bibendum sem, eget hendrerit nisi nulla non neque. Praesent non velit scelerisque lectus lobortis rutrum.
      Fusce vitae tincidunt eros. Vivamus ornare sodales diam eu suscipit. Donec eu magna pellentesque ipsum rhoncus viverra quis id magna. Curabitur nec urna tortor. Etiam ullamcorper vehicula orci, et efficitur purus dapibus nec. In non est eros. Quisque volutpat odio sit amet mi interdum, in fermentum urna consequat.</p>
      <br>
      <p class="ourMissionText">Nunc pharetra, ex non maximus ultrices, metus erat sollicitudin orci, in scelerisque arcu lacus elementum mauris. Praesent eleifend consequat nisl, quis convallis eros dapibus ut. Fusce quam erat, maximus eget blandit id, posuere vitae ipsum. Vestibulum pharetra mauris vel mauris tincidunt suscipit. Aliquam consequat, diam eu feugiat volutpat, lorem felis vestibulum ex, nec porta dui dolor sit amet augue. Pellentesque sit amet rhoncus leo. Vestibulum tempor vestibulum malesuada. Morbi semper accumsan justo, eu volutpat nisl volutpat eu.
      In hac habitasse platea dictumst. Nam et fermentum dui. Ut nec pretium leo. Fusce ex magna, facilisis eget purus eu, rhoncus venenatis velit. In purus augue, lacinia vel metus id, consequat congue lectus. Etiam hendrerit sed ligula id ullamcorper. Donec interdum iaculis orci, sit amet pharetra enim dapibus ut. Donec luctus tellus nulla, ac maximus tellus ullamcorper non. Phasellus vitae nunc et lacus feugiat placerat. Curabitur blandit fringilla luctus. Sed egestas lectus non orci cursus, a dictum nibh imperdiet. Vestibulum rutrum vestibulum vehicula.
      Suspendisse scelerisque est non elit pretium malesuada. Nulla orci leo, sagittis eu congue et, scelerisque in sem. Quisque posuere urna non arcu vulputate varius. In cursus nibh id leo auctor scelerisque. Phasellus ut ullamcorper est. Aliquam eget nisi id metus efficitur tincidunt. Duis ante nulla, consequat a arcu id, vestibulum semper nisi. Mauris diam nisl, fermentum vel fringilla eu, finibus id tellus. Duis malesuada dui ut dictum venenatis. Cras ultrices et mauris sit amet posuere. </p>
    </div>
    <script>
    $(document).ready(function(){
      $("#ourMissionBtn").click(function() {
        $('html, body').animate({
          scrollTop: $("#ourMissionText").offset().top
        }, 700);
      });
    });

    </script>
  </body>
</html>
