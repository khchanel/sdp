<div id="message"><p><?php echo $message;?></p></div>
<form action="<?php echo site_url('auth/login'); ?>" method="post" data-ajax="false">
	<label for="identity">Email Address:</label>
	<input id="identity" data-mini="true" type="text" name="identity" data-theme="b" autofocus autocomplete="off" value="<?php echo set_value('identity'); ?>" />
	<label for="password">Password:</label>
	<input id="password" data-mini="true" type="password" name="password" data-theme="b" autocomplete="off" /><br />
	<input type="submit" value="Login" data-mini="true"/>
	<p><a href="auth/forgot_password" data-ajax="false">Forgot your password?</a></p>
</form>
