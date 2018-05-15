<?php

include("head.php");

?>

<?php
// Include dbconn.php file
include ("dbconn.php");
include ("dbconn3.php");

 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$role=$_POST["role"];
$title=$_POST["title"];
$fullname=$_POST["fullname"];
$status="Active";
$email=$_POST["email"];


    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have at least 6 characters";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
  //  if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
       // $sql = "INSERT INTO users (Username, password,Role,FullName,Title,Status,Email) VALUES (?,?,?,?,?,?,?)";
	   $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
		$sql="INSERT INTO users(Username,password,Role,FullName,Title,Status,Email) VALUES('$username','$param_password','$role','$fullname','$title','$status','$email')";
         
       /* if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
          //  mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password,$param_role,$param_fullname,$param_title,$param_status,$param_email);
            
            // Set parameters
            $param_username = $username;
			
			$param_role=$role;
			$param_fullname=$fullname;
			$param_title=$title;
			$param_status=$status;
			$param_email=$email;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
				echo mysql_error($link);
                echo "Something went wrong. Please try again later here.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
	*/
	mysql_query($sql);
	if (mysql_error($connection)
	{
	    header("location: user_management.php");
	}
	else{
	echo mysql_error($connection);
	}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<center>
    <div class="wrapper">
        <h2>Sign Up a New User</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input required type="text" name="Username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>   
			<div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                <label>FullName</label>
                <input required  type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                <span class="help-block"><?php echo $fullname_err; ?></span>
            </div>			
						<div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
                <label>Role</label>
                <select required class="form-control" name="edLeadSource" id="edLeadSource">
      <option value="Manager">Sales Manager</option>
      <option value="SalesRep">Sales Rep</option>
	   <option value="User">Normal User</option>
	      <option value="Manager">Administrator</option>
    </select>
                <span class="help-block"><?php echo $role_err; ?></span>
            </div>			
						<div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                <label>Job Title</label>
                <input required type="text" name="title" class="form-control" value="<?php echo $fullname; ?>">
                <span class="help-block"><?php echo $title_err; ?></span>
            </div>	
						<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input required type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>	
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input required type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input required type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Submit">
                <input type="reset" class="btn btn-danger" value="Reset">
            </div>
            
        </form>
    </div>   
</center>
</body>
</html>

<?php

include("footer.php");

?>
