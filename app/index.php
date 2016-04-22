<?php
session_start();
// error_reporting(0); // ERRORS & NOTICES DEACTIVATED!

require_once('functions.inc.php');

$behavior = new loginCheck;

($_GET['lang']) ? $lang=$_GET['lang'] : $lang='en';
$action = $_GET['action'];
?>
<!DOCTYPE html>
<html lang='<?php echo $lang; ?>'>
	<head>
		<title>WUZ Admin-Configuration v1.0</title>
		<meta charset='utf-8' />
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
		<meta name='author' content='Markus Beier' />
		<meta http-equiv='content-type' content='text/html; charset=utf-8' />
		<script language='javascript' type='text/javascript' src='js/localStorage.js'></script>
<?php
	if($behavior->status() == 1){
?>
		<link href='css/bootstrap.min.css' type='text/css' rel='stylesheet' />
		<link href='css/languages.min.css' rel='stylesheet'>
		<link href='css/navbar-fixed-top.css' rel='stylesheet'>
		<link href='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css' rel='stylesheet'/>
		
<?php
	}else{
?>
		<link href='css/style.css' type='text/css' rel='stylesheet' />
		<link href='css/login.css' type='text/css' rel='stylesheet' />
		<script language='javascript' type='text/javascript' src='js/login.js'></script>
		<script language='javascript' type='text/javascript' src='js/miscellaneous.js'></script>
		<script language='javascript' type='text/javascript' src='js/opacity.js'></script>
		<script language='javascript' type='text/javascript' src='js/resize.js'></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
	}
?>
	</head>
	<body>
		<?php
//		  if(in_array($_SERVER['REMOTE_ADDR'], explode ('<br />', file_get_contents('http://localhost/functions/ip-whitelist.php')))){	// allowed IP-addresses to access the Admin-Configuration
			if($behavior->status() == 0 or $behavior->status() == 2){
				include('login.php');
			} else if($behavior->status() == 1){
				include('sites/admin.php/admin.php');
			}
/* 		  }else{
			echo 'Your current IP-Address: <b>' . $_SERVER['REMOTE_ADDR'] . '</b><br />' . "\n";
			echo 'Hier entsteht eine Web-Applikations Testumgebung des <b>Schutzgemeinschaft Wallheckenlandschaft Leer e.V.</b>';
		  } */
		?>
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/live-table-edit.js'></script>
		<script language='javascript' type='text/javascript' src='js/remove-question.js'></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js'></script>
	</body>
</html>
