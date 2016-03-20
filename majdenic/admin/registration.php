<html>
	<head>
		<title>Registration Form</title>
		</head>
		
<body>
<form method='post' action='registration.php'>

	<table width='400' border='5' align='center'>
	
		<tr>
			<td align='center' colspan ='5'><h1>Registration Form</h1></td>
		</tr>
	
		<tr>
			<td align='right'>User Name:</td>
			<td align='center'><input type='text' name='name'/></td>
		</tr>
			
		<tr>
			<td align='right'>User Password:</td>
			<td align='center'><input type='password' name='pass'/></td>
		</tr>
		
		<tr>
			<td align='right'>Email:</td>
			<td align='center'><input type='text' name='email'/></td>
		</tr>
		
		<tr>
			<td colspan='5' align='center'><input type='submit' name='submit' value='Sign Up'/></td>
		</tr>

		
		<tr>
			<td colspan='5' align='center'> <center><b>Already Registered, </b><a href='login.php'>Login Here</a></center> </td>
		</tr>

</form>


</body>
</html>


<?php
include("includes/connect.php");

	if (isset($_POST['submit'])){
	
	$user_name = $_POST['name'];
	$user_pass = $_POST['pass'];
	$user_email = $_POST['email'];
	
	if ($user_name==''){
	echo "<script>alert('Please enter your User name!')</script>";
	exit();
	}
	if ($user_pass==''){
	echo "<script>alert('Please enter your Password!')</script>";
	exit();
	}
	if ($user_email==''){
	echo "<script>alert('Please enter your email!')</script>";
	exit();
	}
	
	$check_email = "select * from admin_login where user_email='$user_email'";
	
	$run = mysql_query($check_email);
	
	if (mysql_num_rows($run)>0){
	
	echo "<script>alert('Email $user_email is already exist in our database, please try another one!')</script>";
	exit();
	}
	
	$query = "insert into admin_login (user_name, user_pass, user_email) values ('$user_name','$user_pass','$user_email')";
	
	if(mysql_query($query)){
	
	echo "<script>alert ('Registration successfully ')</script>";
	echo"<script>window.open('index.php','_self')</script>";
	
	}
	
	}


?>