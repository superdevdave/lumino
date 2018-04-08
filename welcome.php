<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to QrentCRM.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account     </a></p> 
	<br>
	<br>
	<br>
	
	<a href="dashboard.php" class="btn btn-danger">Proceed to My Dashboard     </a></p> 
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php if ($_SESSION['role']=="Administrator"||$_SESSION['role']=="Manager")
	echo "
	<a href=\"groupdashboard.php\" class=\"btn btn-danger\">Proceed to Group Dashboard</a></p> 
	
	";?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<img src="logo.png" alt="QrentCRM Logo" width="460" height="345">
	
</body>
</html>