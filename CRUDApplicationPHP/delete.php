<html>
<head>
<title></title>
</head>
<body>
<?php
	$id = $_GET['ID'];
	$con = mysqli_connect("localhost","root","","crud");
	$delete= mysqli_query($con,"DELETE FROM `registe` WHERE `ID` = '$id'");
	if($delete == true)
	{
		echo "<script>alert('Deleted Successfully!')</script>";
		echo "<script>window.location='CRUD.php'</script>";
	}
	else
	{
		echo "<script>alert('Problem in Deleting the Recored')</script>";
	}

?>
</body>
</html>