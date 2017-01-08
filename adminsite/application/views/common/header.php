<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!-- Title-->
<title>Jingga Residence |  Admin</title>
<!-- Favicons -->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/ico/favicon.png">
<!-- CSS Stylesheet-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-themes.css" />
<!-- DATATABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/css/jquery.dataTables.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/datatables.responsive.css" media="screen" />
<!-- MAIN STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css" />

<style>
/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(<?php echo base_url()?>assets/img/Preloader_3.gif) center no-repeat #fff;
}
</style>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</head>
<body>
<div id="wrapper">
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     HEADER  CONTENT     ///////////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="header">
		
				<div class="logo-area clearfix">
						<a href="#" class="logo"></a>
				</div>
				<!-- //logo-area-->
				
				<div class="tools-bar">
						<ul class="nav navbar-nav navbar-right tooltip-area">
								<li><a href="#" class="nav-collapse avatar-header">
												<img alt="" src="assets/img/avatar.png"  class="circle">
												<span class="badge">3</span>
										</a>
								</li>
								<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
											<em><strong>Hi</strong>, Nutprawee </em> <i class="dropdown-icon fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right icon-right arrow">
												<li><a href="<?php echo base_url()?>profile"><i class="fa fa-user"></i> Profile</a></li>
												<li class="divider"></li>
												<li><a href="<?php echo base_url()?>auth/logout"><i class="fa fa-sign-out"></i> Signout </a></li>
										</ul>
										<!-- //dropdown-menu-->
								</li>
						</ul>
				</div>
				<!-- //tools-bar-->
				
		</div>
		<!-- //header-->	
		<!--
		//////////////////////////////////////////////////////////////
		//////////     LEFT NAV MENU     //////////
		///////////////////////////////////////////////////////////
		-->
		<nav id="menu">
				<ul>
					<li><a href="<?php echo base_url()?>"><i class="icon  fa fa-book"></i>Booking</a></li>
					<li><a href="<?php echo base_url()?>news"><i class="icon  fa fa-clipboard"></i> News</a></li>
					<li><a href="<?php echo base_url()?>siteplan"><i class="icon  fa fa-map-marker"></i> Siteplan</a></li>					
					<li><a href="<?php echo base_url()?>user"><i class="icon  fa fa-gears"></i>User management</a></li>
				</ul>
		</nav>
		<!-- //nav left menu-->	
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     MAIN SHOW CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->		