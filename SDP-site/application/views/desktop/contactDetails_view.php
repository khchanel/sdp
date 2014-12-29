<div id="message"><p><?php echo $message;?></p></div>
<div class="request">
<h2>Change details</h2>
<?php echo validation_errors(); ?>
<form action="<?php echo site_url('settings/changeContactDetails'); ?>" method="post" >
	<fieldset>
		<label for="emailAddress">Email Address</label>
		<input id="emailAddress" value="<?php echo $user->email; ?>"  type="text" name="emailAddress"  /><br />
	</fieldset>
	<fieldset>
		<label for="phoneNumber">Phone Number</label>
		<input id="phoneNumber" value="<?php echo $user->phone != 0 ? $user->phone : "" ; ?>"  type="text" name="phoneNumber"  /><br />
	</fieldset>
	<input type="submit" value="Update Details" />
</form>
<br/>
</div>
