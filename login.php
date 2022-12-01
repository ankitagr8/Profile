<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<table>
		<form method="post" action="">
			<tr>
				<td>Email:</td><td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Password:</td><td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="save" value="save"></td>
			</tr>
		</form>
	</table>
	<?php 
	if(isset($_REQUEST['save']))
	{
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		$con=mysqli_connect("localhost","root","","blog");
		$qry=mysqli_query($con,"select * from login where email='$email' and password='$password'");
		$row=mysqli_fetch_array($qry);
		if($row)
		{
			session_start();
			$_SESSION['user']=$email;
			header("location:profile.php");

		}
		else
		{
			echo "not login";
		}
	}
	?>

</body>
</html>