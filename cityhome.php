<?php
  session_start(); //start the session
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
    /******Navbar Styling*******/
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
    .question-lgi:hover {
      border: 2px solid #247ba0;
    }
    .question-lgi .main-a {
      color: #464646;
      text-decoration: none;
    }
    /* container for comment button */
    .question-btn-container {
      margin-left: 1.5%;
      margin-bottom: 5px;
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
      top:-40px;
      width: 100%;
    }

    /*Style for forming the boxes that house the the questions*/
    .list-group-item {
      margin: 3px;
      margin-top: 0px;
      border-radius: 5px;
    }

    #questions-container{
      width:64%;
      max-width: 1000px;
      float:left;
      margin: 2%;
      border-radius:5px;
    }

    #btn-cat-container{
      display:block;
      margin:0 auto;
      width:30%;
      float:right;
      margin-top:30px;
      text-align: center;
    }
	/* Styling for ask a question button */
    #askQuestionBtn{
      width:92%;
      max-width:300px;
      background-color: #247BA0;
      color:white;
      font-size: 18px;
    }
	/* Change color of button on hover */
    #askQuestionBtn:hover{
      background-color: #0A678F;
      color:white;
    }
	/* Make sure width does not exceed 500px for select */
    .bootstrap-select {
      max-width: 500px;
    }
    .bootstrap-select .btn {
      color:black;
      font-size: 18px;
      appearance: none;

    }
	/* Add a margin to the top of category title */
    #categoryTitle{
      margin-top:30px;
    }
	/* styling for the categoryHR */
    #categoryHR{
      width:55%;
      border:1px solid #247BA0;
      margin-top: -3px;
      margin-bottom:30px;
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
         include("templates/main-navbar.php");
      }
     ?>

  <!--This div houses the Baton Rouge banner-->>
  <div>
    <img src="images/BRBanner.png" id="BRBanner">
  </div>

  <!--This div holds the 'Ask A Question' Button and the 'Change City' button. It also contains the styling for both-->
  <div>

    <div align="center" style="margin: 0 auto; width: 25%; text-align: center; margin-top:0px;">
      <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Change City</a>
    </div>
  </div>

  <!--Change city modal that displays a button with the ctiy, Baton Rouge-->
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
  <!--This container holds the categories filter and relating html elements-->
  <div id="btn-cat-container">
    <button align="center" id="askQuestionBtn" data-toggle="modal" data-target="#question-modal" class="btn">Ask A Question</button>
    <h3 id="categoryTitle" align="center">Sort By Category:</h3>
    <hr id="categoryHR" align="center">
    <div id="select-cityhome" align="center">
        <form id="filter-form" action="includes/retrieve-filtered-questions.inc.php" method="GET">
          <!--<label for="filter-category" class="form-control-label askAQuestionTitle">Category:</label>-->
          <!--The different options that are selectable from the dropdown menu-->
          <select name="filter-category" id="filter-category" class="selectpicker" data-width="87%" data-live-search="true" data-dropup-auto="false">
            <option selected="selected">All</option>
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

  <div>
    <!--This div house all of the list group items holding the questions. The includes actually retieves the questions from
    the database and makes a list group item programmatically to populate the cityhome page with questions. The div also
    contains stylings for the questions-->

      <div id="questions-container" class="list-group">
        <?php
          include("includes/retrieve-questions.inc.php");
        ?>
      </div>
    </div>
  </div>
  <script>

    /*Declares and initializes the start, questionsPerLoad, and reachedMax variables*/
    var start = 0;
    var questionsPerLoad = 5;
    var reachedMax = false;
    var category = "";

    /*JQuery function that checks to see if the user has reached the bottom of the screen and if they have
    then the fill page function will be called*/
    $(window).scroll(function () {
      if ($(window).scrollTop() + $(window).height() == $(document).height())
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

    $("#filter-category").change(function() { //when the user selects a new category to filter
      category = $('#filter-form').find(":selected").text(); //stores the selected category in var category
      start = 0; //resets start to 0 because new content will be loaded into cityhome
      reachedMax = false; //sets reachedMax to false because new content will be loaded
      questionsPerLoad = 5; //5 posts will be loaded by default, and as the users scrolls, more will be added
      $("#questions-container").empty(); //empty all the questions displayed
      fillPage(); //calls fillPage, which will use ajax to get the new filtered questions
    });
  </script>
</body>
</html>
