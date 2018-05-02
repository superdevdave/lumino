<!DOCTYPE html>
<head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>


<?php
session_start();
include ("dbconn.php");
include ("dbconn3.php");

//echo $GLOBALS['salesrep']="dave";//$_SESSION["salesrep"];



$username=$_SESSION["username"];

$dailydate=$_REQUEST['ddate'];

function round_up($number, $precision = 2)
{
    $fig = (int) str_pad('1', $precision, '0');
    return (ceil($number * $fig) / $fig);
}
	
//Get Document Header Information
$reporttype=$_REQUEST['reporttype'];



//echo $reporttype;


switch($reporttype) {
	case 'Daily':
	viewDailyReport();
	break;
	
	case 'Weekly':
	EditOpportunityData();
	break;
	
	case 'Monthly':
		CancelOpportunity();
	break;
	
	case 'Custom':
		CloseOpportunity();
	break;
    	case 'addProformaItem':
	 AddProformaItem();
	break;
	case 'getProformaNo':
		GetProformaNo();
	break;
	
	case 'change-pass':
		changePass();
	break;
	case'submitProforma':
	SubmitProforma();
	break;
	case'viewIndividualReport':
	ViewIndividualReport();
	break;
	case 'logOut':
		logOut();
	break;		

}//switch


///Get Branch Information
$query = "SELECT * FROM branch where id=1"; //You don't need a ; like you do in SQL
$result = mysql_query($query);
$branchrow = mysql_fetch_array($result);
$connection;

echo mysql_error($connection);


function EditOpportunityData()
{
	echo "hatina kupinda";
}

function viewDailyReport()
{
include ("dbconn.php");
include ("dbconn3.php");
echo "Tapinda";

echo $salesrep=$_SESSION['salesrep'];

$username=$_SESSION["username"];
//echo $fromdate=$_REQUEST['fromdate'];

//echo $fromdate=$_REQUEST['todate'];

$dailydate2=$_REQUEST['ddate'];

$_SESSION['startdate']=$dailydate2;

$_SESSION['enddate']=$dailydate2;

//Get Number of laptops Hired
$query11 = "SELECT sum(laptops) FROM opportunity where sales_rep='$salesrep'  and status='Closed' and DateClosed='$dailydate2'"; //You don't need a ; like you do in SQL
$result11 = mysql_query($query11);
$row=mysql_fetch_row($result11);
$laptopshired=$row[0];
$_SESSION['laptopshired']=$laptopshired;
$connection;
echo mysql_error($connection);
echo $query11;

//Get Number of desktops Hired
$query12 = "SELECT sum(desktops) FROM opportunity where sales_rep='$salesrep' and status='Closed' and DateClosed='$dailydate2'"; //You don't need a ; like you do in SQL
$result12 = mysql_query($query12);
$row=mysql_fetch_row($result12);
$desktopshired=$row[0];
$_SESSION['desktopshired']=$desktopshired;
$connection;
echo mysql_error($connection);

//Get Number of servers Hired
$query13 = "SELECT sum(servers) FROM opportunity where sales_rep='$salesrep' and status='Closed' and DateClosed='$dailydate2'"; //You don't need a ; like you do in SQL
$result13 = mysql_query($query13);
$row=mysql_fetch_row($result13);
$servershired=$row[0];
$_SESSION['servershired']=$servershired;
$connection;
echo mysql_error($connection);

//Get Number of projectors Hired
$query14 = "SELECT sum(projectors) FROM opportunity where sales_rep='$salesrep' and status='Closed' and DateClosed='$dailydate2'"; //You don't need a ; like you do in SQL
$result14 = mysql_query($query14);
$row=mysql_fetch_row($result14);
$projectorshired=$row[0];
$_SESSION['projectorshired']=$projectorshired;
$connection;

echo mysql_error($connection);
//Get Total Revenue Generated
$query15 = "SELECT sum(rental_amount) FROM opportunity where sales_rep='$salesrep'  and Status='Closed' and DateClosed='$dailydate2'"; //You don't need a ; like you do in SQL
$result15 = mysql_query($query15);
$row=mysql_fetch_row($result15);
$totalrevenue=$row[0];
$_SESSION['totalrevenue']=$totalrevenue;
$connection;
echo mysql_error($connection);

//Get New Opportunities
$query15 = "SELECT * FROM opportunity where sales_rep='$salesrep' and DateInitiated='$dailydate2'"; //You don't need a ; like you do in SQL
$_SESSION['result15'] = mysql_query($query15);
$newopportunitiesrow = mysql_fetch_array($result15);
$connection;

echo mysql_error($connection);

//Get Open Opportunities
$query16 = "SELECT * FROM opportunity where sales_rep='$salesrep' and Status='Open'"; //You don't need a ; like you do in SQL
$_SESSION['result16']= mysql_query($query16);
$opportunitiesrow = mysql_fetch_array($result16);
$connection;

echo mysql_error($connection);

//Get Generated  Proformas
$query17 = "SELECT * FROM invserialsheader where sales_rep='$salesrep' and DDate='$dailydate2'"; //You don't need a ; like you do in SQL
$_SESSION['result17'] = mysql_query($query17);
$proformasrow = mysql_fetch_array($result17);
$connection;

//echo mysql_error($connection);


//Get Lost Opportunities/$query18 = "SELECT * FROM opportunity where sales_rep='$salesrep' and Status='Cancelled' and DateCancelled='$dailydate'"; //You don't need a ; like you do in SQL
$result18 = mysql_query($query18);
$lostopportunitiesrow = mysql_fetch_array($result18);
$connection;

//echo mysql_error($connection);

}
?>
</head>
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

