<div class="request">
<div id="infoMessage"><?php echo $message;?></div>

<form action="<?php echo site_url('auth/reset_password/' . $code); ?>" method="post" data-ajax="false">
      
	<p>
		New Password (at least <?php echo $min_password_length;?> characters long): <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		Confirm New Password: <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><input type="submit" value="Change Password" data-mini="true"/></p>
      
<?php echo form_close();?>
</div>