<?php
  session_start(); //start a new session
    if(isset($_POST['deleteAccountBtn'])){ //check to see if the delete account button has been pressed
        include 'dbh.php'; //include the database helper
        $u_id = $_SESSION['u_id']; //Set u_id to be the u_id session variable
        $sql = "DELETE FROM t_users WHERE users_id = $u_id"; //search the database for the user id and delete the user
        mysqli_query($conn, $sql); //queries the database
        session_unset();
        session_destroy();
        header("Location: ../index.php?delete=success"); //change the header to have delete=success for debugging help
        exit(); //close the connection
    }
    else{
      header("Location: ../index.php?delete=error"); //if someone types in the url, this redirects to signup.php
      exit(); //Stops script from running
    }
?>
