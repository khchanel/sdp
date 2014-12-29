<?php echo "Logged in as: ".$user->username; ?>
<ul data-role="listview" data-split-icon="delete" data-theme="a">
	<?php foreach($job_list as $row): ?>
	<?php
		$date = new DateTime($row->DateReported);
		$date = $date->format('d-m-Y');
	?>
	<li data-icon="false"> <a href="<?php echo site_url('form/view_request/'.$row->JobId)?>" 
				data-ajax="false"> <!-- disable the link for the moment-->
		<div class="status nowrap" id="<?php echo $row->Urgency; ?>"></div>
		<h5 class="info nowrap">Status: <?php echo $row->StatusName; ?></h5>
		<p><span class="info nowrap"><b><?php echo $row->Title; ?></b></span><br />
			<span class="info nowrap small"><?php echo $row->CategoryName; ?><br /></span>
			<span class="info nowrap small"><?php echo "Date Reported: ".$date;?><br /></span></p>
		</p>
		</a><a href="<?php echo site_url('form/delete_request/'.$row->JobId); ?>" data-theme="c" data-ajax="false">Delete</a> </li>
	<?php endforeach; ?>
</ul>
