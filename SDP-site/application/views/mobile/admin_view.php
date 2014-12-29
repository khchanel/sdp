<div id="infoMessage"><?php echo $message;?></div>
<ul data-role="listview" data-theme="a">
<?php foreach($user_list as $row): ?>
	<li data-icon="false" class="user-row"> <a href="<?php echo site_url('admin/view_user/'.$row->id)?>" 
				data-ajax="false">
				<h5 class="info"><?php echo $row->username; ?></h5>
		</a>
	</li>
<?php endforeach; ?>

</ul>
