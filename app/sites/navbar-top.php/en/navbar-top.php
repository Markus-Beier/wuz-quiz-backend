
		<nav class='navbar navbar-default navbar-fixed-top'>
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="/?<?php echo 'lang=' . $lang; ?>">WUZ Admin-Configuration</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="/?<?php echo 'lang=' . $lang; ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
				<li class="dropdown">
				  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Quiz-Editor <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="?<?php echo http_build_query(array_merge($_GET, array("action" => "add-a-quiz"))); ?>">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a quiz</a></li>
					<li><a href="?<?php echo http_build_query(array_merge($_GET, array("action" => "add-a-question"))); ?>">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a question</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Database</li>
					<li><a href="?<?php echo http_build_query(array_merge($_GET, array("action" => "show-database"))); ?>">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Show database</a></li>
				  </ul>
				</li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="lang-sm lang-lbl-full"
					<?php
						echo 'lang=\'' . $lang . '\'';
					?>></span> <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="?<?php echo http_build_query(array_merge($_GET, array("lang" => "de"))); ?>"><span class="lang-sm lang-lbl-full" lang="de"></span></a></li>
					<li><a href="?<?php echo http_build_query(array_merge($_GET, array("lang" => "en"))); ?>"><span class="lang-sm lang-lbl-full" lang="en"></span></a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<script language='javascript' type='text/javascript'>
					  document.write(getLocalData('username'));
					</script> <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
					<li class="dropdown-header">Signed in as</li>					
					<li><a href="">
						  <b><script language='javascript' type='text/javascript'>
							document.write(getLocalData('username'));
						  </script></b>
						</a></li>
					<li role="separator" class="divider"></li>
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