<?php

include("head.php");?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">Meetings</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Meetings</h1> <button class="btn btn-default" data-toggle="modal"  data-target="#addMeetingModal"><span class="fa fa-add"></span><em class="fa fa-calendar color-red"></em> Schedule A Meeting</button> <button class="btn btn-default" data-toggle="modal" data-target="#edMeetingModal"><em class="fa fa-edit color-red"></em> Edit Meeting</button> <button data-toggle="modal" data-target="#cancelMeetingModal" class="btn btn-default"><em class="fa fa-times color-red"></em> Cancel Meeting</button> <button data-toggle="modal" data-target="#finishMeetingModal"class="btn btn-default"><em class="fa fa-check color-red"></em> Finish Meeting</button>
				
			</div>
		</div><!--/.row-->
		
			<div class="row">
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
include("dbconn.php");
include("dbconn3.php");
	
$query = "SELECT * FROM meetings where User='".$_SESSION['salesrep']."'"; //You don't need a ; like you do in SQL
$result = mysql_query($query);
$connection;

echo mysql_error($connection);

echo "<table id=\"example3\" class=\"display\" cellspacing=\"0\" width=\"100%\">"; // start a table tag in the HTML
echo "<thead><tr><th>ID</th><th>Title</th><th>Description</th> <th>Customer</th><th>Location</th><th>Scheduled Date</th><th>End Date/Time</th><th>Status</th><th>Outcome</th><th>Reminder Starts</th><th>Reason for Cancellation</th></tr></thead>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tbody><tr><td>" . $row['ID'] . "</td><td>" . $row['Title'] . "</td><td>".$row['Description'] ."</td><td>".$row['Customer'] . "</td><td>".$row['Location'] . "</td><td>".$row['StartDate'] . "</td><td>".$row['EndDate'] . "</td><td>".$row['Status'] . "</td><td>".$row['Outcome'] . "</td><td>".$row['ReminderStart'] . "</td><td>".$row['Reason'] . "</td></tr></tbody>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

?>

</div>
</div>
</div>

<div id="edMeetingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Meeting/Appointment</h4>
      </div>
      <div class="modal-body">
       <form method="post" id="editMeetingForm" action="process.php">
	   <input type="hidden" id="action" name="action" value="editMeeting">
	   <div class="form-group">

	   
	   <input type="hidden" name="MeetingID" id="MeetingID">
	   	   <div class="form-group">
	   <label for="contractsigned">Meeting Subject</label>
	   <input class="form-control" required type="text" id="edSubject" placeholder="Meeting Subject/Title" name="edSubject">
	      </div>
		  	   <div class="form-group">
	   	   <label for="goodsdelivered">Customer</label>
		   	   <input class="form-control" required type="text" id="edCustomer" placeholder="Customer Organisation" name="edCustomer">
		   </div>
	   </div>
	   	   <div class="form-group">
	   	   <label for="goodsdelivered">Contact Person(s)</label>
		   	   <input class="form-control" required type="text" id="edContactPerson" placeholder="Contact Person" name="edContactPerson">
		   </div>
		     <div class="form-group">
	   	   <label for="goodsdelivered">Location</label>
		   	   <input class="form-control" required type="text" id="edLocation" placeholder="Location" name="edLocation">
		   </div>
	      <div class="form-group">
	   	   <label for="goodsdelivered">Start Date & Time</label>
		   	   <input class="form-control" required type="datetime-local" id="edStartTime" name="edStartTime">
		   </div>
		   	   	   <label for="goodsdelivered">End Date &  Time</label>
		   	   <input class="form-control" required type="datetime-local" id="edEndDate"  name="edEndDate">
			     <label for="goodsdelivered">Reminder Starts</label>
		   	   <input class="form-control" required type="datetime-local" id="edReminderDate"  name="edReminderDate">
		   </div>
		  
		 <div class="form-group">
	   	   <label for="goodsdelivered">Description</label>
		   <textarea class="form-control" rows="3"  id="eddDescription" required   name="eddDescription">
		   </textarea>
		   </div>
	     </div>
		  </div>
		  
		  <div class="modal-footer">
	

		      <button id="btnEditMeeting"   class="btn btn-default" >Save</button>
		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</form>
      </div>
		  
	   </div>

