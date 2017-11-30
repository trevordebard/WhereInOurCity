<?php
  if(isset($_POST['logoutBtn'])){ //Check to see if the logout button is pressed
    session_start(); //start a new session
    session_unset();
    session_destroy();
    header("Location: ../index.php"); //go back to the homepage
    exit();
  }
 ?>
