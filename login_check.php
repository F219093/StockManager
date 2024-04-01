<?php
include('db.php');
session_start();
if(isset($_POST['email']) && $_POST['password']){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$res=mysqli_query($con,"select * from user where email='$email' and password='$password'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$status=$row['status'];
		if($status==0){
			echo "Your account is not verified. Contact with your admin to verfiy it.";
		}else{
			echo "done";
			$_SESSION['IS_LOGIN']=1;
		}
	}else{
		echo "Please enter corect login details";
	}
}
?>
