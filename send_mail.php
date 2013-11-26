<?php
include 'form_security.php';
if (!empty($_POST)) {
	if (validForm() && notSpammer()) {
		$email = $_POST['email'];
		$name = clean($_POST['name']);
		$message = cleanHtml($_POST['message']);
		
		mail("andrew@goonworx.com", "Subject: Someone wants to contact YOU!", $message, "From: $email");
	} else {
		header("HTTP/1.0 400 Bad Request");
	}
} else {
	header("HTTP/1.0 400 Bad Request");
	echo "Go away, you cannot access this directly.";
}
?>