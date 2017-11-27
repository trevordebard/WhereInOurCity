<?php
  //echo $id;
  include 'dbh.php'; //imports the database helper.
  $leftJoinQuery = "SELECT T_Replies.*, T_Users.users_username FROM T_Replies LEFT JOIN T_Users ON T_Replies.users_id = T_Users.users_id WHERE T_Replies.comments_id='{$id}';";
  //leftJoinQuery creates a query where the user's name is found in T_Replies. The Users id is then determined as where the comment id is equal to the id.
  $results1 = mysqli_query($conn,$leftJoinQuery); //Queries the database in search of the desired input.
  $resultCheck1 = mysqli_num_rows($results1);//Gets the number of rows that match the database query.
  if($resultCheck1 < 1){ //If the number of results found is less than 1, do nothing.
  }
  else {//Since the result set is at least one item, do the following code.
    while ($row1 = mysqli_fetch_assoc($results1)) {//Loop as long as the row and the result set are equal.
      $reply = $row1['replies_reply'];//Creates a session variable for results in the database that are a part of the row replies_reply.
      $username1 = $row1['users_username']; //Creates a session variable storing the username of the person that replied.
      echo
        '<li class="list-group-item comment-reply display-none wrap-text">
          <h5>'.$username1.'</h5>
          '.($reply==null ? '"Be the first to reply"' : $reply).'
          </li>';
    } //The class governs the appearance of the replies.
      //Echoing the username variable displays the user that posted the reply.
      //If the reply is empty, the website displays the text stating be the first to reply. Otherwise it displays the user's reply.
  }
?>
