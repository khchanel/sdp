<?php echo validation_errors(); ?>


<div id="message"><p><?php echo $message;?></p></div>
	
<ul data-role="listview" data-theme="b">
	<?php foreach($query as $row): ?>
	<p>You are current editing <?php echo $row->username;?></p>
	</br></br></br>

	<form action="<?php echo site_url('admin/update_user'); ?>" method="post" data-ajax="false">
		
		
		<label for="emailAddress">Email Address:</label>
			<input id="emailAddress" value="<?php echo $row->email; ?>" data-mini="true" type="text" name="emailAddress" data-theme="b" autocomplete="off"/>
			</br>
		<label for="phoneNumber">Phone Number:</label>	
			<input id="phoneNumber" value="<?php echo $row->phone; ?>" data-mini="true" type="text" name="phoneNumber" data-theme="b" autocomplete="off"/>
			</br>
		<label for="firstName">First Name:</label>
			<input id="firstName" value="<?php echo $row->first_name; ?>" data-mini="true" type="text" name="firstName" data-theme="b" autocomplete="off"/>
			</br>
		<label for="lastName">Last Name:</label>
			<input id="lastName" value="<?php echo $row->last_name; ?>" data-mini="true" type="text" name="lastName" data-theme="b" autocomplete="off"/>
			</br>
		<label for="username">Username:</label>
			<input id="username" value="<?php echo $row->username; ?>" data-mini="true" type="text" name="username" data-theme="b" autocomplete="off"/>
			</br>	
		<label for="room_num">Room Number:</label>
			<input id="room_num" value="<?php echo $row->room_num; ?>" data-mini="true" type="text" name="room_num" data-theme="b" autocomplete="off"/>
			</br>
		<input type="hidden" name="id" value="<?php echo $row->id?>" />
		<input type="submit" value="Update Details" data-mini="true"/>
	</form>
	<?php endforeach; ?>
	
	<form action="<?php echo site_url('admin/del_user/'.$this->uri->segment(3)); ?>" method="post" data-ajax="false">
		<input type="hidden" name="id" value="<?php echo $row->id?>"/>
		<input type="submit" value="Delete User" data-mini="true"/>
	</form>

</ul>