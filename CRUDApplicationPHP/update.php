<html>
<head>
<title></title>
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
</head>
<body>
<div class="container">
<h1><center><i>Update Details</i></center></h1>
<?php
	$id = $_GET['ID'];
	$con = mysqli_connect("localhost","root","","crud");
	$select = mysqli_query($con,"SELECT * FROM `registe` WHERE `ID`= '$id'");
	$row = mysqli_fetch_array($select);
	?>
	<form method="post">
	<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Name</span>
						</div>
						<input type="text" name="name" class="form-control" value="<?php echo $row['Name'];?>">
					
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Gender</span>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">&nbsp 
								<input type="radio" name="gen" value="Male" class="form-check-input">Male &nbsp &nbsp  
								<input type="radio" name="gen" value="Female" class="form-check-input">Female
							</label>
						</div>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Email</span>
						</div>
						<input type="email" name="email" value="<?php echo $row['Email'];?>" class="form-control">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Contact</span>
						</div>
						<input type="tel" name="contact" class="form-control" value="<?php echo $row['Contact'];?>">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Address</span>
						</div>
						<input type="text" name="address" class="form-control" value="<?php echo $row['Address'];?>">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Country</span>
						</div>
						<select name="country" class="form-control">
							<option value="India">India</option>
							<option value="America">America</option>
							<option value="England">England</option>
							<option value="Japan">Japan</option>				
						</select>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Upload</span>
						</div>
						<input type="file" name="myfile" class="form-control">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Language</span>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">&nbsp
								<input type="checkbox" name="lang[]" value="Hindi" class="form-check-input">Hindi &nbsp &nbsp  
								<input type="checkbox" name="lang[]" value="English" class="form-check-input">English
							</label>
						</div>
					</div>
					<input type="submit" name="submit" value="Submit" class="btn btn-outline-primary col-sm-4 col-sm-8 col-sm-12"><br><br>
					<input type="submit" name="view" value="Show" class="btn btn-outline-success col-sm-4 col-sm-8 col-sm-12">	
	</form>
	</div>
	
	<?php

	if(isset($_POST['submit']))
	{	
	$name = $_POST['name'];
	$gen = $_POST['gen'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$l = $_POST['lang'];
	$language = "";
	foreach($l as $la)
	{
		$language = $la;
	}
		$delete= mysqli_query($con,"UPDATE `registe` SET `Name`='$name',`Gender`='$gen',`Email`='$email',`Contact`='$contact',`Address`='$address',`Country`='$country',`Language`='$language' WHERE 1");
		if($delete == true)
		{
			echo "<script>alert('Updated Successfully!')</script>";
			echo "<script>window.location='CRUD.php'</script>";
		}
		else
		{
			echo "<script>alert('Problem in Updating the Recored')</script>";
		}
	}
?>
</body>
</html>