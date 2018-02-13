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
				<h1 class="page-header">Documents</h1> <button class="btn btn-default"><span class="fa fa-add"></span><em class="fa fa-eye color-red"> </em> View Selected Document</button> 
			
				<a href="processproforma.php"><button data-toggle="modal" data-target="#addOppModal class="btn btn-default"><em class="fa fa-file color-red"></em> Process Proforma Invoice</button></a> 	
	
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

<!-- Add Opportunity Modal -->
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
  </form>
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
           <input type="submit" class="btn btn-default" value="Save"> 
     
		<button type="button" class="btn btn-default" data-dismiss="modal"> <em class="fa fa-close color-red"></em> Close</button>
      </div>
    </div>
  </form>
  </div>
</div>

<!-- Edit Opportunity Modal -->
<div id="editOppModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Opportunity Details</h4>
      </div>
      <div class="modal-body">
        <form action="">
  <div class="form-group">
    <label for="OpportunityName">Opportunity Title</label>
    <input required type="text" class="form-control" id="OpportunityName" placeholder="Name of Opportunity">
  </div>
  
    <div class="form-group">
    <label for="OpportunityName">Organisation/Company Name</label>
    <input required type="text" class="form-control" id="Organisation" placeholder="Organisation/Company Name">
  </div>
  
  <div class="form-group">
    <label for="SalesType">Sales Type</label>
 <select required class="form-control" id="SalesType">
      <option>Daily Rental</option>
      <option>Weekly Rental</option>
	   <option>Monthly Rental</option>
	   <option>Quartely Rental</option>
	   <option>Termly Rental</option>
	      <option>Yearly Rental</option>
      <option>HirePurchase</option>
      <option>OutrightSales</option>
      <option>Donation</option>
	   <option>Other</option>
    </select> </div>
  </form>
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
           <input type="submit" class="btn btn-default" value="Save"> 
     
		<button type="button" class="btn btn-default" data-dismiss="modal"> <em class="fa fa-close color-red"></em> Close</button>
      </div>
    </div>
  </form>
  </div>
</div>




<!-- Close Opportunity Modal -->
<div id="closeOppModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Close Deal-Successful Opportunity</h4>
      </div>
      <div class="modal-body">
       <form>
	   <div class="form-group">
	   <div class="form-control">
	   <form>
	   <label for="contractsigned">MRA Contract signed</label>
	   <input type="checkbox" id="contractsigned" value="Yes" name="contractsigned">
	   
	      </div>
		  	   <div class="form-control">
	   	   <label for="goodsdelivered">Goods Delivered</label>
		   	   <input type="checkbox" id="goodsdelivered" value="Yes" name="goodsdelivered">
		   </div>
	   </div>
	     </div>
		  	   <div class="form-control">

		      <button type="submit" class="btn btn-default" ><em class="fa fa-save color-red"></em>Save</button>
		   </div>
	   </div>
	   </div>
	   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>

<div id="cancelOppModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cancel Unsuccessful Deal\Opportunity</h4>
      </div>
      <div class="modal-body">
       <form>
	   <div class=""
	   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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