<?php
session_start();
include './ss.php';
include './dbconnect.php';
$userid="";
if(isset($_SESSION["usertype"])){
	if($_SESSION["usertype"]=="faculty"){
		header('location:faculty.php');
	}else if($_SESSION["usertype"]=="counsellor"){
		header('location:counsellor.php');
	}else if($_SESSION["usertype"]=="student"){
		header('location:student.php');
	}
}else{
	header('location:index.php');
}
if(isset($_SESSION["userid"])){
	$userid=$_SESSION["userid"];
}else{
	header('location:index.php');	
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
	<a href="index.php"><h1 class="heading" style="font-size: 2.2em">PSYCHOLOGICAl<br>CENTER</h1></a>

	<header style="background-color: #144c52;position: relative;width: 97%;left: 0;height: 45px;border-radius: 0px 20px 20px 0px;margin-top: 1em;">
		<a class="hh" href="admin.php">Counselling Requests</a>
		<a class="hh" href="adminhistory.php">Counselling History</a>
		<a class="hh" href="logout.php">Logout</a>
	</header>
	<br><br>

	<center>
		<div class="ui container teal segment" style="width: 60%;border-radius: 30px;border:0px solid white;background-color: rgba(255,255,255,0.05);">
		<h1  class="ui piled segment big header">Counselling Requests</h1>
		<div class="ui horizontal divider">
			Students
		</div><br>
		<form class="ui form" action="viewhistoryadmin.php" method="post">
			<div class="fields">
				<div class="two wide field">
					<label>Problemm ID</label>
				</div>
				<div class="two wide field">
					<label>Student ID</label>
				</div>
				<div class="five wide field">
					<label>Student Name</label>
				</div>
			</div>
		<?php
			$sql="select *from student s,admin a where s.studentid=a.studentid";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					$problemid=$row["problemid"];
					$studentid=$row["studentid"];
					$studentname=$row["firstname"]." ".$row["lastname"];
					echo "<div class='fields'>
				<div class='two wide field'>
					<input type='text' value='$problemid' style='padding:10px' >
				</div>
				<div class='two wide field'>
					<input type='text' value='$studentid' style='padding:10px' >
				</div>
				<div class='five wide field'>
					<input type='text' value='$studentname' style='padding:10px' >
				</div>
				<div class='two wide field'>
					<button type='submit' value='$problemid' name='problemid' class='ui button'>View</button>					
				</div>
			</div>";
				}
			}
		?>
			
			
		</form>

<br>
</div>
</center>
</body>

</html>