
		<nav class='navbar navbar-default navbar-fixed-top'>
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="/">WUZ Admin-Configuration</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="/">Home</a></li>
<!--
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
-->
				<li class="dropdown">
				  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  Quiz-Editor <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="?action=add-a-quiz">Add a quiz</a></li>
					<li><a href="?action=add-a-question">Add a question</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header">Database</li>
					<li><a href="?action=show-database">Show database</a></li>
					<li><a href="?action=edit-a-quiz">Edit a quiz</a></li>
					<li><a href="?action=edit-a-question">Edit a question</a></li>
				  </ul>
				</li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="lang-sm lang-lbl-full"
					<?php
						($_GET['lang']) ? $lang=$_GET['lang'] : $lang='en';
						echo 'lang=\'' . $lang . '\'';
					?>></span> <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="?lang=de"><span class="lang-sm lang-lbl-full" lang="de"></span></a></li>
					<li><a href="?lang=en"><span class="lang-sm lang-lbl-full" lang="en"></span></a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<script language='javascript' type='text/javascript'>
					  document.write(getLocalData('username'));
					</script> <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
					<li><a href="">Action</a></li>
					<li><a href="">Another action</a></li>
					<li><a href="">Something else here</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header">Admin</li>
					<li><a href="logout.php">Logout</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>