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
      margin-bottom: 15px;
      display: block;
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
      margin: 10px;
      width: 85%;
    }
    #commment-form-containter {
      background-color: #F3F7FF;
      width: 100%;
    }
    #glyph-up {
      display: none;
    }
    #submit-comment {
      float: right;
      margin-right: 15%;
    }
    .display-none {
      display: none;
    }
    .display-inline-block {
      display: inline-block;
    }

    .comment-lgi:hover {
      border-color: #247ba0;
      border: 2px solid #247ba0;
    }

    .comment-lgi {
      padding: 10px;
      margin-bottom: 5px;
    }

    .sidebar-container{
      width: 33%;
      position: relative;
      text-align: center;
      float: right;
    }
    hr {
      border: .84px solid #BCBBBB;
    }
    p {
      font-size: 16px;
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
    echo '<div class="sidebar-container"></div>';
    echo '<div id="quest-comment-container"><div id="question-container"><h2 id="question" class="wrap-text">'.$row['posts_question'].'</h2>';
    echo '<p id="question-description" class="wrap-text">'.$row['posts_description'].'</p><hr></div>';
  ?>
  <div>
  </div>
    <div id="post-comment-container">
      <a id="comment-dropdown" href="#">
        <span id="glyph-down" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
        <span id="glyph-up" class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
        Comment</a>
      <div id="commment-form-containter" class="display-none">
        <form>
          <textarea id="comment-textarea" class="form-control"></textarea>
          <input id="submit-comment" type="button" class="btn" value="Post comment">
        </form>
      </div>
    </div>

    <a href="#" class="list-group-item  list-group-item-action comment-lgi wrap-text">
      <div>
        <h5>username</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
      </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action comment-lgi wrap-text">
      <div>
        <h5>username</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
      </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action comment-lgi wrap-text">
      <div>
        <h5>username</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
      </div>
    </a>
  </div>
  <script>
    $("#comment-dropdown").click(function() {
      $("#commment-form-containter").toggleClass('display-inline-block display-none');
      $("#glyph-up").toggle();
      $("#glyph-down").toggle();
    })
  </script>
</body>
</html>
