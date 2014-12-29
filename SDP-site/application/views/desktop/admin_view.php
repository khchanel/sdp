<div class="request" style="font-weight:bold; background:transparent; padding:0">
  <a style="margin-right:15px;"  class="linkbutton" href="<?php echo site_url('admin/add_user'); ?>">+&nbsp; New user</a>
  <p />
</div><!--/request-->
<div id="request-list" class="user-list">
<ul>
<?php foreach($user_list as $row): ?>
	<li>
		<a href="<?php echo site_url('admin/view_user/'.$row->id)?>">
				<strong><?php echo "ID: "?></strong>
				<?php echo $row->id; ?><br />
				<strong><?php echo "User Name: " ?></strong>
				<?php echo $row->username; ?><br />
				<strong><?php echo "Email: " ?>	</strong>			
				<?php echo $row->email; ?><br /> 
		</a>
	</li>
<?php endforeach; ?>

</ul>
</div>
