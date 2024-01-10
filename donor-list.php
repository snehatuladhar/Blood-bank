<?php
include('Connection.php');
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donor List</title>
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
			<h1>Donor Resgitration</h1>
			<center><div id="form">
				<table>
					<tr>
						<td><center><font color="blue"><b>Name</b></font></center></td>
						<td><center><font color="blue"><b>Father's Name</b></font></center></td>
						<td><center><font color="blue"><b>Address</b></font></center></td>
						<td><center><font color="blue"><b>City</b></font></center></td>
						<td><center><font color="blue"><b>Age</b></font></center></td>
						<td><center><font color="blue"><b>Blood Group</b></font></center></td>
						<td><center><font color="blue"><b>Email</b></font></center></td>
						<td><center><font color="blue"><b>Mobile Number</b></font></center></td>
					</tr>
					<?php
					$q=$db->query("SELECT * FROM donor_registration");
					while($r1=$q->fetch(PDO::FETCH_OBJ))
					{
					?>
					<tr>
						<td><center><?=$r1->name;?></center></td>
						<td><center><?=$r1->fname;?></center></td>
						<td><center><?=$r1->address;?></center></td>
						<td><center><?=$r1->city;?></center></td>
						<td><center><?=$r1->age;?></center></td>
						<td><center><?=$r1->bgroup;?></center></td>
						<td><center><?=$r1->email;?></center></td>
						<td><center><?=$r1->mno;?></center></td>
						
					</tr>
					<?php
					}
					?>

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