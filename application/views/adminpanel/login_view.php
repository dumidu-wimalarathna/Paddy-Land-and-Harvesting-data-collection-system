<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title> Paddy Land and Harvesting Data Collection System - CMS </title>
		<meta name="description" content="TekGeeks">
		<meta name="author" content="Dumidu Dandeiya">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/smartadmin-production.min.css"); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/smartadmin-skins.min.css"); ?>">

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/smartadmin-rtl.min.css"); ?>"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon/favicon.png"); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url("assets/img/favicon/favicon.png"); ?>" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="<?php echo base_url("assets/css/extranalcss.css"); ?>">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
                
                <script src="https://www.google.com/recaptcha/api.js?render=6Le0s6IZAAAAAOtzFjIX7hhyhS9iFiWuAXC6mglx"></script>
                
                		<style>
                    #extr-page #main {
                        padding-top: 0px;
                    }
                    
                    #main {
                        margin-left: 220px;
                        padding: 0;
                        padding-bottom: 0px;
                        min-height: 500px;
                        position: relative;
                    }
                    
                    #content {
                        padding-top: 0px !important;
                        padding: 10px 14px;
                        position: relative;
                        height: 100vh;
                    }
                    
                    .login_form_div{
                        position: relative;
                        height: 100vh;
                        background-color: #f7a41c;
                    }
                    
                    .well {
                        margin-top: 40% !important;
                        background-color: #fbfbfb;
                        border: transparent;
                        box-shadow: none;
                        -webkit-box-shadow: none;
                        -moz-box-shadow: none;
                        position: relative;
                    }
                    
                    .client-form header {
                        padding: 15px 13px;
                        margin: 0;
                        border-bottom-style: solid;
                        border-bottom-color: transparent;
                        background: #f7a41c;
                    }
                    
                    .smart-form fieldset {
                        display: block;
                        padding: 25px 14px 5px;
                        border: none;
                        background: #f7a41c;
                        position: relative;
                    }
                    
                    .smart-form footer {
                        display: block;
                        padding: 7px 14px 15px;
                        border-top: transparent;
                        background: #f7a41c !important;
                    }
                    
                    .smart-form .input input, .smart-form .select select, .smart-form .textarea textarea {
                        display: block;
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        width: 100%;
                        height: 45px;
                        line-height: 32px;
                        padding: 5px 10px;
                        outline: 0;
                        border-width: 1px;
                        border-style: solid;
                        border-color: #999999;
                        border-radius: 5px;
                        background: #fff;
                        font: 13px/16px 'Open Sans',Helvetica,Arial,sans-serif;
                        color: #000000;
                        appearance: normal;
                        -moz-appearance: none;
                        -webkit-appearance: none;
                    }
                    
                    .smart-form .icon-append, .smart-form .icon-prepend {
                        position: absolute;
                        top: 12px;
                        width: 22px;
                        height: 22px;
                        font-size: 14px;
                        line-height: 22px;
                        text-align: center;
                    }
                    
                    .smart-form .label {
                        display: block;
                        margin-bottom: 6px;
                        line-height: 19px;
                        font-weight: 900;
                        font-size: 13px;
                        color: #ffffff;
                        text-align: left;
                        white-space: normal;
                    }
                    
                    .btn-primary {
                        color: #fff;
                        background-color: #000000;
                        border-color: #00000;
                        font-weight: 900 !important;
                        padding: 10px !important;
                        height: auto !important;
                        border-radius: 5px;
                        webkit-transition: all 500ms ease;
                        -moz-transition: all 500ms ease;
                        -ms-transition: all 500ms ease;
                        -o-transition: all 500ms ease;
                        transition: all 500ms ease;
                    }
                    
                    .btn-primary:hover{
                        color: #fff;
                        background-color: #f7a41c;
                        border-color: #ffffff;
                    }
                    
                    </style>

	</head>
	
	<body class="animated fadeInDown" style="overflow-x: hidden;">

		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">
                           
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm" style="padding-top: 6%;">
						<!--<h1 class="txt-color-red login-header-big">WELCOME</h1>-->
									<div class="hero" style="background-image: none;">

							<div class="pull-left login-desc-box-l" style="width: 75%;">
								<img src="<?php echo base_url() ?>/assets/img/logo.png" alt="" class="img-responsive center-block">

							<p style="font-size: 16px;">
								Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is <br>
