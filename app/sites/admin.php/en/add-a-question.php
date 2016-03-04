		<div class="container">
		  <div class="jumbotron">
			<h2>Add a question:</h2>
			<p>In this interface you can add questions.</p>
			<form class="form-horizontal">
				<fieldset>

				<!-- Form Name -->
				<legend>Create quiz-question</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput_question">Question:</label>  
				  <div class="col-md-8">
				  <input id="textinput" name="textinput" type="text" placeholder="Vor wie vielen Jahren wurde in Ostfriesland schon Ackerbau betrieben?" class="form-control input-md" required="">
				  </div>
				</div>

				<!-- File Button --> 
				<div class="form-group">
				  <label class="col-md-4 control-label" for="filebutton">Upload photo:</label>
				  <div class="col-md-4">
					<input id="filebutton" name="filebutton" class="input-file" type="file">
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_0">Answers:</label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon">     
						  <input type="checkbox" checked="checked">     
					  </span>
					  <input id="prependedcheckbox_0" name="prependedcheckbox_0" class="form-control" type="text" placeholder="Vor 2.500 Jahren" required="">
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_1"></label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon">     
						  <input type="checkbox">     
					  </span>
					  <input id="prependedcheckbox_1" name="prependedcheckbox_1" class="form-control" type="text" placeholder="Vor 1.500 Jahren" required="">
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_2"></label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon">     
						  <input type="checkbox">     
					  </span>
					  <input id="prependedcheckbox_2" name="prependedcheckbox_2" class="form-control" type="text" placeholder="Vor 1.500 Jahren" required="">
					</div>
				  </div>
				</div>

				<!-- Prepended checkbox -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prependedcheckbox_3"></label>
				  <div class="col-md-5">
					<div class="input-group">
					  <span class="input-group-addon">     
						  <input type="checkbox">     
					  </span>
					  <input id="prependedcheckbox_3" name="prependedcheckbox_3" class="form-control" type="text" placeholder="Vor 1.500 Jahren" required="">
					</div>
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="singlebutton"></label>
				  <div class="col-md-4">
					<button id="singlebutton" name="singlebutton" class="btn btn-success">submit</button>
				  </div>
				</div>

				</fieldset>
			</form>
		  </div>
		</div>
