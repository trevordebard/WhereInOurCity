<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Sign Up for WIOC</title>
    <style>
      #wiocNavbarLogo{
        positon:relative;
        top:2px;
      }
      .navbar-brand>img{
        margin-top:-23px;
        height:60px;
        width:auto;
      }
      #signUpContainer{
        width:500px;
        height:530px;
        background-color: white;
        margin: 0 auto;
        padding: 1px;
        font-family: helvetica, sans-serif;
      }
      #signUpContainer h1{
        text-align: center; /*Centers the header*/
  		  font-size: 35px; /*Changes the size of the header*/
  		  font-family: helvetica, sans-serif;
  			color:#247BA0; /*Color of the header*/
        padding-bottom: 5px;
      }
      #signUpContainer p{
        color:black;
        font-size:15px;
      }
      #signUpSubmit {
  			border-radius: 4px; /*Rounds button edges*/
  		  color: white; /*Text of submit*/
  		  background-color: #247BA0; /*Background color of button*/
  		  padding: 10px 0px; /*Affects the height of the button*/
  		  font-size: 19px; /*Font size of the text on the button*/
  			border:none; /*Need this or as some dumb auto border, can do this with border:0 not sure which is better practice*/
  			width: 100%; /*Takes up all space on modal while keeping padding*/
  		  display: block;
  		  position: relative;
  			margin-top:80px; /*How far the submit button is away from the thing above it*/
  		}

      #signUpSubmit:hover {
  		  background-color: #0A678F; /*Color of background when cursor is hovering on submit button*/
  		}

  		.signUpText { /*Controls text and text box for username and password*/
  		  height: 50px; /*Height of text boxes*/
  		  font-size: 16px; /*Font size of placeholder text and text typed into box*/
  		  width: 100%; /*Takes up all space on modal while keeping padding*/
  		  margin-bottom: 10px; /*How far away each text box is away from the thing below it*/
  		  background-color: white; /*Background color of the text boxes*/
  			padding: 0 10px; /*How far placeholder and actual typed text are away from the sides from the textbox, also affects where the text starts*/
  		  border: none; /*Border of text box*/
  			border-bottom:1px solid #247BA0; /*Gives us only the bottom border*/
  		}
  		.signUpText:hover {
  		  border-bottom: 2px solid #0A678F; /*Adds a border when hovering over username and password text boxes*/
  		}
      #yourCityText{
        margin-top:5px;
      }

      select {
        padding: 10px;
        max-width: 100%;
        height: auto !important;
        border: 1px solid #247BA0;
        border-radius: 5px;
        color: black;
        font-size: 12px;
        appearance: none; /* this is must */
      }
      select:hover{
        border:1.2px solid #0A678F;
      }
    </style>

  </head>

  <body>
    <nav class="navbar navbar-default">
      <a class="navbar-brand" href="index.html">
        <img src="images/wiocLogo.png" id="wiocNavbarLogo" alt="">
      </a>
      <!--Need to link this wioc logo back to index.html-->
  	</nav>
    <div id="signUpContainer">
      <h1>Create an Account</h1>
      <form action="includes/signup-inc.php" method="POST">
        <input type="text" name="username" id="signUpUser" class="signUpText" placeholder="Username">
        <input type="text" name="email" id="signUpEmal" class="signUpText" placeholder="Email">
        <input type="password" name="password" id="signUpPass" class="signUpText" placeholder="Password">
        <button type="submit" name="signUpSubmitBtn" id="signUpSubmit" class="signUp">Sign up</button>
      </form>
    </div>


  </body>


</html>
