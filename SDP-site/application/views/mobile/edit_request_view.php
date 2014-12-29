<?php $jobData = $jobData->row(); ?>
<?php echo validation_errors(); ?> 
<?php echo $message;?>

<form id="form" action="<?php echo site_url('form/update_request/'.$this->uri->segment(3)); ?>" method="post" enctype="multipart/form-data" data-ajax="false">
	
	<!--Title Label and Input-->
	<label for="Title">Title</label>
	<input id="textfield" data-mini="true" type="text" name="Title" data-theme="b" autocomplete="off" value="<?php echo $jobData->Title; ?> " />
	
	
	<!--Description Label and Input-->
	<label for="Description">Description</label>
	<textarea class="textfield" data-mini="true" type="text" name="Description" data-theme="b" autocomplete="off"  ><?php echo $jobData->Description; ?></textarea>
	<br />
	<!--Category Select Menu-->
	<select name="CategoryId" data-theme="a" data-mini="true" >
		<option>Select Category</option>
		<?php foreach($categories->result() as $row): ?>
			<option value="<?php echo $row->CategoryID; ?>"
			<?php if($row->CategoryID == $jobData->CategoryID) { echo "selected='selected'"; } ?>>
			<?php echo $row->CategoryName; ?>
			</option>
		<?php endforeach; ?>
	</select>
	<br />
	<!--Status Select Menu-->
	<select name="StatusID" data-theme="a" data-mini="true" >
		<option>Select Status</option>
		<?php foreach($status->result() as $row): ?>
			<option value="<?php echo $row->StatusId; ?>"
			<?php if($row->StatusId == $jobData->StatusID) { echo "selected='selected'"; } ?>>
			<?php echo $row->StatusName; ?>
			</option>
		<?php endforeach; ?>
	</select>
	<br />
	<input type="hidden" name="TenantID" value="<?php echo $user->id; ?>" />
	<?php if(strcmp('', $jobData->ImageName) !== 0) : ?>
		<p class="info"><b>Image</b><br />
		<img class="report" src="<?php echo base_url()?>uploads/<?php echo $jobData->ImageName;?>" alt="report image"></p>
		<!-- Edit image file-->
	<?php endif; ?>	
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