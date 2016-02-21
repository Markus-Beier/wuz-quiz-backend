<?php
  if($_SERVER['HTTP_HOST'] != "localhost")
	die("Access prohibited!");

  $whitelist = array(
	''
  );
  for($i=0; $i < sizeof($whitelist); $i++){
	echo $whitelist[$i] . '<br />';
  }
?>