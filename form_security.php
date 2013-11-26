<?php
session_start();

function tokenize() {
	$time = time();
	$ip = $_SERVER['REMOTE_ADDR'];
	$id = uniqid(mt_rand(), true);
	
	$token = hash('sha256', $time . $ip . $id);
	$field = hash('sha256', $id . $time . $ip);
	$ip_hash = hash('sha256', $ip);

	$_SESSION['field'] = $field;
	$_SESSION['token'] = $token;
	$_SESSION['ip_hash'] = $ip_hash;

	return "<input type='hidden' name='token_$field' value='$token'/>";
}

function validForm() {
	$field = $_SESSION['field'];

	if (isset($_POST['token_' . $field])) {
		$ip_hash = hash('sha256', $_SERVER['REMOTE_ADDR']);
		if ($ip_hash === $_SESSION['ip_hash'] &&
			$_POST['token_' . $field] === $_SESSION['token']) {
				unset($_SESSION['field']);
				unset($_SESSION['token']);
				unset($_SESSION['ip_hash']);
				unset($_POST['token_' . $field]);
				return true;
		}		
	}
	
	return false;
}

function notSpammer() {
	$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		return true;
	}
	return false;
}

function clean($s) {
	return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}

function cleanHtml($s) {
	return strip_tags(htmlentities(trim(stripslashes($s)), ENT_NOQUOTES, "UTF-8"));
} 


?>