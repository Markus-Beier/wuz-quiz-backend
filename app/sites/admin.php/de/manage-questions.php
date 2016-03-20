		<div class="container">
			<div class="jumbatron">
				<h2>Verwalten Sie ihre Quiz-Fragen:</h2>
				<p>In diesem Interface werden Quiz-Fragen verwaltet.</p>

				<form class="form-horizontal" method="GET">
					<?php
						$first = 1;
						if (isset($_GET['lang'])) {
							echo '<input type="hidden" name="lang" value="'. $_GET['lang'] .'">';
						}
						if (isset($_GET['action'])) {
							echo '<input type="hidden" name="action" value="'. $_GET['action'] .'">';
						}
			 		?>
			 		<select id="selectbasic_board" name="choosen_quiz">
						<?php
							$db = new db;

							$boards = $db->query("SELECT * FROM `board` WHERE 1");
							while ($row = mysqli_fetch_array($boards)) {
								echo "<pre>Boards - ";
								print_r($row);
								echo "</pre>";

								if (isset($_GET['choosen_quiz'])) {
									if ($row['id'] == $_GET['choosen_quiz']) {
										$active = '  selected="selected"';
									} else {
										$active = "";
									}
								} else {
									$active="";
								}

								echo '<option value="'. $row['id'] .'"'. $active .'>'. $row['title'] .'</option>';
							}
						?>
					</select>
					<input class="btn btn-success" type="submit" value="Quiz zur Verwaltung öffnen">
				</form>
			</div>
			<div class="well">
				
				<!--<div class="table-responsive">
					<table class="table">
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
				if (isset($_GET['choosen_quiz'])) {
					$boards = $db->query("SELECT * FROM `board` WHERE `id`='". $_GET['choosen_quiz'] ."'");
					$board_name = mysqli_fetch_array($boards)['title'];
					echo "<p>Sie verwalten momentan das Quiz <b>". $board_name ."</b></p>";
					$db = new db;

					$boards = $db->query("SELECT * FROM `question` WHERE `board`='". $_GET['choosen_quiz'] ."'");
					while ($row = mysqli_fetch_array($boards)) {
						if ($row['type'] == 0) {
							$type="Normale Frage";
						} else {
							$type = "<b>FEHLER!</b>";
						}

						if ($row['active'] == 0) {
							$active = " - <b>deaktiviert</b>";
						} else {
							$active = "";
						}

						$fragetext = '#' . $row['id'] . ' | ' . $row['question'] . ' - ' . $type . $active . ' | ' . $row['creation'];
						echo '<div class="input-group">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i>Bearbeiten</button>
								</span>
								<span class="input-group-addon form-control" id="einfaches-addon1" style="text-align: left;">'. $fragetext .'</span>
								<span class="input-group-btn">
									<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Löschen</button>
								</span>
							</div>';
					}
				} else {
					echo "<p>Bitte wählen Sie ein Quiz zum verwalten aus.</p>";
				}
				?>

				<!--
				<div class="input-group">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i>Bearbeiten</button>
					</span>
					<span class="input-group-addon form-control" id="einfaches-addon1" style="text-align: left;">Frage? - Aktiv - Art - Erstellungsdatum</span>
					<span class="input-group-btn">
						<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Löschen</button>
					</span>
				</div>
				-->
			</div>
		</div>