<?php
  //echo $id;
  include 'dbh.php';
  $leftJoinQuery = "SELECT T_Replies.*, T_Users.users_username FROM T_Replies LEFT JOIN T_Users ON T_Replies.users_id = T_Users.users_id WHERE T_Replies.comments_id='{$id}';";
  //$query1 = "SELECT * FROM T_Replies WHERE comments_id='{$id}' ORDER BY replies_id DESC";
  $results1 = mysqli_query($conn,$leftJoinQuery);
  $resultCheck1 = mysqli_num_rows($results1);
  if($resultCheck1 < 1){
    echo 'helo';
  }
  else {
    while ($row1 = mysqli_fetch_assoc($results1)) {
      $reply = $row1['replies_reply'];
      $username1 = $row1['users_username'];
      echo
        '<li class="list-group-item comment-reply display-none wrap-text">
          <h5>'.$username1.'</h5>
          '.$reply.'
          </li>';
    }
  }
?>
