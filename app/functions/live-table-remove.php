<?php
  session_start();
  if ($_SESSION['username'] != NULL){
	require_once('../functions.inc.php');
	if($_GET['id'] AND $_GET['table']){
	  $id = $_GET['id'];
	  $table = $_GET['table'];
	  if ($table == 'question'){
		$result = (new db)->query('DELETE FROM ' . $table . ' WHERE id=\'' . $id . '\';');
	  } else if ($table == 'answer_choice'){
		$result = (new db)->query('DELETE FROM ' . $table . ' WHERE question_id=\'' . $id . '\';');
	  }
	  if($result)
		echo 'success';
	}
  }else{
	echo 'Access prohibited!';
  }
?>
