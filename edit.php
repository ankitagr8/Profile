<?php
session_start();
if(!isset($_SESSION['user'])) 
{
	header("location:login.php");
}
$id=$_REQUEST['id'];
$con=mysqli_connect("localhost","root","","blog");
$qry=mysqli_query($con,"select * from post where id='$id'");
$row=mysqli_fetch_array($qry);
extract($row);
?>
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
				<td>Title</td><td><input type="text" name="title" value="<?php echo $title; ?>"></td>
			</tr>
			<tr>
				<td>Content:</td><td><input type="text" name="content" value="<?php echo $content;?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="update"></td>
			</tr>
		</form>
	</table>
	<?php
	if(isset($_REQUEST['update'])) 
	{
		$title=$_REQUEST['title'];
		$content=$_REQUEST['content'];

		$con=mysqli_connect("localhost","root","","blog");
		$qry=mysqli_query($con,"update post set title='$title', content='$content' where id='$id'");
		header("location:profile.php");
	}
	?>

</body>
</html>