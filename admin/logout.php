<?php
	session_start();
	require_once('inc/functions.php');
	
	session_destroy();
	
	session_start();
	$_SESSION = array();

	addMsg('You have logged out yourself');
	letsGo('index.php');

?>