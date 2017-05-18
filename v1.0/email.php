<?php
  // Checks if feedback form fields are set
  if(isset($_POST)) {
      $recipient = "support@fridgemates.ca";
      $subject = $_POST ["email_subject"];
      $sender = $_POST ["full_name"];
      $senderEmail = $_POST["email_address"];
      $message = $_POST["email_comment"];

      $mailBody = "Name: $sender\nEmail: $senderEmail\n\n$message";

      // Sends Email
      mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

      echo 'Message has been successfully sent!';
  };
?>
