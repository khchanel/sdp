<ul data-role="listview" data-theme="b">
	<?php foreach($query as $row): ?>
	<li data-icon="false" class="row">
		<p class="info"><b>ID</b><br />
			<?php echo $row->id; ?></p>
		<br />	
		<p class="info"><b>First name</b><br />
			<?php echo $row->first_name; ?></p>
		<br />
		<p class="info"><b>Last name</b><br />
			<?php echo $row->last_name; ?></p>
		<br />
		<p class="info"><b>Email</b><br />
			<?php echo $row->email; ?></p>
		<br />
		<p class="info"><b>Phone number</b><br />
			<?php echo $row->phone; ?></p>
		<br />
		<p class="info"><b>Room number</b><br />
			<?php echo $row->room_num; ?></p>
		<br />
	</li>
	<?php endforeach; ?>
	
</ul>