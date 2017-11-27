
<?php
  include_once("includes/dbh.php"); //import the database helper

  if(isset($_POST['searchNewCity'])){//Checks to see if the search button has been pressed.
   $search = mysqli_real_escape_string($conn, $_POST['searchNewCity']);//Stores the desired search query in the search session variable. Uses real_escape_string to sanitize input.
   $search_input = "SELECT * FROM T_Comments WHERE comments_comment LIKE '%$search%'";//Establishes the desired query condition as when there is an index in comments_comment that matches the search phrase.
   $search_query = mysqli_query($conn, $search_input); //Queries the database in search of the desired input.
   $search_results = mysqli_num_rows($search_query); //Gets the number of rows that match the database query.
   if ($search_results > 0) { //If the number of results is greater than zero, do the following.
		while ($row = mysqli_fetch_assoc($search_query)){ //Loop as long as the row and the result set are equal.
				echo '
				<a style="width:64%; margin-left:18%;" href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item list-group-item-action flex-column align-items-start wrap-text">
					  <div class="d-flex w-100 justify-content-between">
						<p>'.$row['comments_comment'].'</p>
						<button class="btn">Helpful?</button>
					  </div>
					</a>';//This governs the behavior for outputing the comment data from the search query.
                //Style sets the appearance of the list group items.
                //This displays the row for all comments and then allows for a clickable href to bring the user to the parent post.
		}
	}
	if($search_results<=0){ //If there aren't any search results, echo that there aren't any results.
		echo "There are no results.";
	}
}else {//If search hasn't been selected, prompt the user that there are no results. 
		echo "There are no results.";
	}
?>
