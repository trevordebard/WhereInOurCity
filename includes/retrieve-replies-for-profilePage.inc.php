<?php
  include 'dbh.php';

  $query = "SELECT replies_reply FROM T_Replies WHERE users_id = '".$_SESSION['u_id']."'";
  $results = mysqli_query($conn, $query);
  $resultCheck = mysqli_num_rows($results);
  if($resultCheck == 0){
    echo '<h2 style="margin-left:4%;">No Replies Posted Yet!</h2>';
  }
  else{
    while ($row = mysqli_fetch_assoc($results)) {
      echo '<a href="#" style="width:64%; max-width: 1000px; float:left; margin-left:4%; margin-bottom:1%; border-radius:5px;" class="list-group-item list-group-item-action flex-column align-items-start wrap-text">
              <div class="d-flex w-100 justify-content-between">
                <h2>'.$row['replies_reply'].'</h2>
              </div>
            </a>';
    }
  }
?>
