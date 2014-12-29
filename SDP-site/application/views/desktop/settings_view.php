
<div class="request">
<?php echo validation_errors(); ?>
<h2>Change details</h2>
<p />
<form action="<?php echo site_url('settings/changeContactDetails'); ?>" method="post">
	<fieldset>
		<label for="emailAddress">Email Address</label>
		<input id="emailAddress" value="<?php echo $user->email; ?>"  type="text" name="emailAddress"  /><br />
	</fieldset>
	<fieldset>
		<label for="phoneNumber">Phone Number</label>
		<input id="phoneNumber" value="<?php echo $user->phone != 0 ? $user->phone : "" ; ?>"  type="text" name="phoneNumber"  /><br />
	</fieldset>
	<input type="submit" value="Update Details" />
	<p />
</form>
</div>

<div class="request">
<h2>Change password</h2>
<p />
<?php echo validation_errors(); ?>
<form action="<?php echo site_url('settings/changeUserPassword'); ?>" method="post" data-ajax="false">
	<fieldset>
		<label for="oldPassword">Old Password</label>
		<input id="oldPassword"  type="password" name="oldPassword"  /><br />
	</fieldset>	
	<fieldset>
	<label for="newPassword">New Password</label>
	<input id="newPassword"  type="password" name="newPassword"  /><br />
	</fieldset>	
	<fieldset>	
	<label for="newPsswordConfirm">Confirm New Password</label>
	<input id="newPasswordConfirm"  type="password" name="newPasswordConfirm"  /><br />
	</fieldset>	
	<input type="submit" value="Change Password" />
	<p />
</form>
</div>

