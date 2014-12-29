<div class="request" style="font-weight:bold; background:transparent; padding:0">
  <a style="margin-right:15px;"  class="linkbutton" href="<?php echo site_url('admin/edit_user/'.$this->uri->segment(3)); ?>">Edit User</a>
  <p />
</div><!--/request-->
<div class="request">
	<?php foreach($query as $row): ?>
	<p><b>ID</b> <?php echo $row->id; ?></p>
	<p><b>First name</b> <?php echo $row->first_name; ?></p>
	<p><b>Last name</b> <?php echo $row->last_name; ?></p>
	<p><b>Email</b> <?php echo $row->email; ?></p>
	<p><b>Phone number</b> <?php echo $row->phone; ?></p>
	<p><b>Room number</b> <?php echo $row->room_num; ?></p>
	<?php endforeach; ?>
</div>
