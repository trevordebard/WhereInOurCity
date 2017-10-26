<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        width:85%; /*Sets width for mobile devices*/
        max-width:500px; /*The sign up container can never be bigger than 500px*/
        height:100%; /*Sets width for mobile*/
        max-height:530px; /*The height can never be bigger thaan 530px*/
        background-color: white; /*Sets background color to white*/
        margin: 0 auto; /*Centers container itself in the middle of the page*/
        padding: 1px; /*How much space the content inside have between each other*/
        font-family: helvetica, sans-serif; /*font*/
      }
      #signUpContainer h1{
        text-align: center; /*Centers the header*/
  		  font-size: 35px; /*Changes the size of the header*/
  		  font-family: helvetica, sans-serif; /*font*/
  			color:#247BA0; /*Color of the header*/
        padding-bottom: 5px; /*How far the things below the header are from the header*/
      }
      #signUpSubmit {
  			border-radius: 4px; /*Rounds button edges*/
  		  color: white; /*Text of submit*/
  		  background-color: #247BA0; /*Background color of button*/
  		  padding: 10px 0px; /*Affects the height of the button*/
  		  font-size: 19px; /*Font size of the text on the button*/
  			border:none; /*Need this or as some dumb auto border, can do this with border:0 not sure which is better practice*/
  			width: 100%; /*Takes up all space on modal while keeping padding*/
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
        -webkit-border-radius:0; /*IOS likes to give random border radius so this fixes that problem*/
        border-radius:0; /*Explicitly setting border radius to 0, see above line*/

  		}
  		.signUpText:hover {
  		  border-bottom: 2px solid #0A678F; /*Adds a border when hovering over username and password text boxes*/
  		}
    </style>

  </head>

  <body>
    <nav class="navbar navbar-default">
      <a class="navbar-brand" href="index.php">
        <img src="images/wiocLogo.png" id="wiocNavbarLogo" alt="">
      </a>
  	</nav>
    <div id="signUpContainer">
      <h1>Create an Account</h1>
      <form action="includes/signup-inc.php" method="POST">
        <input type="text" name="username" id="signUpUser" class="signUpText" placeholder="Username">
        <input type="text" name="email" id="signUpEmail" class="signUpText" placeholder="Email">
        <input type="password" name="password" id="signUpPass" class="signUpText" placeholder="Password">
        <button type="submit" name="signUpSubmitBtn" id="signUpSubmit" class="signUp">Sign up</button>
      </form>
    </div>
  </body>
</html>
