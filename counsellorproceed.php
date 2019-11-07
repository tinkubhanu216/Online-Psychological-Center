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
$problemid=$studentid=$msg=$counsellorid=$firstname=$lastname=$suggestion="";
$st=3;
if($_SERVER["REQUEST_METHOD"]=="GET"){
	$problemid=$_GET["problemid"];
	$studentid=$_GET["studentid"];
	if($problemid!=""){
		$sql="select *from counsellor where counsellorid='$userid'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			$counsellorid=$row["counsellorid"];
			$firstname=$row["firstname"];
			$lastname=$row["lastname"];
		}
	}
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$problemid=$_POST["problemid"];
	$studentid=$_POST["studentid"];
	$suggestion=$_POST["suggestion"];
	$problemcategory=$_POST["problemcategory"];
	if($problemid!=""){
		$sql1="insert into suggestions(problemid,studentid,counsellorid,suggestion,time,problemcategory) values($problemid,'$studentid','$userid','$suggestion',now(),'$problemcategory')";
		$ret=mysqli_query($conn,$sql1);
		$sql2="update studentproblems set status='completed' where problemid=$problemid";
		$ret2=mysqli_query($conn,$sql2);
		if($ret and $ret2){
			$st=1;
		}else{
			$st=0;
			echo mysqli_error($conn);
			$msg=$msg.mysqli_error($conn);
		}
		if($_POST["referto"]=='on'){
			$sql1="insert into admin(problemid,studentid,referby,referto) values($problemid,'$studentid','$userid','admin')";
			$ret=mysqli_query($conn,$sql1);
			if(!$ret){
				$msg=$msg.mysqli_error($conn);
			}		
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
		<h1  class="ui piled segment big header">Observation</h1>
		<?php 
			if($st==1){
				echo "<div class='ui success message'>
				  <i class='close icon'>x</i>
				  <div class='header'>
				    Your request Proceed successful.
				  </div>
				  <p>Please wait 5 sec.. We will redirecting to Home</p>
				</div>";
				header('Refresh: 5; counsellor.php');
			}else if($st==0){
				echo "<div class='ui negative message'>
				  <i class='close icon'></i>
				  <div class='header'>
				    There are Error While proceed Your request
				  </div>
				  <p>$msg</p>
				</div>";

			}

		?>

		<form class="ui form" style="text-align: left" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
			<div class="ui horizontal divider">
				Behaviour Observed By
			</div><br>
			<div class="three fields">
			    <div class="field">
			      <label>Counsellor ID</label>
			      <div class="ui segment"><?php echo $counsellorid; ?></div>
			    </div>
			    <div class="field">
			      <label>Counsellor First name</label>
			      <div class="ui segment"><?php echo $firstname; ?></div>
			    </div>
			    <div class="field">
			      <label>Last name</label>
			      <div class="ui segment"><?php echo $lastname; ?></div>
			    </div>
		  	</div>
			<br>
			<div class="ui horizontal divider">
				suggestion
			</div><br>
			  <div class="field">
			    <label>Problem Category</label>
			    <select class="ui dropdown" name="problemcategory">
			      <option disabled>Problem Catogery</option>
			      <option value="Problem1">Problem1</option>
			      <option value="Problem2">Problem2</option>
			      <option value="Problem3">Problem3</option>
			      <option value="Problem4">Problem4</option>
			      <option value="Problem5">Problem5</option>
			  </select>
			</div>
			<div class="field">
				<label>Please mention your suggestion that you are given to the student:</label>
				<textarea rows="6" name="suggestion" required>
					
				</textarea>
				
			</div>
			<br>
			<div class="ui horizontal divider">
				Declaration
			</div><br>
			<div class="inline fields">
				<label>Appointment  Scheduled on</label>
				<div class="field">
					<?php date_default_timezone_set("Asia/Kolkata")  ?>
					<div class="ui segment">
						<?php echo date('Y-m-d'); ?>
					</div>	
					
				</div>
				<label>at</label>
				<div class="field">
					<div class="ui segment">
						<?php echo date("h:i:sa"); ?>
					</div>
				</div>
			</div>
			<div class="field">
			    <div class="ui checkbox">
			      <input type="checkbox" tabindex="0" name="referto">
			      <label style="font-weight: bold;">Refer to Admin</label>
			    </div>
			</div>
			<br>
			<input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
			<input type="hidden" name="problemid" value="<?php echo $problemid; ?>">
			<center><div class="ui large buttons">
		  	<button class="ui button" type="reset">Reset</button>
		 	<div class="or"></div>
		  	<button class="ui button" type="submit">Proceed</button>
			</div></center>
		</form></center><br>
</div>
</center>
</body>
<script type="text/javascript">
	$('.ui.dropdown').dropdown({placeholder:'--Choose--'});
</script>
</html>