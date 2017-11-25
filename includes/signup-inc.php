<?php
if(isset($_POST['signUpSubmitBtn'])) { //checks to make sure signUpSubmitBtn brought you to this page
  include_once 'dbh.php'; //don't have to do /incldue/dbh.php b/c we are inside that folder

  /*mysqli_real_escape_string prevents sql injection. The rest of this section gets username, password, and email*/
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
  /*insert the user into the db*/
  $sql = "INSERT INTO T_Users (users_username, users_email, users_password) VALUES ('$username', '$email', '$hashedPwd');";
  mysqli_query($conn, $sql); //Queries the databse
  header("Location: ../signup.php"); //Sets the header
  exit(); //Closes the connection
}
else {
  header("Location: ../index.php"); //if someone types in the url, this redirects to signup.php
  exit(); //Stops script from running
}
