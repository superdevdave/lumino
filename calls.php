<?php


	


include("head.php");

include("dbconn3.php");
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">Call Log</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Calls</h1> <button class="btn btn-default" data-toggle="modal"  data-target="#addOppModal"><span class="fa fa-add"></span><em class="fa fa-plus color-red"> </em> Schedule A Call</button> <button class="btn btn-default" data-toggle="modal" data-target="#editOppModal"><em class="fa fa-edit color-red"> </em> Edit Call Details</button> <button class="btn btn-default" data-toggle="modal" data-target="#closeOppModal"><em class="fa fa-check color-red"> </em> Close Call</button> <button class="btn btn-default" data-toggle="modal" data-target="#cancelOppModal"><em class="fa fa-ban color-red"> </em> Cancel Scheduled Call</button>
				
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
$dbname = "innovent";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
$sql = "SELECT id, opportunity_name, sales_rep FROM opportunity";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
		echo mysql_error();
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["opportunity_name"]. " " . $row["sales_rep"]. "<br>";
    }
} else {
    echo "0 results";
	echo mysql_error();
}
	echo mysql_error();
	echo "test";
$conn->close(); */

$query = "SELECT * FROM opportunity"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">"; // start a table tag in the HTML
echo "<thead><tr><th>ID</th><th>Opportunity Name</th><th>Opportunity Status</th><th>Sales Rep</th><th>Customer</th><th>Sales Type</th></th><th>RentalAmount</th><th>Units</th><th>Description</th><th>ContactPerson</th><th>Email</th><th>PhoneNumber</th><th>LeadSource</th><th>Maturity Date</th><th>Date Initiated</th><th>No Of Laptops</th><th>No Of Desktops</th><th>No of Servers</th><th>No Of Projectors</th><th>Networking Equipment</th><th>Monitors</th><th>Reason for Cancellation</th></tr></thead><tbody>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>". $row['id']."</td><td>".$row['opportunity_name']."</td><td>".$row['status']."</td><td>".$row['sales_rep']."</td><td>".$row['customer']."</td><td>".$row['sales_type']."</td><td>".$row['rental_amount']."</td><td>".$row['units_sold']."</td><td>".$row['description']."</td><td>".$row['contact_name']."</td><td>".$row['email']."</td><td>".$row['mobile']."</td><td>".$row['leads_source']."</td><td>".$row['MaturityDate']."</td><td>".$row['DateInitiated']."</td><td>".$row['laptops']."</td><td>".$row['desktops']."</td><td>".$row['servers']."</td><td>".$row['projectors']."</td><td>".$row['networking']."</td><td>".$row['monitors']."</td><td>".$row['Reason']."</td></tr>";  //$row['index'] the index here is a field name
}

echo "</tbody></table>"; //Close the table in HTML

?>

