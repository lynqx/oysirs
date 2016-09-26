<?php ob_start(); ?>
<?php session_start(); ?>
<?php include 'C:\xampp\htdocs\oysirs\includes\config.php'; ?>
<?php include 'C:\xampp\htdocs\oysirs\fxn\fxn.php'; ?>
<?php include 'C:\xampp\htdocs\oysirs\includes\expire.php'; ?>
<?php //$base_url = 'http://localhost/oysirshr/'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	
<title>
		<?php	
																
						// Check for a $page_title value:
						 $pagetitle = 'MARKET INFO PORTAL';
						if (!isset($page_title)) {
						 echo $pagetitle;
						 
						} else {
							echo $page_title .' || ' . $pagetitle;
						}
							 ?>
							 
	   </title>
	   
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASECSS; ?>cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo BASECSS; ?>themes/night.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?php echo BASECSS; ?>responsive.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo BASECSS; ?>market.css" >
	
	<link href="<?php echo BASEFONTAWESOME; ?>css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASEJS; ?>bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- TYPEAHEAD -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASEJS; ?>typeahead/typeahead.css" />
	<!-- FILE UPLOAD -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASEJS; ?>bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASEJS; ?>select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASEJS; ?>uniform/css/uniform.default.min.css" />
	<!-- JQUERY UPLOAD -->
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="<?php echo BASEJS; ?>blueimp/gallery/blueimp-gallery.min.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="<?php echo BASEJS; ?>jquery-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="<?php echo BASEJS; ?>jquery-upload/css/jquery.fileupload-ui.css">

	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		

