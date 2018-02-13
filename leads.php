<?php

include("head.php");?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Leads</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Leads</h1> <button class="btn btn-default"><span class="fa fa-add"></span>Add New Lead</button> <button class="btn btn-default">Edit Lead</button>
				
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

$query = "SELECT * FROM leads"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table id=\"example\" class=\"table table-default\">"; // start a table tag in the HTML
echo "<tr><th>ID </th><th>Leads Name</th><th>Status</th> <th>Sales Rep</th><th> Customer</th><th> Sales Type</th><th> Product Category</th><th>Description</th><th>Email</th><th>Phone Number</th><th>Lead Source</th?</tr>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['id'] . "</td><td>" . $row['leads_name'] . "</td><td>".$row['status'] ."</td><td>".$row['sales_rep'] . "</td><td>".$row['customer'] . "</td><td>".$row['sales_type'] . "</td><td>".$row['product'] . "</td><td>".$row['description'] . "</td><td>".$row['email'] . "</td><td>".$row['mobile'] . "</td><td>".$row['leads_source'] . "</td><td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

?>

</div>
</div>
</div>



<?php
include("footer.php");




?>