<!-- Add Opportunity Modal -->
<div id="addOppModal" class="modal fade" data-backdrop="static" role="dialog">
  <div class="modal-dialog" data-backdrop="static">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Opportunity</h4>
      </div>
      <div class="modal-body">
        <form id="addOppForm" method="post" action="process.php?action=addOpp">
  <div class="form-group">
    <label for="OpportunityName">Opportunity Title</label>
    <input required type="text" class="form-control" name="OpportunityName" id="OpportunityName" placeholder="Name of Opportunity">
  </div>
  
    <div class="form-group">
    <label for="OpportunityName">Organisation/Company Name</label>
    <input required type="text" class="form-control" name="Organisation" id="Organisation" placeholder="Organisation/Company Name">
  </div>
  
  <div class="form-group">
    <label for="SalesType">Sales Type</label>
 <select required class="form-control" name="SalesType" id="SalesType">
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
	
		 <div class="form-group">
    <label for="LeadSource">Lead Source</label>
 <select required class="form-control" name="LeadSource" id="LeadSource">
      <option value="Website">Website</option>
      <option value="Newspaper Ads">Newspaper Ads</option>
	   <option value="Online Ads">Online Ads</option>
	   <option value="Television Ads">Television Ads</option>
	   <option value="Social Media">Social Media</option>
	   <option value="Online Classifieds">Online Classifieds</option>
	      <option value="Conferences">Conferences e.g Naph Nash ICT Africa</option>
      <option value="Refferal">Refferal</option>
      <option value="Email Marketing">Email Marketing</option>
	    <option value="SMS Marketing">SMS Marketing</option>
		<option value="Tender Invitation">Tender Invitation</option>
      <option value="Cold Calling">Cold Calling</option>
	   <option value="">Other specify below</option>
    </select> </div>
	
	<div class="form-group">
    <label for="OtherLeadSource">LeadSource Detail</label>
    <input required type="text" class="form-control" name="OtherLeadSource" id="OtherLeadSource" placeholder="0">
  </div>
  
     <div class="form-group">
    <label for="Laptops">No of Laptops</label>
    <input required type="number" min="0" class="form-control" name="Laptops" id="Laptops" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Desktops">No of Desktops</label>
    <input required type="number" min="0" class="form-control" name="Desktops" id="Desktops" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Desktops">No of Servers</label>
    <input required type="number" min="0" class="form-control" name="Servers" id="Servers" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Monitors">No of Monitors</label>
    <input required type="number" min="0"" class="form-control" name="Monitors" id="Monitors" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Projectors">No of Projectors</label>
    <input required type="number" min="0" class="form-control" name="Projectors" id="Projectors" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Projectors">Networking Equipment</label>
    <input required type="number" min="0" class="form-control" name="Networking" id="Networking" placeholder="0">
  </div>
      <div class="form-group">
    <label for="RentalAmount">RentalAmount</label>
    <strong>$</strong><input required type="number" min="0"  class="form-control" name="RentalAmount" id="RentalAmount">
	
  </div>
   <div class="form-group">
    <label for="MaturityDate">Expected Maturity Date</label>
    <input required type="date" class="form-control" name="MaturityDate" id="MaturityDate" placeholder="Expected Date of Oppoturnity Maturity">
  </div>
     <div class="form-group">
    <label for="ContactPerson">Contact Person</label>
    <input type="text" class="form-control" name="ContactPerson" id="ContactPerson" placeholder="Full Name of Contact">
  </div>
       <div class="form-group">
    <label for="ContactPhone">Contact Phone</label>
    <input type="text" class="form-control" name="ContactPhone" id="ContactPhone" placeholder="Phone...Optional">
  </div>
     <div class="form-group">
    <label for="ContactEmail">Contact Email</label>
    <input type="email" class="form-control" name="ContactEmail" id="ContactEmail" placeholder="Email...Optional">
  </div>
   <div class="form-group">
    <label for="Description">Description & Notes</label>
<textarea class="form-control" rows="3" name="Description id="Description">
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
        <form id="editOppForm" method="post" action="process.php?action=editOpp">
	
