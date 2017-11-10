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
      font-size: 18px;
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
    .comment-lgi {
    }
    hr {
      border: .84px solid #247ba0;
    }
    .wrap-text {
      overflow-wrap: break-word;
      word-wrap: break-word;
    }
  </style>
</head>
<body>
  <?php
    include("templates/main-navbar.html");
    include("templates/login-modal.html");
    include("templates/contact-us-modal.html");
    include("templates/question-modal.html");
    include("includes/dbh.php");
    $query = "SELECT posts_question, posts_description FROM T_Posts WHERE posts_id=".$_GET['id']."";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);
    echo '<div id="quest-comment-container"><div id="question-container"><h2 id="question" class="wrap-text">'.$row['posts_question'].'</h2>';
    echo '<p id="question-description" class="wrap-text">'.$row['posts_description'].'</p><hr></div>';
  ?>
    <a href="#" class="list-group-item  list-group-item-action comment-lgi wrap-text">
      <div>
        <h5>username</h5>
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
      </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action comment-lgi wrap-text">
      <div>
        <h5>username</h5>
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
      </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action comment-lgi wrap-text">
      <div>
        <h5>username</h5>
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
      </div>
    </a>
  </div>


</body>
</html>
