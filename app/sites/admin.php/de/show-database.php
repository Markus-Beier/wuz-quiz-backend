		<div class="container">
		  <div class="jumbotron">
			<h2>Übersicht der Quizze:</h2>
			<p>In diesem Interface werden editierbare Quizze angezeigt</p>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
			    <tr>
				  <th colspan="4" rowspan="1"  tabindex="0">Tabelle: Fragen</th>
				</tr>
				<tr>
				  <th colspan="1" rowspan="1"  tabindex="0">Frage-Nr.</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Frage</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Tafel-/Quiz-Nummer</th>
				  <th colspan="1" rowspan="1"  tabindex="0">Aktive Frage</th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					$result = (new db)->query('SELECT * FROM question');
					while($row = $result->fetch_assoc()){
						echo'
						<tr>
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
