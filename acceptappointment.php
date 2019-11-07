<?php
session_start();
include './ss.php';
include './dbconnect.php';
$userid="";
if(isset($_SESSION["usertype"])){
	if($_SESSION["usertype"]=="faculty"){
		header('location:faculty.php');
	}else if($_SESSION["usertype"]=="admin"){
		header('location:admin.php');
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
<?php
$msg=$token="";
$st=3;
if($_SERVER["REQUEST_METHOD"]=="GET"){
	$token=$_GET["token"];
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$token=$_POST["token"];
	$allocateddate=$_POST["allocateddate"];
	$allocatedtime=$_POST["allocatedtime"];
	$remarks=$_POST["remarks"];
	if($token!=""){
		$sql="update appointment set status='accepted',allocateddate='$allocateddate',allocatedtime='$allocatedtime',remarks='$remarks' where token=$token";
		$ret=mysqli_query($conn,$sql);
		if($ret){
			$st=1;
		}else{
			$st=0;
			$msg=$msg.mysqli_error($conn);
			echo $msg;
		}
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
	<a href="index.php"><h1 class="heading" style="font-size: 2.2em">PSYCHOLOGICAl<br>CENTER</h1></a>

	<header style="background-color: #144c52;position: relative;width: 97%;left: 0;height: 45px;border-radius: 0px 20px 20px 0px;margin-top: 1em;">
		<a class="hh" href="counsellor.php">Counselling Requests</a>
		<a class="hh" href="appointmentrequests.php">Appointment Requests</a>
		<a class="hh" href="history.php">Counselling History</a>
		<a class="hh" href="profile.php">Profile</a>
		<a class="hh" href="logout.php">Logout</a>
	</header>
	<br><br>

	<center>
		<div class="ui container teal segment" style="width: 60%;border-radius: 30px;border:0px solid white;background-color: rgba(255,255,255,0.05);">
		<h1  class="ui piled segment big header">Appointment Requests</h1>
		<?php 
			if($st==1){
				echo "<div class='ui success message'>
				  <i class='close icon'>x</i>
				  <div class='header'>
				    Appointment Accepted
				  </div>
				  <p>Please wait 5 sec.. We will redirecting</p>
				</div>";
				header('Refresh: 5; appointmentrequests.php');
			}else if($st==0){
				echo "<div class='ui negative message'>
				  <i class='close icon'></i>
				  <div class='header'>
				    There are Error While accepting appointment
				  </div>
				  <p>$msg</p>
				</div>";
				header('Refresh: 5; appointmentrequests.php');

			}

		?>
		<div class="ui horizontal divider">
			Accept Appointment
		</div><br>
		<form class="ui form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
			<div class="fields">
				<div class="two wide field">
					<label>Token No</label>
					<input type="text" name="token" value="<?php echo $token;  ?>" readonly>
				</div>
				<div class="five wide field">
					<label>Allocated Date</label>
					<input type="date" name="allocateddate" min="<?php echo date("Y-m-d");?>" required>
				</div>
				<div class="four wide field">
					<label>Allocated Time</label>
					<input type="time" name="allocatedtime" required>
				</div>
			</div>			
			<div class="fields">
				<div class="eleven wide field">
					<label>Remarks</label>
					<input type="text" name="remarks">
				</div>
				<div class="two wide field">
					<label><br></label>
					<input type="submit" value="accept" name="acceptbut" class="ui button">
				</div>				
			</div>
		</form>

<br>
</div>
</center>
</body>

</html>