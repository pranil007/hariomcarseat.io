<?php
if(isset($_POST['email'])) {
	
	// CHANGE THE TWO LINES BELOW
	$email_to = "studio@cndesiigns.in";
	
	function died($error) {
		// your error code can go here
		echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and try again.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['message'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	
	$name = $_POST['name']; // required	
	$email_from = $_POST['email']; // required	
	$message = $_POST['message']; // required
	
		
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}

	$email_subject .= "".clean_string($subject)."";
	
	
	$email_message .= "Name: ".clean_string($name)."\n";	
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Comments: ".clean_string($message)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>





<!-- place your own success html below -->
<html>
<head></head>
<body>
<script type="text/javascript">
alert("We have received your request, we will get back to you shortly. Thank You.");
window.location.href='index.html';
    </script>
</body>
</html>

<?php
}
die();
?>