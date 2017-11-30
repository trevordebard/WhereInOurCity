<?php
  //we may want to filter these with something like $newstr = filter_var($str, FILTER_SANITIZE_STRING); or $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $from = "From: $name";
  $recipient = "trevor@whereinourcity.org"; //we need our email
  $subject = "WIOC Feedback from $name";
  $content = "From: $name\n E-Mail: $email\n Message:\n $message";

  if(isset($_POST['contactusSubmitBtn'])){
    if(mail($recipient, $subject, $content, $from)) {
      header("Location: ../index.php?message=sent");
      exit();
    }else{
      header("Location: ../index.php?message=error");
      exit();
    }
  }
?>
