<?php
  include('functions/alerts.php');
  $alerts = array(
	'table_structure_created_question' 		=> array(	'message' => 'Tabellenstruktur für `question` erfolgreich erstellt!',
														'context' => 'success',
														'title'   => 'Super!',
														'dismissible' => true
														),
	'table_structure_created_answer_choice' => array(	'message' => 'Tabellenstruktur für `answer_choice` erfolgreich erstellt!',
														'context' => 'success',
														'title'   => 'Super!',
														'dismissible' => true
														),
	'table_structure_created_board' => array(			'message' => 'Tabellenstruktur für `board` erfolgreich erstellt!',
														'context' => 'success',
														'title'   => 'Super!',
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
		  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
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
  }
  
  function created($db_table){
	echo (bootstrap_alert($alerts, 'table_structure_created_' . $db_table));
  }
?>

		<div class='container'>
		  <div class='jumbotron'>
			<h2>Übersicht der Quizze:</h2>
			<p>In diesem Interface werden editierbare Quizze angezeigt</p>
			<table class= 'table table-striped table-bordered table-hover dataTable' id="datatable">
			  <thead>
				<tr>
				  <th colspan='5' rowspan='1'  tabindex='0'>Tabelle: Fragen</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0'>
					<span style='width: 100%; height: 100%; text-align: center; line-height: 3em; vertical-align: middle;'
					class='glyphicon glyphicon-cog'>
					</span>
				  </th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Frage-Nr.</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Frage</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Tafel-/Quiz-Nummer</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Aktive Frage</th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `question`')){
					  echo(bootstrap_alert($alerts, 'table_structure_created_question'));
					  // Create table structure wuz.question
					  $create->question();
					  echo (bootstrap_alert($alerts, 'table_structure_created_' . 'question'));
					}
					$result = (new db)->query('SELECT * FROM `question`');
					while($row = $result->fetch_assoc()){
						echo'
				<tr>
				  <td><span name=\'remove-question\' id=\'' . $row['id'] . '\' class=\'btn btn-danger\'><span class=\'glyphicon glyphicon-trash\'></span></span></td>
				  <td>'.$row['id'].'</td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'question\' key=\'question\'>' . $row['question'] . '</span></td>
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
				  <th colspan='3' rowspan='1'  tabindex='0'>Tabelle: Antworten</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0'>Frage-Nr.</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Antwort</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Korrekte Antwort</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `answer_choice`')){
					  echo(bootstrap_alert($alerts, 'table_structure_created_answer_choice'));
					  // Create table structure wuz.answer_choice
					  $create->answer_choice();
					  echo (bootstrap_alert($alerts, 'table_structure_created_' . 'answer_choice'));
					}
					$result = (new db)->query('SELECT * FROM `answer_choice`');
					while($row = $result->fetch_assoc()){
						echo'
				<tr>
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
				  <th colspan='2' rowspan='1'  tabindex='0'>Tabelle Tafel-/Quiz-Nummer</th>
				</tr>
				<tr>
				  <th colspan='1' rowspan='1'  tabindex='0' width='1em'>
					<span style='width: 100%; height: 100%; text-align: center; line-height: 3em; vertical-align: middle;'
					class='glyphicon glyphicon-cog'>
					</span>
				  </th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Tafel-/Quiz-Nummer</th>
				  <th colspan='1' rowspan='1'  tabindex='0'>Titel der Tafel / des Quiz</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `board`')){
					  echo(bootstrap_alert($alerts, 'table_structure_created_board'));
					  // Create table structure wuz.board
					  $create->board();
					  echo (bootstrap_alert($alerts, 'table_structure_created_' . 'board'));
					}
					$result = (new db)->query('SELECT * FROM `board`');
					while($row = $result->fetch_assoc()){
						echo'
				<tr>
				  <td><a class=\'btn btn-default\'><span class=\'glyphicon glyphicon-trash\'></span></a></td>
				  <td>'.$row['id'].'</td>
				  <td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' table=\'board\' key=\'title\'>' . $row['title'] . '</span></td>
				</tr>';
					}
				?>	
			  </tbody>
			</table>
		  </div>
		</div>
