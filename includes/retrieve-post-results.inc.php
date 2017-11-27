<?php
  include_once("includes/dbh.php"); //import the database helper

  if(isset($_POST['searchNewCity'])){//Checks to see if the search button has been pressed.
   $search = mysqli_real_escape_string($conn, $_POST['searchNewCity']);//Stores the desired search query in the search session variable. Uses real_escape_string to sanitize input.
   $search_input = "SELECT * FROM T_Posts WHERE posts_question LIKE '%$search%' OR posts_description LIKE '%$search%'"; //Establishes the desired query condition as when there is an index in table T_Posts
   //where post_question is like the desired search or posts_description is like the desired search.
   $search_query = mysqli_query($conn, $search_input); //Queries the database in search of the desired input.
   $search_results = mysqli_num_rows($search_query); //Gets the number of rows that match the database query.
   if ($search_results > 0) {//If the number of results is greater than zero, do the following.
 			while ($row = mysqli_fetch_assoc($search_query)){//Loop as long as the row and the result set are equal.
				echo '
					<a style="width: 64%; margin-left: 18%;" href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item list-group-item-action flex-column align-items-start wrap-text">
					  <div class="d-flex w-100 justify-content-between">
						<h2>'.$row['posts_question'].'</h2>
						<p>'.$row['posts_description'].'</p>
						<button class="btn">Helpful?</button>
					  </div>
					</a>
					';//This governs the behavior for outputing the question and description data gathered from the search query.
            //Style sets the appearance of the list group items.
            //This displays the row for all Posts and then allows for a clickable href to bring the user that post all of the comments and replies attached to the post.
 			}
		}
	if($search_results<=0){
		echo "There are no results."; //If there aren't any search results, echo that there aren't any results.
	}
 }else {
		echo "There are no results!";//If search hasn't been selected, prompt the user that there are no results.
	}
?>
