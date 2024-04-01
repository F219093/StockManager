<?php
include('db.php');
 $id=mysqli_real_escape_string($con,$_GET['id']);
 mysqli_query($con,"update user set status='1' where id='$id'")
ecgo "your accunt verified";
?>
    <a href="login.php"> Click here</a>
