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
				<h1 class="page-header">Meetings</h1> <button class="btn btn-default"><span class="fa fa-add"></span><em class="fa fa-calendar color-red"></em> Schedule A Meeting</button> <button class="btn btn-default"><em class="fa fa-edit color-red"></em> Edit Meeting</button> <button class="btn btn-default"><em class="fa fa-bullhorn color-red"></em> Send Meeting Invite</button> <button class="btn btn-default"><em class="fa fa-times color-red"></em> Cancel Meeting</button> <button class="btn btn-default"><em class="fa fa-check color-red"></em> Finish Meeting</button>
				
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

$query = "SELECT * FROM meetings"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">"; // start a table tag in the HTML
echo "<thead><tr><th>ID</th><th>Title</th><th>Description</th> <th>Customer</th><th>User</th><th>Scheduled Date</th><th>Status</th><th>Outcome</th><th>User</th></tr></thead>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tbody><tr><td>" . $row['id'] . "</td><td>" . $row['Title'] . "</td><td>".$row['Description'] ."</td><td>".$row['Customer'] . "</td><td>".$row['User'] . "</td><td>".$row['Date'] . "</td><td>".$row['Status'] . "</td><td>".$row['Outcome'] . "</td><td>".$row['User'] . "</td></tr></tbody>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

?>

</div>
</div>
</div>

<script type="text/javascript">
$(window).load(function() {
	alert('test');
    $('#example').DataTable();
} );
</script>


<?php
include("footer.php");




?>