<input type="hidden" name="edOpportunityID" id="edOpportunityID">

		
  <div class="form-group">
    <label for="OpportunityName">Opportunity Title</label>
    <input required type="text" class="form-control" name="edOpportunityName" id="edOpportunityName">
  </div>
  
    <div class="form-group">
    <label for="OpportunityName">Organisation/Company Name</label>
    <input required type="text" class="form-control" name="edOrganisation" id="edOrganisation" placeholder="Organisation/Company Name">
  </div>
  
  <div class="form-group">
    <label for="SalesType">Sales Type</label>
 <select required class="form-control" name="edSalesType" id="edSalesType">
      <option>Daily Rental</option>
      <option>Weekly Rental</option>
	   <option>Monthly Rental</option>
	   <option>Quartely Rental</option>
	   <option>Termly Rental</option>
	      <option>Yearly Rental</option>
      <option>Hire Purchase</option>
      <option>Outright Sales</option>
      <option>Donation</option>
	   <option>Other</option>
    </select> </div>
	
	 <div class="form-group">
    <label for="LeadSource">Lead Source</label>
 <select required class="form-control" name="edLeadSource" id="edLeadSource">
      <option value="Website">Website</option>
      <option value="Newspaper Ads">Newspaper Ads</option>
	   <option value="Online Ads">Online Ads</option>
	   <option value="Television Ads">Television Ads</option>
	   <option value="Social Media">Social Media</option>
	   <option value="Online Classifieds">Online Classifieds</option>
	      <option value="Conferences">Conferences e.g Naph Nash ICT Africa</option>
      <option value="Refferal">Refferal</option>
      <option value="Email Marketing">Email Marketing</option>
	    <option value="SMS Marketing">SMS Marketing</option>
		<option value="Tender Invitatiob">Tender Invitation</option>
      <option value="Cold Calling">Cold Calling</option>
	   <option value="">Other specify below</option>
    </select> </div>
	
	<div class="form-group">
    <label for="Laptops">Other LeadSource</label>
    <input required type="text" class="form-control" id="edOtherLeadSource" placeholder="0">
  </div>

     <div class="form-group">
    <label for="Laptops">No of Laptops</label>
    <input required type="text" class="form-control" name="edLaptops" id="edLaptops" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Desktops">No of Desktops</label>
    <input required type="text" class="form-control" name="edDesktops" id="edDesktops" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Desktops">No of Servers</label>
    <input required type="text" class="form-control" id="edServers" name="edServers" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Monitors">No of Monitors</label>
    <input required type="text" class="form-control" namne="edMonitors" id="edMonitors" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Projectors">No of Projectors</label>
    <input required type="text" class="form-control" name="edProjectors" id="edProjectors" placeholder="0">
  </div>
   <div class="form-group">
    <label for="Projectors">Networking Equipment</label>
    <input required type="text" class="form-control" name="edNetworking" id="edNetworking" placeholder="0">
  </div>
      <div class="form-group">
    <label for="RentalAmount">RentalAmount</label>
    <input required type="text" class="form-control" name="edRentalAmount" id="edRentalAmount" placeholder="$ Potential Revenue">
  </div>
   <div class="form-group">
    <label for="MaturityDate">Expected Maturity Date</label>
    <input required type="text" class="form-control" name="edMaturityDate" id="edMaturityDate" placeholder="Expected Date of Oppoturnity Maturity">
  </div>
     <div class="form-group">
    <label for="ContactPerson">Contact Person</label>
    <input type="text" class="form-control" name="edContactPerson" id="edContactPerson" placeholder="Full Name of Contact">
  </div>
       <div class="form-group">
    <label for="ContactPhone">Contact Phone</label>
    <input type="text" class="form-control" name="edContactPhone" id="edContactPhone" placeholder="Phone...Optional">
  </div>
     <div class="form-group">
    <label for="ContactEmail">Contact Email</label>
    <input type="text" class="form-control" name="edContactEmail" id="edContactEmail" placeholder="Email...Optional">
  </div>
   <div class="form-group">
    <label for="Description">Description & Notes</label>
<textarea class="form-control" rows="3" name="edDescription" id="edDescription">
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
       <form method="post" action="process.php?action=CloseOpp">
	   <div class="form-group">

	   <form id="CloseOppForm" method="post" action="process.php?action=CloseOpp">
	   <input type="hidden" name="CloseOppID" id="CloseOppID">
	   	   <div class="form-group">
	   <label for="contractsigned">MRA Contract signed</label>
	   <input class="form-control" required type="checkbox" id="contractsigned" value="Yes" name="contractsigned">
	   
	      </div>
		  	   <div class="form-group">
	   	   <label for="goodsdelivered">Goods Delivered</label>
		   	   <input class="form-control" type="checkbox" id="goodsdelivered" value="Yes" name="goodsdelivered">
		   </div>
	   </div>
	     </div>
		  	   <div class="form-group">

		      <input id="btnSaveCloseModal" type="submit" class="btn btn-default" >
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
      

	    <form method="post" action="process.php?action=CancelOpp">
		<div class="form-group">
		<label for="Reason">Reason for Cancelled Opportunity</label>
		<input type="hidden" name="CancelOppID" id="CancelOppID">
		<textarea id="Reason" name="Reason"  required class="form-control" rows="3">
		</textarea>
		</div>
		<div class="form-group">
		<input type="submit" name="CloseOpportunity" id="BtnCloseOpportunity">
		</div>
	   </form>
	   

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