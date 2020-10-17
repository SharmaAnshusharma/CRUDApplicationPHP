<html>
<head>
	<title>CRUD Application</title>
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
	<form method="post">
        
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<h1><center><i>CRUD Application</i></center></h1>
					<br><br>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Name</span>
						</div>
						<input type="text" name="name" class="form-control">
					
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
						<input type="email" name="email" class="form-control">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Contact</span>
						</div>
						<input type="tel" name="contact" class="form-control">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Address</span>
						</div>
						<input type="text" name="address" class="form-control">
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
				</div>
				<div class="col-sm-9">
				<br><br><br><br>
				<div class="container">
				<?php
						if(isset($_POST['view']))
						{
							$con = mysqli_connect("localhost","root","","crud");
							$insert = mysqli_query($con,"SELECT * FROM `registe`");
							echo "<table class='table table-striped'>";
							echo "<tr>";
							echo "<th>Name</th>";echo "<th>Gender</th>";echo "<th>Email</th>";echo "<th>Contact</th>";echo "<th>Address</th>";echo "<th>Country</th>";echo "<th>Language</th>";
							echo "<th>Operation </th>";echo "<th>Operation </th>";
							echo "</tr>";
							while($row = mysqli_fetch_array($insert))
							{
								echo "<tr>";
								echo "<td>";echo $row['Name'];echo "</td>";
								echo "<td>";echo $row['Gender'];echo "</td>";
								echo "<td>";echo $row['Email'];echo "</td>";
								echo "<td>";echo $row['Contact'];echo "</td>";
								echo "<td>";echo $row['Address'];echo "</td>";
								echo "<td>";echo $row['Country'];echo "</td>";
								echo "<td>";echo $row['Language'];echo "</td>";
								echo "<td><a href='delete.php?ID=".$row['ID']."'class='btn btn-danger'>Delete</a></td>";
								echo "<td><a href='update.php?ID=".$row['ID']."'class='btn btn-success'>Update</a></td>";
								echo "</tr>";
							}
							echo "</table>";
						}

					?>					
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

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
	$con = mysqli_connect("localhost","root","","crud");
	$insert = mysqli_query($con,"INSERT INTO `registe`(`Name`, `Gender`, `Email`, `Contact`, `Address`, `Country`, `Language`) VALUES ('$name','$gen','$email','$contact','$address','$country','$language')");
	if($insert == true)
	{
		echo "<script>alert('Inserted Successfully')</script>";
	}
	else
	{
		echo "<script>alert('Not INSERTED!!!!!!')</script>";
	}
}

?>

