<?php
  include 'dbh.php'; //connects to the dtatbase
  $query = "SELECT * FROM T_Comments WHERE posts_id='{$_SESSION['post_id']}' ORDER BY comments_id DESC"; //retrieves the comments for this post and orders them by recency
  $results = mysqli_query($conn, $query); //runs the above sql code
  $resultCheck = mysqli_num_rows($results); //checks to see the number of rows returned by the sql statement
  if($resultCheck < 1){ //if there are no rows returned
    echo 'This post currently has no comments. Be the first to comment!'; //lets the user know there are no comments
  }
  else {
    while ($row = mysqli_fetch_assoc($results)) { //iterates the rows of comments
      $usernameSQL = "SELECT users_username FROM T_Users WHERE users_id ='{$row['users_id']}'"; //gets the user name of current comment
      $results2 = mysqli_query($conn, $usernameSQL); //runs the above sql code
      $username = mysqli_fetch_assoc($results2); //stores the username row in $username
      /*
       * Displays the comments and their replies on the questionhome page as a list group
       * @var $username['users_username'] is the username of the commenter
       * @var $row['comments_comment'] is the actual comment from the database. All $row['YYY'] variables are getting the column YYY from the current row
       * The first form is included to pass information along to update-helpfulness (this is why it is display none).
       * The second form is for posting a reply to a given comment
       */
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
            <p class="commentIdClass" style="display: none;">'.$row['comments_id'].'</p>
            <a style="margin-left: 20px;" class="reply-comment"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Reply</a>
            <a style="margin-left: 20px;" class="view-replies"><span id="glyph-down" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span> View replies</a>
          </div>
          <form class="reply-form display-none" action="includes/post-reply.inc.php" method="POST">
            <textarea name="reply-textarea" class="reply-textarea form-control"></textarea>
            <input type="text" class="display-none" name="parent_id" value="'.$row["comments_id"].'"/>
            <input type="submit" name="commentReplyBtn" class="btn" value="Post Reply">
          </form>
          <ul>';
          $id = $row['comments_id']; //stores the id of the user inside $id (this will be used in retrieve-replies)
          include("includes/retrieve-replies.inc.php");
        echo '</ul></li>';
    }
  }
?>
<script>
  $("#comment-dropdown").click(function() { //when the commentdropdown (inside questionhome) is clicked
    $("#commment-form-containter").toggleClass('display-none'); //display the dropdown (or hide it if it's already displayed)
    $(this).children(".glyphicon").toggle(); //hide or show the icon that indicates it can be clicked
  });

  $(".view-replies").click(function() { //when a view replies is clicked next to a comment
    $(this).parent().next().next().children(".comment-reply").toggleClass('display-none'); //toggle the display of the comments replies
  });

  $(".reply-comment").click(function() { //when a reply comment is clicked
    $(this).parent().next(".reply-form").toggleClass('display-none'); //toggle display of the form to type in a reply
  });

  $(".commentIdClass").click(function() { //when a helpful button is clicked
    var submitId = $(this).next(".testpls").text(); //get the text inside the input, which will be the comment id you are marking as helpful
    $("#" + submitId).trigger("click"); //trigger the form for the comment id, which will call update-helpfulness.inc.php and update the database
  })
</script>