</head>
<body>
	<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="index.html">
						<img src="<?php echo BASEIMG; ?>/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
					</a>
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" 
							data-icon1="fa fa-bars" 
							data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
				</div>
				<!-- NAVBAR LEFT -->
				<ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
					<li class="dropdown">
						<a href="#" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="Get updates, news and announcement">
							<i class="fa fa-users"></i>
							<span class="name">Notice Board</span>
							<i class="fa fa-angle-down"></i>
						</a>
					</li>
				</ul>
				<!-- /NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->	
					<li class="dropdown" id="header-notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge">7</span>						
						</a>
						<ul class="dropdown-menu notification">
							<li class="dropdown-title">
								<span><i class="fa fa-bell"></i> 7 Notifications</span>
							</li>
							<li>
								<a href="#">
									<span class="label label-success"><i class="fa fa-user"></i></span>
									<span class="body">
										<span class="message">5 users online. </span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>Just now</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-primary"><i class="fa fa-comment"></i></span>
									<span class="body">
										<span class="message">Martin commented.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>19 mins</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-warning"><i class="fa fa-lock"></i></span>
									<span class="body">
										<span class="message">DW1 server locked.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>32 mins</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-info"><i class="fa fa-twitter"></i></span>
									<span class="body">
										<span class="message">Twitter connected.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>55 mins</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-danger"><i class="fa fa-heart"></i></span>
									<span class="body">
										<span class="message">Jane liked. </span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>2 hrs</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span>
									<span class="body">
										<span class="message">Database overload.</span>
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>6 hrs</span>
										</span>
									</span>
								</a>
							</li>
							<li class="footer">
								<a href="#">See all notifications <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN -->
					<li class="dropdown" id="header-message">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge">3</span>
						</a>
						<ul class="dropdown-menu inbox">
							<li class="dropdown-title">
								<span><i class="fa fa-envelope-o"></i> 3 Messages</span>
								<span class="compose pull-right tip-right" title="Compose message"><i class="fa fa-pencil-square-o"></i></span>
							</li>
							<li>
								<a href="#">
									<img src="img/avatars/avatar2.jpg" alt="" />
									<span class="body">
										<span class="from">Jane Doe</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>Just Now</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/avatars/avatar1.jpg" alt="" />
									<span class="body">
										<span class="from">Vince Pelt</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>15 min ago</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/avatars/avatar8.jpg" alt="" />
									<span class="body">
										<span class="from">Debby Doe</span>
										<span class="message">
										Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mole ...
										</span> 
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<span>2 hours ago</span>
										</span>
									</span>
									 
								</a>
							</li>
							<li class="footer">
								<a href="#">See all messages <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
					<li class="dropdown" id="header-tasks">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="badge">3</span>
						</a>
						<ul class="dropdown-menu tasks">
							<li class="dropdown-title">
								<span><i class="fa fa-check"></i> 6 tasks in progress</span>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">60%</span>
									</span>
									<div class="progress">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										<span class="sr-only">60% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">25%</span>
									</span>
									<div class="progress">
									  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
										<span class="sr-only">25% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">40%</span>
									</span>
									<div class="progress progress-striped">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
										<span class="sr-only">40% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">70%</span>
									</span>
									<div class="progress progress-striped active">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
										<span class="sr-only">70% Complete</span>
									  </div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="header clearfix">
										<span class="pull-left">Software Update</span>
										<span class="pull-right">65%</span>
									</span>
									<div class="progress">
									  <div class="progress-bar progress-bar-success" style="width: 35%">
										<span class="sr-only">35% Complete (success)</span>
									  </div>
									  <div class="progress-bar progress-bar-warning" style="width: 20%">
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-danger" style="width: 10%">
										<span class="sr-only">10% Complete (danger)</span>
									  </div>
									</div>
								</a>
							</li>
							<li class="footer">
								<a href="#">See all tasks <i class="fa fa-arrow-circle-right"></i></a>
							</li>
						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php
							$user = $_SESSION['user_session'];
							$q = "SELECT users.firstname, users.email, users.active, avatars.avatar 
									FROM users
									INNER JOIN avatars
									ON users.user_id = avatars.user_id
									WHERE users.user_id = $user
									LIMIT 1";
							$r = $dbc->query($q);
							$t = $r->fetch_assoc();
							$fname=ucwords($t['firstname']);
							$avatar=ucwords($t['avatar']);
								?>
							<img alt="avatar" src="<?php echo BASEIMG; ?>/avatars/<?php echo $avatar; ?>"  />
							<span class="username">
								
							<?php
							// select the user in the session
							// temporary arangement
							echo $fname;
							?>
								</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
							<li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
							<li><a href="#"><i class="fa fa-eye"></i> Privacy Settings</a></li>
							<li><a href="<?php echo BASEURL; ?>logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- TEAM STATUS -->
		<div class="container team-status" id="team-status">
		  <div id="scrollbar">
			<div class="handle">
			</div>
		  </div>
		  <div id="teamslider">
			  <ul class="team-list">
				<li>
				  <a href="javascript:void(0);">
				  	<span class="image">
					  <img src="<?php echo BASEIMG; ?>/news.jpg" alt="" />
				  </span>
				  <span class="title">
					News &amp; Updates
				  </span>
					<span class="status">
						<div class="field">
							<?php
							$user = $_SESSION['user_session'];
							$sql = "SELECT news.news_id, news.news, news.posted_by, users.firstname, users.lastname,
									UNIX_TIMESTAMP() - news.date_posted AS TimeSpent 
									FROM news
									INNER JOIN users
									ON news.posted_by = users.user_id
									WHERE status = 1
									ORDER BY news_id
									LIMIT 1";
							$result = $dbc->query($sql);
							if($result->num_rows > 0) {
							
							$news = $result->fetch_assoc();
							$fname=ucwords($news['firstname']);
							$lname=ucwords($news['lastname']);
							$slug=ucwords($news['news']);
							//$timesent=ucwords($news['date_posted']);
								?>
								
							<span class="badge badge-green">Posted By</span> <?php echo $fname . " " . $lname; ?>
							<span class="pull-right fa fa-check"> 
								<?php 
								$days = floor($news['TimeSpent'] / (60 * 60 * 24));
								$remainder = $news['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
						if($days > 0)
								echo date('F d Y', $rows['c_datetime']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes' . " " . $seconds.' seconds ago';
								elseif($days == 0)
								echo $hours.' hour(s)' . " " . $minutes.' minute(s)' . " " . $seconds.' second(s) ago';
								?>
								</span>
						</div>
						<?php echo $slug; ?>
						<?php } else {
							echo "No new information at the moment";
						}
						?>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="<?php echo BASEIMG; ?>/news.jpg" alt="" />
				  </span>
				  <span class="title">
					Important Information
				  </span>
				<span class="status">
						<div class="field">
							<?php
							$user = $_SESSION['user_session'];
							$sql = "SELECT news.news_id, news.news, news.posted_by, users.firstname, users.lastname,
									UNIX_TIMESTAMP() - news.date_posted AS TimeSpent 
									FROM news
									INNER JOIN users
									ON news.posted_by = users.user_id
									WHERE status = 2
									ORDER BY news_id
									LIMIT 1";
							$result = $dbc->query($sql);
							
							if($result->num_rows > 0) {
							
							$news = $result->fetch_assoc();
							$fname=ucwords($news['firstname']);
							$lname=ucwords($news['lastname']);
							$slug=ucwords($news['news']);
								?>
								
							<span class="badge badge-green">Posted By</span> <?php echo $fname . " " . $lname; ?>
							<span class="pull-right fa fa-check"> 
								<?php 
								$days = floor($news['TimeSpent'] / (60 * 60 * 24));
								$remainder = $news['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
						if($days > 0)
								echo date('F d Y', $rows['c_datetime']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes' . " " . $seconds.' seconds ago';
								elseif($days == 0)
								echo $hours.' hour(s)' . " " . $minutes.' minute(s)' . " " . $seconds.' second(s) ago';
								?>
								</span>
						</div>
						<?php echo $slug; ?>
						<?php } else {
							echo "No new information at the moment";
						}
						?>
				    </span>
				  </a>
				</li>
				
			  </ul>
			</div>
		  </div>
		<!-- /TEAM STATUS -->
	</header>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						<!-- SEARCH BAR -->
						<div id="search-bar">
							<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
						</div>
						<!-- /SEARCH BAR -->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							<li class="active">
								<a href="<?php echo BASEURL; ?>dashboard.php">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="selected"></span>
								</a>					
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">INFORMAL SECTOR</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="informal.php"><span class="sub-menu-text">Create New Record</span></a></li>
									<li><a class="" href="informal_upload_passport.php"><span class="sub-menu-text">Upload Passport</span></a></li>
									<li><a class="" href="buttons_icons.html"><span class="sub-menu-text">View All Records</span></a></li>
									<li><a class="" href="sliders_progress.html"><span class="sub-menu-text">Reports</span></a></li>
									<li class="has-sub-sub">
										<a href="javascript:;" class=""><span class="sub-menu-text">Third Level Place Holder</span>
										<span class="arrow"></span>
										</a>
										<ul class="sub-sub">
											<li><a class="" href="#"><span class="sub-sub-menu-text">Item 1</span></a></li>
											<li><a class="" href="#"><span class="sub-sub-menu-text">Item 2</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-table fa-fw"></i> <span class="menu-text">Company</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="simple_table.html"><span class="sub-menu-text">Create New Company</span></a></li>
									<li><a class="" href="dynamic_tables.html"><span class="sub-menu-text">View Existing Company</span></a></li>
									<li><a class="" href="jqgrid_plugin.html"><span class="sub-menu-text">Reports</span></a></li>
								</ul>
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-table fa-fw"></i> <span class="menu-text">Annual Returns</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="simple_table.html"><span class="sub-menu-text">View Annual Returns</span></a></li>
									<li><a class="" href="dynamic_tables.html"><span class="sub-menu-text">View Pending Returns</span></a></li>
									<li><a class="" href="dynamic_tables.html"><span class="sub-menu-text">Calculate Liabilities</span></a></li>
									<li><a class="" href="jqgrid_plugin.html"><span class="sub-menu-text">Reports</span></a></li>
								</ul>
							</li>
							<?php // check user roles and permission
							$allowed = array(1, 2);
							if (check_user_nav($_SESSION['user_role'], $allowed)) {
							?>
							<li class="active">
								<a href="#">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Admin Panel</span>
								<span class="selected"></span>
								</a>					
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-bar-chart-o fa-fw"></i> <span class="menu-text">Users
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="<?php echo BASEURL; ?>modules/users/add_users.php"><span class="sub-menu-text">Create New Users</span></a></li>
									<li><a class="" href="<?php echo BASEURL; ?>modules/users/view_users.php"><span class="sub-menu-text">View All Users</span></a></li>
									<li><a class="" href="<?php echo BASEURL; ?>modules/users/grant_roles.php"><span class="sub-menu-text">Grant Permissions</span></a></li>
									<li><a class="" href="<?php echo BASEURL; ?>modules/rbac/add_roles.php"><span class="sub-menu-text">Create Roles</span></a></li>
									<li><a class="" href="<?php echo BASEURL; ?>modules/rbac/add_permissions.php"><span class="sub-menu-text">Create Permissions</span></a></li>
								</ul>
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-bar-chart-o fa-fw"></i> <span class="menu-text">Reports</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="flot_charts.html"><span class="sub-menu-text">Admin Report</span></a></li>
									<li><a class="" href="xcharts.html"><span class="sub-menu-text">Enforcement Report</span></a></li>
									
									<li><a class="" href="others.html"><span class="sub-menu-text">Others</span></a></li>
								</ul>
							</li>
							<?php } ?>
							<li><a class="" href="calendar.html"><i class="fa fa-envelope-o fa-fw"></i> 
								<span class="menu-text">Inbox
									<span class="tooltip-error pull-right" title="" data-original-title="3 New Events">
										<span class="label label-success">New</span>
									</span>
								</span>
								</a>
							</li>
							
							<li class="">
								<a class="" href="frontend_theme/index.html" target="_blank">
								<i class="fa fa-briefcase fa-fw"></i> <span class="menu-text">Notifications <span class="badge pull-right">9</span></span>
								</a>
							</li>
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content">
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Box Settings</h4>
					</div>
					<div class="modal-body">
					  Here goes box setting content.
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb hidden-xs">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.html">Home</a>
										</li>
										<li><?php //insert page header title if found
										 	$defaultpage = 'Dashboard';
											if (!isset($page)) {
											 echo $defaultpage;
											 
											} else {
												echo $page;
											}
										?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">
										<?php //insert page header title if found
										 	$headertitle = 'WELCOME TO OYSIRS HR PORTAL';
											if (!isset($header_title)) {
											 echo $headertitle;
											 
											} else {
												echo $header_title;
											}
										?>										
										</h3>
										<!-- DATE RANGE PICKER *** TO BE REMOVED LATER
										<span class="date-range pull-right hidden-xs">
											<div class="btn-group">
												<a class="js_update btn btn-default" href="#">Today</a>
												<a class="js_update btn btn-default" href="#">Last 7 Days</a>
												<a class="js_update btn btn-default hidden-xs" href="#">Last month</a>
												
												<a id="reportrange" class="btn reportrange">
													<i class="fa fa-calendar"></i>
													<span></span>
													<i class="fa fa-angle-down"></i>
												</a>
											</div>
										</span>
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description hidden-xs">
										<?php //insert page header title if found
										 	$defaultdesc = 'Overview, Statistics and more';
											if (!isset($desc)) {
											 echo $defaultdesc;
											 
											} else {
												echo $desc;
											}
										?>
										</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- BEGIN CONTENT -->