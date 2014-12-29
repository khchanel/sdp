<!-- SIDEBAR -->
<div id="sidebar">

<?php if($this->uri->rsegment(1) != 'auth') { ?>
<div id="login-status"><?php echo "Logged in as: ".$user->username; ?>.</div>

<ul id="navigation">
<li><a href="<?php echo site_url('manage'); ?>">Manage Request List</a></li>
<?php if($this->ion_auth->is_admin()): ?>
<li><a href="<?php echo site_url('admin')?>">Admin Settings</a></li>
<?php endif;?>
<li><a href="<?php echo site_url('settings'); ?>">Settings</a></li>
<li><a href="<?php echo site_url('information'); ?>">Help</a></li>
<li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>

</ul>

<?php } else { ?>
<p><?php echo $message;?></p>
<form action="<?php echo site_url('auth/login') ?>" method="post" data-ajax="false">
<fieldset><div id="login-status">You are not logged in.</div></fieldset>
<fieldset>
<label for="identity">Email Address</label>
<input id="identity"  type="text" name="identity" value="" /><br />
</fieldset>
<fieldset>
<label for="password">Password</label>
<input id="password"  type="password" name="password" value="" />
</fieldset>

<fieldset>
<input type="submit" value="Login" />
</fieldset>
<p><a href="auth/forgot_password">Forgot your password?</a></p>
</form>
<?php } ?>

</div>
<!--/ SIDEBAR -->
