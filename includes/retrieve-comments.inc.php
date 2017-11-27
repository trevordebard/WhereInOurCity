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
          <form action="includes/update-helpfulness.inc.php" method="POST" style="display:none;">
            <input type="text" name="posts_id" style="display:none" value="'.$row['posts_id'].'"/>
            <input type="text" name="comments_id" style="display:none" value="'.$row['comments_id'].'"/>
            <button id="'.$row['comments_id'].'" type="submit" class="btn" name="commentHelpfulnessBtn">Helpful? ['.$row['comments_helpfulness'].']</button>
          </form>
          <div class="comment-btn-container">
            <a class="helpful"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Helpful ['.$row['comments_helpfulness'].']</a>
            <p class="testpls" style="display: none;">'.$row['comments_id'].'</p>
            <a style="margin-left: 20px;" class="reply-comment"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Reply</a>
            <a style="margin-left: 20px;" class="view-replies"><span id="glyph-down" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span> View replies</a>
          </div>
          <form class="reply-form display-none" action="includes/post-reply.inc.php" method="POST">
            <textarea name="reply-textarea" class="reply-textarea form-control"></textarea>
            <input type="text" class="display-none" name="parent_id" value="'.$row["comments_id"].'"/>
            <input type="submit" name="commentReplyBtn" class="btn" value="Post Reply">
          </form>
          <ul>';

          $id = $row['comments_id'];
          include("includes/retrieve-replies.inc.php");
        echo '</ul></li>';
    }
  }
?>
<script>
  $("#comment-dropdown").click(function() {
    $("#commment-form-containter").toggleClass('display-none');
    $(this).children(".glyphicon").toggle();
  });

  $(".view-replies").click(function() {
    $(this).parent().next().next().children(".comment-reply").toggleClass('display-none');
  });

  $(".reply-comment").click(function() {
    $(this).parent().next(".reply-form").toggleClass('display-none');
  });

  $(".helpful").click(function() {
    var submitId = $(this).next(".testpls").text();
    console.log(submitId);
    $("#" + submitId).trigger("click");
  })
</script>
