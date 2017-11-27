<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      #profile-header-container{
        width:100%;
        height:300px;
        background-color: #247BA0;
        margin-top:-20px;
      }
      #profile-username{
        text-align: center;
        vertical-align: middle;
        line-height: 300px;
        font-family: helvetica, sans-serif;
        font-size: 50px;
        color:white;
      }
      .profile-tabs-content{
        margin-left: 50px;
        margin-bottom: 20px;
      }
      .tab-content a{
        display:inline-block;
      }
      #deleteAccountBtn {
        border-radius: 4px; /*Rounds button edges*/
        color: white; /*Text of submit*/
        background-color: red; /*Background color of button*/
        padding: 10px 0px; /*Affects the height of the button*/
        font-size: 19px; /*Font size of the text on the button*/
        border:none; /*Need this or as some dumb auto border, can do this with border:0 not sure which is better practice*/
        width: 100%; /*Takes up all space on modal while keeping padding*/
        margin-bottom: 10px; /*How far the button is away from the thing below it*/
        margin-top:10px; /*How far the submit button is away from the thing above it*/
      }
      #dontDeleteAccountBtn {
        border-radius: 4px; /*Rounds button edges*/
        color: white; /*Text of submit*/
        background-color: #247BA0; /*Background color of button*/
        padding: 10px 0px; /*Affects the height of the button*/
        font-size: 19px; /*Font size of the text on the button*/
        border:none; /*Need this or as some dumb auto border, can do this with border:0 not sure which is better practice*/
        width: 100%; /*Takes up all space on modal while keeping padding*/
        margin-bottom: 10px; /*How far the button is away from the thing below it*/
        margin-top:10px; /*How far the submit button is away from the thing above it*/
      }
      #deleteAccountBtn:hover{
        background-color:#C60000;
      }
      #dontDeleteAccountBtn:hover {
        background-color: #0A678F; /*Color of background when cursor is hovering on submit button*/
      }
      #delete-account-text{
        color:black;
      }

    </style>
  </head>

  <body>
    <?php
      include("templates/contact-us-modal.html");
      if(isset($_SESSION['u_username'])){
        include("templates/logged-in-cityhome-navbar.php"); //include navbar
      }
      else {
        echo 'oops';
      }
      /*
       * Sets up profile page with with blue header with username and 3 tabs (Account info, Questions asked, and Comments&Replies Posted)
       */
      echo '<div id="profile-header-container">
          <p id="profile-username"> '.$_SESSION['u_username'].'</p>
      </div>
      <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" href="#accountInfo-tab">Account Information</a></li>
        <li><a data-toggle="tab" href="#questionsAsked-tab">Questions Asked</a></li>
        <li><a data-toggle="tab" href="#commentReplies-tab">Comments & Replies Posted</a></li>
      </ul>

      <div class="tab-content">
        <div id="accountInfo-tab" class="tab-pane fade in active">
          <h3 class="profile-tabs-content">Account Information</h3>
          <p class="profile-tabs-content">Email:</p>
          <a href="#" id="resetPassword-link" class="profile-tabs-content">Reset Password</a>
          <p class="profile-tabs-content">Your City:</p>
          <a href="#" id="deleteAccount-link" class="profile-tabs-content" data-toggle="modal" data-target="#account-deletion-modal">Delete Account</a>

        </div>
        <div id="questionsAsked-tab" class="tab-pane fade">
          <h3 class="profile-tabs-content">Questions Asked</h3>
          <p class="profile-tabs-content">Some content</p>
        </div>
        <div id="commentReplies-tab" class="tab-pane fade">
          <h3 class="profile-tabs-content">Comments & Replies Posted</h3>
          <p class="profile-tabs-content">Some content</p>
        </div>
      </div>'
    ?>
    <!--Set up delete account modal-->
    <div class="modal fade" id="account-deletion-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1 id="delete-account-text">You are about to delete your account. Are you sure you want to delete your account? This process is permanent.</h1><br>
          <form action="includes/delete-account.inc.php" method="POST">
            <button type="submit" name="deleteAccountBtn" id="deleteAccountBtn">Yes, Please Delete My Account.</button>
          </form>
          <button type="submit" name="dontDeleteAccountBtn" id="dontDeleteAccountBtn">No Actually, Don't Delete My Account.</button>
        </div>
      </div>
    </div>
  </body>
</html>
