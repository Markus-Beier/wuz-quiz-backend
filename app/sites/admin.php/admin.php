<?php

require_once('functions.inc.php');

$behavior = new loginCheck;

if($behavior->status() == 0 or $behavior->status() == 2){
  include('logout.php');
} else if($behavior->status() == 1){
  include('sites/navbar-top.php/navbar-top.php');
	if (!$action){
	  include('sites/admin.php/' . $lang . '/1.php');
	}else if ($action == 'add-a-quiz'){
	  include('sites/admin.php/' . $lang . '/add-a-quiz.php');
	}else if ($action == 'show-database'){
	  include('sites/admin.php/' . $lang . '/show-database.php');
	}
}
?>