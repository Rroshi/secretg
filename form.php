
      <?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
	$email_from = 'kejsi.rroshi05.com';

	$email_subject = "New Form submission";

	$email_body = "You have received a new message from the user $name.\n".
                            "Here is the message:\n $message".


  $to = "kejsi.rroshi05.com";

  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $visitor_email \r\n";
ini_set("SMTP","kejsi.rroshi05@gmail.com" );
ini_set('smtp_port', '25');
  mail($to,$email_subject,$email_body,$headers);

 ?>