<?php
  include 'dbh.php';
  $query = "SELECT * FROM T_Comments WHERE posts_id='{$_SESSION['post_id']}' ORDER BY comments_id DESC";
  $results = mysqli_query($conn, $query);
  $resultCheck = mysqli_num_rows($results);
  if($resultCheck < 1){
    echo 'helo';
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
            <textarea class="reply-textarea form-control display-none"></textarea>
          </div>
          <ul class="list-group">
            <li class="list-group-item comment-reply display-none wrap-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>
            <li class="list-group-item comment-reply display-none wrap-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>
            <li class="list-group-item comment-reply display-none wrap-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>
            <li class="list-group-item comment-reply display-none wrap-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>
          </ul>
        </li>';
    }
  }
?>
