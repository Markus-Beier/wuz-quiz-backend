<?php
session_start();

require_once('functions.inc.php');

$behavior = new loginCheck;

if($behavior->status() == 0 or $behavior->status() == 2){
	include('logout.php');
} else if($behavior->status() == 1){
	include('navbar-top.php');
?>	
		<div class="container">
			<div class="jumbotron">
				<h1>Administrations-Webinterface</h1>
				<p> In diesem Interface werden Quizes erstellt & editiert.</p>
			</div>
		</div> <!-- /container -->
		
		
		
		
		
		
		
		
<?php
}
?>