<?php
  include 'dbh.php';
  $query = "SELECT * FROM T_Comments WHERE posts_id='{$_SESSION['post_id']}' ORDER BY comments_id DESC";
  $results = mysqli_query($conn, $query);
  $resultCheck = mysqli_num_rows($results);
  if($resultCheck < 1){

  }
  else {
    while ($row = mysqli_fetch_assoc($results)) {
      $username = "SELECT users_username FROM T_Users WHERE users_id ='{$row['users_id']}'";
      $results2 = mysqli_query($conn, $username);
      $username = mysqli_fetch_assoc($results2);
      echo
        '<li class="list-group-item list-group-item-action comment-lgi wrap-text">
          <h5>'.$username['users_username'].'</h5>
          <p>'.$row['comments_comment'].'</p>
          <hr class="comment-hr">
          <div class="comment-btn-container">
            <a><span class="glyphicon glyphicon-share-alt reply-comment" aria-hidden="true"></span> Reply</a>
            <a style="margin-left: 20px;" class="view-replies"><span id="glyph-down" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span> View replies</a>
          </div>
          <form class="reply-form" action="includes/post-reply.inc.php" class="display-none" method="POST">
            <textarea name="reply-textarea" class="reply-textarea form-control"></textarea>
            <input type="text" class="display-none" name="parent_id" value="'.$row["comments_id"].'"/>
            <input type="submit" name="commentReplyBtn" class="btn" value="Post Reply">
          </form><ul>';
          $id = $row['comments_id'];
          include("includes/retrieve-replies.inc.php");
        echo '</ul></li>';
    }
  }
?>
