<ul data-role="listview" data-theme="b">
	<li data-icon="false">
		<div class="text">
		<h1>Logging in</h1>
			<p>The first screen you will be presented with upon executing the application (for the first time at least) will be the login screen. Simply enter the email address and password you have registered with UTS housing. If you have forgotten your details or have not yet been registered, please contact UTS housing staff.</p>
		<h1>Forgot Password</h1>
			<p>Enter the email address and we will send you a email to reset your password.</p>
		<h1>Menu bar</h1>
			<p>Once logged in, the bottom menu will be visible from all places within the application. It is simply used for navigation between 3 parts of the application; maintenance jobs ('List'), information guide(Information) and accounting settings ('Settings').</p>
		<h1>Manage Requests</h1>
			<p>This screen shows a listing of all your submitted maintenance requests (it will appear empty if no maintenance jobs have been submitted). Each listing will respectively display the following information regarding the request:</p>
			<ul>
				<li>Status</li>
				<li>Title</li>
				<li>Category</li>
				<li>Date reported</li>
			</ul>
			<p>On the left of each listing will appear a coloured ribbon, which (depending on the status) will appear as one of the following colours:</p>
			<ul>
				<li>Red: A job marked red indicates that there is more user action required (for example, a job that needs to be confirmed as completed).</li>
				<li>Yellow: A job marked yellow indicates that it is pending action by housing (for example, the request has just been submitted and is awaiting housing's response/repair).</li>
				<li>Green: A job marked green indicates that it is closed as completed.</li>
			</ul>
			<p>Jobs are ordered first by status, and secondly by date reported. All statuses in the red category will appear first, followed by yellow and lastly green.
				You may also search for jobs by selecting the magnifying glass in the top-left corner, or create a new job by selecting the plus sign (+) in the top-right.</p>
			<h1>Submit Request Form</h1>
	<p>New requests can be submitted by filling in the fields of the request form:</p>
	<ul>
		<li> 'Title' should be a brief description of the problem (e.g. "Toilet won't flush").</li> 
		<li> 'Description' is used for a more detailed account of the problem, please include any information that may be of use to housing staff. </li>
		<li> 'Category' is selected from the drop-down, please choose one that is appropriate for the request. All of the above fields are required and you have the option of also uploading a photo to attach to the request</li>
		<li>  Click on <img src="<?php echo base_url("images/Add.PNG") ?>" alt="add" height="27" width="27"> when you have finished filling in the form </li>
	</ul>
		<h1>Editing Request</h1>
			<p>Users can edit their request to provide more information on the submitted issue.</p>
			<p>If you are going to provide more informartion or any latest news for it, you can leave a comment within the request.</p>
			<ul>
				<li> Select the requst which is going to edit on the list. </li>
				<li> Enter your infomation in the textbox under the request details.</li>
				<li> Click on Post Comment to save the message.</li>
			</ul>
			<p>For images upload, close and delete a request or edit the submitted information, folloing the few steps below :</p>
			<ul>
				<li> Select the requst which is going to edit on the list. </li>
				<li> Click on <img src="<?php echo base_url("images/edit.PNG") ?>" alt="add" height="27" width="27"> and start the editing.</li>
				<li> Do not forget to click on <img src="<?php echo base_url("images/ok.PNG") ?>" alt="add" height="27" width="27"> to save the changes.</li>
			</ul>
		<h1>User Settings</h1>
			<p>Settings page is located on bottom right corner, this page will bring user several function to manage their account.</p>
			<ul>
				<li>Contact Deatils : Allow User to change their email address and phone number, note that only australian mobile phone number is allowed.</li>
				<li>Change Password : Apply a new password by providing the current password.</li>
				<li>Log out : Logout the current account and redirect to login page</li>
			</ul>
			<?php if($this->ion_auth->is_admin()): ?>
		<h1>Admin Settings</h1>
			<p><b>** Note that this function is only available to administrator**</b></p>
			</br>
			<p>Admin setting will bring administrator to view current user list in the database, and do management on particular user such as Update user detail and remove the user from database.</p>
			<ul>
				<li>Add User : Click on <img src="<?php echo base_url("images/Add.PNG") ?>" alt="add" height="22" width="22"> button on top right corner, fill out the form and entered data will be insert to database</li>
				<li>Veiw User : Simply click on one of users in the users list, the details will shown on a form.</li>
				<li>Edit User : At the user view, click on the <img src="<?php echo base_url("images/edit.PNG") ?>" alt="edit" height="22" width="22"> located on top right corner, edit anything which needed to update.</li>
				<li>Delete User : At the edit user, there is a button called "Delete User", once the button is clicked, the user which being viewed will be deleted and it can not be <b>UNDO</b>.</li>
			</ul>
			<?php endif;?>
		</div>
	</li>
</ul>
