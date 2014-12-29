
<div class="request" style="font-weight:bold; background:transparent; padding:0; white-space: nowrap;"> 
	<a style="margin-right:15px;"  class="linkbutton" href="<?php echo site_url('form'); ?>">+&nbsp; New Maintanance Request</a> Sort by 
	<a style="margin-left:4px;" class="linkbutton firstbutton" onclick="sortRequests(this)" id="CategoryName">Category
	</a><a class="linkbutton middlebutton" onclick="sortRequests(this)" id="StatusName">Status
	</a><a class="linkbutton lastbutton" onclick="sortRequests(this)" id="DateReported">Date</a> 
	<?php if($this->ion_auth->is_admin()): ?> <a style="margin-left:15px;"  class="linkbutton" onClick="showSearchBar()">Advanced Search</a> <?php endif; ?>

	<p />
</div>
<!--/request-->
<?php if($this->ion_auth->is_admin()): ?>
<form id="advancedSearch" method="post" <?php if($this->uri->segment(1) == 'search'){ echo "style='display:block;'";} else { echo "style='display:none;'"; } ?> action="<?php echo site_url('search');?>">
	<div class="request" style="white-space:nowrap;">
	<?php echo validation_errors(); ?>
		<fieldset class="inline">
			<label for="username">Username:</label>
			<input id="username"  type="text" name="username" value="<?php echo set_value('username'); ?>" >
		</fieldset>
		<fieldset class="inline">
			<label for="roomNum">Room Number:</label>
			<input id="roomNum"  type="text" name="roomNum" value="<?php echo set_value('roomNum'); ?>" >
		</fieldset>
		<br/>
		<fieldset class="inline">
			<label for="startDate">Start Date:</label>
			<input id="startDate" placeholder="DD-MM-YYYY" type="text" name="startDate" value="<?php echo set_value('endDate'); ?>" >
		</fieldset>
		<fieldset class="inline">
			<label for="endDate">End Date:</label>
			<input id="endDate" placeholder="DD-MM-YYYY" type="text" name="endDate" value="<?php echo set_value('startDate'); ?>" >
		</fieldset>
		<br/>
		<fieldset class="inline">
			<label for="searchClosed">Search Closed:</label>
			<input id="searchClosed" type="checkbox" name="searchClosed" value="<?php echo set_value('searchClosed'); ?>" >
		</fieldset>
		<br/>
		<fieldset>
			<input type="hidden" id="SortField" name="SortField" value=""/>
			<input type="submit" value="Search"/>
		</fieldset>
	</div>
</form>
<?php endif; ?>
<div id="request-list">
	<ul>
		<?php foreach($job_list as $row): ?>
		<?php
		$date = new DateTime($row->DateReported);
		$date = $date->format('d-m-Y');
	?>
		<li class="<?php echo $row->Urgency; ?>">
			<a class="delete" href="<?php echo base_url('form/delete_request/'.$row->JobId); ?>">Delete</a>
			<a href="<?php echo site_url('form/view_request/'.$row->JobId)?>"><h2> <?php echo $row->Title; ?></h2>
			<?php echo $row->StatusName; ?><br />
			<strong>Category</strong> <?php echo $row->CategoryName; ?> <strong style="margin-left:20px">Date Reported</strong> <?php echo "".$date;?>
			<p /></a>
			
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<!--/request-list--> 
