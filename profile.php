<?php 
session_start();
if(!isset($_SESSION['user']))
{
	header("location:login.php");
}
$email=$_SESSION['user'];
$con=mysqli_connect("localhost","root","","blog");
$qry=mysqli_query($con,"select * from login where email='$email'");
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
	<a href="logout.php">logout</a>
	<table>
	<form method="post" action="" onsubmit="return validation()">
		<tr>
			<td>Title:</td><td><input type="text" name="title"></td><td><span id="title_err"></span></td>
		</tr>
		<tr>
			<td>Content:</td><td><input type="text" name="content"></td><td><span id="content_err"></span></td>
		</tr>
		<tr>
			<td><input type="submit" name="save" value="save"></td>
		</tr>
	</form>
</table>
<?php 
if(isset($_REQUEST['save']))
{
	$title=$_REQUEST['title'];
	$content=$_REQUEST['content'];

	$con=mysqli_connect("localhost","root","","blog");
	$qry=mysqli_query($con,"insert into post(title,content,user_id)values('$title','$content',$id)");
}
?>
<table width="1350" border="1">
	<tr>
		<td>id</td><td>title</td><td>content</td><td>delete</td><td>edit</td>
	</tr>
	<?php
	$con=mysqli_connect("localhost","root","","blog");
	$qry=mysqli_query($con,"select * from post where user_id='$id'");
	while($row=mysqli_fetch_array($qry))
	{
		extract($row);
	?>
	<tr>
		<td><?php echo $id;?></td>
		<td><?php echo $title;?></td>
		<td><?php echo $content;?></td>
		<td><a href="delete.php?id=<?php echo $id; ?>">delete</a></td>
		<td><a href="edit.php?id=<?php echo $id; ?>">edit</a></td>
	<?php
	}

	?>
</table>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
	function validation()
	{
		var title=$("input[name=title]").val();
		var content=$("input[name=content]").val();
		if(title.length=='0')
		{
			$("#title_err").html('Please fill title');
			return false;
		}
		if(content.length=='0')
		{
			$("#content_err").html('Please fill content');
			return false;
		}
	}
</script>
</body>
</html>

