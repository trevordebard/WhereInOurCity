<?php
  session_start(); //start a session to get and be able to use session variables
  if(isset($_POST['loginSubmitBtn'])){ //if the login submit button on the modal is clicked
    include 'dbh.php'; //include dbh.php so we can connect to database
    $loginUsername = mysqli_real_escape_string($conn,$_POST['loginUsername']); //stores the text inputted into username and mysqli_real_escape_string prevents sql injection
    $loginPassword = mysqli_real_escape_string($conn,$_POST['loginPassword']); //stores the text inputted into password and mysqli_real_escape_string prevents sql injection

    //ERROR Handlers
    if(empty($loginUsername) || empty($loginPassword)){ //Check if inputs are EmptyIterator
      header("Location: ../index.php?login=empty"); //if the are refresh and put in header
      exit(); //exit
    }else{
      $sql = "SELECT * FROM T_Users WHERE users_username='$loginUsername'"; //find the username in the database
      $result = mysqli_query($conn,$sql); //do the above sql statement
      $resultCheck = mysqli_num_rows($result); //get the number of rows where the username is found
      if($resultCheck < 1){
        header("Location: ../index.php?login=username"); //if there are no rows (0) then the username doesnt exist
        exit(); //exit
      }else{
        if($row = mysqli_fetch_assoc($result)){ //since a row was found get the information from that row
          $hashedPwdCheck = password_verify($loginPassword, $row['users_password']); //DE-HASHING PWD
          if($hashedPwdCheck == false){ //if dehased pw from database doesnt equal entered password
            header("Location: ../index.php?login=invalidcredentials"); //invalid credentials in header
            exit(); //exit
          }elseif($hashedPwdCheck == true) { //if dehased pw from database does equal entered password
            //Log in the user here
            $_SESSION['u_id'] = $row['users_id']; //save user id in a session variable
            $_SESSION['u_username'] = $row['users_username']; //save username in a session variable
            $_SESSION['u_email'] = $row['users_email']; //save email in a session variable
            header("Location: ../index.php?login=success"); //login is success in header
            exit(); //exit
          }
        }
      }
    }
  }else {
    header("Location: ../index.php?login=error3"); //should never occur
    exit(); //exit
  }
?>