#proformaInvoiceTable > tbody > tr > .no-line {
    border-top: none;
}

#proformaInvoiceTable > thead > tr > .no-line {
    border-bottom: none;
}

#proformaInvoiceTable > tbody > tr > .thick-line {
    border-top: 2px solid;
}
@page {
    size: 25cm 35.7cm;
    margin: 5mm 5mm 5mm 5mm; /* change the margins as you want them to be. */
}


</style>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    		<img src="http://qrent.co.zw/wp-content/uploads/2016/05/Qrent-Logo-75x.jpg">     <h2>Individual Sales Report</h2><h4 class="pull-right"> For:<?php echo $username; ?></h2>
    		</div>
    		<hr>
    		<div class="row">
    			
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
					<strong>Report Type:</strong>
    					<?php echo $reporttype; ?><br>
    					<strong>Generated By:</strong>
    					<?php echo $username; ?><br>
    				<strong>Date Generated :</strong>
    					<?php echo $dailydate; ?><br>
    				
    				</address>
    			</div>
				</div>    			
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
					<strong>SUMMARY:</strong><br>
    					<strong>Laptops Hired:</strong>
    					<?php echo $_SESSION['laptopshired']; ?><br>
    				<strong>Desktops Hired :</strong>
    					<?php echo $_SESSION['desktopshired']; ?><br>
    				<strong>Projectors Hired:</strong>
    					<?php echo$_SESSION['projectorshired']; ?><br>
							<strong>Servers Hired:</strong>
    					<?php echo $_SESSION['servershired']; ?><br>
    					<strong>Revenue :</strong>
    					<?php echo "$".$_SESSION['totalrevenue']; ?><br>
    				
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Report Period:</strong><br>
    				From: <?php echo $_SESSION['startdate']; ?><br>
					To: <?php echo $_SESSION['enddate']; ?><br>
					<br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>New Leads</strong></h3>
    			</div>    							
				<div class="panel-body">
    				<div class="table-responsive">
    					<table id="proformaInvoiceTable1" class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Title</strong></td>
        							<td class="text-center"><strong>Customer</strong></td>
        							<td class="text-center"><strong>Expected Maturity Date</strong></td>
									<td class="text-center"><strong>Rental Type</strong></td>
									<td class="text-center"><strong>Total units</strong></td>
									<td class="text-center"><strong>Expected Revenue</strong></td>
        			
                                </tr>
    						</thead>
    						<tbody>
							<?php
							while($row = mysql_fetch_array($_SESSION['result15'])){   //Creates a loop to loop through results
		echo "<tr><td>".$row['opportunity_name']."</td><td class=\"text-left\">".$row['customer']."</td><td class=\"text-center\"> ".$row['MaturityDate']."</td><td class=\"text-center\">".$row['sales_type']."</td><td class=\"text-center\">".$row['units_sold']."</td><td class=\"text-center\">".$row['rental_amount']."</td></tr>";  //$row['index'] the index here is a field name
}
							?>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							
    							
									
    						</tbody>
    					</table>
						
    				</div>
					<div>
					
					</div>
    			</div>
						  		</div>
			
    	
    <div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Open Opportunities</strong></h3>
    			</div>    							
				<div class="panel-body">
    				<div class="table-responsive">
    					<table id="proformaInvoiceTable1" class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Title</strong></td>
        							<td class="text-center"><strong>Customer</strong></td>
        							<td class="text-center"><strong>Expected Maturity Date</strong></td>
									<td class="text-center"><strong>Rental Type</strong></td>
									<td class="text-center"><strong>Total units</strong></td>
									<td class="text-center"><strong>Expected Revenue</strong></td>
        							<td class="text-right"><strong>Notes</strong></td>
                                </tr>
    						</thead>
    						<tbody>
							<?php
							while($row = mysql_fetch_array($_SESSION['result16'])){   //Creates a loop to loop through results
		echo "<tr><td>".$row['opportunity_name']."</td><td class=\"text-left\">".$row['customer']."</td><td class=\"text-center\"> ".$row['MaturityDate']."</td><td class=\"text-center\">".$row['sales_type']."</td><td class=\"text-center\">".$row['units_sold']."</td><td class=\"text-center\">".$row['rental_amount']."</td><td class=\"text-right\"> ".$row['description']."</td></tr>";  //$row['index'] the index here is a field name
}
							?>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							
    							
									
    						</tbody>
    					</table>
						
    				</div>
					<div>
					
					</div>
    			</div>
						  		</div>
			
    	</div>
		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Generated Proforma Invoices(Quotes)</strong></h3>
    			</div>    							
				<div class="panel-body">
    				<div class="table-responsive">
    					<table id="proformaInvoiceTable1" class="table table-condensed">
    						<thead>
                                <tr>
        							
        							<td class="text-left"><strong>Document No</strong></td>
        							<td class="text-center"><strong>Date Generated</strong></td>
									<td class="text-center"><strong>Customer</strong></td>
									<td class="text-center"><strong>Invoice Summary</strong></td>
									<td class="text-right"><strong>Expected Revenue</strong></td>
        						
                                </tr>
    						</thead>
    						<tbody>
							<?php
							while($row = mysql_fetch_array($_SESSION['result17'])){   //Creates a loop to loop through results
		echo "<tr><td>".$row['Docno']."</td><td class=\"text-left\">".$row['DDate']."</td><td class=\"text-center\"> ".$row['Customer']."</td><td class=\"text-center\">".$row['Description']."</td><td class=\"text-right\">".$row['Total']."</td></tr>";  //$row['index'] the index here is a field name
}
							?>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							
    							
									
    						</tbody>
    					</table>
						
    				</div>
					<div>
					
					</div>
    			</div>
						  		</div>
			
    	</div>
    </div>
	<div class="row">
    			<div class="col-xs-6">
				<strong>Remarks</strong><br>
				<?php echo $headerrow['Remarks']; ?>
				</div>
				</div>
				<div class="pull-right hidden-print">        
        <button class="btn btn-danger" onclick="window.print();">Print & Save Document</button>
        <button class="btn btn-danger" onclick="window.open('reports.php');">Back To Reports Menu</button>
    </div>    
</div>
</div>
<html>

<?php


?>