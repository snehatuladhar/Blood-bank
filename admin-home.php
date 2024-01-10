<?php
include('Connection.php');
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrative Login</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header"><h2 align="center"><a href="admin-home.php" style="text-decoration:none;color: white; ">Blood Bank Management System</h2></div>
		<div id="body">
			<br>
			<?php
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1>Welcome Admin</h1><br><br>
			<ul>
				<li><a href="donor-regd.php">Donor Registration</a></li>
				<li><a href="donor-list.php">Donor List</a></li><li>
					<a href="stock-blood-list.php">Stock Blood List</a></li>
			</ul><br><br><br><br><br>
			<ul>
				<li><a href="outstock-blood-list.php">Outstock Blood List</a></li>
				<li><a href="exchange-blood-list.php">Exchange Blood List</a></li>
			</ul>
		</div>
		</div>
		<div id="footer"><h4 align="center">For more information Contact Us: 9813064454,9845645654</h4>
			<p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
		</div>
</div>
</body>
</html>