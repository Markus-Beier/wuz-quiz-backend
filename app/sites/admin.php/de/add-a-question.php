		<div class="container">
		  <div class="jumbotron">
			<h2>Füge eine Quiz-Frage hinzu:</h2>
			<p>In diesem Interface werden Quiz-Fragen erstellt.</p>
			<?php
				echo "<pre>POST - ";
				print_r($_POST);
				echo "GET - ";
				print_r($_GET);
				echo "</pre>";

				if (isset($_POST['new_question'])) {
					$db = new db;

					$new_question_database = $_POST['new_question'];

					$time = date("Y-m-d H:i:s");

					$db_erg_question = $db->query_id("INSERT INTO `question`(`question`, `type`, `creation`, `board`, `active`) VALUES ( '". $new_question_database['textinput_question'] ."','0','". $time ."', '". $new_question_database['selectbasic_board'] ."','0')");

					//$db_erg_question['id'];

					if (isset($new_question_database['prependedcheckbox_0_right'])) {
						$correct = "1";
					} else {
						$correct = "0";
					}
					$db_erg_answer0 = $db->query("INSERT INTO `answer_choice`(`question_id`, `answer`, `correct`) VALUES ('". $db_erg_question['id'] ."','". $new_question_database['prependedcheckbox_0'] ."','". $correct ."')");

					if (isset($new_question_database['prependedcheckbox_1_right'])) {
						$correct = "1";
					} else {
						$correct = "0";
					}
					$db_erg_answer1 = $db->query("INSERT INTO `answer_choice`(`question_id`, `answer`, `correct`) VALUES ('". $db_erg_question['id'] ."','". $new_question_database['prependedcheckbox_1'] ."','". $correct ."')");

					if (isset($new_question_database['prependedcheckbox_2_right'])) {
						$correct = "1";
					} else {
						$correct = "0";
					}
					$db_erg_answer2 = $db->query("INSERT INTO `answer_choice`(`question_id`, `answer`, `correct`) VALUES ('". $db_erg_question['id'] ."','". $new_question_database['prependedcheckbox_2'] ."','". $correct ."')");

					if (isset($new_question_database['prependedcheckbox_3_right'])) {
						$correct = "1";
					} else {
						$correct = "0";
					}
					$db_erg_answer3 = $db->query("INSERT INTO `answer_choice`(`question_id`, `answer`, `correct`) VALUES ('". $db_erg_question['id'] ."','". $new_question_database['prependedcheckbox_3'] ."','". $correct ."')");
				}
			?>
			<form class="form-horizontal" method="POST" action="./?<?php
					$first = 1;
					if (isset($_GET['lang'])) {
						echo "lang=".$_GET['lang'];
						$first = 0;
					}
					if (isset($_GET['action'])) {
						if ($first == 0) {
							echo "&";
						}
						echo "action=".$_GET['action'];
					}
			 		

			 		?>">
				<fieldset>

				<!-- Form Name -->
				<legend>Quiz-Frage erstellen</legend>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="selectbasic_board">Tafel/Quiz auswählen:</label>
				  <div class="col-md-5">
					<select id="selectbasic_board" name="new_question[selectbasic_board]" class="form-control">
						<?php
							$db = new db;

							$boards = $db->query("SELECT * FROM `board` WHERE 1");
							while ($row = mysqli_fetch_array($boards)) {
								echo "<pre>Boards - ";
								print_r($row);
								echo "</pre>";
								echo '<option value="'. $row['id'] .'">'. $row['title'] .'</option>';
							}
						?>
					</select>
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput_question">Frage:</label>  
				  <div class="col-md-8">
				  <input id="textinput_question" name="new_question[textinput_question]" type="text"
				  placeholder="Vor wie vielen Jahren wurde in Ostfriesland schon Ackerbau betrieben?" class="form-control input-md" required="" />
				  </div>
				</div>

				<!-- File Button --> 
				<div class="form-group">
				  <label class="col-md-4 control-label" for="filebutton_img">Foto hochladen:</label>
				  <div class="col-md-4">
					<input id="filebutton_img" name="new_question[filebutton_img]" class="input-file" type="file" />
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_0">Antworten:</label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon">     
						  <input type="checkbox" checked="checked" name="new_question[prependedcheckbox_0_right]">     
					  </span>
					  <input id="prependedcheckbox_0" name="new_question[prependedcheckbox_0]" class="form-control" type="text"
					  placeholder="Vor 2.500 Jahren" required="" />
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_1"></label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon">     
						  <input type="checkbox" name="new_question[prependedcheckbox_1_right]">     
					  </span>
					  <input id="prependedcheckbox_1" name="new_question[prependedcheckbox_1]" class="form-control" type="text"
					  placeholder="Vor 1.500 Jahren" required="" />
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_2"></label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon">     
						  <input type="checkbox" name="new_question[prependedcheckbox_2_right]">     
					  </span>
					  <input id="prependedcheckbox_2" name="new_question[prependedcheckbox_2]" class="form-control" type="text"
					  placeholder="Vor 1.500 Jahren" required="" />
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_3"></label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon" name="new_question[prependedcheckbox_3_right]">     
						  <input type="checkbox">     
					  </span>
					  <input id="prependedcheckbox_3" name="new_question[prependedcheckbox_3]" class="form-control" type="text"
					  placeholder="Vor 1.500 Jahren" required="" />
					</div>
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="singlebutton_submit"></label>
				  <div class="col-md-4">
					<button id="singlebutton_submit" class="btn btn-success">speichern</button>
				  </div>
				</div>

				</fieldset>
			</form>
		  </div>
		</div>
