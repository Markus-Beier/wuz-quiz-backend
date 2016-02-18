<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	echo 'Logged out successfully!';
	echo '<meta http-equiv=\'refresh\' content=\'2; URL=/\'>';
?>