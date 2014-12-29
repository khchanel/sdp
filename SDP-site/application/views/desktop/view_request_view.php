<div class="request" style="font-weight:bold; background:transparent; padding:0"> <a style="margin-right:15px;"  class="linkbutton" href="<?php echo site_url('form/edit_request/'.$this->uri->segment(3)); ?>">Edit Request</a>
	<p />
</div>
<!--/request-->
<div class="request">
	<?php foreach($query as $row): ?>
	<?php 
		$date = new DateTime($row->DateReported);
		$date = $date->format('d-m-Y');
	?>
	<h2><?php echo $row->Title; ?></h2>
	<dl>
		<dt>Username</dt>
		<dd><?php echo $row->username; ?></dd>
		<dt>Status</dt>
		<dd><?php echo $row->StatusName; ?></dd>
		<dt>Description</dt>
		<dd><?php echo $row->Description; ?></dd>
		<dt>Category</dt>
		<dd><?php echo $row->CategoryName; ?></dd>
		<dt>Date Reported</dt>
		<dd><?php echo $date;?></dd>
		<dt>Room Number</dt>
		<dd><?php echo $row->room_num; ?></dd>
		<?php if(strcmp('', $row->ImageName) !== 0) : ?>
		<dt>Image</dt>
		<dd><img class="report" src="<?php echo base_url()?>uploads/<?php echo $row->ImageName;?>" alt="report image" width="500"></dd>
		<?php endif ?>
	</dl>
	<?php endforeach; ?>
</div>
<div class="request">
	<?php foreach($comments->result() as $comment): ?>
	<?php
		$date = new DateTime($comment->DateSubmitted);
		$date = $date->format('d-m-Y h:i:s A');
	?>
	<p class="info"> <?php echo $comment->Body; ?><br />
		Posted by <?php echo $comment->Author; ?><br />
		<?php echo $date; ?> </p>
	<?php endforeach; ?>
	<form action="<?php echo site_url('form/submit_comment'); ?>" method="post">
		<fieldset>
			<textarea name="Body" id="comment" value="<?php echo set_value('comment'); ?>"></textarea>
		</fieldset>
		<fieldset>
			<input type="submit" value="Post Comment"/>
		</fieldset>
		<input type="hidden" name="Author" value="<?php echo $user->username; ?>"  />
		<input type="hidden" name="JobID" value="<?php echo $this->uri->segment(3); ?>"  />
		<p />
	</form>
</div>
