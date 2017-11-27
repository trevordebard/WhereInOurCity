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
    <style>
    #btn-choose-location {
        border-color: #247BA0; //Sets the color of an elements four borders.
        max-width:600px; //Esablishes the max-width of the choose location button.
        width:100%; //Sets the default width to 100%.
        background-color: #247BA0; //Set the background color for the button.
        font-family: helvetica, sans-serif; //Defines the default fonts for the button.
    }
    #btn-choose-location:hover {
      background-color: #0A678F; //Alters the color of the choose location button when the user hovers over it.
    }
    #cont-search-location{ //Creates a container for selection a location.
      width:75%; //Sets the default width to 75% of the container.
      max-width:600px;  //Establishes the max-width of the container as 600 pixels.
      margin-left:50%; //Sets the left-margin of the search location container.
      transform: translateX(-50%); //Shifts the container left by 50%. This in combination with margin-left 50% centers the container.
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
      margin-top: 460px; //Adds a margin of 460px to the top of the Our Mission information.
    }
    .textCentered{
      text-align:center; //Centers the Our Mission text header.
    }
    #ourMissionHR{
      width:75%; //Sets the width for details for Our Mission to 75% of the screen's width.
      border-color:#247BA0; //Sets the border-color of the Our Mission header.
    }
    .ourMissionText{
      margin:auto; //Sets the margin of the text for Our Mission to its default value.
      max-width:75%; //Establishs the maximum width of the Our Mission text.
    }
    #ourMissionHeader{
        text-decoration: none; //Defines that the text will not have any decoration.
        color:#247BA0; //Sets the primary color of the Our Mission header.
    }
    #message-text {
      resize: vertical;
    }
    .navbarText {
      font-size: 15px; //Sets the navbar font size to 15 pixels.
      font-weight: bold; //Makes the navbar text bold.
      font-family: helvetica, sans-serif; //Defines the font that the navbar text can choose from.
      postion:relative; //The navbar's positioning is relative to its normal position.
      top:-8px; //Sets the top edge of the navbar as 8 pixels higher than default.
    }
    .nav.navbar-nav.navbar-right li a {
      color: #464646;
      margin-left:0;
    }
    .nav.navbar-nav.navbar-right li a:hover {
      color: #000000;
    }
    .navbar-default{
      background-color: white; //The navbar has a while background color.
      border:none; //The navbar does not have visible borders.
    }
    </style>
  </head>
  <body>
    <?php

      /*Import the login-modal and the contact-us-modal for use on the page*/
      include("templates/login-modal.html");
      include("templates/contact-us-modal.html");

      if(isset($_SESSION['u_username'])){ //If the session variable u_username is
        include("templates/logged-in-index-navbar.php"); //The users username will be displayed in the navbar
      }
      else{
        include("templates/index-navbar.html");  //The regular navbar will be displayed
      }
    ?>

    <!--Places the logo into the center of the page and adds styling-->
    <div id="logo-header" align="center">
      <img src="images/wiocLogo.png" style="width: 200px; height: 150px; margin-top: 5%;">
    </div>

    <!--Puts the 'Choose a Location' button under the logo and adds styling-->
    <div id="cont-search-location">
      <button type="button" id="btn-choose-location" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Choose a Location
      </button>
    </div>

    <!--The modal for choosing a city -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body"> <!--Selecting the Baton Rouge button opens up the corresponding cityhome.php-->
            <a href="cityhome.php"><button class="btn btn-primary horizontal-center brBtn">Baton Rouge</button></a>
          </div>
        </div>
      </div>
    </div>
    <!--This block of text shows the development team's mission with the project. Currently it is filled with Lorem Ipsum place holder text.-->
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
      $("#ourMissionBtn").click(function() {//When the Our Mission button is clicked,
        $('html, body').animate({ //Add animation that scrolls the user down the page.
          scrollTop: $("#ourMissionText").offset().top//Scrolls from the top to the specified position.
        }, 700);
      });
    });
    </script>
  </body>
</html>
