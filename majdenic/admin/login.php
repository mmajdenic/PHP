<?php

session_start();

?>

<html>
	<head>
		<title>Admin login</title>
		
	</head>
	
<body bgcolor="gray">


	<form method="post" action="login.php">
	
		<table width="400" border="10" align="center" bgcolor="white">
			
			<tr>
				<td bgcolor="yellow" colspan="4" align="center"><h1>Admin Login</h1></td>
			</tr>
			
			<tr>
				<td align="right">User Name:</td>
				<td><input type="pass" name="user_name"></tr>			
			</tr>
			<tr>
				<td align="right">User Password:</td>
				<td><input type="password" name="user_pass"></tr>			
			</tr>
			<tr>
				<td colspan="4" align="center"><input type="submit" name="login" value="Login"></tr>			
			</tr>
			
			<tr>
			<td colspan='5' align='center'> <center><b><font color='red'>Not registered yet? </font></b><a href='registration.php'>Sign Up Here</a></center> </td>
			</tr>
				
		</table>
	</form>



</body>
</html>


<?php
include("includes/connect.php");

if(isset($_POST['login'])){

	$user_name = mysql_real_escape_string ($_POST['user_name']);
	$user_pass = mysql_real_escape_string ($_POST['user_pass']);
	
	$encrypt = md5($user_password);
	
	$admin_query = "select * from admin_login where user_name='$user_name' AND user_pass='$user_pass'";

	$run = mysql_query($admin_query);
	
	if(mysql_num_rows($run)>0){
	
	$_SESSION['user_name']=$user_name;
	
	echo"<script>window.open('index.php','_self')</script>";
	}

	else {
	
	echo"<script>alert('User name or password is incorrect or missing!')</script>";
	
	}
}

?>