<?php
  include('functions/alerts.php');
  
  $create = new create;
  
  $alerts = array(
	'table_structure_created_answer_choice' => array(	'message' => 'Table structure for `answer_choice` successfully created!',
														'context' => 'success',
														'title'   => 'Well done!',
														'dismissible' => true
														),
	'table_structure_created_board'			=> array(	'message' => 'Table structure for `board` successfully created!',
														'context' => 'success',
														'title'   => 'Well done!',
														'dismissible' => true
														),
	'table_structure_created_question' 		=> array(	'message' => 'Table structure for `question` successfully created!',
														'context' => 'success',
														'title'   => 'Well done!',
														'dismissible' => true
														),
	'table_structure_created_user' 			=> array(	'message' => 'Table structure for `user` successfully created!',
														'context' => 'success',
														'title'   => 'Well done!',
														'dismissible' => true
														)
  );
  
  class create{
	function answer_choice(){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `answer_choice` (
		  `id` smallint(6) NOT NULL AUTO_INCREMENT,
		  `question_id` smallint(6) NOT NULL,
		  `answer` tinytext CHARACTER SET utf8 NOT NULL,
		  `correct` tinyint(1) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  // created(__FUNCTION__);
	}
	function board(){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `board` (
		  `id` smallint(6) NOT NULL AUTO_INCREMENT,
		  `title` tinytext CHARACTER SET utf8 NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  // created(__FUNCTION__);
	}
	function question(){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `question` (
		  `id` smallint(6) NOT NULL AUTO_INCREMENT,
		  `question` tinytext NOT NULL,
		  `type` tinyint(4) NOT NULL,
		  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `board` tinyint(4) NOT NULL,
		  `active` tinyint(1) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  // created(__FUNCTION__);
	}
	function user(){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `user` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `newsletter_subscribed` tinyint(1) NOT NULL,
		  `name` varchar(50) DEFAULT NULL,
		  `email` varchar(100) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  // created(__FUNCTION__);
	}
  }
  
  function created($db_table){
	echo (bootstrap_alert($alerts, 'table_structure_created_' . $db_table));
  }
  
?>

		<div class='container'>
		  <div class='jumbotron'>
			<h2>Quiz-Overview:</h2>
			<p>This interface shows editable quizzes.</p>
			<table class= 'table table-striped table-bordered table-hover dataTable' id="datatable">
			  <thead>
				<tr>
				  <th colspan='7' rowspan='1'  tabindex='0'>table "question"</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0'>
					<span style='width: 100%; height: 100%; text-align: center; line-height: 3em; vertical-align: middle;'
					class='glyphicon glyphicon-cog'>
					</span>
				  </th>
				  <th colspan='1' rowspan='1'  tabindex='0'>id<br />[SMALLINT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>question<br />[TINYTEXT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>type<br />[TINYINT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>creation<br />[TIMESTAMP]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>board<br />[TINYINT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>active<br />[BOOLEAN]</th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `question`')){
					  // Create table structure wuz.question
					  $create->question();
					  echo (bootstrap_alert($alerts, 'table_structure_created_' . 'question'));
					}
					$result = (new db)->query('SELECT * FROM `question`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td><a class=\'btn btn-danger\'><span class=\'glyphicon glyphicon-trash\'></span></a></td>
				  <td>'.$row['id'].'</td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'question\' key=\'question\'>' . $row['question'] . '</span></td>
				  <td><span class=\'xedit-dropdown-type\' id=\'' . $row['id'] . '\' table=\'question\' key=\'type\'>' . $row['type'] . '</span></td>
				  <td>' . $row['creation'] . '</td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'question\' key=\'board\'>' . $row['board'] . '</span></td>
				  <td><span class=\'xedit-dropdown-active\' id=\'' . $row['id'] . '\' table=\'question\' key=\'active\'>' . $row['active'] . '</span></td>
				</tr>';
					}
				?>	
			  </tbody>
			</table>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
				<tr>
				  <th colspan='4' rowspan='1'  tabindex='0'>table "answer_choice"</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0'>id<br />[SMALLINT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>question_id<br />[SMALLINT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>answer<br />[TINYTEXT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>correct<br />[BOOLEAN]</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `answer_choice`')){
					  // Create table structure wuz.answer_choice
					  $create->answer_choice();
					  echo (bootstrap_alert($alerts, 'table_structure_created_' . 'answer_choice'));
					}
					$result = (new db)->query('SELECT * FROM `answer_choice`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td>'.$row['id'].'</td>
				  <td>'.$row['question_id'].'</td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'answer_choice\' key=\'answer\'>' . $row['answer'] . '</span></td>
				  <td><span class=\'xedit-dropdown-correct\' id=\'' . $row['id'] . '\' table=\'answer_choice\' key=\'correct\'>' . $row['correct'] . '</span></td>
				</tr>';
					}
				?>	
			  </tbody>
			</table>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
				<tr>
				  <th colspan='3' rowspan='1'  tabindex='0'>table "board"</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0' width='1em'>
					<span style='width: 100%; height: 100%; text-align: center; line-height: 3em; vertical-align: middle;'
					class='glyphicon glyphicon-cog'>
					</span>
				  </th>
				  <th colspan='1' rowspan='1'  tabindex='0'>id<br />[SMALLINT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>title<br />[TINYTEXT]</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `board`')){
					  // Create table structure wuz.board
					  $create->board();
					  echo (bootstrap_alert($alerts, 'table_structure_created_' . 'board'));
					}
					$result = (new db)->query('SELECT * FROM `board`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td><a class=\'btn btn-danger\'><span class=\'glyphicon glyphicon-trash\'></span></a></td>
				  <td>'.$row['id'].'</td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'board\' key=\'title\'>' . $row['title'] . '</span></td>
				</tr>';
					}
				?>	
			  </tbody>
			</table>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
				<tr>
				  <th colspan='5' rowspan='1'  tabindex='0'>table "user"</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0' width='1em'>
					<span style='width: 100%; height: 100%; text-align: center; line-height: 3em; vertical-align: middle;'
					class='glyphicon glyphicon-cog'>
					</span>
				  </th>
				  <th colspan='1' rowspan='1'  tabindex='0'>id<br />[INT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>newsletter_subscribed<br />[BOOLEAN]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>name<br />[VARCHAR(50)]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>email<br />[VARCHAR(100)]</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `user`')){
					  // Create table structure wuz.user
					  $create->user();
					  echo (bootstrap_alert($alerts, 'table_structure_created_' . 'user'));
					}
					$result = (new db)->query('SELECT * FROM `user`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td><a class=\'btn btn-danger\'><span class=\'glyphicon glyphicon-trash\'></span></a></td>
				  <td>'.$row['id'].'</td>
				  <td><span class=\'xedit-dropdown-subscribed\' id=\'' . $row['id'] . '\' table=\'user\' key=\'newsletter_subscribed\'>' . $row['newsletter_subscribed'] . '</span></td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'user\' key=\'name\'>' . $row['name'] . '</span></td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'user\' key=\'email\'>' . $row['email'] . '</span></td>
				</tr>';
					}
				?>	
			  </tbody>
			</table>
		  </div>
		</div>
