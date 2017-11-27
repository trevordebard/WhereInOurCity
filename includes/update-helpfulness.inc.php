<?php
  session_start();
  if(isset($_SESSION['u_username'])){
    include 'dbh.php';
    if(isset($_POST["questionHelpfulnessBtn"])) {
      $user_id = $_SESSION[u_id];
      $post_id = $_POST['posts_id'];
      $query = "SELECT users_id FROM T_Post_Helpfulness WHERE users_id = '$user_id' AND posts_id = '$post_id'";
      $result = mysqli_query($conn,$query);
      if (mysqli_num_rows($result) == 0) {
        $query = "UPDATE T_Posts SET posts_helpfulness = posts_helpfulness + 1 WHERE posts_id='{$_POST['posts_id']}'";
        mysqli_query($conn,$query);
        $post_id = $_POST['posts_id'];
        $user_id = $_SESSION[u_id];
        $query = "INSERT INTO T_Post_Helpfulness (users_id, posts_id) VALUES ('$user_id', '$post_id');";
        mysqli_query($conn,$query);
        header("Location: ../cityhome.php");
        exit();
      }
      else {
        header("Location: ../cityhome.php");
        exit();
      }
    }
    else if(isset($_POST["commentHelpfulnessBtn"])) {
      $user_id = $_SESSION[u_id];
      $post_id = $_POST['posts_id'];
      $comment_id = $_POST['comments_id'];
      $query = "SELECT users_id FROM T_Comment_Helpfulness WHERE users_id = '$user_id' AND comments_id = '$comment_id'";
      $result = mysqli_query($conn,$query);
      if (mysqli_num_rows($result) == 0) {
        $query = "UPDATE T_Comments SET comments_helpfulness = comments_helpfulness + 1 WHERE comments_id='{$_POST['comments_id']}'";
        mysqli_query($conn,$query);
        $query = "INSERT INTO T_Comment_Helpfulness (comments_id,posts_id, users_id) VALUES ('$comment_id','$post_id', '$user_id');";
        mysqli_query($conn,$query);
        header("Location: ../questionhome.php?id=$post_id");
        exit();
      }
      else {
        header("Location: ../questionhome.php?id=$post_id");
        exit();
      }
    }
  }
  else {
    header("Location: ../cityhome.php");
    exit();
  }
?>
