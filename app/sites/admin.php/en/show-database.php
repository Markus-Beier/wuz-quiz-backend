		<div class="container">
		  <div class="jumbotron">
			<h2>Quiz-Overview:</h2>
			<p>This interface shows editable quizes.</p>
			<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
			  <thead>
			    <tr>
				  <th colspan="4" rowspan="1"  tabindex="0">table "question"</th>
				</tr>
				<tr>
				  <th colspan="1" rowspan="1"  tabindex="0">id [SMALLINT]</th>
				  <th colspan="1" rowspan="1"  tabindex="0">question [TINYTEXT]</th>
				  <th colspan="1" rowspan="1"  tabindex="0">creation [TIMESTAMP]</th>
				  <th colspan="1" rowspan="1"  tabindex="0">board [TINYINT]</th>
				  </tr>
			  </thead>
			  <tbody>
				<?php
					$result = (new db)->connect('SELECT * FROM question');
					$i=0;
					
					while($row = $result->fetch_assoc()){
						if($i%2==0)
							$class = 'even';
						else
							$class = 'odd';
						echo'
						<tr class=\''.$class.'\'>
							<td>'.$row['id'].'</td>
							<td><span class= \'xedit\' id=\'' . $row['id'] . '\'>' . $row['question'] . '</span></td>
							<td>'.$row['creation'].'</td>
							<td>'.$row['board'].'</td>
						</tr>';
					}
				?>
			  </tbody>
			</table>
		  </div>
		</div>