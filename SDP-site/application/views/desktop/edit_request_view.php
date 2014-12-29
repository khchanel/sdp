<?php $jobData = $jobData->row(); ?>
<div class="request">
<?php echo validation_errors(); ?> 
<?php echo $message;?>
<form id="form" action="<?php echo site_url('form/update_request/'.$this->uri->segment(3)); ?>" method="post" enctype="multipart/form-data">
	
	<!--Title Label and Input-->
	<fieldset>
		<label for="Title">Title</label>
		<input id="textfield"  type="text" name="Title" value="<?php echo $jobData->Title; ?>" />
	</fieldset>
	<!--Description Label and Input-->
	<fieldset>
		<label for="Description">Description</label>
		<textarea class="textfield"  type="text" name="Description"><?php echo $jobData->Description; ?></textarea>
	</fieldset>
	<br />
	<!--Category Select Menu-->
	<fieldset>
	<label for="CategoryId">Description</label>
		<select name="CategoryId" data-theme="a"  >
			<option>Select Category</option>
			<?php foreach($categories->result() as $row): ?>
			<option value="<?php echo $row->CategoryID; ?>"
			<?php if($row->CategoryID == $jobData->CategoryID) { echo "selected='selected'"; } ?>> <?php echo $row->CategoryName; ?> </option>
			<?php endforeach; ?>
		</select>
	</fieldset>
	<br />
	<!--Status Select Menu-->
	<fieldset>
	<label for="StatusID">Status</label>
		<select name="StatusID" data-theme="a"  >
			<option>Select Status</option>
			<?php foreach($status->result() as $row): ?>
			<option value="<?php echo $row->StatusId; ?>"
			<?php if($row->StatusId == $jobData->StatusID) { echo "selected='selected'"; } ?>> <?php echo $row->StatusName; ?> </option>
			<?php endforeach; ?>
		</select>
	</fieldset>
	<br />
	<input type="hidden" name="TenantID" value="<?php echo $user->id; ?>" />
	<!--Image upload-->
	<?php if(strcmp('', $jobData->ImageName) !== 0) : ?>
		<p class="info"><b>Image</b><br />
		<img class="report" src="<?php echo base_url()?>uploads/<?php echo $jobData->ImageName;?>" alt="report image"></p>
	<?php endif; ?>	
	<fieldset>	
		<label for="Image">Image</label>
		<input type="file" name="ImageName" size="38" />
	</fieldset>
	<input type="submit" value="Update Request" /><p/ >
</form>
</div>

