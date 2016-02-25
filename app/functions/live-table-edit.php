<?php
  session_start();
  if ($_SESSION['username'] != NULL){
	echo 'test';
	require_once('../functions.inc.php');
	if($_GET['id'] AND $_GET['data'] AND $_GET['table'] AND $_GET['key']){
	  $id = $_GET['id'];
	  $data = $_GET['data'];
	  $table = $_GET['table'];
	  $key = $_GET['key'];
	  $result = (new db)->query('UPDATE ' . $table . ' SET ' . $key . '=\'' . $data . '\' WHERE id=\'' . $id . '\';');
	  if($result)
		echo 'success';
	}
  }else{
	echo 'Access prohibited!';
  }
?>
