<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
    echo '<h2 align="center">'.$row['posts_question'].'</h2>';
    echo '<p align="center">'.$row['posts_description'].'</p>';
  ?>
  <div id="question-container">

  </div>
</body>
</html>
