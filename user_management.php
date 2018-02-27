<?php
// Include db.conn file
Include('head.php');

include('dbconn3.php');
?>







<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home color-red"></em>
				</a></li>
				<li class="active">User Management</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User Management</h1> <button class="btn btn-default" data-toggle="modal"  data-target="#addOppModal"><span class="fa fa-add"></span><em class="fa fa-plus color-red"> </em> Add New User</button> <button class="btn btn-default" data-toggle="modal" data-target="#editOppModal"><em class="fa fa-edit color-red"> </em> Edit User</button> <button class="btn btn-default" data-toggle="modal" data-target="#closeOppModal"><em class="fa fa-check color-red"> </em> Activate User</button> <button class="btn btn-default" data-toggle="modal" data-target="#cancelOppModal"><em class="fa fa-ban color-red"> </em> Suspend User</button>
				
			</div>
		</div><!--/.row-->
		
			<div class="row">
			<br>

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

$query = "SELECT * FROM users"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">"; // start a table tag in the HTML
echo "<thead><tr><th>ID</th><th>Opportunity Name</th><th>ID</th><th>UserName</th><th>FullName</th><th>Title</th><th>Role</th></th><th>Email</th></tr></thead><tbody>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>". $row['id']."</td><td>".$row['username']."</td><td>".$row['FullName']."</td><td>".$row['Title']."</td><td>".$row['Role']."</td><td>".$row['Email']."</td></tr>"; 
}
echo "</tbody></table>"; //Close the table in HTML
echo mysql_error($conenction);

?>
<?php

include("footer.php");

?>                             		                            