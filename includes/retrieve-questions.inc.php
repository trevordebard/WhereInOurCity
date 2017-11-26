<?php
  include 'dbh.php';
  $query = "SELECT * FROM T_Posts ORDER BY posts_id DESC";
  $results = mysqli_query($conn,$query);
  $resultCheck = mysqli_num_rows($results);
  if($resultCheck < 1){
    echo 'helo';
  }
  else {
    while ($row = mysqli_fetch_assoc($results)) {
      echo
        '<a href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item  list-group-item-action flex-column align-items-start wrap-text">
          <div class="d-flex w-100 justify-content-between">
            <h2>'.$row['posts_question'].'</h2>
            <p>'.$row['posts_description'].'</p>
            <button class="btn">Helpful?</button>
          </div>
        </a>';
    }
<<<<<<< HEAD
  }
=======
    else {
      $response = "";
      while ($row = mysqli_fetch_assoc($results)) {
        //The .= concatonates the string to itself
        $response .= '
          <a href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item  list-group-item-action flex-column align-items-start wrap-text">
            <div class="d-flex w-100 justify-content-between">
              <h2>'.$row['posts_question'].'</h2>
              <p>'.$row['posts_description'].'</p>
              <button class="btn">Helpful?</button>
            </div>
          </a>
        ';
      }
      exit($response);
    }
}
>>>>>>> origin/master
?>
