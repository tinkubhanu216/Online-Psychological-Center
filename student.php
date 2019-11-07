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
<?php
$studentid=$firstname=$lastname=$dateofbirth=$placeofbirth=$gender=$age=$email=$maritalstatus=$height=$weight=$fathername=$fatherdesignation=$fathermobile=$mothername=$motherdesignation=$mothermobile=$localaddress=$permanentaddress=$mobile=$homemobile=$department=$yearandsem=$blockandclass=$hostelblockandroomno=$roommate1id=$roommate1name=$roommate1class=$roommate1mobile=$roommate2id=$roommate2name=$roommate2class=$roommate2mobile=$roommate3id=$roommate3name=$roommate3class=$roommate3mobile=$sibling1name=$sibling1age=$sibling1occupation=$sibling2name=$sibling2age=$sibling2occupation="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$studentid=$_POST["studentid"];
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$dateofbirth=$_POST["dateofbirth"];
	$placeofbirth=$_POST["placeofbirth"];
	$gender=$_POST["gender"];
	$age=$_POST["age"];
	$email=$_POST["email"];
	$maritalstatus=$_POST["maritalstatus"];
	$height=$_POST["height"];
	$weight=$_POST["weight"];
	$fathername=$_POST["fathername"];
	$fatherdesignation=$_POST["fatherdesignation"];
	$fathermobile=$_POST["fathermobile"];
	$mothername=$_POST["mothername"];
	$motherdesignation=$_POST["motherdesignation"];
	$mothermobile=$_POST["mothermobile"];
	$localaddress=$_POST["localaddress"];
	$permanentaddress=$_POST["permanentaddress"];
	$mobile=$_POST["mobile"];
	$homemobile=$_POST["homemobile"];
	$department=$_POST["department"];
	$yearandsem=$_POST["yearandsem"];
	$blockandclass=$_POST["blockandclass"];
	$hostelblockandroomno=$_POST["hostelblockandroomno"];
	$roommate1id=$_POST["roommate1id"];
	$roommate1name=$_POST["roommate1name"];
	$roommate1class=$_POST["roommate1class"];
	$roommate1mobile=$_POST["roommate1mobile"];
	$roommate2id=$_POST["roommate2id"];
	$roommate2name=$_POST["roommate2name"];
	$roommate2class=$_POST["roommate2class"];
	$roommate2mobile=$_POST["roommate2mobile"];
	$roommate3id=$_POST["roommate3id"];
	$roommate3name=$_POST["roommate3name"];
	$roommate3class=$_POST["roommate3class"];
	$roommate3mobile=$_POST["roommate3mobile"];
	$sibling1name=$_POST["sibling1name"];
	$sibling1age=$_POST["sibling1age"];
	$sibling1occupation=$_POST["sibling1occupation"];
	$sibling2name=$_POST["sibling2name"];
	$sibling2age=$_POST["sibling2age"];
	$sibling2occupation=$_POST["sibling2occupation"];
	if($sibling2age==""){
		$sibling2age=0;
	}
	if($sibling1age==""){
		$sibling1age=0;
	}
}
if($studentid!=""){
	$sql="select *from student where studentid='$studentid'";
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0){
		$sql1="update student set firstname='$firstname',lastname='$lastname',dateofbirth='$dateofbirth',placeofbirth='$placeofbirth',gender='$gender',age=$age,email='$email',maritalstatus='$maritalstatus',height=$height,weight=$weight,localaddress='$localaddress',permanentaddress='$permanentaddress',mobile=$mobile where studentid='$studentid'";
		$sql2="update family set fathername='$fathername',fatherdesignation='$fatherdesignation',fathermobile='$fathermobile',mothername='$mothername',motherdesignation='$motherdesignation',mothermobile='$mothermobile',sibling1name='$sibling1name',sibling1age=$sibling1age,sibling1occupation='$sibling1occupation',sibling2name='$sibling2name',sibling2age=$sibling2age,sibling2occupation='$sibling2occupation',homemobile=$homemobile where studentid='$studentid'";
		$sql3="update acadamicsandhostel set department='$department',yearandsem='$yearandsem',blockandclass='$blockandclass',hostelblockandroomno='$hostelblockandroomno',roommate1id='$roommate1id',roommate1name='$roommate1name',roommate1class='$roommate1class',roommate1mobile=$roommate1mobile,roommate2id='$roommate2id',roommate2name='$roommate2name',roommate2class='$roommate2class',roommate2mobile=$roommate2mobile,roommate3id='$roommate3id',roommate3name='$roommate3name',roommate3class='$roommate3class',roommate3mobile=$roommate3mobile where studentid='$studentid'";
	}else{
		$sql1="insert into student(studentid,firstname,lastname,dateofbirth,placeofbirth,gender,age,email,maritalstatus,height,weight,localaddress,permanentaddress,mobile) values('$studentid','$firstname','$lastname','$dateofbirth','$placeofbirth','$gender',$age,'$email','$maritalstatus',$height,$weight,'$localaddress','$permanentaddress',$mobile)";
		$sql2="insert into family(studentid,fathername,fatherdesignation,fathermobile,mothername,motherdesignation,mothermobile,sibling1name,sibling1age,sibling1occupation,sibling2name,sibling2age,sibling2occupation,homemobile) values('$studentid','$fathername','$fatherdesignation','$fathermobile','$mothername','$motherdesignation','$mothermobile','$sibling1name',$sibling1age,'$sibling1occupation','$sibling2name',$sibling2age,'$sibling2occupation',$homemobile)";
		$sql3="insert into acadamicsandhostel(studentid,department,yearandsem,blockandclass,hostelblockandroomno,roommate1id,roommate1name,roommate1class,roommate1mobile,roommate2id,roommate2name,roommate2class,roommate2mobile,roommate3id,roommate3name,roommate3class,roommate3mobile) values('$studentid','$department','$yearandsem','$blockandclass','$hostelblockandroomno','$roommate1id','$roommate1name','$roommate1class',$roommate1mobile,'$roommate2id','$roommate2name','$roommate2class',$roommate2mobile,'$roommate3id','$roommate3name','$roommate3class',$roommate3mobile)";		
	}

