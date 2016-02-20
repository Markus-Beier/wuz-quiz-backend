		<div class="container">
		  <div class="jumbotron">
			<h2>Quiz-Overview:</h2>
			<p>This interface shows editable quizes.</p>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
			    <tr>
				  <th colspan="5" rowspan="1"  tabindex="0">table "question"</th>
				</tr>
				<tr>
				  <th colspan="1" rowspan="1"  tabindex="0">id<br />[SMALLINT]</th>
				  <th colspan="1" rowspan="1"  tabindex="0">question<br />[TINYTEXT]</th>
				  <th colspan="1" rowspan="1"  tabindex="0">creation<br />[TIMESTAMP]</th>
				  <th colspan="1" rowspan="1"  tabindex="0">board<br />[TINYINT]</th>
				  <th colspan="1" rowspan="1"  tabindex="0">active<br />[BOOLEAN]</th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					$result = (new db)->query('SELECT * FROM question');
					while($row = $result->fetch_assoc()){
						echo'
						<tr>
							<td>'.$row['id'].'</td>
							<td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' key=\'question\'>' . $row['question'] . '</span></td>
							<td>' . $row['creation'] . '</td>
							<td><span class=\'xedit-text\' id=\'' . $row['id'] . '\' key=\'board\'>' . $row['board'] . '</span></td>
							<td><span class=\'xedit-dropdown-active\' id=\'' . $row['id'] . '\' key=\'active\'>' . $row['active'] . '</span></td>
						</tr>';
					}
				?>
			  </tbody>
			</table>
		  </div>
		</div>
