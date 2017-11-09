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
  ?>
  <div id="question-container">
    <div id="question">
      <h3>This is a question</h3>
    </div>
    <div id="question-description">
      <h5>This is the question description</h5>
  </div>
</body>
</html>
