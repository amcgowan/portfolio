<?php
include 'form_security.php';
if (!empty($_POST)) {
	if (validForm() && notSpammer()) {
		$email = $_POST['email'];
		$name = clean($_POST['name']);
		$message = cleanHtml($_POST['message']);

		if (!contactedToday()) {
	
			saveContact();
	
			mail("andrew@goonworx.com", "Subject: $name wants to contact YOU!", "$message\n\n-$name", "From: $name <$email>");

		} else {
			header("HTTP/1.0 503 Just hold up a bit!");
			echo "Uhm, you trying to spam me, bro?";
		}
	} 
} else {
	header("HTTP/1.0 400 Bad Request");
	echo "Go away, you cannot access this directly.";
}
?>