<?php
include('connection.php');
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
		<div id="header"><h2 align="center">
			<a href="user/index.php" style="text-decoration: none; color: white;">Blood Bank Management System</a></h2></div>
		<div id="body">
			<br><br><br><br>
			<form action="" method="post">
			<table align="center">
				<tr>
					<td width="200 px" height="70px"><b>Enter Email</b></td>
					<td width="100 px" height="70px"><input type="email" name="un" placeholder="Enter Email" style="width:200px;height: 30px;border-radius: 10px;"></td>
				</tr>
				<tr>
					<td width="200 px" height="70px"><b>Enter Password</b></td>
					<td width="100 px" height="70px"><input type="password" name="ps" placeholder="Enter Password" style="width:200px;height: 30px;border-radius: 10px;">
				</td>
				<tr>
					<td><button type="submit" name="sub" value="Login" style="width: 70px;height: 30px;border-radius: 5px;">Login</td>
				</tr>
				</tr>
			</table>
			</form>
			<?php
			if(isset($_POST['sub']))
			{
				$un=$_POST['un'];
				$ps=$_POST['ps'];
				$q=$db->prepare("SELECT * FROM admin where uname='$un' && pass='$ps'");
				$q->execute();
				$res=$q->fetchALL(PDO::FETCH_OBJ);
				if($res)
				{
					$_SESSION['un']=$un;
					header("Location:admin-home.php");
				}
				else
				{
					echo "<script>alert('Incorrect User')</script>";
				}
			}	
			?>
		</div><br><br>
		<div id="footer"><h4 align="center"><a href="user/contact.php" style="text-decoration:none;color: white; ">For more information Contact Us: 9813064454,9845645654</a></h4></div>
</div>
</body>
</html>