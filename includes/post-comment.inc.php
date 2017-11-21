<?php
session_start();
if(isset($_POST['commentSubmitBtn'])) { //checks to make sure commentSubmitBtn brought you to this page
  if(isset($_SESSION['u_username'])){
    include_once 'dbh.php';
    $u_id = $_SESSION[u_id];
    $post_id = $_SESSION['post_id'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment-textarea']); //retrieves comment from textarea and sets to $comment

    //insert the user into the db
    $sql = "INSERT INTO T_Comments (comments_comment, posts_id, users_id) VALUES ('$comment', '$post_id', '$u_id');";
    mysqli_query($conn, $sql);
    header("Location: ../questionhome.php?id=$post_id&post=success");
    exit();
  }
  else{
    header("Location: ../questionhome.php?pleasesignin");
    exit();
  }
}
else {
  header("Location: ../index.php?postcomment=error"); //if someone types in the url, this redirects to signup.php
  exit(); //Stops script from running
}
