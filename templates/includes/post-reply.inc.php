<?php
session_start();
if(isset($_POST['commentReplyBtn'])) { //checks to make sure commentReplyBtn brought you to this page
  if(isset($_SESSION['u_username'])){ //check to see if the user is logged in
    include_once 'dbh.php'; //connect to the database
    $u_id = $_SESSION[u_id]; //gets the users_id of the logged in user and sets it to $u_id
    $post_id = $_SESSION['post_id']; //gets the post_id of the current post and sets it to $post_id
    $parent_id = $_POST['parent_id']; //gets the id of the commment the reply is replying to and sets it to $parent_id

    $reply = mysqli_real_escape_string($conn, $_POST['reply-textarea']); //retrieves reply from textarea and sets to $reply

    //insert the user into the db
    $sql = "INSERT INTO T_Replies (comments_id, users_id, replies_reply) VALUES ('$parent_id', '$u_id', '$reply');";
    mysqli_query($conn, $sql); //run the sql statement in the database
    header("Location: ../questionhome.php?id=$post_id&reply=success"); //refreshes the current page with the tag reply=success
    exit(); //exit this script
  }
  else{
    header("Location: ../questionhome.php?pleasesignin"); //refresh the page with the tag pleasesignin
    exit(); //exit this script
  }
}
else {
  header("Location: ../index.php?postcomment=error"); //if someone types in the url, this redirects to signup.php
  exit(); //Stops script from running
}
