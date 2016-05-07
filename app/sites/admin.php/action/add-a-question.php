		<div class="container">
		  <div class="jumbotron">
			<h2><?php echo $lt->admin__action__add_a_question->h2; ?></h2>
			<p><?php echo $lt->admin__action__add_a_question->p; ?></p>
			<?php
				echo '<pre>POST - ';
				print_r($_POST);
				echo 'GET - ';
				print_r($_GET);
				echo '</pre>';

				if (isset($_POST['new_question'])) {
					$db = new db;

					$new_question_database = $_POST['new_question'];

					$time = date('Y-m-d H:i:s');
					
					$type = 0;
					// Formular abgeschickt
					if(isset($_FILES['image'])) {

						// Datei hochgeladen
						if(is_uploaded_file($_FILES['image']['tmp_name'])) {
							$type = 5;
						}
					}

					$db_erg_question = $db->query_id('INSERT INTO `question` (`question`, `type`, `creation`, `board`, `active`) VALUES ( \'' . $new_question_database['textinput_question'] . '\',' . $type . ', \'' . $time . '\', \'' . $new_question_database['selectbasic_board'] . '\', 1)');

					$correct = 0;
					if (isset($new_question_database['prependedcheckbox_0_correct'])) {
						$correct = 1;
					}
					$db_erg_answer0 = $db->query('INSERT INTO `answer_choice` (`question_id`, `answer`, `correct`) VALUES (\'' . $db_erg_question['id'] . '\', \'' . $new_question_database['prependedcheckbox_0'] . '\', \'' . $correct . '\')');

					$correct = 0;
					if (isset($new_question_database['prependedcheckbox_1_correct'])) {
						$correct = 1;
					}
					$db_erg_answer0 = $db->query('INSERT INTO `answer_choice` (`question_id`, `answer`, `correct`) VALUES (\'' . $db_erg_question['id'] . '\', \'' . $new_question_database['prependedcheckbox_1'] . '\', \'' . $correct . '\')');

					$correct = 0;
					if (isset($new_question_database['prependedcheckbox_2_correct'])) {
						$correct = 1;
					}
					$db_erg_answer0 = $db->query('INSERT INTO `answer_choice` (`question_id`, `answer`, `correct`) VALUES (\'' . $db_erg_question['id'] . '\', \'' . $new_question_database['prependedcheckbox_2'] . '\', \'' . $correct . '\')');

					$correct = 0;
					if (isset($new_question_database['prependedcheckbox_3_correct'])) {
						$correct = 1;
					}
					$db_erg_answer0 = $db->query('INSERT INTO `answer_choice` (`question_id`, `answer`, `correct`) VALUES (\'' . $db_erg_question['id'] . '\', \'' . $new_question_database['prependedcheckbox_3'] . '\', \'' . $correct . '\')');
					
					
					if($type == 5) {
						// Verweis auf Bild
						$image = $_FILES['image']['tmp_name'];

						// Vorbereiten für den Upload in DB
						$data = addslashes(file_get_contents($image));

						// Metadaten auslesen
						$meta = getimagesize($image);
						$mime = $meta['mime'];

						// Bild in DB speichern
						(new db)->query('
						 INSERT INTO `question_images` (`question_id`, `image`, `mimetype`) VALUES (
						 \'' . $db_erg_question['id'] . '\', \'' . $data . '\', \'' . $mime . '\');
						');
					}
				}
			?>
			<form class='form-horizontal' method='POST' action='.<?php
					echo $_SERVER['REQUEST_URI'];
			 	?>' enctype='multipart/form-data'>
				<fieldset>

				<!-- Form Name -->
				<legend><?php echo $lt->admin__action__add_a_question->create_quiz_question; ?></legend>

				<!-- Select Basic -->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='selectbasic_board'><?php echo $lt->admin__action__add_a_question->select_board; ?></label>
				  <div class='col-md-5'>
					<select id='selectbasic_board' name='new_question[selectbasic_board]' class='form-control'>
						<?php
							$boards = (new db)->query('SELECT * FROM `board`');
							while ($row = $boards->fetch_assoc()) {
								echo '<option value=' . $row['id'] . '>' . $row['title'] . '</option>';
							}
						?> 
					</select>
				  </div>
				</div>

				<!-- Text input-->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='textinput_question'><?php echo $lt->admin__action__add_a_question->question; ?></label>  
				  <div class='col-md-8'>
				  <input name='new_question[textinput_question]' type='text'
				  placeholder='Vor wie vielen Jahren wurde in Ostfriesland schon Ackerbau betrieben?' class='form-control input-md' required='' />
				  </div>
				</div>

				<!-- File Button --> 
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='filebutton_img'><?php echo $lt->admin__action__add_a_question->upload_photo; ?></label>
				  <div class='col-md-4'>
					<input name='image' class='input-file' type='file' />
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='prependedcheckbox_0'><?php echo $lt->admin__action__add_a_question->answers; ?></label>
				  <div class='col-md-5'>
					<div class='input-group'>
					  <span class='input-group-addon'>
						  <input type='checkbox' checked='checked' name='new_question[prependedcheckbox_0_correct]'>
					  </span>
					  <input name='new_question[prependedcheckbox_0]' class='form-control' type='text'
					  placeholder='Vor 2.500 Jahren' required='' />
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='prependedcheckbox_1'></label>
				  <div class='col-md-5'>
					<div class='input-group'>
					  <span class='input-group-addon'>
						  <input type='checkbox' name='new_question[prependedcheckbox_1_correct]'>
					  </span>
					  <input name='new_question[prependedcheckbox_1]' class='form-control' type='text'
					  placeholder='Vor 1.500 Jahren' required='' />
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='prependedcheckbox_2'></label>
				  <div class='col-md-5'>
					<div class='input-group'>
					  <span class='input-group-addon'>
						  <input type='checkbox' name='new_question[prependedcheckbox_2_correct]'>
					  </span>
					  <input name='new_question[prependedcheckbox_2]' class='form-control' type='text'
					  placeholder='Vor 1.500 Jahren' required='' />
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='prependedcheckbox_3'></label>
				  <div class='col-md-5'>
					<div class='input-group'>
					  <span class='input-group-addon'>
						  <input type='checkbox' name='new_question[prependedcheckbox_3_correct]'>
					  </span>
					  <input name='new_question[prependedcheckbox_3]' class='form-control' type='text'
					  placeholder='Vor 1.500 Jahren' required='' />
					</div>
				  </div>
				</div>

				<!-- Button -->
				<div class='form-group'>
				  <label class='col-md-4 control-label' for='singlebutton_submit'></label>
				  <div class='col-md-4'>
					<button class='btn btn-success'><?php echo $lt->admin__action__add_a_question->submit; ?></button>
				  </div>
				</div>

				</fieldset>
			</form>
		  </div>
		</div>
