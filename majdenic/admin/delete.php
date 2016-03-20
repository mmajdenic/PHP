<?php
include ("includes/connect.php");

if(isset($_GET['delete'])) {

	$delete_id = $_GET['delete'];
	
	$delete_query = "delete from posts where post_id='$delete_id' ";
	
	if(mysql_query($delete_query)){
	
	echo "<script>alert('Post Has been Deleted')</script>";
	echo "<script>window.open('view_posts.php','_self')</script>";
	
	}


}


?>