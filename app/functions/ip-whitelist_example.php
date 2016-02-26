<?php
  if($_SERVER['HTTP_HOST'] != 'localhost')
	die('Access prohibited!');

  $whitelist = array(
	''		// add as many IPs you need in this array
  );
  for($i=0; $i < sizeof($whitelist); $i++){
	echo $whitelist[$i] . '<br />';
  }
?>
