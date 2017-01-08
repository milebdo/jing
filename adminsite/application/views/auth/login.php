<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!-- Title-->
<title>Jingga Residence | Admin</title>
<!-- Favicons -->
<link rel="shortcut icon"
	href="<?php echo base_url()?>assets/ico/favicon.png">
<!-- CSS Stylesheet-->
<link type="text/css" rel="stylesheet"
	href="<?php echo base_url()?>assets/css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet"
	href="<?php echo base_url()?>assets/css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet"
	href="<?php echo base_url()?>assets/css/style.css" />

</head>
<body class="full-lg">
	<div id="wrapper">

		<div id="loading-top">
			<div id="canvas_loading"></div>
			<span>Checking...</span>
		</div>

		<div id="main">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<div class="account-wall">
							<section class="align-lg-center">
								<div class="site-logo"></div>
							</section>
							<form class="form-signin" id="form-signin">
								<section>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" name="identity"
											placeholder="Username">
									</div>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="password" class="form-control" name="password"
											placeholder="Password">
									</div>
									<button class="btn btn-lg btn-theme-inverse btn-block" type="submit" id="sign-in">Sign in</button>
								</section>
								<section class="clearfix">
									<div class="iCheck pull-left" data-color="red">
										<input name="remember" type="checkbox" value="1"> <label>Remember</label>
									</div>
									<a href="<?php echo base_url()?>auth/forgot_password"
										class="pull-right help">Forget Password? </a>
								</section>
							</form>
						</div>
						<!-- //account-wall-->

					</div>
					<!-- //col-sm-6 col-md-4 col-md-offset-4-->
				</div>
				<!-- //row-->
			</div>
			<!-- //container-->

		</div>
		<!-- //main-->


	</div>
	<!-- //wrapper-->


	<!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->

	<!-- Jquery Library -->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/js/jquery.ui.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- Modernizr Library For HTML5 And CSS3 -->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/js/modernizr/modernizr.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/plugins/mmenu/jquery.mmenu.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/js/styleswitch.js"></script>
	<!-- Library 10+ Form plugins-->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/plugins/form/form.js"></script>
	<!-- Datetime plugins -->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/plugins/datetime/datetime.js"></script>
	<!-- Library Chart-->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/plugins/chart/chart.js"></script>
	<!-- Library  5+ plugins for bootstrap -->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/plugins/pluginsForBS/pluginsForBS.js"></script>
	<!-- Library 10+ miscellaneous plugins -->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/plugins/miscellaneous/miscellaneous.js"></script>
	<!-- Library Themes Customize-->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/js/jquery.form.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/js/caplet.custom.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
			$(function() {
				//Login animation to center 
				var l = window.location;
				var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/" + l.pathname.split('/')[2] + "/";
// 				alert(base_url);
				function toCenter() {
					var mainH=$("#main").outerHeight();
					var accountH=$(".account-wall").outerHeight();
					var marginT=(mainH-accountH)/2;
					
					if(marginT>30){
						$(".account-wall").css("margin-top",marginT-15);
					} else {
						$(".account-wall").css("margin-top",30);
					}
				}
				
				toCenter();
				var toResize;
				$(window).resize(function(e){
					clearTimeout(toResize);
					toResize = setTimeout(toCenter(), 500);
				});
					
				//Canvas Loading
				var throbber = new Throbber({  size: 32, padding: 17,  strokewidth: 2.8,  lines: 12, rotationspeed: 0, fps: 15 });
				throbber.appendTo(document.getElementById('canvas_loading'));
				throbber.start();
				
				$("#form-signin").submit(function(event){
					event.preventDefault();

					var main = $("#main");
					var form = $(this);

					main.animate({ scrollTop : 0 }, 500);
					main.addClass("slideDown");		

					$.ajax({
						url 		: base_url + 'login',
						data 		: form.serialize(),
						type 		: "POST",
						dataType 	: 'json',
						success 	: function (response) {

							setTimeout(function () { main.removeClass("slideDown") }, response.success ? 2000 : 500);

							if ( ! response.success && response.message) {
								$.notific8(response.message, { life : 5000, horizontalEdge : "bottom", theme : "danger", heading : " ERROR"});
								return false;
							};
							setTimeout(function () { $("#loading-top span").text("Yes, account is valid...") }, 500);
							setTimeout(function () { $("#loading-top span").text("Redirect to account page...")  }, 1500);
							setTimeout("window.location.href='" + base_url + "'", 2000);
						},
						error 		: function (response) {			
							console.log(response);
							setTimeout(function () { main.removeClass("slideDown") }, 500);
						}
					});
				});
			});
		</script>
</body>
</html>