		<div class="container">
		  <div class="jumbotron">
			<h2>Übersicht der Quizze:</h2>
			<p>In diesem Interface werden editierbare Quizze angezeigt</p>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
			    <tr>
				  <th colspan="5" rowspan="1"  tabindex="0">Tabelle: Fragen</th>
				</tr>
				<tr>
				  <th colspan="1" rowspan="1"  tabindex="0"><span class='glyphicon glyphicon-cog'></span></th>
				  <th colspan="1" rowspan="1"  tabindex="0">Frage-Nr.</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Frage</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Tafel-/Quiz-Nummer</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Aktive Frage</th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `question`')){
					  // Create table structure wuz.question
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
					}
					$result = (new db)->query('SELECT * FROM question');
					while($row = $result->fetch_assoc()){
						echo'
						<tr>
							<td><a class="btn btn-danger"><span class=\'glyphicon glyphicon-trash\'></span></a></td>
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
				  <th colspan="3" rowspan="1"  tabindex="0">Tabelle: Antworten</th>
				</tr>
				<tr>
				  <th colspan="1" rowspan="1"  tabindex="0">Frage-Nr.</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Antwort</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Korrekte Antwort</th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					if (!(new db)->query('DESCRIBE `answer_choice`')){
					  // Create table structure wuz.answer_choice
					  (new db)->query('
						CREATE TABLE IF NOT EXISTS `answer_choice` (
						  `id` smallint(6) NOT NULL AUTO_INCREMENT,
						  `question_id` smallint(6) NOT NULL,
						  `answer` tinytext CHARACTER SET utf8 NOT NULL,
						  `correct` tinyint(1) NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;
					  ');
					}
					$result = (new db)->query('SELECT * FROM answer_choice');
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
		  </div>
		</div>
