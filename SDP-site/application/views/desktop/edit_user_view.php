<div class="request" style="font-weight:bold; background:transparent; padding:0">
  <a style="margin-right:15px;"  class="linkbutton" href="<?php echo site_url('admin/del_user/'.$this->uri->segment(3)); ?>">&#x2212; Delete User</a>
  <p />
</div><!--/request-->


<div id="message">
	
</div>
<div class="request">
	<?php foreach($query as $row): ?>
	<p>You are current editing <?php echo $row->username;?></p>
	<p><?php echo $message;?></p>
	<?php echo validation_errors(); ?>
	<form action="<?php echo site_url('admin/update_user'); ?>" method="post">
		<fieldset>
			<label for="emailAddress">Email Address:</label>
			<input id="emailAddress" value="<?php echo $row->email; ?>" type="text" name="emailAddress" >
		</fieldset>
		<fieldset>
			<label for="phoneNumber">Phone Number:</label>
			<input id="phoneNumber" value="<?php echo $row->phone; ?>" type="text" name="phoneNumber" >
		</fieldset>
		<fieldset>
			<label for="firstName">First Name:</label>
			<input id="firstName" value="<?php echo $row->first_name; ?>" type="text" name="firstName" >
		</fieldset>
		<fieldset>
			<label for="lastName">Last Name:</label>
			<input id="lastName" value="<?php echo $row->last_name; ?>" type="text" name="lastName" >
		</fieldset>
		<fieldset>
			<label for="username">Username:</label>
			<input id="username" value="<?php echo $row->username; ?>" type="text" name="username" >
		</fieldset>
		<fieldset>
			<label for="room_num">Room Number:</label>
			<input id="room_num" value="<?php echo $row->room_num; ?>" type="text" name="room_num" >
		</fieldset>
		<input type="hidden" name="id" value="<?php echo $row->id?>" />
		<input type="submit" value="Update Details" />
	</form>
	<p/>
	<?php endforeach; ?>

</div>
