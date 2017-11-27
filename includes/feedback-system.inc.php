<?php
  //we may want to filter these with something like $newstr = filter_var($str, FILTER_SANITIZE_STRING); or $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $name = $_POST['name']; //get the text from the text input labeled name
  $email = $_POST['email']; //get the text from the text input labled email
  $message = $_POST['message']; //get the text from the textarea labled message

  //The php mail function needs four variables as parameters
  $from = "From: $name"; //where the email is from, the name of the person
  $recipient = "trevor@whereinourcity.org"; //send to our email
  $subject = "WIOC Feedback from $name"; //the subject of the email to be sent
  $content = "From: $name\n E-Mail: $email\n Message:\n $message"; //put it all together for the body of the email

  if(isset($_POST['contactusSubmitBtn'])){ //if the contact us submit button is clicked essentially
    if(mail($recipient, $subject, $content, $from)) { //if the mail function worked
      header("Location: ../index.php?message=sent"); //refresh page and have message=sent in header
      exit(); //exit
    }else{
      header("Location: ../index.php?message=error"); //if it didnt send say message=error in header
      exit(); //exit
    }
  }
?>
