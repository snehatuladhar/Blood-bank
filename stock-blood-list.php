<?php
include('Connection.php');
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Blood List</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
	<style type="text/css">
		td{
			width: 200px;
			height: 40px;
		}
	</style>	
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header"><h2 align="center"><a href="admin-home.php" style="text-decoration:none;color: white; ">Blood Bank Management System</a></h2></div>
		<div id="body">
			<br>
			<?php
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1>Stock Blood List</h1>
			<center><div id="form">
				<table>
					<tr>
						<td><center><font color="blue"><b>Name</b></font></center></td>
						<td><center><font color="blue"><b>Quantity</b></font></center></td>						
					</tr>
				
					<tr>
						<td><center>o+</center></td>
						<td><center>
							<?php
							$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='o+'");
							echo $row=$q->rowcount();

							?>


						</center></td>						
					</tr>
					<tr>
						<td><center>A+</center></td>
						<td><center>
							<?php
							$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='A+'");
							echo $row=$q->rowcount();

							?>

						</center></td>						
					</tr>
					<tr>
						<td><center>B+</center></td>
						<td><center>
							<?php
							$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='B+'");
							echo $row=$q->rowcount();

							?>

							
						</center></td>						
					</tr>

				</table>

			</div></center>
		
		</div>
		</div>
		<div id="footer"><h4 align="center">For more information Contact Us: 9813064454,9845645654</h4>
			<p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
		</div>
</div>
</body>
</html>