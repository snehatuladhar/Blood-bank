<?php
include('Connection.php');
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exchange Blood Group</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header"><h2 align="center"><a href="admin-home.php" style="text-decoration:none;color: white; ">Blood Bank Management System</a></h2></div>
		<div id="body">
			<?php
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1>Exchange Blood Group</h1>
			<center><div id="form">
				<form action="" method="post">
					<table>
					<tr>
						<td width="200px" height="50px">Enter Name</td>
						<td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
						<td width="200px" height="50px">Enter Father's Name</td>
						<td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father's Name"></td>
					</tr>
					<tr>
						<td width="200px" height="50px">Enter Address</td>
						<td width="200px" height="50px"><textarea name="address"></textarea></td>
						<td width="200px" height="50px">Enter City</td>
						<td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
					</tr>
					<tr>
						<td width="200px" height="50px">Enter Age</td>
						<td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></td>
						<td width="200px" height="50px">Enter E-mail</td>
						<td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail"></td>
						
					</tr>
					<tr>
						
						<td width="200px" height="50px">Mobile Number</td>
						<td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No">
					</td>
					</tr>
					<tr>
						<td width="200px" height="50px">Sel Blood Group</td>
							<td width="200px" height="50px">
								<select name="bgroup">
									<option>o+</option>
									<option>A+</option>
									<option>B+</option>
								</select>
						</td>
						<td width="200px" height="50px">X Blood Group</td>
							<td width="200px" height="50px">
								<select name="exbgroup">
									<option>o+</option>
									<option>A+</option>
									<option>B+</option>
								</select>
						</td>
					</tr>	
					<tr>
						<td><input type="submit" name="sub" value="save"></td>
					</tr>
					</table>
				</form>
				<?php
				if(isset($_POST['sub']))
				{
					$name=$_POST['name'];
					$fname=$_POST['fname'];
					$address=$_POST['address'];
					$city=$_POST['city'];
					$age=$_POST['age'];
					$bgroup=$_POST['bgroup'];
					$email=$_POST['email'];
					$mno=$_POST['mno'];
					$exbgroup=$_POST['exbgroup'];
					$q2="select * from donor_registration where bgroup='$bgroup'";
					$st=$db->query($q2);
					$num_row=$st->fetch();
					$id=$num_row['id'];
					$name=$num_row['fname'];
					$b1=$num_row['bgroup'];
					$q="INSERT INTO our_stock_b (bname,name,mno) value(?,?,?)";
					$st1=$db->prepare($q);
					$st1->execute([$b1,$name,$mno]);
					$delete_q="delete from donor_registration where id='$id'";
					$st1=$db->prepare($delete_q);
					$st1->execute(); 
					$q=$db->prepare("INSERT INTO exchange_b(name,fname,address,city,age,bgroup,email,mno,exbgroup)VALUES 
						(:name,:fname,:address,:city,:age,:bgroup,:email,:mno,:exbgroup)");
					$q->bindValue('name',$name);
					$q->bindValue('fname',$fname);
					$q->bindValue('address',$address);
					$q->bindValue('city',$city);
					$q->bindValue('age',$age);
					$q->bindValue('bgroup',$bgroup);
					$q->bindValue('email',$email);
					$q->bindValue('mno',$mno);
					$q->bindValue('exbgroup',$exbgroup);
					if($q->execute())
					{
						echo "<script>alert('Exchange Successful')</script>";
					}
					else
					{
						echo "<script>alert('Exchange Unsuccessful')</script>";	
					}
				}
				?>


			</div></center>
		
		</div>
		</div>
		<div id="footer"><h4 align="center">For more information Contact Us: 9813064454,9845645654</h4>
			<p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
		</div>
</div>
</body>
</html>