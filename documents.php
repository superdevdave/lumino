<?php

include("head.php");?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">Documents</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
			<form id="generateProformaForm"
				<h1 class="page-header">Documents</h1> <button class="btn btn-default"><span class="fa fa-add"></span><em class="fa fa-eye color-red"> </em> View Selected Document</button>
			
				<button data-toggle="modal" id="generateProforma" data-target="#processProfModal" class="btn btn-default"><em class="fa fa-file color-red"></em>  Generate Proforma Invoice</button>
	</form>
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
$query = "SELECT * from CustDetails where IND='P' or IND='C' or IND='I' or IND='D' or IND='R'"; //You don't need a ; like you do in SQL

$result = odbc_exec($connection, $query);


echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">"; // start a table tag in the HTML
echo "<thead><tr><th>Document Number</th><th>Date Processed</th><th>Customer</th><th>Document Summary</th><th>Rental Period</th><th>Days-Months-Weeks-Years</th><th>Document Type</th><th>Sales Rep</th></tr></thead><tbody>";
while(odbc_fetch_row($result)){   //Creates a loop to loop through results
$DocType=odbc_result($result,"Ind");
if ($DocType=="D")
{
$docresult="Delivery Note";	
}
elseif($DocType=="C")
{
$docresult="Collection Note"	;
}
elseif($DocType=="R")
{
$docresult="Receipt";	
}
elseif($DocType=="I")
{
$docresult="Invoice";	
}
else{
$docresult="Proforma";		
}
echo "<tr><td>". odbc_result($result,"InvoiceNo")."</td><td>".odbc_result($result,"DocDate")."</td><td>".odbc_result($result,"Name")."</td><td>".odbc_result($result,"Details")."</td><td>".odbc_result($result,"Term")."</td><td>".odbc_result($result,"Account")."</td><td>".$docresult."</td><td>".odbc_result($result,"SalesRep")."</td></tr>";  //$row['index'] the index here is a field name
}


echo "</tbody></table>"; //Close the table in HTML

echo $query;

echo odbc_error($connection);
?>

<!-- View Document Modal -->
<div id="addOppModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Process Proforma</h4>
      </div>
      <div class="modal-body">
        <form action="">
  <div class="form-group">
    <label for="OpportunityName">Customer </label>
    <input required type="text" class="form-control" id="CustomerName" placeholder="Customer >
  </div>
    
  <div class="form-group">
    <label for="SalesType">Sales Type</label>
 <select required class="form-control" id="SalesType">
      <option>Schools</option>
      <option>Corporates</option>
	   <option>Other</option>
    </select> </div>

     <div class="form-group">
    <label for="Laptops">No of Laptops</label>
    <input required type="text" class="form-control" id="Laptops" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Desktops">No of Desktops</label>
    <input required type="text" class="form-control" id="Desktops" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Desktops">No of Servers</label>
    <input required type="text" class="form-control" id="Desktops" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Monitors">No of Monitors</label>
    <input required type="text" class="form-control" id="Monitorss" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Projectors">No of Projectors</label>
    <input required type="text" class="form-control" id="Projectors" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Projectors">Networking Equipment</label>
    <input required type="text" class="form-control" id="Networking" placeholder="0">
  </div>
      <div class="form-group">
    <label for="RentalAmount">RentalAmount</label>
    <input required type="text" class="form-control" id="RentalAmount" placeholder="$ Potential Revenue">
  </div>
   <div class="form-group">
    <label for="MaturityDate">Expected Maturity Date</label>
    <input required type="date" class="form-control" id="MaturityDate" placeholder="Expected Date of Oppoturnity Maturity">
  </div>
     <div class="form-group">
    <label for="ContactPerson">Contact Person</label>
    <input type="text" class="form-control" id="ContactPerson" placeholder="Full Name of Contact">
  </div>
       <div class="form-group">
    <label for="ContactPhone">Contact Phone</label>
    <input type="text" class="form-control" id="ContactPhone" placeholder="Phone...Optional">
  </div>
     <div class="form-group">
    <label for="ContactEmail">Contact Email</label>
    <input type="text" class="form-control" id="ContactEmail" placeholder="Email...Optional">
  </div>
   <div class="form-group">
    <label for="Description">Description & Notes</label>
<textarea class="form-control" rows="3" id="Description">
 </textarea>
 </div>

      </div>
      <div class="modal-footer">
           <input type="submit" id="btnUpdateProforma" class="btn btn-default" value="Save"> 
       </form>
		<button type="button" class="btn btn-default" data-dismiss="modal"> <em class="fa fa-close color-red"></em> Close</button>
      </div>
    </div>
  </form>
  </div>
</div>




    <!-- Process Proforma Modal-->
