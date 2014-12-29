<div class="request">
<?php echo validation_errors(); ?>
	<p><?php echo $message;?></p>
	<form action="<?php echo site_url('admin/register'); ?>" method="post">
		<fieldset>
			<label for="username">Username</label>
			<input type="text" name="username" value="<?php echo set_value('username'); ?>"  />
		</fieldset>
		<fieldset>
			<label for="email">Email Address</label>
			<input type="text" name="email" value="<?php echo set_value('email'); ?>"  />
		</fieldset>
		<fieldset>
			<label for="password">Password</label>
			<input type="password" name="password" value=""  />
		</fieldset>
		<fieldset>
			<label for="passconf">Password Confirm</label>
			<input type="password" name="passconf" value="" />
		</fieldset>
		<fieldset>
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" />
		</fieldset>
		<fieldset>
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" />
		</fieldset>
		<fieldset>
			<label for="room_num">Room Number</label>
			<input id="room_num" type="text" name="room_num" value="<?php echo set_value('room_num'); ?>" />
		</fieldset>
		<fieldset>
			<label for="phone">Phone Number</label>
			<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" />
		</fieldset>
		<br />
		<input type="submit" value="Add User" />
	</form>
	<p/>
</div>
