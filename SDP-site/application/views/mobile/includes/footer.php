</div>

<!--Content End-->

<!--Footer Start-->
<?php if($this->uri->rsegment(1) != 'auth') { ?>
<div class="footer" data-role="footer" data-position="fixed" data-theme="b" data-tap-toggle="false" data-disable-page-zoom="false">
	
    <!--Navigation Bar Start-->
	<div data-role="navbar" class="footer-nav">
		<ul>
			<li><a href="<?php echo site_url('manage'); ?>" 
			<?php if($this->uri->segment(1) == "manage"): ?> class="ui-btn-active ui-state-persist" <?php endif; ?>
			data-icon="custom-list" data-ajax="false">List</a></li>
			<li><a href="<?php echo site_url('information'); ?>"
			<?php if($this->uri->segment(1) == "information"): ?> class="ui-btn-active ui-state-persist" <?php endif; ?>
			data-icon="custom-info" data-ajax="false">Information</a></li>
			<li><a href="<?php echo site_url('settings'); ?>"
			<?php if($this->uri->segment(1) == "settings"): ?> class="ui-btn-active ui-state-persist" <?php endif; ?>
			data-icon="custom-settings" data-ajax="false">Settings</a></li>
		</ul>
	</div>
	<!--Navigation Bar End-->
</div>
<?php } else { ?>

<div class="footer" data-role="footer" data-position="fixed" data-theme="a" data-tap-toggle="false" data-disable-page-zoom="false">
<br /><br /><br />
</div>

<?php } ?>
<!--Footer End-->

</body>
</html>