<div class="request">
<p>Please enter your email address so we can send you an email to reset your password.</p>

<div id="infoMessage"><?php echo $message;?></div>

<form action="<?php echo site_url('auth/forgot_password'); ?>" method="post" data-ajax="false">

      <p>
      	Email Address: <br />
      	<?php echo form_input($email);?>
      </p>
      
      <p><input type="submit" value="Submit" data-mini="true"/></p>
      
<?php echo form_close();?>
</div>