<div id="processProfModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Generate Proforma Invoice</h4>
      </div>
      <div class="modal-body">
      <form id="proformaBodyForm" action="">
	    <!-- Hidden submit button-->
	  <input type="submit" class="submit" style="display:none;">
	  
  <div class="form-group">
  
    <label  for="OpportunityName">Customer-Organisation </label>
    <input  required type="text" class="form-control" id="Customer" placeholder="Customer" >

  </div>

  <div class="form-group">
   
    <label  for="SalesType">Sales Type</label>
 <select  required class="form-control" id="SalesType">
      <option>Schools</option>
      <option>Corporates</option>
	   <option>Other</option>
    </select> 
  </div>

    <div class="form-group">
     
   <label class="" for="Rental">Rental Term</label>
   <input  required type="text" class="form-control" name="RentalTerm" id="RentalTerm" placeholder="0">
   <select  required class="form-control" id="RentalDescription">
        <option>Days</option>
        <option>Weeks</option>
  	   <option>Months</option>
      <option>Years</option>
      </select>
 </div>
     <div class="form-group">
         
    <label   for="ContactName">Contact Name</label>
    <input  required type="text" class="form-control" id="ContactName" placeholder="0">
  
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
 <div class="form-group">
    <label for="City">City</label>
    <input required type="text" class="form-control" id="City" placeholder="City">
  </div>
  <div class="form-group">
   <h4><strong>Province</strong></h4>

      <div class="form-group">
	   <label for="store">Province</label>
        <select required class="form-control" id="province">
      <option value="Harare Province">Harare</option>
      <option value="Bulawayo Province">Bulawayo</option>
     	<option value="Manicaland Province">Manicaland</option>
		<option value="Midlands Province">Midlands</option>
             	<option value="Masvingo Province">Masvingo</option>
            	<option value="Matebeleland North">Matebeleland North</option>
            	<option value="Matebeleland South">Matebeleland South</option>
            	 	<option value="Mashonaland Central">Mash Central</option>
					<option value="Mashonaland East">Mash East</option>
								<option value="Mashonaland West">Mash West</option>
      
        </select>
		  </div>
<div class="form-group">
   <h4><strong> <label for="Details">Invoice Summary Details</label></strong></h4>
    <input required type="text" class="form-control" id="Details" placeholder="eg. 10x Dell E6420 laptops,10 desktops,Delivery Charge">
  </div>
     <div class="form-group">
    <label for="Projectors">Remarks</label>
    <input required type="text" class="form-control" id="Remarks" placeholder="Remarks">
  </div>
    <div class="form-group">
    <label for="Deposit">Deposit Period(in months)</label>
    <input required type="number"  class="form-control" id="DepositPeriod" placeholder="0">
  </div>
  <div class="form-group">
    <label for="Deposit">Deposit Amount</label>
    <input  type="number"  class="form-control" id="DepositAmount" placeholder="0">
  </div>
    <div class="form-group">
    <label for="Deposit">Discount Amount</label>
    <input  type="number"  class="form-control" id="DiscountAmount" placeholder="0">
  </div>
  </form>
  <div class="form-group">
   <h4><strong>Invoice Line Items</strong></h4>

      <div class="form-group">
	   <label for="store">Store Code</label>
        <select required class="form-control" id="store">
      <option value="001">Desktops</option>
      <option value="002">LCDs</option>
     	<option value="003 Laptops">Laptops</option>
             	<option value="004">Servers</option>
            	<option value="005">Multi Function Devices</option>
            	<option value="006">Printers</option>
            	 	<option value="007">Projectors</option>
             	<option value="012">Accessories</option>
				<option value="020">Other</option>
        </select>
		  </div>

           <input type="text" id="itemdescription" placeholder="Description">
        <input type="number" min="1" id="unitprice" name="unitprice" placeholder="Unit Price">
         <input type="number" min="1" id="qty" placeholder="Qty">
   
	  <form id="additemform">
    	<input type="submit" value="Add Item" class="add-row">
				<button type="button" class="delete-row">Reset Invoice</button>
		</form>


    <table id="proforma">
        <thead>
		<tr></tr>
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

			<td><strong>Deposit</strong></td>
			<td id="granddeposit"></td>
         </tr>
		 	<tr><td></td>
			<td></td>
			<td></td>
			<td></td>

			<td><strong>Discount</strong></td>
			<td id="granddiscount"></td>
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


 
    
    <button id="SubmitProforma" class="btn btn-default" id="closeProfAdd">Save</button>
	
	<button id="closeBtn" data-toggle="modal" data-target="processProfModal" class="btn btn-default"><em class="fa fa-close color-red"></em>Close</button>
  </div>

    </div>

  </div>
</div>
</div>

</div>
</div>






<?php
include("footer.php");




?>