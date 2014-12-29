<?php echo validation_errors(); ?>
	<p><?php echo $message;?></p>
<form action="<?php echo site_url('admin/register'); ?>" method="post" data-ajax="false">

<label for="username">Username</label>
<input type="text" name="username" value="<?php echo set_value('username'); ?>"  data-mini="true" data-theme="b"/>

<label for="email">Email Address</label>
<input type="text" name="email" value="<?php echo set_value('email'); ?>"  data-mini="true" data-theme="b"/>

<label for="password">Password</label>
<input type="password" name="password" value=""  data-mini="true" data-theme="b"/>

<label for="passconf">Password Confirm</label>
<input type="password" name="passconf" value="" data-mini="true" data-theme="b"/>

<label for="first_name">First Name</label>
<input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" data-mini="true" data-theme="b"/>

<label for="last_name">Last Name</label>
<input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" data-mini="true" data-theme="b"/>

<label for="room_num">Room Number</label>
<input id="room_num" type="text" name="room_num" value="<?php echo set_value('room_num'); ?>" data-mini="true" data-theme="b"/>

<label for="phone">Phone Number</label>
<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" data-mini="true" data-theme="b"/>

<br />
<input type="submit" value="Add User" />

</form>
