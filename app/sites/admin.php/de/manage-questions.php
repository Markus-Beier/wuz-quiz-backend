		<div class='container'>
			<div class='jumbotron'>
				<h2>Verwalten Sie ihre Quiz-Fragen:</h2>
				<p>In diesem Interface werden Quiz-Fragen verwaltet.</p>

				<form class='form-horizontal' method='GET'>
					<?php
						$first = 1;
						if (isset($_GET['lang'])) {
							echo '<input type=\'hidden\' name=\'lang\' value=\'' . $_GET['lang'] . '\'>';
						}
						if (isset($_GET['action'])) {
							echo '<input type=\'hidden\' name=\'action\' value=\'' . $_GET['action'] . '\'>';
						}
			 		?>
			 		<select id='selectbasic_board' name='manage_quiz'>
						<?php
							$boards = (new db)->query('SELECT * FROM `board`');
							while ($row = $boards->fetch_assoc()) {
								if (isset($_GET['manage_quiz'])) {
									if ($row['id'] == $_GET['manage_quiz']) {
										$active = 'selected=\'\'';
									} else {
										$active = '';
									}
								} else {
									$active = '';
								}
								echo '<option value=\'' . $row['id'] .'\'' . $active . '>' . $row['title'] . '</option>';
							}
						?>
					</select>
					<input class='btn btn-success' type='submit' value='Quiz zur Verwaltung öffnen'>
				</form>
			</div>
			<div class='well'>
				
				<!--<div class='table-responsive'>
					<table class='table'>
						<tr>
							<td>#</td>
							<td>Frage</td>
							<td>Aktiv</td>
							<td>Art</td>
							<td>Erstellungszeitpunkt</td>
							<td>Bearbeiten</td>
						</tr>
					</table>
				</div>-->

				<?php
				if (isset($_GET['manage_quiz'])) {
					$boards = (new db)->query('SELECT * FROM `board` WHERE `id`=\'' . $_GET['manage_quiz'] . '\'');
					$board_name = $boards->fetch_assoc()['title'];
					echo '<p>Sie verwalten momentan das Quiz <b>' . $board_name . '</b></p>';

					$boards = (new db)->query('SELECT * FROM `question` WHERE `board`=\'' . $_GET['manage_quiz'] . '\'');
					while ($row = $boards->fetch_assoc()) {
						if ($row['type'] == 0) {
							$type = 'Normale Frage';
						} else {
							$type = '<b>Question type error!</b>';
						}

						$active = '';
						if ($row['active'] == 0) {
							$active = ' - <b>deaktiviert</b>';
						}

						$questiontext = '#' . $row['id'] . ' | ' . $row['question'] . ' - ' . $type . $active . ' | ' . $row['creation'];
						echo '<div class=\'input-group\'>
								<span class=\'input-group-btn\'>
									<button class=\'btn btn-default\' type=\'button\'><i class=\'glyphicon glyphicon-pencil\'></i>Bearbeiten</button>
								</span>
								<span class=\'input-group-addon form-control\' id=\'einfaches-addon1\' style=\'text-align: left;\'>'. $questiontext .'</span>
								<span class=\'input-group-btn\'>
									<button class=\'btn btn-danger\' type=\'button\'><i class=\'glyphicon glyphicon-remove\'></i>Löschen</button>
								</span>
							</div>';
					}
				} else {
					echo '<p>Bitte wählen Sie ein Quiz zum Verwalten aus.</p>';
				}
				?>

				<!--
				<div class='input-group'>
					<span class='input-group-btn'>
						<button class='btn btn-default' type='button'><i class='glyphicon glyphicon-pencil'></i>Bearbeiten</button>
					</span>
					<span class='input-group-addon form-control' id='einfaches-addon1' style='text-align: left;'>Frage? - Aktiv - Art - Erstellungsdatum</span>
					<span class='input-group-btn'>
						<button class='btn btn-danger' type='button'><i class='glyphicon glyphicon-remove'></i>Löschen</button>
					</span>
				</div>
				-->
			</div>
		</div>