</div>

<div id="addMeetingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Schedule  New Meeting/Appointment</h4>
      </div>
      <div class="modal-body">
       <form method="post" id="addMeetingForm" action="process.php">
	   <input type="hidden" id="action" name="action" value="addMeeting">
	   <div class="form-group">

	   
	   <input type="hidden" name="CloseOppID" id="CloseOppID">
	   	   <div class="form-group">
	   <label for="contractsigned">Meeting Subject</label>
	   <input class="form-control" required type="text" id="Subject" placeholder="Meeting Subject/Title" name="Subject">
	      </div>
		  	   <div class="form-group">
	   	   <label for="goodsdelivered">Customer</label>
		   	   <input class="form-control" required type="text" id="Customer" placeholder="Customer Organisation" name="Customer">
		   </div>
	   </div>
	   	   <div class="form-group">
	   	   <label for="goodsdelivered">Contact Person(s)</label>
		   	   <input class="form-control" required type="text" id="ContactPerson" placeholder="Contact Person" name="ContactPerson">
		   </div>
		     <div class="form-group">
	   	   <label for="goodsdelivered">Location</label>
		   	   <input class="form-control" required type="text" id="Location" placeholder="Location" name="Location">
		   </div>
	      <div class="form-group">
	   	   <label for="goodsdelivered">Start Date & Time</label>
		   	   <input class="form-control" required type="datetime-local" id="StartTime" name="StartTime">
		   </div>
		   	   	   <label for="goodsdelivered">End Date &  Time</label>
		   	   <input class="form-control" required type="datetime-local" id="EndDate"  name="EndDate">
			     <label for="goodsdelivered">Reminder Starts</label>
		   	   <input class="form-control" required type="datetime-local" id="ReminderDate"  name="ReminderDate">
		   </div>
		  
		 <div class="form-group">
	   	   <label for="goodsdelivered">Description</label>
		   <textarea class="form-control" rows="3"  id="Description" required  placeholder="Description" name="Description">
		   </textarea>
		   </div>
	     </div>
		  </div>
		  
		  <div class="modal-footer">
	

		      <button id="btnAddMeeting"   class="btn btn-default" >Save</button>
		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			   </form>
      </div>
		  
	   </div>
	   </div>
	         

      </div>

    </div>


  </div>
</div>
</div>

<div id="finishMeetingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Finish/Close Meeting</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="process.php">
	      <input type="hidden" id="action" name="action" value="finishMeeting">
	   <div class="form-group">

	   		  
		 <div class="form-group">
	   	   <label for="goodsdelivered">Outcome</label>
		   <textarea class="form-control" rows="3"  id="fnDescription"  placeholder="fnDescription" name="fnDescription">
		   </textarea>
		   </div>
	     </div>
		  </div>
		  
		  <div class="modal-footer">
	

		      <input id="btnSaveCloseModal" type="submit" class="btn btn-default" >
		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		   </form>
      </div>
		  
	   </div>
	   </div>
	         
	
      </div>


<div id="cancelMeetingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cancel Meeting/Appointment</h4>
      </div>
      <div class="modal-body">
       <form id="cancelMeetingForm" name="cancelMeetingForm" method="post" action="process.php">
	      <input type="hidden" id="action" name="action" value="cancelMeeting">
	   <div class="form-group">

		 <div class="form-group">
	   	   <label for="goodsdelivered">Reason</label>
		   <textarea class="form-control" rows="3"  id="canDescription"  placeholder="Reason for cancellation" name="canDescription">
		   </textarea>
		   </div>
	     </div>
		  </div>
		 
		  <div class="modal-footer">
	

		      <button id="btnCancelMeeting"  class="btn btn-default" >Save2</button>
		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </form>
      </div>
		  
	   </div>
	   </div>
	         
	
      </div>



		  
		 
		  </div>
		 
   
		  
	   </div>
	   </div>
	         
	   </form>
      </div>




<?php
include("footer.php");

?>
<script type="text/javascript">
$(window).load(function() {

    $('#example').DataTable();
	$('#example3').DataTable();
});
</script>


