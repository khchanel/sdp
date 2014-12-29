<?php echo validation_errors(); ?> 
<?php echo $message;?>
<!--Form Start-->
<form id="form" action="<?php echo site_url('form/report_insert'); ?>" method="post" data-ajax="false" enctype="multipart/form-data">
	
	<!--Title Label and Input-->
	<label for="Title">Title</label>
	<input id="textfield" data-mini="true" type="text" name="Title" data-theme="b" autocomplete="off" value="<?php echo set_value('Title'); ?>" />
	
	<!--Description Label and Input-->
	<label for="Description">Description</label>
	<textarea class="textfield" data-mini="true" type="text" name="Description" data-theme="b" autocomplete="off"><?php echo set_value('Description'); ?></textarea><br />
	
	<!--Category Select Menu-->
	<select name="CategoryId" data-theme="a" data-mini="true" >
		<option>Select Category</option>
		<?php foreach($categories->result() as $row): ?>
		<option value="<?php echo $row->CategoryID; ?>" <?php echo set_select('CategoryId', $row->CategoryID); ?>><?php echo $row->CategoryName; ?></option>
		<?php endforeach; ?>
	</select><br />

	<input type="hidden" name="TenantID" value="<?php echo $user->id; ?>" />
	<input type="hidden" name="StatusID" value="3" />
	<input type="hidden" name="Username" value="<?php echo $user->username?>" />
	<input type="hidden" name="RoomNum" value="<?php echo $user->room_num?>" />
	<input type="hidden" name="ImageName" id="ImageName" value="<?php set_value("ImageName"); ?>" />
	<!--Server URL for upload.php-->
	<input id="serverUrl" type="hidden" value="<?php echo base_url()?>upload.php" />
	<!--Image upload-->
	<div>
	<span id="camera_status"></span><br>
	<img style="width:120px;visibility:hidden;display:none;" id="camera_image" src="" />
	</div>
	
	<!-- PhoneGap Actions -->
	<div id="phoneGapActions" style="display: none;">
		<input type="button" onclick="takePicture();" value="Take Picture" /><br/>
		<input type="button" onclick="selectPicture();" value="Select Picture from Library" /><br/>
		<input type="button" onclick="uploadPicture();" value="Upload Picture" />
	</div>

	<!-- Browser Actions -->
	<div id="browserActions" style="display: block;">
	<fieldset>	
		<input type="file" name="ImageName" size="38" accept="image/*"/>
	</fieldset>
	</div>



	
</form>
<!--Form End-->