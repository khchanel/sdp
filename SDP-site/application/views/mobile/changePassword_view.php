<?php echo "Logged in as: ".$user->username; ?>
<div id="message"><p><?php echo $message;?></p></div>
<?php echo validation_errors(); ?>
<form action="<?php echo site_url('settings/changeUserPassword'); ?>" method="post" data-ajax="false">
	<label for="oldPassword">Old Password:</label>
	<input id="oldPassword" data-mini="true" type="password" name="oldPassword" data-theme="b" autocomplete="off" />
	<label for="newPassword">New Password:</label>
	<input id="newPassword" data-mini="true" type="password" name="newPassword" data-theme="b" autocomplete="off" />
	<label for="newPsswordConfirm">Confirm New Password:</label>
	<input id="newPasswordConfirm" data-mini="true" type="password" name="newPasswordConfirm" data-theme="b" autocomplete="off" />
	</br>
	<input type="submit" value="Change Password" data-mini="true"/>
</form>