<?php
  session_start();
    if(isset($_POST['deleteAccountBtn'])){
        include 'dbh.php';
        $u_id = $_SESSION['u_id'];
        $sql = "DELETE FROM t_users WHERE users_id = $u_id";
        mysqli_query($conn, $sql);
        session_unset();
        session_destroy();
        header("Location: ../index.php?delete=success");
        exit();
    }
    else{
      header("Location: ../index.php?delete=error"); //if someone types in the url, this redirects to signup.php
      exit(); //Stops script from running
    }


?>
