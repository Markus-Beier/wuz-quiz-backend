<?php
  include('functions/alerts.php');

  $create = new create;

  $alerts = array(
	'table_structure_created_answer_choice'		=> array(	'message' => $lt->admin__action__show_database->alert__table_structure_created_answer_choice,
														'context' => $lt->admin__action__show_database->alerts_success,
														'title'   => $lt->admin__action__show_database->alerts_success_title,
														'dismissible' => true
														),
	'table_structure_created_board'				=> array(	'message' => $lt->admin__action__show_database->alert__table_structure_created_board,
														'context' => $lt->admin__action__show_database->alerts_success,
														'title'   => $lt->admin__action__show_database->alerts_success_title,
														'dismissible' => true
														),
	'table_structure_created_question'			=> array(	'message' => $lt->admin__action__show_database->alert__table_structure_created_question,
														'context' => $lt->admin__action__show_database->alerts_success,
														'title'   => $lt->admin__action__show_database->alerts_success_title,
														'dismissible' => true
														),
	'table_structure_created_scores'			=> array(	'message' => $lt->admin__action__show_database->alert__table_structure_created_scores,
														'context' => $lt->admin__action__show_database->alerts_success,
														'title'   => $lt->admin__action__show_database->alerts_success_title,
														'dismissible' => true
														),
	'table_structure_created_user'				=> array(	'message' => $lt->admin__action__show_database->alert__table_structure_created_user,
														'context' => $lt->admin__action__show_database->alerts_success,
														'title'   => $lt->admin__action__show_database->alerts_success_title,
														'dismissible' => true
														),
	'table_structure_created_question_images'	=> array(	'message' => $lt->admin__action__show_database->alert__table_structure_created_question_images,
														'context' => $lt->admin__action__show_database->alerts_success,
														'title'   => $lt->admin__action__show_database->alerts_success_title,
														'dismissible' => true
														)
  );

  class create{
	function answer_choice($alerts){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `answer_choice` (
		  `id` smallint(6) NOT NULL AUTO_INCREMENT,
		  `question_id` smallint(6) NOT NULL,
		  `answer` tinytext CHARACTER SET utf8 NOT NULL,
		  `correct` tinyint(1) NOT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FOREIGN` (`question_id`),
		  CONSTRAINT `answer_choice_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  if ((new db)->query('SHOW TABLES LIKE \'' . __FUNCTION__ . '\'')){
		echo (bootstrap_alert($alerts, 'table_structure_created_' . __FUNCTION__));
	  }
	}
	function board($alerts){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `board` (
		  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
		  `title` tinytext CHARACTER SET utf8 NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  if ((new db)->query('SHOW TABLES LIKE \'' . __FUNCTION__ . '\'')){
		echo (bootstrap_alert($alerts, 'table_structure_created_' . __FUNCTION__));
	  }
	}
	function question($alerts){
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
	  if ((new db)->query('SHOW TABLES LIKE \'' . __FUNCTION__ . '\'')){
		echo (bootstrap_alert($alerts, 'table_structure_created_' . __FUNCTION__));
	  }
	}
	function question_images($alerts){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `question_images` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `question_id` smallint(6) NOT NULL,
		  `image` MEDIUMBLOB NOT NULL,
		  `image_size_MB` DECIMAL(4,2) NOT NULL,
		  `mimetype` VARCHAR(32) NOT NULL,
		  PRIMARY KEY (`id`),
		  KEY `FOREIGN` (`question_id`),
		  CONSTRAINT `question_images_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  if ((new db)->query('SHOW TABLES LIKE \'' . __FUNCTION__ . '\'')){
		echo (bootstrap_alert($alerts, 'table_structure_created_' . __FUNCTION__));
	  }
	}
	function scores($alerts){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `scores` (
		  `user_id` int(11) NOT NULL,
		  `board_id` tinyint(4) NOT NULL,
		  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `percentage` decimal(4,2) DEFAULT NULL,
		  PRIMARY KEY (`user_id`,`board_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  if ((new db)->query('SHOW TABLES LIKE \'' . __FUNCTION__ . '\'')){
		echo (bootstrap_alert($alerts, 'table_structure_created_' . __FUNCTION__));
	  }
	}
	function user($alerts){
	  (new db)->query('
		CREATE TABLE IF NOT EXISTS `user` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `newsletter_subscribed` tinyint(1) NOT NULL,
		  `name` varchar(50) DEFAULT NULL,
		  `email` varchar(100) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ');
	  if ((new db)->query('SHOW TABLES LIKE \'' . __FUNCTION__ . '\'')){
		echo (bootstrap_alert($alerts, 'table_structure_created_' . __FUNCTION__));
	  }
	}
  }
?>

		<div class='container'>
		  <div class='jumbotron'>
			<h2><?php echo $lt->admin__action__show_database->h2; ?></h2>
			<p><?php echo $lt->admin__action__show_database->p; ?></p>
			<table class= 'table table-striped table-bordered table-hover dataTable' id="datatable">
			  <thead>
				<tr>
				  <th colspan='7' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->table_question; ?></th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0'>
					<span style='width: 100%; height: 100%; text-align: center; line-height: 3em; vertical-align: middle;'
					class='glyphicon glyphicon-cog'>
					</span>
				  </th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->id_question_SMALLINT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->question_TINYTEXT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->type_TINYINT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->creation_TIMESTAMP; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->board_TINYINT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->active_BOOLEAN; ?></th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `question`')){
					  // Create table structure wuz.question
					  $create->question($alerts);
					}
					$result = (new db)->query('SELECT * FROM `question`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td><span name=\'remove-question\' id=\'' . $row['id'] . '\' class=\'btn btn-danger\'><span class=\'glyphicon glyphicon-trash\'></span></span></td>
				  <td>' . $row['id'] . '</td>
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
				  <th colspan='4' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->table_answer_choice; ?></th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->id_answer_SMALLINT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->question_id_SMALLINT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->answer_TINYTEXT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->correct_BOOLEAN; ?></th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `answer_choice`')){
					  // Create table structure wuz.answer_choice
					  $create->answer_choice($alerts);
					}
					$result = (new db)->query('SELECT * FROM `answer_choice`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td>' . $row['id'] . '</td>
				  <td>' . $row['question_id'] . '</td>
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
				  <th colspan='3' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->table_board; ?></th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0' width='1em'>
					<span style='width: 100%; height: 100%; text-align: center; line-height: 3em; vertical-align: middle;'
					class='glyphicon glyphicon-cog'>
					</span>
				  </th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->id_TINYINT; ?></th>
				  <th colspan='1' rowspan='1'  tabindex='0'><?php echo $lt->admin__action__show_database->title_TINYTEXT; ?></th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `board`')){
					  // Create table structure wuz.board
					  $create->board($alerts);
					}
					$result = (new db)->query('SELECT * FROM `board`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td><a class=\'btn btn-default\'><span class=\'glyphicon glyphicon-trash\'></span></a></td>
				  <td>' . $row['id'] . '</td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'board\' key=\'title\'>' . $row['title'] . '</span></td>
				</tr>';
					}
				?>	
			  </tbody>
			</table>
<!--			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
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
-->				<?php
					if (!(new db)->query('DESCRIBE `user`')){
					  // Create table structure wuz.user
					  $create->user($alerts);
					}
/*					$result = (new db)->query('SELECT * FROM `user`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td><a class=\'btn btn-default\'><span class=\'glyphicon glyphicon-trash\'></span></a></td>
				  <td>' . $row['id'] . '</td>
				  <td><span class=\'xedit-dropdown-subscribed\' id=\'' . $row['id'] . '\' table=\'user\' key=\'newsletter_subscribed\'>' . $row['newsletter_subscribed'] . '</span></td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'user\' key=\'name\'>' . $row['name'] . '</span></td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'user\' key=\'email\'>' . $row['email'] . '</span></td>
				</tr>';
					}
*/				?>	
<!--		  </tbody>
			</table>
--><!--		<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
				<tr>
				  <th colspan='4' rowspan='1'  tabindex='0'>table "scores"</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0'><u>user_id</u><br />[INT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'><u>board_id</u><br />[TINYINT]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>creation<br />[TIMESTAMP]</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>percentage<br />[DECIMAL(4,2)]</th>
				</tr>
			  </thead>
			  <tbody>
-->				<?php
					if (!(new db)->query('DESCRIBE `scores`')){
					  // Create table structure wuz.scores
					  $create->scores($alerts);
					}
/*					$result = (new db)->query('SELECT * FROM `scores`');
					while($row = $result->fetch_assoc()){
						echo '
				<tr>
				  <td>' . $row['user_id'] . '</td>
				  <td>' . $row['board_id'] . '</td>
				  <td>' . $row['creation'] . '</td>
				  <td>' . $row['percentage'] . '</td>
				</tr>';
					}
*/				?>	
<!--		  </tbody>
			</table>
-->			<?php
				if (!(new db)->query('DESCRIBE `question_images`')){
				  // Create table structure wuz.question_images
				  $create->question_images($alerts);
				}
			?>
		  </div>
		</div>
