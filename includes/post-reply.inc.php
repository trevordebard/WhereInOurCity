<?php
session_start();
if(isset($_POST['commentReplyBtn'])) { //checks to make sure commentReplyBtn brought you to this page
  if(isset($_SESSION['u_username'])){
    include_once 'dbh.php';
    $u_id = $_SESSION[u_id];
    $post_id = $_SESSION['post_id'];
    $parent_id = $_POST['parent_id'];

    $reply = mysqli_real_escape_string($conn, $_POST['reply-textarea']); //retrieves comment from textarea and sets to $comment

    //insert the user into the db
    $sql = "INSERT INTO T_Replies (comments_id, users_id, replies_reply) VALUES ('$parent_id', '$u_id', '$reply');";
    mysqli_query($conn, $sql);
    header("Location: ../questionhome.php?id=$post_id&reply=success");
    //echo("<script>console.log('PHP: ".$parent_id."');</script>");
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
