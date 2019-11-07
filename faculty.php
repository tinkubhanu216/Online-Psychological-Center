<?php
include './ss.php';
include './dbconnect.php';
session_start();
$userid="";
if(isset($_SESSION["usertype"])){
	if($_SESSION["usertype"]=="student"){
		header('location:student.php');
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
<?php
$st=3;
$studentid=$studentname=$class=$problem=$description=$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$studentid=$_POST["studentid"];
	$studentname=$_POST["studentname"];
	$class=$_POST["class"];
	$problem=$_POST["problem"];
	$description=$_POST["description"];
}
if($studentid!=""){
	$sql="insert into facultyrequests(facultyid,studentid,studentname,blockandclass,problem,description) values('$userid','$studentid','$studentname','$class','$problem','$description')";
	$ret=mysqli_query($conn,$sql);
	if($ret){
		$st=1;
	}else{
		$st=0;
		$msg=$msg.mysqli_error($conn);
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
		<a class="hh" href="student.php">Student Complaint</a>
		<a class="hh" href="facultystatus.php">Check Status</a>
		<a class="hh" href="logout.php">Logout</a>
	</header>
	<br><br>
	<center>
		<div class="ui container teal segment" style="width: 60%;border-radius: 30px;border:0px solid white;background-color: rgba(255,255,255,0.05);">
		<h1  class="ui piled segment big header">Complaints/Suggestions</h1>
		<?php 
			if($st==1){
				echo "<div class='ui success message'>
				  <div class='header'>
				    Your request Proceed successful.
				  </div>
				  <p>We will complete soon</p>
				</div>";
			}else if($st==0){
				echo "<div class='ui negative message'>
				  <div class='header'>
				    There are Error While proceed Your request
				  </div>
				  <p>$msg</p>
				</div>";
			}

		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" class="ui form" style="text-align: left">
		<div class="three fields">
			<div class="field">
				<label>Student ID</label>
				<input type="text" name="studentid" required>
			</div>
			<div class="field">
				<label>Student Name</label>
				<input type="text" name="studentname" required>
			</div>
			<div class="field">
				<label>Student Class</label>
				<input type="text" name="class">
			</div>
		</div>
		<div class="field">
			<label>Please mention the problem</label>
			<input type="text" name="problem" required>
		</div>
		<div class="field">
			<label>Problem Description</label>
			<textarea rows="4" name="description" required>
				
			</textarea>
		</div>
		<br>
<center>	<div class="ui large buttons" style="width: 50%;">
	  <button class="ui button" type="reset">Reset</button>
	  <div class="or"></div>
	  <button class="ui button" type="submit">Proceed</button>
	</div></center>
	</form></center><br>
</center>
</body>
</html>