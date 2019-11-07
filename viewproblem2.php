<?php


include './ss.php';
include './dbconnect.php';

$problemid="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$problemid=$_POST["problemid"];
}
echo $problemid;
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
		<a class="hh" href="student.php">Request Appointment</a>
		<a class="hh" href="student.php">Refer Friend</a>
		<a class="hh" href="student.php">Check Status</a>
		<a class="hh" href="student.php">Check Status</a>
	</header>
	<br><br>
	<center>
		<div class="ui container teal segment" style="width: 60%;border-radius: 30px;border:0px solid white;background-color: rgba(255,255,255,0.05);">
		<h1  class="ui piled segment big header">Student Information</h1>

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
		      <div class="ui segment"><?php if($row1){echo $row1['studentid'];}  ?></div>
		    </div>
		    <div class="field">
		      <label>First name</label>
		      <div class="ui segment"><?php if($row1){echo $row1['firstname'];}  ?></div>
		    </div>
		    <div class="field">
		      <label>Last name</label>
		      <div class="ui segment"><?php if($row1){echo $row1['lastname'];}  ?></div>
		    </div>
		  </div>
		<div class="four fields">
			<div class="field">
		      <label>Date of birth</label>
		      <div class="ui segment"><?php if($row1){echo $row1['dateofbirth'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Place of birth</label>
		      <div class="ui segment"><?php if($row1){echo $row1['placeofbirth'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Sex</label>
		      <div class="ui segment"><?php if($row1){echo $row1['gender'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Age</label>
		      <div class="ui segment"><?php if($row1){echo $row1['age'];}  ?></div>
		    </div>			
		</div>
		<div class="four fields">
			<div class="field" style="width: 60%">
		      <label>Email</label>
		      <div class="ui segment"><?php if($row1){echo $row1['studentid'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Marital Status</label>
		      <div class="ui segment"><?php if($row1){echo $row1['maritalstatus'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Height</label>
		      <div class="ui segment"><?php if($row1){echo $row1['height'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Weight</label>
		      <div class="ui segment"><?php if($row1){echo $row1['weight'];}  ?></div>
		    </div>
		</div>

		<div class="three fields">
			<div class="field">
		      <label>Father Name</label>
		      <div class="ui segment"><?php if($row1){echo $row2['fathername'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Designation</label>
		      <div class="ui segment"><?php if($row1){echo $row2['fatherdesignation'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Phone Number</label>
		      <div class="ui segment"><?php if($row1){echo $row2['fathermobile'];}  ?></div>
		    </div>
		</div>
		<div class="three fields">
			<div class="field">
		      <label>Mother Name</label>
		      <div class="ui segment"><?php if($row2){echo $row2['mothername'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Designation</label>
		      <div class="ui segment"><?php if($row2){echo $row2['motherdesignation'];}  ?></div>
		    </div>
			<div class="field">
		      <label>Phone Number</label>
		      <div class="ui segment"><?php if($row2){echo $row2['mothermobile'];}  ?></div>
		    </div>
		</div>
		<br>
		<div class="ui horizontal divider">
			Address
		</div>
		<div class="two fields" style="text-align: center;">
			<div class="field">
		      <label>LOCAL</label>
		     <div class="ui segment">
			      	<?php if($row1){echo $row1['localaddress'];}  ?>
			      </div>
		    </div>
			<div class="field">
		      <label>PERMANENT</label>
		     <div class="ui segment">
			      	<?php if($row1){echo $row1['permanentaddress'];}  ?>
			      </div>
		    </div>
		</div>
		<br>
		<div class="ui horizontal divider">
			Academic Details
		</div><br>
		  <div class="four fields">
		    <div class="field">
		      <label>Dept</label>
		      <div class="ui segment">
		      	<?php if($row3){echo $row3['department'];}  ?>
		      </div>
		    </div>
		    <div class="field">
		      <label>Year & Sem</label>
		      <div class="ui segment">
		      		<?php if($row3){echo $row3['yearandsem'];}  ?>
		      </div>
		    </div>
		    <div class="field">
		      <label>Block & Class</label>
		      <div class="ui segment">
		      	<?php if($row3){echo $row3['blockandclass'];}  ?>
		      </div>

		    </div>
		    <div class="field">
		      <label>Hostel Block & Room No</label>
		      <div class="ui segment">
		      	<?php if($row3){echo $row3['hostelblockandroomno'];}  ?>
		      </div>
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
				      <div class="ui segment"><?php if($row3){echo $row3['roommate1id'];}  ?></div>
				    </div>
				    <div class="field" style="width: 40%">
				      <label>Name</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate1name'];}  ?></div>
				    </div>
				    <div class="field">
				      <label>Block & Class</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate1class'];}  ?></div>
				    </div>
				    <div class="field">
				      <label>Phone Number</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate1mobile'];}  ?></div>
				    </div>
				  </div>
				  <div class="four fields">
				    <div class="field" style="width: 20%">
				      <label>Student ID</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate2id'];}  ?></div>
				    </div>
				    <div class="field" style="width: 40%">
				      <label>Name</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate2name'];}  ?></div>
				    </div>
				    <div class="field">
				      <label>Block & Class</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate2class'];}  ?></div>
				    </div>
				    <div class="field">
				      <label>Phone Number</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate2mobile'];}  ?></div>
				    </div>
				  </div>
				  <div class="four fields">
				    <div class="field" style="width: 20%">
				      <label>Student ID</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate3id'];}  ?></div>
				    </div>
				    <div class="field" style="width: 40%">
				      <label>Name</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate3name'];}  ?></div>
				    </div>
				    <div class="field">
				      <label>Block & Class</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate3class'];}  ?></div>
				    </div>
				    <div class="field">
				      <label>Phone Number</label>
				      <div class="ui segment"><?php if($row3){echo $row3['roommate3mobile'];}  ?></div>
				    </div>
				  </div>

		    </div>
		    <br>
			<div class="field">
		      <label style="font-size: 1.1em">Describe your family of origin with names,ages and occupations of siblings</label>
			        <div class="three fields">
					    <div class="field" style="width: 50%">
					      <label>Name</label>
					      <div class="ui segment"><?php if($row2){echo $row2['sibling1name'];}  ?></div>
					    </div>
					    <div class="field" style="width: 20%">
					      <label>Age</label>
					      <div class="ui segment"><?php if($row2){echo $row2['sibling1age'];}  ?></div>
					    </div>
					    <div class="field">
					      <label>Occupation</label>
					      <div class="ui segment"><?php if($row2){echo $row2['sibling1occupation'];}  ?></div>
					    </div>
					</div>
			        <div class="three fields">
					    <div class="field" style="width: 50%">
					      <label>Name</label>
					      <div class="ui segment"><?php if($row2){echo $row2['sibling2name'];}  ?></div>
					    </div>
					    <div class="field" style="width: 20%">
					      <label>Age</label>
					      <div class="ui segment"><?php if($row2){echo $row2['sibling2age'];}  ?></div>
					    </div>
					    <div class="field">
					      <label>Occupation</label>
					      <div class="ui segment"><?php if($row2){echo $row2['sibling2occupation'];}  ?></div>
					    </div>
					</div>
		    </div>
		</div><br>
		<?php
			$row4=0;
			$sql4="select *from studentproblems where problemid='$problemid'";
			$result4=mysqli_query($conn,$sql4);
			if (mysqli_num_rows($result4) > 0){
				$row4=mysqli_fetch_assoc($result4);
			}
		?>

		<div class="ui horizontal divider">
			Problem History
		</div><br>
			<div class="field">
		    	<label style="font-size: 1.1em">Are you presently receiving counseling or Have you received counseling in the past(or other type of service from a mental health practitioner)?</label>
		    	<div class="ui segment"><?php if($row4){echo $row4['paststatus'];}  ?></div>
		    </div>
			<div class="fields">
				<div class="twelve wide field">
				    <label>If yes, what is the reason?</label>
				    <div class="ui segment"><?php if($row4){echo $row4['pastreason'];}  ?></div>
				</div>
				<div class="four wide field">
				    <label>Where</label>
				    <div class="ui segment"><?php if($row4){echo $row4['pastplace'];}  ?></div>
				</div>				
			</div>
			<br>
			<div class="field">
		    	<label style="font-size: 1.1em">Are you presently taking any medication related to a psychological disorder?</label>
		    	<div class="ui segment"><?php if($row4){echo $row4['medication'];}  ?></div>
		    </div>
			<div class="field">
			    <label>If yes, Name of medication</label>
			    <div class="ui segment"><?php if($row4){echo $row4['medicationname'];}  ?></div>
			</div>
			<div class="inline fields">
				<div class="field">
					<label style="font-size: 1.1em">Who referred you to the Counseling Center at this time?</label>
				</div>
				<div class="ui segment" style="width: 45%"><?php if($row4){echo $row4['refername'];}  ?></div>				
			</div>
			<br>
			<div class="ui horizontal divider">
				Problem Description
			</div><br>
			<div class="field">
			    <label style="font-size: 1.1em">How severe would you rate your difficulties to be?</label>
			    <div class="ui segment"><?php if($row4){echo $row4['problemrange'];}  ?></div>
			</div>
			<div class="two fields" style="text-align: center;">
				<div class="field">
			      <label>Mental Health History</label>
			      <div class="ui segment">
			      	<?php if($row4){echo $row4['mentalhealthhistory'];}  ?>
			      </div>
			    </div>
				<div class="field">
			      <label>Family Health History</label>
			      <div class="ui segment">
			      	<?php if($row4){echo $row4['familyhealthhistory'];}  ?>
			      </div>
			    </div>
			</div>
			<div class="field">
				<label style="font-size: 1.1em">Please describe what problems bring you to the Counseling Center:</label>
				<div class="ui segment"><?php if($row4){echo $row4['problems'];}  ?></div>
			</div>
			<div class="field">
				<label style="font-size: 1.1em">What situations of factors have RECENTLY triggered your problems or symptoms? Where did they Occur?</label>
				<div class="ui segment"><?php if($row4){echo $row4['situations'];}  ?></div>
			</div><br>
			<div class="ui horizontal divider">
				Mental status
			</div><br>

			<div class="field">
				<div class="field">
			    	<label style="font-size: 1.1em">Speech : <font style="color: blue"><?php if($row4){echo $row4['speech'];}  ?></font></label>
			    </div>
				<br>
				<div class="field">
			    	<label style="font-size: 1.1em">Social Interaction :<font style="color: blue"><?php if($row4){echo $row4['socialinteraction'];}  ?></font></label>
			    </div>
				<br>
				<div class="field">
			    	<label style="font-size: 1.1em">Eye Contact :<font style="color: blue"><?php if($row4){echo $row4['eyecontact'];}  ?></font></label>
			    </div>
				<br>
				<div class="field">
			    	<label style="font-size: 1.1em">Sleep :<font style="color: blue"><?php if($row4){echo $row4['sleep'];}  ?></font></label>
			    </div>
				
			</div>
			<br>
			<div class="ui horizontal divider">
				Reference Documents
			</div><br>
			<div class="field">
				<label>Upload Documents</label>
			</div>


			<br>

<center>	<div class="ui large buttons">
	  <button class="ui button" type="submit">Edit</button>
	  <div class="or"></div>
	  <button class="ui button" type="submit">Proceed</button>
	</div></center>
	</form></center><br>
</center>
</body>
</html>