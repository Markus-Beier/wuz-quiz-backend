<?php
  if(in_array($_SERVER['REMOTE_ADDR'], explode ('<br />', file_get_contents('http://localhost/functions/ip-whitelist.php')))){	// allowed IP-addresses to access the Admin-Configuration
	require_once('../functions.inc.php');

<<<<<<< HEAD
	if($_GET['id'] AND $_GET['data'] AND $_GET['table'] AND $_GET['key']){
	  $id = $_GET['id'];
	  $data = $_GET['data'];
	  $table = $_GET['table'];
	  $key = $_GET['key'];
	  $result = (new db)->query('UPDATE ' . $table . ' SET ' . $key . '=\'' . $data . '\' WHERE id=\'' . $id . '\';');
	  if($result)
=======
if($_SERVER['HTTP_HOST'] != "localhost")
	die("Access prohibited!");

if($_GET['id'] AND $_GET['data'] AND $_GET['table'] AND $_GET['key']){
	$id = $_GET['id'];
	$data = $_GET['data'];
	$table = $_GET['table'];
	$key = $_GET['key'];
	$result = (new db)->query('UPDATE ' . $table . ' SET ' . $key . '=\'' . $data . '\' WHERE id=\'' . $id . '\';');
	if($result)
>>>>>>> 26ce777d4f125ebafafdd4f1f941423fb58726bd
		echo 'success';
	}
  }else{
	echo 'Access prohibited!';
  }
?>
