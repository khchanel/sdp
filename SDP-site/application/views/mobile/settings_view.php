<?php echo "Logged in as: ".$user->username; ?>
<?php if($this->ion_auth->is_admin()): ?>
<a href="<?php echo site_url('admin')?>" data-ajax="false">
<input type="button" id="adminButton" value="Admin Settings" />
</a>
<?php endif;?>
<a href="<?php echo site_url('settings/contactDetails')?>" data-ajax="false">
<input type="button" id="accountSettingsButton" value="Contact Details" />
</a> <a href="<?php echo site_url('settings/changePassword')?>" data-ajax="false">
<input type="button" id="changePasswordButton" value="Change Password" />
</a> <a href="<?php echo site_url('auth/logout')?>" data-ajax="false">
<input type="button" id="logOutButton" value="Log out" />
</a> 