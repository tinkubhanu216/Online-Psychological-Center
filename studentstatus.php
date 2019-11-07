<?php
include './ss.php';
include './dbconnect.php';
session_start();
$userid="";
if(isset($_SESSION["usertype"])){
	if($_SESSION["usertype"]=="faculty"){
		header('location:faculty.php');
	}else if($_SESSION["usertype"]=="admin"){
		header('location:admin.php');
	}else if($_SESSION["usertype"]=="counsellor"){
		header('location:counsellor.php');
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
		<a class="hh" href="student.php">Registration</a>
		<a class="hh" href="requestappointment.php">Request Appointment</a>
		<a class="hh" href="studentstatus.php">Check Status</a>
		<a class="hh" href="logout.php">Logout</a>
	</header>
	<br><br>
	<center>
		<div class="ui container teal segment" style="width: 60%;border-radius: 30px;border:0px solid white;background-color: rgba(255,255,255,0.05);">
		<h1  class="ui piled segment big header">Appointment Status</h1>
		<?php
			$row1=0;
			$sql1="select *from appointment where studentid='$userid' order by time desc";
			$result1=mysqli_query($conn,$sql1);
			if (mysqli_num_rows($result1) > 0){
				$row1=mysqli_fetch_assoc($result1);
			}
		?>

		<div class="ui form" style="text-align: left;">
			<div class="ui horizontal divider">
				Your Last appointment history
			</div><br>
			<div class="two fields">
				<div class="field">
					<label>Student ID</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['studentid'];}  ?>
					</div>
				</div>
				<div class="field">
					<label>Student Name</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['studentname'];}  ?>
					</div>
				</div>
			</div>				
			<div class="three fields">
				<div class="field">
					<label>Requested Date</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['requestingdate'];}  ?>
					</div>
				</div>
				<div class="field">
					<label>Requested Time</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['requestingtime'];}  ?>
					</div>
				</div>				
				<div class="field">
					<label>Requested Duration</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['duration'];}  ?>
					</div>
				</div>				
			</div><br>
			<div class="ui horizontal divider">
			Status
		</div><br>
			<div class="fields">
				<div class="four wide field">
					<label>Status</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['status'];}  ?>
					</div>
				</div>
				<div class="six wide field">
					<label>Allocated Date</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['allocateddate'];}  ?>
					</div>
				</div>				
				<div class="six wide field">
					<label>Allocated Time</label>
					<div class="ui segment">
						<?php if($row1){echo $row1['allocatedtime'];}  ?>
					</div>
				</div>				
			</div>
			<div class="field">
				<label>Remarks</label>
				<div class="ui segment">
					<?php if($row1){echo $row1['remarks'];}  ?>
				</div>
			</div>
		</div>
<br>
</center>
</body>
</html>