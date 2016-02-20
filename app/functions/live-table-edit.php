<?php
require_once('../functions.inc.php');

if($_GET['id'] and $_GET['data']){
	$id = $_GET['id'];
	$data = $_GET['data'];
	$result = (new db)->query('UPDATE question SET question=\'' . $data . '\' WHERE id=\'' . $id . '\';');
	if($result)
		echo 'success';
}
?>