<?php
include './ss.php';
include('./dbconnect.php');
session_start();
if(isset($_SESSION["usertype"])){
	if($_SESSION["usertype"]=="faculty"){
		header('location:faculty.php');
	}else if($_SESSION["usertype"]=="admin"){
		header('location:admin.php');
	}else if($_SESSION["usertype"]=="student"){
		header('location:student.php');
	}else if($_SESSION["usertype"]=="counsellor"){
		header('location:counsellor.php');
	}
}
$userid=$password=$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$userid=$_POST["userid"];
	$password=$_POST["password"];
}
if($userid!=""){
	$sql="select *from login where userid='$userid'";
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if($row["password"]==$password){
			$msg="success";
			$usertype=$row["usertype"];
			$_SESSION["userid"]=$row["userid"];
			$_SESSION["usertype"]=$usertype;
			if($usertype=="student"){
				header('location:student.php');
			}else if($usertype=="counsellor"){
				header('location:counsellor.php');
			}else if($usertype=="faculty"){
				header('location:faculty.php');
			}else if($usertype=="admin"){
				header('location:admin.php');
			}
		}
		else
		{
			$msg="wrong password";
		}
	}else{
		$msg="invalid user";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Psychological center</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<img src="rguktlogo.png" height="80em" style="margin-top: 0.7em;position: absolute;">
	<a href="index.php"><h1 class="heading" style="font-size: 2.2em">PSYCHOLOGICAl COUNSELLING<br>CENTER</h1></a>
	<header style="background-color: #144c52;position: relative;width: 97%;left: 0;height: 45px;border-radius: 0px 20px 20px 0px;margin-top: 1em;">
		<center><p style="color: white;font-size: 1.5em;position: relative;top: 0.3em">A right way to succeed your life</p></center>
	</header><center>
	<div class="ui container stacked segment " style="position: relative;top: 100px;width: 35%;"><br>
		<form class="ui form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
		<h1 >Login</h1><br>
		<input type="text" name="userid" placeholder="User Name"><br><br>
		<input type="password" name="password"  placeholder="Password"><br><br>
		<input type="submit" value="Login" class="
		ui blue button">
		</form>
		<h2 style="margin-top: 7px;color: red"><?php echo $msg;  ?></h2>
	</div></center>

</body>
</html>