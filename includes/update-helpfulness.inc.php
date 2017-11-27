<?php
  session_start(); //start the session
  if(isset($_SESSION['u_username'])){ //if the user is logged in
    include 'dbh.php'; //include database helper
    if(isset($_POST["questionHelpfulnessBtn"])) { //if the helpfulness button on the cityhome was pressed
      /*Set user_id to the session variable u_id, post_id to post_id of the question. The query selects
      the user_id from the T_Post_Helpfulness table where the columns users_id and posts_id equal to the assigned
      variables. The point of this query and subsequent lines is to limit each user to voting on a post once*/
      $user_id = $_SESSION[u_id];
      $post_id = $_POST['posts_id'];
      $query = "SELECT users_id FROM T_Post_Helpfulness WHERE users_id = '$user_id' AND posts_id = '$post_id'";
      $result = mysqli_query($conn,$query);
      if (mysqli_num_rows($result) == 0) { //if the user hasn't like this post before
        /*This query updates the amount of votes on a specific post*/
        $query = "UPDATE T_Posts SET posts_helpfulness = posts_helpfulness + 1 WHERE posts_id='{$_POST['posts_id']}'";
        mysqli_query($conn,$query);
        $post_id = $_POST['posts_id'];
        $user_id = $_SESSION[u_id];
        /*This query inserts the users_id and the posts_id into the T_Post_Helpfulness table. The point of this
        is to indicate that the user has voted on a specific post before*/
        $query = "INSERT INTO T_Post_Helpfulness (users_id, posts_id) VALUES ('$user_id', '$post_id');";
        mysqli_query($conn,$query);
        header("Location: ../cityhome.php"); //send the user back to cityhome to refresh the page
        exit();
      }
      else {
        header("Location: ../cityhome.php");
        exit();
      }
    }
    else if(isset($_POST["commentHelpfulnessBtn"])) { //if the helpfulness button was pressed on a comment
      /*Set user_id to the session variable u_id, post_id to post_id of the question, and the comment_id
      to comment_id of the question. The query selects the user_id from the T_Comment_Helpfulness table where
      the columns users_id, posts_id, and comments_id equal to the assigned variables. The point of this query and
      subsequent lines is to limit each user to voting on a comment once*/
      $user_id = $_SESSION[u_id];
      $post_id = $_POST['posts_id'];
      $comment_id = $_POST['comments_id'];
      $query = "SELECT users_id FROM T_Comment_Helpfulness WHERE users_id = '$user_id' AND comments_id = '$comment_id'";
      $result = mysqli_query($conn,$query);
      if (mysqli_num_rows($result) == 0) {//if the user hasn't liked this comment before
        /*Update the amount of likes for comments_helpfulness by 1*/
        $query = "UPDATE T_Comments SET comments_helpfulness = comments_helpfulness + 1 WHERE comments_id='{$_POST['comments_id']}'";
        mysqli_query($conn,$query);
        /*This query inserts the users_id, comment_id, and the posts_id into the T_Comment_Helpfulness table. The point of this
        is to indicate that the user has voted on a specific comment before*/
        $query = "INSERT INTO T_Comment_Helpfulness (comments_id,posts_id, users_id) VALUES ('$comment_id','$post_id', '$user_id');";
        mysqli_query($conn,$query);
        header("Location: ../questionhome.php?id=$post_id"); //refresh the questionhome page with the post_id
        exit();
      }
      else {
        header("Location: ../questionhome.php?id=$post_id"); //refresh the questionhome page with the post_id
        exit();
      }
    }
  }
  else {
    header("Location: ../cityhome.php"); //if the user isn't logged in, refresh cityhome
    exit();
  }
?>
