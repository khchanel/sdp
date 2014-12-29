<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title?></title>

<!--Script and Stylesheets Links-->
<meta name = "viewport" content = "user-scalable=no, width=device-width">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<link rel="stylesheet" href="<?php echo base_url("css/themes/MyTheme.css"); ?>"/>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" /> 
<link href="<?php echo base_url("css/style.css"); ?>" type="text/css" rel="stylesheet" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/ie.css"); ?>" />
<![endif]-->
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/cordova-2.0.0.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/functions.js"></script>
<!--Phonegap image upload script-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/camera-new.js"></script>
</head>

<?php flush(); ?>
<body onload="init();">

<!--Header Start-->

<div class="header" data-role="header" data-position="fixed" data-theme="a" data-tap-toggle="false" data-disable-page-zoom="false">
	<?php $this->load->view("includes/header_bars/".$headerBar); ?>
</div>
<!--Header End-->

<!--Content Start-->
<div class="content" data-role="content" data-theme="a">
	
