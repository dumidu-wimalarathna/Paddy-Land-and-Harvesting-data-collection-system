<!DOCTYPE html>

<?php
    $userid=$this->session->userdata('paddy_userbackendsession');
	$UserType=$this->session->userdata('paddy_iUserTypeBackendsession');
    //var_dump($settings);
    //exit();

  
    
    $fProfilePic= load_user_profile_pic($userid);
    if($fProfilePic==''){
        $pic='user.png';
    }else{
        $pic=$fProfilePic;
    }
?>
<html lang="en-us" class="smart-style-0">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> Paddy Land and Harvesting Data Collection System - CMS </title>
		<meta name="description" content="TekGeeks">
		<meta name="author" content="Dumidu Wimalarathna">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/smartadmin-production-plugins.min.css"); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/smartadmin-production.min.css"); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/smartadmin-skins.min.css"); ?>">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/smartadmin-rtl.min.css"); ?>">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assets/css/demo.min.css"); ?>">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon/favicon.png"); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url("assets/img/favicon/favicon.png"); ?>" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="<?php echo base_url("assets/css/extranalcss.css"); ?>">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo base_url("assets/img/splash/sptouch-icon-iphone.png"); ?>">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("assets/img/splash/touch-icon-ipad.png"); ?>">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/img/splash/touch-icon-iphone-retina.png"); ?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/img/splash/touch-icon-ipad-retina.png"); ?>">


                
                <script src="<?php echo base_url("assets/js/voiceRecoder/RecordRTC.js"); ?>"></script>
                <script src="<?php echo base_url("assets/js/voiceRecoder/gif-recorder.js"); ?>"></script>
                <script src="<?php echo base_url("assets/js/voiceRecoder/getScreenId.js"); ?>"></script>

                <!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
                <script src="<?php echo base_url("assets/js/voiceRecoder/gumadapter.js"); ?>"></script>

                <style type="text/css">
					nav ul li a {
					    line-height: normal;
					    font-size: 14px;
					    padding: 10px 10px 10px 11px;
					    color: #000000;
					    display: block;
					    font-weight: 400;
					    text-decoration: none!important;
					    position: relative;
					}

					nav ul ul {
					    margin: 0;
					    display: none;
					    background: rgb(255 203 119);
					    padding: 7px 0;
					}

					.txt-color-blueDark {
					    color: #f7a41c!important;
					    font-weight: 900;
					}

					#ribbon {
					    min-height: 40px;
					    background: #2a2725;
					    padding: 0 13px;
					    position: relative;
					}

					.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
					    padding: 8px;
					    line-height: 1.42857143;
					    vertical-align: middle;
					    /*border-bottom: 1px solid #f7a41c;*/
					}

					table.dataTable tfoot>tr>th, table.dataTable thead>tr>th {
					    padding-left: 9px!important;
					    text-transform: uppercase;
					}

					.sparks-info{
						border: 1.5px solid #f7a41c !important;
					}

					.smart-form footer .btn {
					    float: right;
					    color: #ffffff;
					     height: auto; 
					    margin: 10px 0 0 5px;
					    padding: 4px 43px;
					    font: 300 15px/29px 'Open Sans',Helvetica,Arial,sans-serif;
					    cursor: pointer;
					    border-radius: 5px;
					    background-color: #000000;
					    font-weight: 900;
					    text-transform: uppercase;
					    -webkit-transition: all 500ms ease;
					    -moz-transition: all 500ms ease;
					    -ms-transition: all 500ms ease;
					    -o-transition: all 500ms ease;
					    transition: all 500ms ease;
					}

					.smart-form footer .btn:hover{
						background-color: #f7a41c;
						color: #000000;
					}

					.login-info a {
					    text-decoration: none!important;
					    color: #000000;
					    display: inline-block;
					    margin-top: 6px;
					    font-weight: 900;
					}
					
					#logo-group {
                        width: auto !important;
                        position: absolute;
                    }
                    
                    .heading {
                        font-size: 30px;
                        font-weight: 900;
                        color: #000000;
                        text-transform: uppercase;
                    }
				</style>
                
            </head>
   
        <body class="smart-style-0">
        <!-- HEADER -->
           <header id="header">
			<div id="logo-group">
            <h1 class="heading" style="text-align: left; color: #000000; margin-top: 0px; padding-left: 10px; font-size: 20px;" data-aos="fade-up">
            <img src="https://4meli.com/paddy_harvesting_system/assets/frontend/images/logo.png" alt="" data-aos="fade-up" style="width: 35px;"> Paddy Land and Harvesting Data collection system - cms
          </h1>

				
			</div>

			<!-- #PROJECTS: projects dropdown -->
			
                        
			<!-- end projects dropdown -->

			<!-- #TOGGLE LAYOUT BUTTONS -->
			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
	                <li class="">
	                    <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
	                        <img src="<?php echo base_url("assets/img/profile_pic/$pic"); ?>" style="height: 30px;width: 30px;"alt="<?php echo $this->session->userdata('paddy_vFirstNamebackendsession'); ?>" class="online">  
	                    </a>
	                    <ul class="dropdown-menu pull-right">


	                            <li>
	                              <a href="<?php echo base_url("adminpanel/master/user_profile/view_profile"); ?>" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
	                            </li>
	                            <li class="divider"></li>


	                            <li>
	                              a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
	                            </li>
	                            <li class="divider"></li>
	                            <li>
	                               <a href="<?php echo base_url("adminpanel/login/logout"); ?>" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
	                            </li>
	                    </ul>
	                </li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?php echo base_url("adminpanel/login/logout"); ?>" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->



				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				
				

				

			</div>
                       
			<!-- end pulled right: nav area -->

		</header>
        <!-- END HEADER -->
        
        
        <!-- Left panel : Navigation area -->
        <!-- Note: This width of the aside area can be adjusted through LESS variables -->
        <aside id="left-panel" style="background: #f7a41c;">

              <!-- User info -->
              <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="<?php echo base_url("adminpanel/master/user_profile/view_profile"); ?>" >
                                          
                                            <img src="<?php echo base_url("assets/img/profile_pic/$pic"); ?>" alt="me" class="online" style="width: 26px; height: 26px;"/> 
						<span>
							<?php echo $this->session->userdata('paddy_vFirstNamebackendsession'); ?> 
						</span>
						<!--<i class="fa fa-angle-down"></i>-->
					</a> 
					
				</span>
			</div>
                <!-- end user info -->

              
                <!-- NAVIGATION : This navigation is also responsive-->
                <nav>
                        <!-- 
                        NOTE: Notice the gaps after each icon usage <i></i>..
                        Please note that these links work a bit different than
                        traditional href="" links. See documentation for details.
                        -->
                            
                        <ul>
                            <li class="active"><a href="http://localhost/paddy_harvesting_system/adminpanel/managedashboard" data-id="1"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Dashboard</span></a></li>

                            <li class=""><a href="http://localhost/paddy_harvesting_system/adminpanel/harvest/harvest/view" data-id="1"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Cultivation & Harvesting</span></a></li>

                            <li class=""><a href="http://localhost/paddy_harvesting_system/adminpanel/lands/paddyland/view" data-id="1"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Paddy land</span></a></li>

                            <li class=""><a href="http://localhost/paddy_harvesting_system/adminpanel/owner/owner/view" data-id="1"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Paddy land owners</span></a></li>

                            <li class="">
                            	<a href="#" data-id="4"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Master Data</span><b class="collapse-sign"><em class="fa fa-minus-square-o"></em></b></a>
                            	<ul style="display: none;">
                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/masterdata/province/view"><i class=""></i><span class="menu-item-parent">Province</span></a></li>
                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/masterdata/district/view"><i class=""></i><span class="menu-item-parent">District</span></a></li>
                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/masterdata/city/view"><i class=""></i><span class="menu-item-parent">City</span></a></li>
                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/masterdata/season/view"><i class=""></i><span class="menu-item-parent">Cultivation Season</span></a></li>
                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/masterdata/paddy_type/view"><i class=""></i><span class="menu-item-parent">Paddy Type</span></a></li>
                            	</ul>
                        	</li>
							<?php if($UserType==1){ ?>
                        	<li class="">
                            	<a href="#" data-id="4"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">User management</span><b class="collapse-sign"><em class="fa fa-minus-square-o"></em></b></a>
                            	<ul style="display: none;">
                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/master/user/view_user"><i class=""></i><span class="menu-item-parent">Users</span></a></li>
                            	</ul>
                        	</li>

							<?php } ?>

							<li class="">
                            	<a href="#" data-id="4"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Reports</span><b class="collapse-sign"><em class="fa fa-minus-square-o"></em></b></a>
                            	<ul style="display: none;">
                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/report/harvest_report/view"><i class=""></i><span class="menu-item-parent">Paddy Harvest</span></a></li>

                            		<li><a href="http://localhost/paddy_harvesting_system/adminpanel/report/land_report/view"><i class=""></i><span class="menu-item-parent">Paddy Land</span></a></li>
                            	</ul>
                        	</li>
                           
                                 <?php
                                  //echo $this->dynamic_menu->build_menu($this->session->userdata('paddy_iUserTypeBackendsession')); //,$page_id
                                 ?>
                       
						
        
                        </ul>
                </nav>
                

                <span class="minifyme" data-action="minifyMenu"> 
                        <i class="fa fa-arrow-circle-left hit"></i> 
                </span>

        </aside>
         
        <!-- END NAVIGATION -->
        
               
                <script src="<?php echo base_url("assets/ajax/libs/jquery/3.2.1/jquery.min.js");?>"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo base_url("assets/js/libs/jquery-3.2.1.min.js");?>"><\/script>');
			}
		</script>

		<script src="<?php echo base_url("assets/ajax/libs/jquery/3.2.1/jquery-ui.min.js");?>">"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo base_url("assets/js/libs/jquery-ui.min.js");?>"><\/script>');
			}
		</script>
                

                
                