<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<a href="login.php" style="float: right;">login</a>
	<table width="1350"; border="1">
		<tr>
			<td>id</td><td>title</td><td>content</td>
		</tr>
	
	<?php
	$i=1;
	$con=mysqli_connect("localhost","root","","blog"); 
	$qry=mysqli_query($con,"select * from post inner join login on post.user_id=login.id");
	while($row=mysqli_fetch_array($qry))
	{
		extract($row);
	?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $title;?></td>
		<td><?php echo $content;?></td>
		
	</tr>
	<?php
	$i++;
	}
	?>
	</table>
</body>
</html>