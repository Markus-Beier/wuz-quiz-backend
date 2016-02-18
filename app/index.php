<?php
session_start();
// error_reporting(0); // ERRORS & NOTICES DEACTIVATED!

require_once('functions.inc.php');

$behavior = new loginCheck;

#echo 'Your current IP-Adress: <b>' . $_SERVER['REMOTE_ADDR'] . '</b><br />' . "\n";
#if ($_SERVER['REMOTE_ADDR'] == '77.20.104.216'){
#	echo 'Hier entsteht eine Web-Applikations Testumgebung des <b>Schutzgemeinschaft Wallheckenlandschaft Leer e.V.</b>';
#}

?>
<!DOCTYPE html>
<html lang='de'>
	<head>
		<title></title>
		<meta charset='utf-8' />
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
		<meta name='author' content='Markus Beier' />
		<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<?php
	if($behavior->status() == 1){
?>
		<link href='css/bootstrap.min.css' type='text/css' rel='stylesheet' />
		<link href='css/languages.min.css' rel='stylesheet'>
		<link href='css/navbar-fixed-top.css' rel='stylesheet'>
<?php
	} else {
?>
		<link href='css/style.css' type='text/css' rel='stylesheet' />
		<link href='css/login.css' type='text/css' rel='stylesheet' />
		<script language='javascript' type='text/javascript' src='js/login.js'></script>
		<script language='javascript' type='text/javascript' src='js/opacity.js'></script>
		<script language='javascript' type='text/javascript' src='js/resize.js'></script>
<?php
	}
?>
		<script language='javascript' type='text/javascript' src='js/localStorage.js'></script>
		<script language='javascript' type='text/javascript' src='js/miscellaneous.js'></script>
	</head>
	<body>
		<?php
			if($behavior->status() == 0 or $behavior->status() == 2){
				include('login.php');
			} else if($behavior->status() == 1){
				include('admin.php');
			}
		?>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>