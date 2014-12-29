<!--Form Start-->
<div class="request">
<?php echo validation_errors(); ?> 
<?php echo $message;?>
<form id="form" action="<?php echo site_url('form/report_insert'); ?>" method="post" enctype="multipart/form-data" >
	
	<!--Title Label and Input-->
	<fieldset>
	<label for="Title">Title</label>
	<input id="textfield" type="text" name="Title"  value="<?php echo set_value('Title'); ?>" />
	</fieldset>	

	<!--Description Label and Input-->
	<fieldset>
	<label for="Description">Description</label>
	<textarea class="textfield" type="text" name="Description"><?php echo set_value('Description'); ?></textarea><br />
	</fieldset>	 

	<!--Category Select Menu-->
	<fieldset>
	<label for="CategoryId">Category</label>
	<select size="10" name="CategoryId" >
		<?php foreach($categories->result() as $row): ?>
		<option value="<?php echo $row->CategoryID; ?>" <?php echo set_select('CategoryId', $row->CategoryID); ?>><?php echo $row->CategoryName; ?></option>
		<?php endforeach; ?>
	</select><br />
	</fieldset>

	<input type="hidden" name="TenantID" value="<?php echo $user->id; ?>" />
	<input type="hidden" name="RoomNum" value="<?php echo $user->room_num?>" />
	<input type="hidden" name="StatusID" value="3" />
	
	<!--Image upload-->
	<fieldset>	
		<label for="ImageName">Image</label>
		<input type="file" name="ImageName" size="38" />
	</fieldset>

	<input type="submit" value="Submit Request" /><p />
	
</form>
</div>
<!--Form End-->
