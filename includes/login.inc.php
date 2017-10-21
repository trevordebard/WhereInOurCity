<?php
  session_start();
  if(isset($_POST['loginSubmitBtn'])){
    include 'dbh.php';
    $loginUsername = mysqli_real_escape_string($conn,$_POST['loginUsername']);
    $loginPassword = mysqli_real_escape_string($conn,$_POST['loginPassword']);

    //ERROR Handlers
    //Check if inputs are EmptyIterator
    if(empty($loginUsername) || empty($loginPassword)){
      header("Location: ../index.php?login=empty");
      exit();
    }else{
      $sql = "SELECT * FROM T_Users WHERE users_username='$loginUsername'";
      $result = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1){
        header("Location: ../index.php?login=error1");
        exit();
      }else{
        if($row = mysqli_fetch_assoc($result)){
          //DE-HASHING PWD
          $hashedPwdCheck = password_verify($loginPassword, $row['users_password']);
          if($hashedPwdCheck == false){
            header("Location: ../index.php?login=error2");
            exit();
          }elseif($hashedPwdCheck == true) {
            //Log in the user here
            $_SESSION['u_id'] = $row['users_id'];
            $_SESSION['u_username'] = $row['users_username'];
            $_SESSION['u_email'] = $row['users_email'];
            header("Location: ../index.php?login=success");
            exit();
          }
        }
      }
    }
  }else {
    header("Location: ../index.php?login=error3");
    exit();
  }

?>
