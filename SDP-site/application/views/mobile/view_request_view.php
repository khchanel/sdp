<ul data-role="listview" data-theme="b">
	<?php foreach($query as $row): ?>
	<?php 
		$date = new DateTime($row->DateReported);
		$date = $date->format('d-m-Y');

		
	?>
	<li data-icon="false" class="row">
		<p class="info"><b>Username</b><br />
			<?php echo $row->username; ?></p>
		<br />
		<p class="info"><b>Room Number</b><br />
			<?php echo $row->room_num; ?></p>
		<br />
		<p class="info"><b>Status</b><br />
			<?php echo $row->StatusName; ?></p>
		<br />
		<p class="info"><b>Title</b><br />
			<?php echo $row->Title; ?></p>
		<br />
		<p class="info"><b>Description</b><br />
			<?php echo $row->Description; ?></p>
		<br />
		<p class="info"><b>Category</b><br />
			<?php echo $row->CategoryName; ?></p>
		<br />
		<p class="info"><b>Date Reported</b><br />
			<?php echo $date;?></p>
		<br />
		<?php if(strcmp('', $row->ImageName) !== 0) : ?>
		<p class="info"><b>Image</b><br />
			<img class="report" src="<?php echo base_url()?>uploads/<?php echo $row->ImageName;?>" alt="report image"></p>
		<?php endif; ?>	
	</li>
	<?php endforeach; ?>
</ul>

<?php if(!empty($comments)): ?>
<ul data-role="listview" data-theme="b" class="comment">
	<?php foreach($comments->result() as $comment): ?>
	<?php
		$date = new DateTime($comment->DateSubmitted);
		$date = $date->format('d-m-Y h:i:s A');
	?>
	<li class="row comment">
		
		<p class="info">
		<?php echo $comment->Body; ?><br />Posted by <?php echo $comment->Author; ?><br />
		<?php echo $date; ?>
		</p>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="<?php echo site_url('form/submit_comment'); ?>" method="post" data-ajax="false">
	<textarea name="Body" id="comment" value="<?php echo set_value('comment'); ?>"  data-mini="true" data-theme="b"></textarea>
	<input type="submit" value="Post Comment" data-mini="true" data-theme="a"/>
	<input type="hidden" name="Author" value="<?php echo $user->username; ?>"  />
	<input type="hidden" name="JobID" value="<?php echo $this->uri->segment(3); ?>"  />
</form>