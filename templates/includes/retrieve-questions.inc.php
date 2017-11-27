<?php
  /*This if statement checks to see if the user was brought to this page by fillpage. If they were then
  we include the database helper and save the start, limit, and category variables as a string to prevent
  sql injection*/
  if (isset($_POST['fillPage'])) {
    include 'dbh.php';
    $start = $conn->real_escape_string($_POST['start']);
    $limit = $conn->real_escape_string($_POST['questionsPerLoad']);
    $category = $conn->real_escape_string($_POST['category']);

    /*If there is no category selected the webpage will load all categories by default. The query selects
    all rows from T_Posts and orders them by post_id in descending order from the start value to the limit value*/
    if($category == "") {
      $query = "SELECT * FROM T_Posts ORDER BY posts_id DESC LIMIT $start, $limit";
      $results = mysqli_query($conn,$query);
      $resultCheck = mysqli_num_rows($results);
      if($resultCheck < 1){ //If there aren't any more questions left in the database, exit and return 'reachedMax'
        exit('reachedMax');
      }
      else {
        $response = "";
        /*While rows still exist in the database, we want to concatonate the html code onto the response string
        to build the questions programmatically. Each question contains a question, description, and a helpful button*/
        while ($row = mysqli_fetch_assoc($results)) {
          //The .= concatonates the string to itself
          $response .= '
            <a href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item list-group-item-action flex-column align-items-start wrap-text">
              <div class="d-flex w-100 justify-content-between">
                <h2>'.$row['posts_question'].'</h2>
                <p>'.$row['posts_description'].'</p>
                <form action="includes/update-helpfulness.inc.php" method="POST">
                  <input type="text" name="posts_id" style="display:none" value="'.$row['posts_id'].'"/>
                  <button type="submit" class="btn" name="questionHelpfulnessBtn">Helpful? ['.$row['posts_helpfulness'].']</button>
                </form>
              </div>
            </a>
          ';
        }
        exit($response); //sends the response back to cityhome
      }
    }

    /*Once the user selects a category the webpage will update to have it sorted by category. The query selects
    all rows from T_Posts where the category column is equal to the category that the user selects. The
    results are ordered by post_id in descending order */
    else {
      $query = "SELECT * FROM T_Posts WHERE posts_category='{$category}' ORDER BY posts_id DESC LIMIT {$start}, {$limit}";
      $results = mysqli_query($conn,$query);
      $resultCheck = mysqli_num_rows($results);
      if($resultCheck < 1){ //if there are no questions in that category return reachedMax
        exit('reachedMax');
      }
      else {
        $response = "";
        /*While rows still exist in the database, we want to concatonate the html code onto the response string
        to build the questions programmatically. Each question contains a question, description, and a helpful button*/
        while ($row = mysqli_fetch_assoc($results)) {
          //The .= concatonates the string to itself
          $response .= '
            <a href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item list-group-item-action flex-column align-items-start wrap-text">
              <div class="d-flex w-100 justify-content-between">
                <h2>'.$row['posts_question'].'</h2>
                <p>'.$row['posts_description'].'</p>
                <form action="includes/update-helpfulness.inc.php" method="POST">
                  <input type="text" name="posts_id" style="display:none" value="'.$row['posts_id'].'"/>
                  <button type="submit" class="btn" name="questionHelpfulnessBtn">Helpful? ['.$row['posts_helpfulness'].']</button>
                </form>
              </div>
            </a>
          ';
        }
        exit($response); //sends the response back to cityhome
      }
    }
}
?>
