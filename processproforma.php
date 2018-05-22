<?php

include("head.php");?>

<style type="text/css">
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
		border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">Documents</li>- Process Proforma Invoice
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Documents</h1><a href="documents.php"><button data-toggle="modal" data-target="#addOppModal class="btn btn-default"><em class="fa fa-eye color-red"></em>View All Documents</button></a>


			</div>
		</div><!--/.row-->

			<div class="row">
			<br>
<?php



?>


<?php
/*
$servername = "localhost";
$username = "root";
$password = "Pass@1234@1";
$dbname = "till";

$connection = odbc_connect("Driver={Pervasive ODBC Client Interface};Servername=$servername;MultipleActiveResultSets=true;);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
$sql = "SELECT * from InvSerialsHeader";
$result = odbc_exec($connection, $sql);

if ($result->num_rows > 0) {
		echo mysql_error();
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["opportunity_name"]. " " . $row["sales_rep"]. "<br>";
    }/
} else {
    echo "0 results";
	echo mysql_error();
}
	echo mysql_error();
	echo "test";
$conn->close(); */
$servername = "127.0.0.1";
$username = "root";
$password = "Pass@1234@1";
$dbname = "TILL";

//$connection = odbc_connect("Driver={Pervasive ODBC Client Interface};ServerName=$servername;dbq=dbname;");
$connection=odbc_connect('till','','');
$query = "SELECT * from CustDetails where IND='P'or IND='C' or IND='I' or IND='D' or IND='R'"; //You don't need a ; like you do in SQL

$result = odbc_exec($connection, $query);



//echo odbc_error($connection);
?>

<div>
<form method="post" action="?action=addopp">
  <div class="form-group">
  
    <label  for="OpportunityName">Customer </label>
    <input  required type="text" class="form-control" id="CustomerName" placeholder="Customer" >

  </div>

  <div class="form-group">
   
    <label  for="SalesType">Sales Sector</label>
 <select  required class="form-control" id="SalesType">
      <option>Schools</option>
      <option>Corporates</option>
	  <option>Government</option>
	  <option>Non Profit</option>
	   <option>Other</option>
    </select> 
  </div>

    <div class="form-group">
     
   <label class="" for="Rental">Rental Term</label>
   <input  required type="text" class="form-control" name="RentalTerm" id="RentalTerm" placeholder="0">
   <select  required class="form-control" id="RentalDescription">
        <option>Days</option>
		 <option>Outright Cash Sale</option>
        <option>Weeks</option>
  	   <option>Months</option>
      <option>Years</option>
      </select>
 </div>
     <div class="form-group">
         
    <label   for="ContactName">Contact Name</label>
    <input  required type="text" class="form-control" id="Laptops" placeholder="0">
  
</div>
   <div class="form-group">
    <label for="PhoneNumber">Phone Number</label>
    <input required type="text" class="form-control" id="PhoneNumber" placeholder="e.g 0772907676">
  </div>
   <div class="form-group">
    <label for="Address1">Address1</label>
    <input required type="text" class="form-control" id="Address1" placeholder="e.g 8 George Avenue Msasa">
  </div>
   <div class="form-group">
    <label for="Address2">Address2</label>
    <input required type="text" class="form-control" id="Address2" placeholder="Harare">
  </div>


   <h4><strong>Invoice Line Items</strong></h4>

      <div class="form-group">
	   <label for="store">Store Code</label>
        <select required class="form-control" id="store">
      <option value="001">Desktops</option>
      <option value="002">LCDs</option>
     	<option value="003">Laptops</option>
             	<option value="004">Servers</option>
            	<option value="005">Multi Function Devices</option>
            	<option value="006">Printers</option>
            	 	<option value="007">Projectors</option>
             	<option value="012">Accessories</option>
				<option value="020">Other</option>
        </select>
		  </div>

           <input type="text" id="itemdescription" placeholder="Description">
        <input type="text" id="unitprice" placeholder="Unit Price">
         <input type="text" id="qty" placeholder="Qty">
    
    	<input type="button" class="add-row" value="Add Item">
		<button type="button" class="delete-row">Delete Selected Item</button>

    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Store</th>
                         <th>Item Description</th>
                <th>Unit Price</th>
                <th>Qty</th>
                 <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>

            </tr>
        </tbody>
		<tfoot>
		<tr><td></td>
			<td></td>
			<td></td>
			<td></td>

			<td><strong>VAT</strong></td>
			<td id="grandvat"></td>
         </tr>

		<tr><td></td>
			<td></td>
			<td></td>
			<td></td>

			<td><strong>Grand Total(Incl VAT)</strong></td>
			<td id="grandtotal"></td>
           </tr>
		</tfoot>
    </table>


 <div class="form-group">
   <h4><strong> <label for="Details">Invoice Summary Details</label></strong></h4>
    <input required type="text" class="form-control" id="Details" placeholder="eg. 10x Dell E6420 laptops,10 desktops,Delivery Charge">
  </div>
     <div class="form-group">
    <label for="Projectors">Remarks</label>
    <input required type="text" class="form-control" id="Remarks" placeholder="Remarks">
  </div>
  </form>
      </div>













<?php
include("footer.php");

?>
