<?php
session_start();

include("dbconn.php");
//include("dbconn2.php");

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QRENT CRM</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
	<link href="css/datepicker3.css" rel="stylesheet">

	<link href="css/styles.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="css/select.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/jquery.dataTables.min.css">

	<link href="css/piechart.css" rel="stylesheet">


	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-danger navbar-fixed-top" role="navigation" style="color-red">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#">QRENT</span>CRM</a>
				<ul class="nav navbar-top-links navbar-right">
					
						
					
				
					
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile">
			<p align="center"><img src="logo.jpg" class="img-responsive" alt=""></p>
				
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php
echo $_SESSION['username'];
?></div>
				<div class="profile-usertitle-status" style="color:red;"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
	
		<ul class="nav menu">
			<li class="color-red"><a href="dashboard.php"><em class="fa fa-dashboard color-red">&nbsp;</em> Dashboard</a></li>
	<li class="color-red"><?php if ($_SESSION['role']=="Administrator"||$_SESSION['role']=="Manager")
	echo "
	<a href=\"groupdashboard.php\"><em class=\"fa fa-group color-red\">&nbsp;</em>Group Dashboard</a> 
	";?></li>
	<li class="color-red"><?php if ($_SESSION['role']=="Administrator"||$_SESSION['role']=="Manager")
	echo "
	<a href=\"groupdashboard.php\"><em class=\"fa fa-university color-red\">&nbsp;</em>Group Parameters</a> 
	";?></li>
	<li class="color-red"><?php if ($_SESSION['role']=="Administrator"||$_SESSION['role']=="Manager")
	echo "
	<a href=\"groupreports.php\"><em class=\"fa fa-file color-red\">&nbsp;</em>Group Reports</a> 
	";?></li>
			<li class="color-red"><a href="opportunities.php"><em class="fa fa-link color-red">&nbsp;</em> Opportunities</a></li>
						<li class="color-red"><a href="meetings.php"><em class="fa fa-calendar color-red">&nbsp;</em> Meetings</a></li>
			<li class="color-red"><a href="documents.php"><em class="fa fa-file color-red">&nbsp;</em> Documents</a></li>
			<li class="color-red"><a href="contacts.php"><em class="fa fa-address-book color-red">&nbsp;</em> Contacts</a></li>
					<li class="color-red"><a href="reports.php"><em class="fa fa-file color-red">&nbsp;</em> Reports</a></li>
			<!--/* <li class="color-red"><a href="calls.php"><em class="fa fa-phone color-red">&nbsp;</em> Call Log</a></li> */-->
			<li class="color-red"><a href="user_management.php"><em class="fa fa-user color-red">&nbsp;</em>User(s) Settings </a></li>
						<li class="color-red"><a href="help.php"><em class="fa fa-question color-red">&nbsp;</em>Help </a></li>
			<li class="color-red" ><a href="logout.php"><em class="fa fa-power-off color-red">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->