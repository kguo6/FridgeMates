<?php
  // Checks if feedback form fields are set
  if(isset($_POST)) {
      $recipient = "your@email.address";
      $subject = $_POST ["email_subject"];
      $sender = $_POST ["full_name"];
      $senderEmail = $_POST["email_address"];
      $message = $_POST["email_comment"];

      $mailBody = "Name: $sender\nEmail: $senderEmail\n\n$message";

      // Sends Email
      mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

      echo "Your Message successfully sent, we will get back to you ASAP.";
  }

?>