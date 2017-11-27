<?php
session_start();
if(isset($_POST['commentSubmitBtn'])) { //checks to make sure commentSubmitBtn brought you to this page
  if(isset($_SESSION['u_username'])){ //checks that the user is logged in
    include_once 'dbh.php'; //include the database helper
    $u_id = $_SESSION[u_id]; //gets the user id and sets it to $u_id
    $post_id = $_SESSION['post_id']; //gets the post id and sets it to $post_id
    $comment = mysqli_real_escape_string($conn, $_POST['comment-textarea']); //retrieves comment from textarea and sets to $comment

    //insert the user into the db
    $sql = "INSERT INTO T_Comments (comments_comment, posts_id, users_id) VALUES ('$comment', '$post_id', '$u_id');"; //creates sql statement for insert
    mysqli_query($conn, $sql); //runs the sql statement in the database
    header("Location: ../questionhome.php?id=$post_id&post=success"); //reloads the questionhome page with the new post
    exit(); //exits this file
  }
  else{
    header("Location: ../questionhome.php?pleasesignin"); //relocates to questionhome and indicates user is not signed in
    exit();
  }
}
else {
  header("Location: ../index.php?postcomment=error"); //if someone types in the url, this redirects to signup.php
  exit(); //Stops script from running
}
