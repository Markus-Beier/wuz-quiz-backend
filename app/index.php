<?php
session_start();
// error_reporting(0); /* ERRORS & NOTICES DEACTIVATED! */

require_once('config.inc.php');
require_once('functions.inc.php');

$behavior = new loginCheck;

($_GET['lang']) ? $lang=$_GET['lang'] : $lang=LANG;
$action = $_GET['action'];
?>
<!DOCTYPE html>
<html lang='<?php echo $lang; ?>'>
  <head>
	<title>WUZ Admin-Configuration v1.0</title>
	<?php
		echo file_get_contents('html/meta.html');
	?>
	<script language='javascript' type='text/javascript' src='js/localStorage.js'></script>
	<?php
		if($behavior->status() == 1){
			echo file_get_contents('html/css_logged_in.html');
		}else{
			echo file_get_contents('html/css_login.html');
			echo file_get_contents('html/js_login.html');
		}
	?>
  </head>
  <body>
	<?php
//		if(in_array($_SERVER['REMOTE_ADDR'], explode ('<br />', file_get_contents('http://localhost/functions/ip-whitelist.php')))){	/* allowed IP-addresses to access the Admin-Configuration */
			if($behavior->status() == 0 or $behavior->status() == 2){
				include('login.php');
			} else if($behavior->status() == 1){
				include('sites/admin.php/admin.php');
			}
/* 		}else{
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