//	echo $sql;
//	echo "<br>";
//	echo $sql2;
//	echo "<br>";
//	echo $sql3;
//	echo "<br>";
	$ret1=mysqli_query($conn,$sql1);
	$ret2=mysqli_query($conn,$sql2);
	$ret3=mysqli_query($conn,$sql3);
	if($ret1 and $ret2 and $ret3){
		header('location:step2.php');
	}
	else{
		echo "failed";
		echo mysqli_error($conn);
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
	<a href="index.php"><h1 class="heading" style="font-size: 2.2em">PSYCHOLOGICAl COUNSELLING<br>CENTER</h1></a>	<header style="background-color: #144c52;position: relative;width: 97%;left: 0;height: 45px;border-radius: 0px 20px 20px 0px;margin-top: 1em;">
		<a class="hh" href="student.php">Registration</a>
		<a class="hh" href="requestappointment.php">Request Appointment</a>
		<a class="hh" href="studentstatus.php">Check Status</a>
		<a class="hh" href="logout.php">Logout</a>
	</header>
	<br><br>
	<center>
		<div class="ui container teal segment" style="width: 60%;border-radius: 30px;border:0px solid white;background-color: rgba(255,255,255,0.05);">
		<h1  class="ui piled segment big header">Counselling Registration Form</h1>

		<div class="ui horizontal divider">
			Personal Details
		</div><br>
		<?php
			$row1=$row2=$row3=0;
			$sql1="select *from student where studentid='$userid'";
			$sql2="select *from family where studentid='$userid'";
			$sql3="select *from acadamicsandhostel where studentid='$userid'";
			$result1=mysqli_query($conn,$sql1);
			$result2=mysqli_query($conn,$sql2);
			$result3=mysqli_query($conn,$sql3);
			if (mysqli_num_rows($result1) > 0 or mysqli_num_rows($result2) > 0 or mysqli_num_rows($result3) > 0){
				$row1=mysqli_fetch_assoc($result1);
				$row2=mysqli_fetch_assoc($result2);
				$row3=mysqli_fetch_assoc($result3);
			}
		?>
		<form class="ui form" style="text-align: left" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
		  <div class="three fields">
		    <div class="field">
		      <label>Student ID</label>
		      <input type="text" placeholder="texthere" name="studentid" value="<?php echo $userid;  ?>" pattern="[BRN][0-9]{6}" oninvalid="setCustomValidity('Please Enter The Correct Student Id & Enter 7 Characters length')" onchange="try{setCustomValidity('')}catch(e){}" readonly required>
		    </div>
		    <div class="field">
		      <label>First name</label>
		      <input type="text" placeholder="texthere" name="firstname" value="<?php if($row1){echo $row1['firstname'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('First Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
		    <div class="field">
		      <label>Last name</label>
		      <input type="text" placeholder="texthere" name="lastname" value="<?php if($row1){echo $row1['lastname'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Last Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
		  </div>
		<div class="four fields">
			<div class="field">
		      <label>Date of birth</label>
		      <input type="date" placeholder="texthere" name="dateofbirth" value="<?php if($row1){echo $row1['dateofbirth'];}  ?>" max="<?php echo date("Y-m-d");?>">
		    </div>
			<div class="field">
		      <label>Place of birth</label>
		      <input type="text" placeholder="texthere" name="placeofbirth" value="<?php if($row1){echo $row1['placeofbirth'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Place Of Birth should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
			<div class="field">
		      <label>Sex</label>
		      <select class="ui dropdown" required name="gender">
				<option disabled>---Select---</option>
				<option value="Male" <?php if($row1 and $row1['gender']=='Male'){echo "selected='selected'";}  ?>>Male</option>
				<option value="Female" <?php if($row1 and $row1['gender']=='Female'){echo "selected='selected'";}  ?> >Female</option>
			  </select>
		    </div>
			<div class="field">
		      <label>Age</label>
		      <input type="text" placeholder="texthere" name="age" value="<?php if($row1){echo $row1['age'];}  ?>" pattern="[0-9]{2}" oninvalid="setCustomValidity('Age should have Numerical value & That should be in 2 Digit length')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>			
		</div>
		<div class="four fields">
			<div class="field" style="width: 60%">
		      <label>Email</label>
		      <input type="email" placeholder="texthere" name="email" value="<?php if($row1){echo $row1['email'];}  ?>" pattern="[a-zA-Z0-9]+[@][a-zA-Z]+.[a-zA-Z]{2,4}" oninvalid="setCustomValidity('Please Enter the correct Email')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
			<div class="field">
		      <label>Marital Status</label>
		      <select class="ui dropdown" required name="maritalstatus">
				<option disabled>---Select---</option>
				<option value="Single" <?php if($row1 and $row1['maritalstatus']=='Single'){echo "selected='selected'";}  ?>>Single</option>
				<option value="Married" <?php if($row1 and $row1['maritalstatus']=='Married'){echo "selected='selected'";}  ?>>Married</option>
			  </select>
		    </div>
			<div class="field">
		      <label>Height(cm)</label>
		      <input type="text" placeholder="texthere" name="height" value="<?php if($row1){echo $row1['height'];}  ?>" pattern="[0-9]{0,3}" oninvalid="setCustomValidity('Height should have Numerical value only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
			<div class="field">
		      <label>Weight(Kg)</label>
		      <input type="text" placeholder="texthere" name="weight" value="<?php if($row1){echo $row1['weight'];}  ?>" pattern="[0-9]{0,3}" oninvalid="setCustomValidity('Weight should have Numerical value only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
		</div>

		<div class="three fields">
			<div class="field">
		      <label>Father Name</label>
		      <input type="text" placeholder="texthere" name="fathername" value="<?php if($row2){echo $row2['fathername'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Father Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
			<div class="field">
		      <label>Designation</label>
		      <input type="text" placeholder="texthere" name="fatherdesignation" value="<?php if($row2){echo $row2['fatherdesignation'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Designation should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
			<div class="field">
		      <label>Phone Number</label>
		      <input type="text" placeholder="texthere" name="fathermobile" value="<?php if($row2){echo $row2['fathermobile'];}  ?>" pattern="[6789][0-9]{9}" maxlength="10" minlength="10" required>
		    </div>
		</div>
		<div class="three fields">
			<div class="field">
		      <label>Mother Name</label>
		      <input type="text" placeholder="texthere" name="mothername" value="<?php if($row2){echo $row2['mothername'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Mother Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
			<div class="field">
		      <label>Designation</label>
		      <input type="text" placeholder="texthere" name="motherdesignation" value="<?php if($row2){echo $row2['motherdesignation'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Designation should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
			<div class="field">
		      <label>Phone Number</label>
		      <input type="text" placeholder="texthere" name="mothermobile" value="<?php if($row2){echo $row2['mothermobile'];}  ?>" pattern="[6789][0-9]{9}" maxlength="10" minlength="10" required>
		    </div>
		</div>
		<br>
		<div class="ui horizontal divider">
			Address
		</div>
		<div class="two fields" style="text-align: center;">
			<div class="field">
		      <label>LOCAL</label>
		      <textarea rows="4" name="localaddress" required><?php if($row1){echo $row1['localaddress'];}  ?></textarea>
		    </div>
			<div class="field">
		      <label>PERMANENT</label>
		      <textarea rows="4" name="permanentaddress" required><?php if($row1){echo $row1['permanentaddress'];}  ?></textarea>
		    </div>
		</div>
		<div class="two fields">
			<div class="field">
		      <label>Student Phone Number</label>
		      <input type="text" name="mobile" value="<?php if($row1){echo $row1['mobile'];}  ?>">
		    </div>
			<div class="field">
		      <label>Home Phone Number</label>
		      <input type="text" name="homemobile" value="<?php if($row2){echo $row2['homemobile'];}  ?>">		    
		  	</div>
		</div>
		<br>
		<div class="ui horizontal divider">
			Academic Details
		</div><br>
		  <div class="four fields">
		    <div class="field">
		      <label>Dept</label>
		      <select class="ui dropdown" required name="department">
				<option disabled>---Select---</option>
				<option value="CHEM" <?php if($row3 and $row3['department']=='CHEM'){echo "selected='selected'";}  ?>>CHEM</option>
				<option value="CIVIL" <?php if($row3 and $row3['department']=='CIVIL'){echo "selected='selected'";}  ?>>CIVIL</option>
				<option value="CSE" <?php if($row3 and $row3['department']=='CSE'){echo "selected='selected'";}  ?>>CSE</option>
				<option value="ECE" <?php if($row3 and $row3['department']=='ECE'){echo "selected='selected'";}  ?>>ECE</option>
				<option value="EEE" <?php if($row3 and $row3['department']=='EEE'){echo "selected='selected'";}  ?>>EEE</option>
				<option value="MECH" <?php if($row3 and $row3['department']=='MECH'){echo "selected='selected'";}  ?>>MECH</option>
				<option value="MME" <?php if($row3 and $row3['department']=='MME'){echo "selected='selected'";}  ?>>MME</option>
			  </select>
		    </div>
		    <div class="field">
		      <label>Year & Sem</label>
		      <select class="ui dropdown" required name="yearandsem">
				<option disabled>---Select---</option>
				<option value="PUC-1/ Sem-1" <?php if($row3 and $row3['yearandsem']=='PUC-1/ Sem-1'){echo "selected='selected'";}  ?>>PUC-1/ Sem-1</option>
				<option value="PUC-1/ Sem-2" <?php if($row3 and $row3['yearandsem']=='PUC-1/ Sem-2'){echo "selected='selected'";}  ?>>PUC-1/ Sem-2</option>
				<option value="PUC-2/ Sem-1" <?php if($row3 and $row3['yearandsem']=='PUC-2/ Sem-1'){echo "selected='selected'";}  ?>>PUC-2/ Sem-1</option>
				<option value="PUC-2/ Sem-2" <?php if($row3 and $row3['yearandsem']=='PUC-2/ Sem-2'){echo "selected='selected'";}  ?>>PUC-2/ Sem-2</option>
				<option value="E-1/ Sem-1" <?php if($row3 and $row3['yearandsem']=='E-1/ Sem-1'){echo "selected='selected'";}  ?>>E-1/ Sem-1</option>
				<option value="E-1/ Sem-2" <?php if($row3 and $row3['yearandsem']=='E-1/ Sem-2'){echo "selected='selected'";}  ?>>E-1/ Sem-2</option>
				<option value="E-2/ Sem-1" <?php if($row3 and $row3['yearandsem']=='E-2/ Sem-1'){echo "selected='selected'";}  ?>>E-2/ Sem-1</option>
				<option value="E-2/ Sem-2" <?php if($row3 and $row3['yearandsem']=='E-2/ Sem-2'){echo "selected='selected'";}  ?>>E-2/ Sem-2</option>
				<option value="E-3/ Sem-1" <?php if($row3 and $row3['yearandsem']=='E-3/ Sem-1'){echo "selected='selected'";}  ?>>E-3/ Sem-1</option>
				<option value="E-3/ Sem-2" <?php if($row3 and $row3['yearandsem']=='E-3/ Sem-2'){echo "selected='selected'";}  ?>>E-3/ Sem-2</option>
				<option value="E-4/ Sem-1" <?php if($row3 and $row3['yearandsem']=='E-4/ Sem-1'){echo "selected='selected'";}  ?>>E-4/ Sem-1</option>
				<option value="E-4/ Sem-2" <?php if($row3 and $row3['yearandsem']=='E-4/ Sem-2'){echo "selected='selected'";}  ?>>E-4/ Sem-2</option>
			  </select>
		    </div>
		    <div class="field">
		      <label>Block & Class</label>
		      <input type="text" placeholder="texthere" name="blockandclass" value="<?php if($row3){echo $row3['blockandclass'];}  ?>" pattern="[a-zA-Z 0-9 -]+" oninvalid="setCustomValidity('Block & Class should have AlphaNumeric Values only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
		    <div class="field">
		      <label>Hostel Block & Room No</label>
		      <input type="text" placeholder="texthere" name="hostelblockandroomno" value="<?php if($row3){echo $row3['hostelblockandroomno'];}  ?>" pattern="[a-zA-Z 0-9 -]+" oninvalid="setCustomValidity('Hostel Block & Room No should have AlphaNumeric Values only')" onchange="try{setCustomValidity('')}catch(e){}" required>
		    </div>
		  </div>
		<br>
		<div class="ui horizontal divider">
			Other Details
		</div><br>
		<div class="field">
			<div class="field">
		      <label style="font-size: 1.1em">With whom do you live while a RGUKT Campus?</label>
				  <div class="four fields">
				    <div class="field" style="width: 20%">
				      <label>Student ID</label>
				      <input type="text" placeholder="texthere" name="roommate1id" value="<?php if($row3){echo $row3['roommate1id'];}  ?>" pattern="[BRN][0-9]{6}" oninvalid="setCustomValidity('Student Id should have Characters and Numbers only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field" style="width: 40%">
				      <label>Name</label>
				      <input type="text" placeholder="texthere" name="roommate1name" value="<?php if($row3){echo $row3['roommate1name'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field">
				      <label>Block & Class</label>
				      <input type="text" placeholder="texthere" name="roommate1class" value="<?php if($row3){echo $row3['roommate1class'];}  ?>" pattern="[a-zA-Z 0-9 -]+" oninvalid="setCustomValidity('Block & Class should have AlphaNumeric Values only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field">
				      <label>Phone Number</label>
				      <input type="text" placeholder="texthere" name="roommate1mobile" value="<?php if($row3){echo $row3['roommate1mobile'];}  ?>" pattern="[6789][0-9]{9}" maxlength="10" minlength="10" required>
				    </div>
				  </div>
				  <div class="four fields">
				    <div class="field" style="width: 20%">
				      <label>Student ID</label>
				      <input type="text" placeholder="texthere" name="roommate2id" value="<?php if($row3){echo $row3['roommate2id'];}  ?>" pattern="[BRN][0-9]{6}" oninvalid="setCustomValidity('Student Id should have Characters and Numbers only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field" style="width: 40%">
				      <label>Name</label>
				      <input type="text" placeholder="texthere" name="roommate2name" value="<?php if($row3){echo $row3['roommate2name'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field">
				      <label>Block & Class</label>
				      <input type="text" placeholder="texthere" name="roommate2class" value="<?php if($row3){echo $row3['roommate2class'];}  ?>" pattern="[a-zA-Z 0-9 -]+" oninvalid="setCustomValidity('Block & Class should have AlphaNumeric Values only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field">
				      <label>Phone Number</label>
				      <input type="text" placeholder="texthere" name="roommate2mobile" value="<?php if($row3){echo $row3['roommate2mobile'];}  ?>" pattern="[6789][0-9]{9}" maxlength="10" minlength="10" required>
				    </div>
				  </div>
				  <div class="four fields">
				    <div class="field" style="width: 20%">
				      <label>Student ID</label>
				      <input type="text" placeholder="texthere" name="roommate3id" value="<?php if($row3){echo $row3['roommate3id'];}  ?>" pattern="[BRN][0-9]{6}" oninvalid="setCustomValidity('Student Id should have Characters and Numbers only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field" style="width: 40%">
				      <label>Name</label>
				      <input type="text" placeholder="texthere" name="roommate3name" value="<?php if($row3){echo $row3['roommate3name'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field">
				      <label>Block & Class</label>
				      <input type="text" placeholder="texthere" name="roommate3class" value="<?php if($row3){echo $row3['roommate3class'];}  ?>" pattern="[a-zA-Z 0-9 -]+" oninvalid="setCustomValidity('Block & Class should have AlphaNumeric Values only')" onchange="try{setCustomValidity('')}catch(e){}" required>
				    </div>
				    <div class="field">
				      <label>Phone Number</label>
				      <input type="text" placeholder="texthere" name="roommate3mobile" value="<?php if($row3){echo $row3['roommate3mobile'];}  ?>" pattern="[6789][0-9]{9}" maxlength="10" minlength="10" required>
				    </div>
				  </div>
		    </div>
		    <br>
			<div class="field">
		      <label style="font-size: 1.1em">Describe your family of origin with names,ages and occupations of siblings</label>
			        <div class="three fields">
					    <div class="field" style="width: 50%">
					      <label>Name</label>
					      <input type="text" placeholder="texthere" name="sibling1name" value="<?php if($row2){echo $row2['sibling1name'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
					    </div>
					    <div class="field" style="width: 20%">
					      <label>Age</label>
					      <input type="text" placeholder="texthere" name="sibling1age" value="<?php if($row2){echo $row2['sibling1age'];}  ?>" pattern="[0-9]{2}" oninvalid="setCustomValidity('Age should have Numerical value only')" onchange="try{setCustomValidity('')}catch(e){}" required>
					    </div>
					    <div class="field">
					      <label>Occupation</label>
					      <input type="text" placeholder="texthere" name="sibling1occupation" value="<?php if($row2){echo $row2['sibling1occupation'];}  ?>" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Occupation should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required>
					    </div>
					</div>
			        <div class="three fields">
					    <div class="field" style="width: 50%">
					      <label>Name</label>
					      <input type="text" placeholder="texthere" name="sibling2name" value="<?php if($row2){echo $row2['sibling2name'];}  ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}">
					    </div>
					    <div class="field" style="width: 20%">
					      <label>Age</label>
					      <input type="text" placeholder="texthere" name="sibling2age" value="<?php if($row2){echo $row2['sibling2age'];}  ?>" pattern="[0-9]{1,2}" oninvalid="setCustomValidity('Age should have Numerical value only')" onchange="try{setCustomValidity('')}catch(e){}">
					    </div>
					    <div class="field">
					      <label>Occupation</label>
					      <input type="text" placeholder="texthere" name="sibling2occupation" value="<?php if($row2){echo $row2['sibling2occupation'];}  ?>" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Occupation should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}">
					    </div>
					</div>
		    </div>
		</div><br>
<center>	<div class="ui large buttons" style="width: 50%;">
	  <button class="ui button" type="reset">Reset</button>
	  <div class="or"></div>
	  <button class="ui button" type="submit">Proceed</button>
	</div></center>
	</form></center><br>
</center>
</body>
<script type="text/javascript">
	$('.ui.dropdown').dropdown({placeholder:'--Choose--'});
</script>
</html>