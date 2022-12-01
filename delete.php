<?php
session_start();
if(!isset($_SESSION['user'])) 
{
	header("location:login.php");
}
$id=$_REQUEST['id'];
$con=mysqli_connect("localhost","root","","blog");
$qry=mysqli_query($con,"delete from post where id='$id'");
header("location:profile.php");
?>