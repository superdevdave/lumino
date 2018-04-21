<?php
session_start();
include ("dbconn.php");
include ("dbconn3.php");

function round_up($number, $precision = 2)
{
    $fig = (int) str_pad('1', $precision, '0');
    return (ceil($number * $fig) / $fig);
}

///Get Branch Information
$query = "SELECT * FROM branch where id=1"; //You don't need a ; like you do in SQL
$result = mysql_query($query);
$branchrow = mysql_fetch_array($result);
$connection;

echo mysql_error($connection);

//Get Document Header Information

$profno=$_REQUEST['docno'];

$query2 = "SELECT * FROM invserialsheader where docno='$profno'"; //You don't need a ; like you do in SQL
$result2 = mysql_query($query2);
$headerrow = mysql_fetch_array($result2);
$connection;

echo mysql_error($connection);

//Get Document Lines Information


$query3 = "SELECT * FROM invserialslines where docno='$profno'"; //You don't need a ; like you do in SQL
$result3 = mysql_query($query3);
//$headerrow = mysql_fetch_array($result2);
$connection;

echo mysql_error($connection);

$theNo=$headerrow['MonthlyRental']/1.15; 
$theVAT=$headerrow['MonthlyRental']-$theNo;


?>

<!DOCTYPE html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    		<img src="http://qrent.co.zw/wp-content/uploads/2016/05/Qrent-Logo-75x.jpg">    	<h2>Proforma Invoice</h2><h3 class="pull-right">Invoice # <?php echo $headerrow['Docno']; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong><?php echo $branchrow['BranchName']; ?></strong><br>
					<strong>Rep:</strong><?php echo $headerrow['username']; ?><br>
    					<?php echo $branchrow['BranchAddress'];?><br>
    					<?php echo $branchrow['BranchAddress2']; ?><br>
    					Tel: <?php echo $branchrow['BranchTelephone']; ?><br>
    			<?php echo $branchrow['BranchWebsite']; ?><br>
    				<?php echo $branchrow['BranchEmail']; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong> To:</strong><br>
    					<?php echo $headerrow['CashName']; ?><br>
    				<?php echo $headerrow['Customer']; ?><br>
    					<?php echo $headerrow['Address']; ?><br>
    				<?php echo $headerrow['Address2']; ?><br>
					<?php echo $headerrow['City']; ?>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Banking Details:</strong><br>
    					<strong><?php echo $branchrow['BranchBank']; ?></strong><br>
    				<?php echo $branchrow['BankAccount'];; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Date:</strong><br>
    				<?php $ddate=date_create($headerrow['DDate']); echo	date_format($ddate,"d/m/Y "); ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Details</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table id="proformaInvoiceTable1" class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item Description</strong></td>
        							<td class="text-center"><strong>Unit Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
							<?php
							while($row = mysql_fetch_array($result3)){   //Creates a loop to loop through results
		echo "<tr><td>".$row['StoreCode']." ".$row['Description']."</td><td class=\"text-center\">$ ".round_up($row['UnitCost'])."</td><td class=\"text-center\">".$row['Qty']."</td><td class=\"text-right\">$ ".round_up($row['LnTotal'])."</td></tr>";  //$row['index'] the index here is a field name
}
							?>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							
    							
									<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Deposit Period</strong></td>
    								<td class="no-line text-right"><?php echo$headerrow['DepositPeriod']; ?> Months</td>
    							</tr>
								<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Deposit Amount</strong></td>
    								<td class="no-line text-right">$ <?php echo round_up($headerrow['DepositCash']); ?> </td>
    							</tr>
									<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Discount Amount</strong></td>
    								<td class="no-line text-right">$ <?php echo round_up($headerrow['Discount']); ?> </td>
    							</tr>
								<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$ <?php echo round_up($headerrow['subtotal']); ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tax</strong></td>
    								<td class="no-line text-right">$ <?php echo round_up($headerrow['Tax']); ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total Due</strong></td>
    								<td class="no-line text-right">$ <?php echo round_up($headerrow['Total']); ?></td>
    							</tr>
    						</tbody>
    					</table>
						
    				</div>
					<div>
					<table>
					<tr>
    								<td class="no-line"><strong>  Billing Terms: </strong></td>
    								<td class="no-line">  <?php echo $headerrow['Terms']; ?></td>
					</tr>
					<tr>
    								<td class="no-line"><strong><?php echo $headerrow['Terms']; ?>  VAT</strong></td>
    								<td class="no-line">  $ <?php  echo round_up($theVAT); ?></td>
					</tr>
					<tr>
									<td class="no-line"><strong><?php echo $headerrow['Terms']; ?> Rental</strong></td>
    								<td class="no-line">  $ <?php echo round_up($headerrow['MonthlyRental']); ?></td>
					</tr>
					</table>
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
        <button class="btn btn-danger" onclick="window.open('documents.php');">Back To Documents Menu</button>
    </div>    
</div>
</div>
<html>