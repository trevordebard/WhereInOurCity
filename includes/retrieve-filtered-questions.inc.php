<?php
  if (isset($_POST['filter-cateogry'])) { //makes sure the filter dropdown sent the user to this page
    include 'dbh.php'; //creates connection to the database
    $start = $conn->real_escape_string($_POST['start']); //gets the starting location for infinite scroll
    $limit = $conn->real_escape_string($_POST['questionsPerLoad']); //gets the ending location for infinite scroll
    $category = $conn->real_escape_string($_POST['category']); //gets the category the user wants to filter

    //sql code to pull posts from the database with the requested category
    $query = "SELECT * FROM T_Posts WHERE posts_category='$category' ORDER BY posts_id DESC LIMIT $start, $limit";
    $results = mysqli_query($conn, $query); //runs the sql code
    $resultCheck = mysqli_num_rows($results); //gets the number of rows returned
    if($resultCheck < 1){ //if there are no rows
      exit('reachedMax'); //return 'reachedMax', which the ajax call will handle
    }
    else {
      $response = ""; //set the response to be blank
      while ($row = mysqli_fetch_assoc($results)) { //iterates through the returned rows
        //This block of code returns the posts of the given category in a list group item, which will be displayed on cityhome
        //The .= concatonates the string to itself
        //The $row['YYY'] variables are column YYY of the current row
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
      exit($response); //exits with $response for the ajax call
    }
}
?>
