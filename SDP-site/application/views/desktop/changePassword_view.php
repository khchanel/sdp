
<div class="request">
<h2>Change password</h2>
<?php echo validation_errors(); ?>
<form action="<?php echo site_url('settings/changeUserPassword'); ?>" method="post">
	<fieldset>
		<label for="oldPassword">Old Password</label>
		<input id="oldPassword" data-mini="true" type="password" name="oldPassword" /><br />
	</fieldset>	
	<fieldset>
	<label for="newPassword">New Password</label>
	<input id="newPassword" data-mini="true" type="password" name="newPassword" /><br />
	</fieldset>	
	<fieldset>	
	<label for="newPsswordConfirm">Confirm New Password</label>
	<input id="newPasswordConfirm" data-mini="true" type="password" name="newPasswordConfirm" /><br />
	</fieldset>	
	<input type="submit" value="Change Password" data-mini="true"/>
</form>
<br/>
</div>
