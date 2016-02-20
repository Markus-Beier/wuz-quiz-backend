		<div class="container">
		  <div class="jumbotron">
			<h2>Übersicht der Quizes:</h2>
			<p>In diesem Interface werden Quizes angezeigt und sind editierbar.</p>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
			    <tr>
				  <th colspan="3" rowspan="1"  tabindex="0">Tabelle: Fragen</th>
				</tr>
				<tr>
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
							<td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' key=\'question\'>' . $row['question'] . '</span></td>
							<td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' key=\'board\'>' . $row['board'] . '</span></td>
							<td><span class=\'xedit-dropdown-active\' id=\'' . $row['id'] . '\' key=\'active\'>' . $row['active'] . '</span></td>
						</tr>';
					}
				?>
			  </tbody>
			</table>
		  </div>
		</div>
