<?php
  if($_SERVER['HTTP_HOST'] != "localhost")
	die("Kein Zugriff");

  $whitelist = array(
	''
  );
  for($i=0; $i < sizeof($whitelist); $i++){
	echo $whitelist[$i] . '<br />';
  }
?>