
<?php
  include_once("includes/dbh.php"); //import the database helper

  if(isset($_POST['searchNewCity'])){
   $search = mysqli_real_escape_string($conn, $_POST['searchNewCity']);
   $search_input = "SELECT * FROM T_Comments WHERE comments_comment LIKE '%$search%'";
   $search_query = mysqli_query($conn, $search_input);
   $search_results = mysqli_num_rows($search_query);
   if ($search_results > 0) {
		while ($row = mysqli_fetch_assoc($search_query)){
				echo '
				<a style="width:64%; margin-left:18%;" href="questionhome.php?id='.$row['posts_id'].'" class="list-group-item list-group-item-action flex-column align-items-start wrap-text">
					  <div class="d-flex w-100 justify-content-between">
						<p>'.$row['comments_comment'].'</p>
						<button class="btn">Helpful?</button>
					  </div>
					</a>';
		}
	}
	if($search_results<=0){
		echo "There are no results.";
	}
 }else {
		echo "There are no results!";
	}
?>