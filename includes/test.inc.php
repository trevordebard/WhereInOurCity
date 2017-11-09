<?php
  include 'dbh.php';
  $query = "SELECT posts_question FROM T_Posts";
  $results = mysqli_query($conn,$query);
  $resultCheck = mysqli_num_rows($results);
  if($resultCheck < 1){
    echo 'helo';
  }
  else {
    while ($row = mysqli_fetch_assoc($results)) {
      echo '<p>'.$row['posts_question'].'</p>';
    }
  }
?>
