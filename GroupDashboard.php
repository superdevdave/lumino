<?php

include("head.php");
include("dbconn.php");
include("dbconn3.php");


 $salesrep=$_SESSION['salesrep'];
 
  $dailydate2=date("n");
  
$getdealsclosed = "SELECT count(id) FROM opportunity where sales_rep='$salesrep' and Status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL

$result9= mysql_query($getdealsclosed);
$rowrow=mysql_fetch_row($result9);
$_SESSION['dealsclosed']=$rowrow[0];
$connection;


$getopenopportunities = "SELECT count(id) FROM opportunity where sales_rep='$salesrep' and Status='Open'"; //You don't need a ; like you do in SQL
$result10=mysql_query($getopenopportunities);
$rowro=mysql_fetch_row($result10);
$_SESSION['openopportunities']=$rowro[0];
$connection;


$getdesktopshired = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep' and status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result12 = mysql_query($getdesktopshired);
$row=mysql_fetch_row($result12);
$_SESSION['desktopshired']=$row[0];



$getlaptopshired = "SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep' and status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result13 = mysql_query($getlaptopshired);
$row2=mysql_fetch_row($result13);
$_SESSION['laptopshired']=$row2[0];

$getprojectorshired = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep' and status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result14 = mysql_query($getprojectorshired);
$row4=mysql_fetch_row($result14);
$_SESSION['projectorshired']=$row4[0];


//Get Total Revenue Generated
$getrevenuegenerated = "SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and MONTH(DateClosed)='$dailydate2'"; //You don't need a ; like you do in SQL
$result15 = mysql_query($getrevenuegenerated);
$row=mysql_fetch_row($result15);
$totalrevenue=$row[0];
$_SESSION['totalrevenue']=$totalrevenue;
$connection;

//Get  Meetings Scheduled This Week Today 
 $dailydate3=date("W");
 $query29 = "SELECT * FROM meetings where User='$salesrep' and WEEK(StartDate,3) like '%$dailydate3%' or WEEK(EndDate,3) like '%$dailydate3%'"; //You don't need a ; like you do in SQL
$_SESSION['result29'] = mysql_query($query29);
$meetingsrow = mysql_fetch_array($result29);
$connection;
//echo mysql_error($connection);

?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">Dashboard</li>
			<ul class="pull-right panel-settings panel-button-tab-right">
		
							</a>
			<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
										
											
										</ul>
										
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">My Dashboard</h1>
			</div>
		</div><!--/.row-->
		
						<div class="col-md-12">
		<div class="panel panel-default">
	
						<div class="panel-heading">
		Quick Stats
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
				<div class="panel panel-container">	
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-gavel color-red"></em>
							<div class="large"><?php echo $_SESSION['dealsclosed'];  ?></div>
							<div class="text-muted">Deals Closed</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-link color-red"></em>
							<div class="large"><?php echo $_SESSION['openopportunities'];  ?></div>
							<div class="text-muted">Open Opportuinities</div>
						</div>
					</div>
				</div>
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-desktop color-red"></em>
							<div class="large"><?php echo $_SESSION['desktopshired']; ?></div>
							<div class="text-muted">Desktop Hired</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-laptop color-red"></em>
							<div class="large"><?php echo $_SESSION['laptopshired']; ?></div>
							<div class="text-muted">Laptops Hired</div>
						</div>
					</div>
				</div>
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><img src="images/video-projector-32.png">
							<div class="large"><?php echo $_SESSION['projectorshired']; ?></div>
							<div class="text-muted">Projectors Hired</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-file color-red"></em>
							<div class="large">2</div>
							<div class="text-muted">New Contracts</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-dollar color-red"></em>
							<div class="large"><?php echo $_SESSION['totalrevenue']; ?></div>
							<div class="text-muted">Revenue Generated</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-exclamation color-red"></em>
							<div class="large">11</div>
							<div class="text-muted">Pending Action Items</div>
						</div>
					</div>
				</div>
				
			</div><!--/.row-->
		</div>
			</div><!--/.panel-->
		
		</div>
		
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Meetings & Appointments
						<ul class="pull-right panel-settings panel-button-tab-right">
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					
							</a>
								
						<span class="pull-right clickable panel-toggle panel-button-tab-left"></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
						<?php
						while($rowt = mysql_fetch_array($_SESSION['result29'])){
						echo"	<li>
								<div class=\"timeline-badge color-red\"><em class=\"glyphicon glyphicon-pushpin \"></em></div>
								<div class=\"timeline-panel\">
				
									<div class=\"timeline-heading\">
										<strong><h4 class=\"timeline-title\">".$rowt['Title']."</strong> (".$rowt['Customer'].")</h4>
									</div>
									<div class=\"timeline-body\">
										<p>Scheduled Date & Time:".$rowt['Location']."</p>
										<p>Location:".$rowt['Location']."</p>
										
									</div>
								</div>
							</li>";
						}
							?>
						</ul>
					</div>
				</div>
			</div><!--/.col-->
		
		
		
	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
				Units Sold
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Monthly Target</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Quarterly Target</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Yearly Target</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>
					</div>
				</div>
			</div>
			
			</div>
		
		
						<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Activity Stream
						<ul class="pull-right panel-settings panel-button-tab-right">
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					
							</a>
								
						<span class="pull-right clickable panel-toggle panel-button-tab-left"></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
									</div>
								</div>
							</li>
							
						</ul>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">Qrent Zimbabwe Copyright 2018 <a href="https://www.qrent.co.zw"></a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php

include("footer.php");

?>
	