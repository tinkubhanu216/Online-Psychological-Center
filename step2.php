<?php
session_start();
include './ss.php';
include './dbconnect.php';
?>
<?php
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
$studentid=$userid;
$paststatus=$pastreason=$pastplace=$medication=$medicationname=$refername=$problemrange=$mentalhealthhistory=$familyhealthhistory=$problems=$situations=$speech=$socialinteraction=$eyecontact=$sleep=$document1path=$agree=$msg=$id="";
$st=3;
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$paststatus=$_POST['paststatus'];
	$pastreason=$_POST['pastreason'];
	$pastplace=$_POST['pastplace'];
	$medication=$_POST['medication'];
	$medicationname=$_POST['medicationname'];
	$refername=$_POST['refername'];
	$problemrange=$_POST['problemrange'];
	$problemrange=$problemrange/10;
	$mentalhealthhistory=$_POST['mentalhealthhistory'];
	$familyhealthhistory=$_POST['familyhealthhistory'];
	$problems=$_POST['problems'];
	$situations=$_POST['situations'];
	$speech=$_POST['speech'];
	$socialinteraction=$_POST['socialinteraction'];
	$eyecontact=$_POST['eyecontact'];
	$sleep=$_POST['sleep'];
	$id=$_POST["id"];
}
$error=0;
if(!empty($_FILES['document1']))
{
	$path = "uploads/";
	$document1path=$id.'.pdf';
	$path = $path . $document1path;
	$document1path=$path;
	$name=basename( $_FILES['document1']['name']);
	
	if(move_uploaded_file($_FILES['document1']['tmp_name'], $path)) {
	//   echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
	//   " has been uploaded";

	} else{
	    $msg="There was an error uploading the document, please try again!";
	    $error=1;
	}
}
if($problemrange!="" and $error==0){

	$sql="insert into studentproblems(problemid,studentid,paststatus,pastreason,pastplace,medication,medicationname,refername,problemrange,mentalhealthhistory,familyhealthhistory,problems,situations,speech,socialinteraction,eyecontact,sleep,document1path,time) values($id,'$studentid','$paststatus','$pastreason','$pastplace','$medication','$medicationname','$refername',$problemrange,'$mentalhealthhistory','$familyhealthhistory','$problems','$situations','$speech','$socialinteraction','$eyecontact','$sleep','$document1path',now())";
	$ret=mysqli_query($conn,$sql);
	if($ret){
		$st=1;
	}else{
		$msg=$msg.mysqli_error($conn);
		$st=0;
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
		<a class="hh" href="student.php">Registration</a>
		<a class="hh" href="requestappointment.php">Request Appointment</a>
		<a class="hh" href="studentstatus.php">Check Status</a>
		<a class="hh" href="logout.php">Logout</a>

	</header>
	<br><br>
	<center>
		<div class="ui container teal segment" style="width: 60%;border-radius: 30px;border:0px solid white;background-color: rgba(255,255,255,0.05);">
		<?php 
			if($st==1){
				echo "<div class='ui success message'>
				  <i class='close icon'>x</i>
				  <div class='header'>
				    Your request Proceed successful.
				  </div>
				  <p>Please wait 10 sec.. We will redirecting to Home</p>
				</div>";
				header('Refresh: 5; student.php');
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
		<h1  class="ui piled segment big header">Counselling Registration Form</h1>
		<form class="ui form" style="text-align: left" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
		<div class="ui horizontal divider">
			Problem History
		</div><br>
			<div class="inline fields">
		    	<label style="font-size: 1.1em">Are you presently receiving counseling or Have you received counseling in the past(or other type of service from a mental health practitioner)?</label>
		   	<div class="field">
			      <div class="ui radio checkbox">
			        <input type="radio" value="Yes" name="paststatus" tabindex="0" required>
			        <label>Yes</label>
			      </div>
			    </div>
			    <div class="field">
			      <div class="ui radio checkbox">
			        <input type="radio" value="No" name="paststatus" tabindex="0" required>
			        <label>No</label>
			      </div>
			    </div>
			</div>
			<div class="fields">
				<div class="twelve wide field">
				    <label>If yes, what is the reason?</label>
				    <input type="text" name="pastreason" placeholder="text here">
				</div>
				<div class="four wide field">
				    <label>Where</label>
				    <input type="text" name="pastplace" placeholder="text here">
				</div>				
			</div>
			<br>
			<div class="inline fields">
		    	<label style="font-size: 1.1em">Are you presently taking any medication related to a psychological disorder?</label>
		   	<div class="field">
			      <div class="ui radio checkbox">
			        <input type="radio" name="medication" value="Yes" tabindex="0" required>
			        <label>Yes</label>
			      </div>
			    </div>
			    <div class="field">
			      <div class="ui radio checkbox">
			        <input type="radio" name="medication" value="No" tabindex="0" required>
			        <label>No</label>
			      </div>
			    </div>
			</div>
			<div class="field">
			    <label>If yes, Name of medication</label>
			    <input type="text" name="medicationname" placeholder="text here">
			</div>
			<div class="inline field">
				<label style="font-size: 1.1em">Who referred you to the Counseling Center at this time?</label>
				<input type="text" name="refername" class="six wide field">
			</div>
			<br>
			<div class="ui horizontal divider">
				Problem Description
			</div><br>
			<div class="field">
			    <label style="font-size: 1.1em">How severe would you rate your difficulties to be?</label>
			    <input type="range" step="10" placeholder="text here" name="problemrange" style="width: 100%" required>
			</div>
			<div class="two fields" style="text-align: center;">
				<div class="field">
			      <label>Mental Health History</label>
			      <textarea rows="4" name="mentalhealthhistory" required></textarea>
			    </div>
				<div class="field">
			      <label>Family Health History</label>
			      <textarea rows="4" name="familyhealthhistory" required></textarea>
			    </div>
			</div>
			<div class="field">
				<label style="font-size: 1.1em">Please describe what problems bring you to the Counseling Center:</label>
				<textarea rows="5" name="problems" required></textarea>
			</div>
			<div class="field">
				<label style="font-size: 1.1em">What situations of factors have RECENTLY triggered your problems or symptoms? Where did they Occur?</label>
				<textarea rows="6" name="situations" required></textarea>
			</div><br>
			<div class="ui horizontal divider">
				Mental status
			</div><br>

			<div class="field">
				<div class="field">
			    	<label style="font-size: 1.1em">Speech :</label>
			    </div>
			    <div class="fields" style="font-size: 0.5em">
			   		<div class="field" style="font-size: 0.8em">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="Normal" tabindex="0" required>
				        <label>Normal</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="Pressured" tabindex="0" required>
				        <label>Pressured</label>
				      </div>
				    </div>
			   		<div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="Slurred" tabindex="0" required>
				        <label>Slurred</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="Mute" tabindex="0" required>
				        <label>Mute</label>
				      </div>
				    </div>
			   		<div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="Loquacious" tabindex="0" required>
				        <label>Loquacious</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="Confused" tabindex="0" required>
				        <label>Confused</label>
				      </div>
				    </div>

			   		<div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="AgeAppropriate" tabindex="0" required>
				        <label>Age Appropriate</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="speech" value="Incoherent" tabindex="0" required>
				        <label>Incoherent</label>
				      </div>
				    </div>
				</div>
				<br>
				<div class="field">
			    	<label style="font-size: 1.1em">Social Interaction :</label>
			    </div>
			    <div class="fields" style="font-size: 0.5em">
			   		<div class="field" style="font-size: 0.8em">
				      <div class="ui radio checkbox">
				        <input type="radio" name="socialinteraction" value="Appropriate" tabindex="0" required>
				        <label>Appropriate</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="socialinteraction" value="Dominating" tabindex="0" required>
				        <label>Dominating</label>
				      </div>
				    </div>
			   		<div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="socialinteraction" value="Aggressive" tabindex="0" required>
				        <label>Aggressive</label>
				      </div>
				    </div>
				</div>
				<br>
				<div class="field">
			    	<label style="font-size: 1.1em">Eye Contact :</label>
			    </div>
			    <div class="fields" style="font-size: 0.5em">
			   		<div class="field" style="font-size: 0.8em">
				      <div class="ui radio checkbox">
				        <input type="radio" name="eyecontact" value="Good" tabindex="0" required>
				        <label>Good</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="eyecontact" value="Occasional" tabindex="0" required>
				        <label>Occasional</label>
				      </div>
				    </div>
			   		<div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="eyecontact" value="Rare" tabindex="0" required>
				        <label>Rare</label>
				      </div>
				    </div>
			   		<div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="eyecontact" value="Vacant" tabindex="0" required>
				        <label>Vacant</label>
				      </div>
				    </div>			   		
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="eyecontact" value="Stare" tabindex="0" required>
				        <label>Stare</label>
				      </div>
				    </div>
				</div>
				<br>
				<div class="field">
			    	<label style="font-size: 1.1em">Sleep :</label>
			    </div>
			    <div class="fields" style="font-size: 0.5em">
			   		<div class="field" style="font-size: 0.8em">
				      <div class="ui radio checkbox">
				        <input type="radio" name="sleep" value="Normal" tabindex="0" required>
				        <label>Normal</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="ui radio checkbox">
				        <input type="radio" name="sleep" value="Abnormal" tabindex="0" required>
				        <label>Abnormal</label>
				      </div>
				    </div>
				</div>

				
			</div>
			<br>
			<div class="ui horizontal divider">
				Reference Documents
			</div><br>
			<?php
				while(1){
					$id=rand(10000,99999);
					$sqll="select * from studentproblems where problemid='$id'";
					$result = mysqli_query($conn, $sqll);
					if (mysqli_num_rows($result) == 0) {
						break;
					}
				}
			?>
			<div class="field">
				<label>Upload Documents</label>
				<input type="file" name="document1" accept=".pdf">
			</div>
			<input type="hidden" name="id" value="<?php echo($id) ?>">


			<br>
			<div class="ui horizontal divider">
				Declaration
			</div><br>
			<div class="field">
			    <div class="ui checkbox">
			      <input type="checkbox" tabindex="0" name="agree" required>
			      <label style="font-weight: bold;">I declare that all above stated information is accurate and true and I am seeking counselling voluntarily.</label>
			    </div>
			</div>





			<br>
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
	$('.message .close').on('click', function() {
    $(this).closest('.message').transition('fade');});
</script>
</html>