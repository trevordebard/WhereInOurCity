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

    /*Also couldnt figure out how to change background color of the navbar when the webpage is half the computer screen*/
  </style>
</head>
<body style="width: 100%">
  <?php
    /*Imports the login-modal, contact-us-modal, and question-modal into the file so that they can be called upon later*/
    include("templates/login-modal.html");
    include("templates/contact-us-modal.html");
    include("templates/question-modal.html");

      /*If the session variable u_username is set (i.e. the user is logged in), then include the navbar that shows the
      users username. Else import the navbar for a not logged in user*/
      if(isset($_SESSION['u_username'])){
         include("templates/logged-in-cityhome-navbar.php");
      }
      else{
         include("templates/main-navbar.html");
      }
     ?>

  <!--This div houses the Baton Rouge banner-->>
  <div>
    <img src="images/BRBanner.png" id="BRBanner">
  </div>

  <!--This div holds the 'Ask A Question' Button and the 'Change City' button. It also contains the styling for both-->
  <div>
    <div style="float:right; margin-right:9%">
      <a style="cursor: pointer; float: center;" data-toggle="modal" data-target="#question-modal"><button class="btn btn-primary btn-lg">ASK A QUESTION</button></a>
    </div>
    <div align="center" style="margin: 0 auto; width: 25%; text-align: center">
      <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Change City</a>
    </div>
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

  <div>

    <!--This div house all of the list group items holding the questions. The includes actually retieves the questions from
    the database and makes a list group item programmatically to populate the cityhome page with questions. The div also
    contains stylings for the questions-->
    <div style="width: 64%; float:left; margin: 2%; border-radius:5px";>
      <div id="questions-container" class="list-group">
        <?php
          include("includes/retrieve-questions.inc.php");
        ?>
      </div>
    </div>
    <div>
      <div style="width: 30%; float:right; background-color: #ff6347; margin-right: 1%;  border-radius: 5px";>
        <h3>Too many questions? Try narrowing down what you see!</h3>
        <div align="center">
        <form id="filter-form" action="includes/retrieve-filtered-questions.inc.php" method="GET">
          <label for="filter-category" class="form-control-label askAQuestionTitle">Category:</label>
          <!--The different options that are selectable from the dropdown menu-->
          <select name="filter-category" id="filter-category" class="selectpicker" data-live-search="true">
            <option>Volunteer</option>
            <option>Discussion</option>
            <option>Food and Dining</option>
            <option>Service providers</option>
            <option>Leisure</option>
            <option>Nightlife</option>
            <option>Date night </option>
            <option>Shopping</option>
            <option>Events</option>
            <option>Amusements and attractions</option>
            <option>Hotels and lodging</option>
            <option>Family</option>
            <option>Pets</option>
            <option>Museums and Historical Sites</option>
            <option>Places of worship</option>
          </select>
        </form>
        </div>

      </div>
    </div>
  </div>

  <!--Adds infinite scroll capabilities-->
  <script>

    /*Declares and initializes the start, questionsPerLoad, and reachedMax variables*/
    var start = 0;
    var questionsPerLoad = 5;
    var reachedMax = false;
    var category = "";

    /*JQuery function that checks to see if the user has reached the bottom of the screen and if they have
    then the fill page function will be called*/
    $(window).scroll(function () {
      if ($(window).scrollTop() == $(document).height() - $(window).height())
        fillPage();
    });

    /*Allows us to make changes to the file using the fillpage function*/
    $(document).ready(function() {
        fillPage();
    });

    /*This function fills the page with questions retrieved from the database*/
    function fillPage() {
      /*If there aren't any more questions left in the databse then the function will just return*/
      if (reachedMax)
        return;

      /*This ajax method calls the retieve questions file to search the database and grab a certain number of
      questions based on the amount of questions we want to revieve*/
      $.ajax({
        url: 'includes/retrieve-questions.inc.php',
        method: 'POST',
        dataType: 'text',

        /*The data this method wants is at the start point in the database until the questionsPerLoad point*/
        data: {
          fillPage: 1,
          start: start,
          questionsPerLoad: questionsPerLoad,
          category: category
        },

        success: function(response) {
          if (response == "reachedMax")
            reachedMax = true;
          else {
            start += questionsPerLoad;
            $(".list-group").append(response);
          }
        }
      });
    }

    $("#filter-category").change(function() {
      category = $('#filter-form').find(":selected").text();
      start = 0;
      reachedMax = false;
      questionsPerLoad = 5;
      console.log(category);
      $("#questions-container").empty();
      fillPage();
    });
  </script>
</body>
</html>
