<?php
  if (isset($_POST['filter-cateogry'])) {
    include 'dbh.php';
    $start = $conn->real_escape_string($_POST['start']);
    $limit = $conn->real_escape_string($_POST['questionsPerLoad']);
    $category = $conn->real_escape_string($_POST['category']);


    $query = "SELECT * FROM T_Posts WHERE posts_category='$category' ORDER BY posts_id DESC LIMIT $start, $limit";
    $results = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($results);
    if($resultCheck < 1){
      exit('reachedMax');
    }
    else {
      $response = "";
      while ($row = mysqli_fetch_assoc($results)) {
        //The .= concatonates the string to itself
        $response .= '
          <a href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item list-group-item-action flex-column align-items-start wrap-text">
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
?>