cultivated as a wetland crop in all the districts in two cultivation seasons.
							</p>
							<hr>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<img src="<?php echo base_url() ?>/assets/img/agri_logo.jpg" alt="" class="img-responsive">
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<img src="<?php echo base_url() ?>/assets/img/agra_logo.jpg" alt="" class="img-responsive">
								</div>
							</div>
							<hr>
  
                            <div class="clearfix"></div>
							</div>

                                                 
						</div>


					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 login_form_div">


						<div class="col-xs-12 visible-sm visible-xs" style="position: relative; z-index: 999;">
							<img src="<?php echo base_url() ?>/assets/img/logo.png" alt="" class="img-responsive center-block">

							<p style="font-size: 16px;">
								Rice is the staple food of the inhabitants of Sri Lanka. Paddy crops is <br>
cultivated as a wetland crop in all the districts in two cultivation seasons.
							</p>
						</div>

						<div class="well no-padding">
							<form action="<?php echo base_url("adminpanel/login/login_validation"); ?>" method="post" id="login-form" class="smart-form client-form">
								<header style="background-color: trnsparent; border:none; padding-bottom: 0px;">
									<b style="color: #000000; font-size: 30px; font-weight: 900;">SIGN IN</b>
								</header>

								<fieldset>
									
									<section>
										<label class="label">User Name</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="vUserName">
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter User Name</b></label>
									</section>

									<section>
										<label class="label">Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="pPassword">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter Password</b> </label>
										<div class="note">
											<!--<a href="forgotpassword.html">Forgot password?</a>-->
										</div>
									</section>

<!--									<section>
										<label class="checkbox">
											<input type="checkbox" name="remember" checked="">
											<i></i>Stay signed in</label>
									</section>-->
                                                                    
                                                                    <?php
                                                                    echo validation_errors('<div style="height:25px; padding:0px;" class="alert alert-danger" role="alert">', '</div>');
                                                                    ?>
                                                                    <?php if ($error != '') { ?>
                                                                        <div style="height:25px; padding:0px;" class="alert alert-danger" role="alert">
                                                                            <?php echo $error; ?>
                                                                        </div>
                                                                    <?php } ?> 
								</fieldset>
								<footer>
									<button type="submit" onclick="gcaptcha();" class="btn btn-primary" style="width: 100%;">
										Sign in
									</button>
								</footer>
							</form>

						</div>
						
						
						
					</div>
                                    
                                 
				</div>
			</div>

		</div>

		<!--================================================== -->	

<script>
    function gcaptcha(){
        event.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6Le0s6IZAAAAAOtzFjIX7hhyhS9iFiWuAXC6mglx', {action: 'admin_login'}).then(function(token) {
                $.post("<?php echo base_url('adminpanel/login/g_captcha_validation'); ?>",{token: token}, function(result) {
                    if(result.success) {
                        //alert('fsdfds')
                        //onclick="gcaptcha();"
                        document.getElementById("login-form").submit();
                    } else {
                            alert('You are spammer !')
                    }
                });
            });;
        });
    }
</script>
  
               
	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="<?php echo base_url("assets/js/extranaljavascript1.js"); ?>"></script>
		<script> if (!window.jQuery) { document.write('<script src="<?php echo base_url("assets/js/libs/jquery-3.2.1.min.js"); ?>"><\/script>');} </script>

	    <!--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui.min.js"><\/script>');} </script>-->

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url("assets/js/app.config.js"); ?>"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="<?php echo base_url("assets/js/bootstrap/bootstrap.min.js"); ?>"></script>
		
		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url("assets/js/app.min.js"); ?>"></script>
		
        <script>
			runAllForms();

			$(function() {
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						vUserName : {
							required : true
						},
						pPassword : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						vUserName : {
							required : 'Please enter User Name'
						},
						pPassword : {
							required : 'Please enter Password'
						}
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});
		</script>

	</body>
</html>