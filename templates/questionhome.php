<?php
  session_start();
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    #question {
      color: #242424;
    }
    #question-description {
      font-size: 17px;
      margin-bottom: 10px;
      color: #242424;
    }
    #question-container {
      background-color: white;
    }
    #quest-comment-container {
      width: 60%;
      margin-left: 7%;
      margin-top: 2%;
    }
    #post-comment-container {
      margin-bottom: 50px;
    }
    #comment-dropdown {
      text-decoration: none;
      display: block;
      color: black;
      max-width: 87px;
    }
    #comment-dropdown:hover {
      color: #247ba0;
    }
    #comment-textarea {
      resize: vertical;
      width: 100%;
      min-height: 100px;
      margin-bottom: 10px;
    }
    #commment-form-containter {
      width: 100%;
    }

    #glyph-up {
      display: none;
    }
    #submit-comment {
      background-color: transparent;
      border: 1px solid #828181;
      float: right;
    }
    #submit-comment:hover {
      background-color: #E6EDFA;
    }
    #question-hr {
      border: .84px solid #BCBBBB;
    }
    .view-replies {
      background-color: transparent;
    }
    .display-none {
      display: none;
    }
    .display-inline-block {
      display: inline-block;
    }

    .comment-lgi:hover {
      border: 2px solid #247ba0;
    }

    .comment-lgi {
      padding: 10px;
      margin-bottom: 5px;
    }
    .comment-reply {
      padding: 10px;
      margin-bottom: 5px;
      width: 85%;
      margin-left: 11%;
    }
    .comment-reply:hover {
      border: 2px solid #DB2B39;
    }
    .comment-hr {
      width: 97%;
      border: .84px solid #BCBBBB;
      margin-bottom: 8px;
    }
    .sidebar-container{
      width: 33%;
      position: relative;
      text-align: center;
      float: right;
    }
    .comment-btn-container {
      margin-left: 1.5%;
      margin-bottom: 5px;
    }
    .reply-textarea {
      width: 98%;
      resize: vertical;
      min-height: 100px;
      margin-top: 5px;
    }

    p {
      font-size: 16px;
    }
  </style>
</head>
<body>

  <?php
  /*imports the login, contact-us, and question modals into the file for later use*/
  include("templates/login-modal.html");
  include("templates/contact-us-modal.html");
  include("templates/question-modal.html");

   if(isset($_SESSION['u_username'])){ //if the session variable u_username is set
     include("templates/logged-in-cityhome-navbar.php"); //show the users username in the navbar
   }
   else{
     include("templates/main-navbar.html"); //show the default navbar
   }

    include("includes/dbh.php"); //import the database helper

    //Select the question and description from the table T_Posts where the post_id is equal to the id of the post the user clicked on
    $query = "SELECT posts_question, posts_description FROM T_Posts WHERE posts_id=".$_GET['id']."";
    $_SESSION['post_id'] = $_GET['id']; //The session variable post_id is set to the id of the post the user clicked
    $results = mysqli_query($conn, $query); //query the database and store the result in $results
    $row = mysqli_fetch_assoc($results); //Fetch the individual rows of the result

    /*Store the question and description at the top of the page*/
    echo '<div class="sidebar-container"></div>';
    echo '<div id="quest-comment-container"><div id="question-container"><h2 id="question" class="wrap-text">'.$row['posts_question'].'</h2>';
    echo '<p id="question-description" class="wrap-text">'.$row['posts_description'].'</p><hr id="question-hr"></div>';
  ?>
  <div>
  </div>
    <!--This div contains the text area and post comment button. There is a glyphicon over the text area
    that expands and collapses the text area-->
    <div id="post-comment-container">
      <a id="comment-dropdown">
        <span id="glyph-down" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
        <span id="glyph-up" class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
        Comment</a>
      <div id="commment-form-containter">
        <form action="includes/post-comment.inc.php" method="POST">
          <textarea id="comment-textarea" name="comment-textarea" class="form-control" required></textarea>
          <input id="commentSubmitBtn" name="commentSubmitBtn" type="submit" class="btn" value="Post comment">
        </form>
      </div>
    </div>

    <!--This unordered list contains each comment-->
    <ul class="list-group">
      <?php
          include("includes/retrieve-comments.inc.php"); //imports the retrieve comments file. This file reads each comment from the database and places it as a list group item
       ?>
    </ul>
  </div>
</body>
</html>
