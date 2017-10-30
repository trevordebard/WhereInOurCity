<?php
session_start();
if(isset($_POST['askAQuestionSubmitBtn'])) { //checks to make sure askAQuestionSubmitBtn brought you to this page
  if(isset($_SESSION['u_username'])){
    include_once 'dbh.php';
    $u_id = $_SESSION[u_id];
    $question = mysqli_real_escape_string($conn, $_POST['question-question']); //prevents sql injection
    $description = mysqli_real_escape_string($conn, $_POST['question-description']);
    //insert the user into the db
    $sql = "INSERT INTO T_Posts (posts_question, posts_description, users_id) VALUES ('$question', '$description', '$u_id');";
    mysqli_query($conn, $sql);
    header("Location: ../cityhome.php?post=success");
    exit();
  }else{
    header("Location: ../cityhome.php?pleasesignin");
    exit();
  }
}
else {
  header("Location: ../index.php?post=error"); //if someone types in the url, this redirects to signup.php
  exit(); //Stops script from running
}
