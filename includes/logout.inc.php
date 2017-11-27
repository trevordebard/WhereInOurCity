<?php
  if(isset($_POST['logoutBtn'])){ //Check to see if the logout button is pressed
    session_start(); //start a new session
    session_unset(); //deletes session variables
    session_destroy(); //deletes all data associated with username
    //can just do session_destroy but i did both just to be safe
    header("Location: ../index.php"); //go back to the homepage
    exit(); //exit
  }
 ?>
