<?php echo "Logged in as: ".$user->username; ?>
<div id="message"><p><?php echo $message;?></p></div>
<?php echo validation_errors(); ?>
<form action="<?php echo site_url('settings/changeContactDetails'); ?>" method="post" data-ajax="false">
	<label for="emailAddress">Email Address:</label>
	<input id="emailAddress" value="<?php echo $user->email; ?>" data-mini="true" type="text" name="emailAddress" data-theme="b" autocomplete="off" />
	<label for="phoneNumber">Phone Number:</label>
	<input id="phoneNumber" value="<?php echo $user->phone != 0 ? $user->phone : "" ; ?>" data-mini="true" type="text" name="phoneNumber" data-theme="b" autocomplete="off" />
	</br>
	<input type="submit" value="Update Details" data-mini="true"/>
</form>
