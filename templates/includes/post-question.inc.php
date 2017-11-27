<!--The include files for adding a recently asked question to the database-->
<?php
/*Retieves the session variables*/
session_start();
if(isset($_POST['askAQuestionSubmitBtn'])) { //checks to make sure askAQuestionSubmitBtn brought you to this page
  if(isset($_SESSION['u_username'])){ //Checks to make sure that the user who is asking the question is signed in
    include_once 'dbh.php'; //include the databse helper
    $u_id = $_SESSION[u_id]; //Set u_id to the id of the user who posted the question
    $question = mysqli_real_escape_string($conn, $_POST['question-question']); //prevents sql injection
    $description = mysqli_real_escape_string($conn, $_POST['question-description']); //prevents sql injection
    $category = mysqli_real_escape_string($conn, $_POST['question-category']); //prevents sql injection


    /*insert the user into the db*/
    $sql = "INSERT INTO T_Posts (posts_question, posts_description, users_id, posts_category) VALUES ('$question', '$description', '$u_id', '$category');";
    mysqli_query($conn, $sql);
    header("Location: ../cityhome.php?post=success"); //change the header to post=success to help with debugging
    exit(); //closes connection
  }else{
    header("Location: ../cityhome.php?pleasesignin"); //change the header to pleasesignin to help with debugging
    exit(); //close connection
  }
}
else {
  header("Location: ../index.php?post=error"); //if someone types in the url, this redirects to signup.php
  exit(); //Stops script from running
}
