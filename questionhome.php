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

  include("templates/login-modal.html");
  include("templates/contact-us-modal.html");
  include("templates/question-modal.html");
   if(isset($_SESSION['u_username'])){
     include("templates/logged-in-cityhome-navbar.php");
   }
   else{
     include("templates/main-navbar.html");
   }

    include("includes/dbh.php");
    $query = "SELECT posts_question, posts_description FROM T_Posts WHERE posts_id=".$_GET['id']."";
    $_SESSION['post_id'] = $_GET['id'];
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);
    echo '<div class="sidebar-container"></div>';
    echo '<div id="quest-comment-container"><div id="question-container"><h2 id="question" class="wrap-text">'.$row['posts_question'].'</h2>';
    echo '<p id="question-description" class="wrap-text">'.$row['posts_description'].'</p><hr id="question-hr"></div>';
  ?>
  <div>
  </div>
    <div id="post-comment-container">
      <a id="comment-dropdown">
        <span id="glyph-down" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
        <span id="glyph-up" class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
        Comment</a>
      <div id="commment-form-containter">
        <form action="includes/post-comment.inc.php" method="POST">
          <textarea id="comment-textarea" name="comment-textarea" class="form-control"></textarea>
          <input id="commentSubmitBtn" name="commentSubmitBtn" type="submit" class="btn" value="Post comment">
        </form>
      </div>
    </div>

    <ul class="list-group">
      <?php
          include("includes/retrieve-comments.inc.php");
       ?>
    </ul>
  </div>
  <script>
    $("#comment-dropdown").click(function() {
      $("#commment-form-containter").toggleClass('display-none');
      $(this).children(".glyphicon").toggle();
    });

    $(".view-replies").click(function() {
      $(this).parent().next().next().children(".comment-reply").toggleClass('display-none');
    });

    $(".reply-comment").click(function() {
      $(this).parent().parent().next(".reply-form").toggleClass('display-none');
    })
  </script>
</body>
</html>
