<?php
require_once('../config.inc.php');
require_once('../functions.inc.php');

	if (isset($_GET['question_id'])) {
		$question_id = $_GET['question_id'];
		$result = (new db)->query('SELECT image, mimetype FROM `question_images` WHERE `question_id`=' . $question_id);
		$row = $result->fetch_object();
		header('Content-type: ' . $row->mimetype);
		echo $row->image;
	}
?>
