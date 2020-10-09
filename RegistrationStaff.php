<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='index1.php'</script>
<?php
exit();} 
 include 'Connections/registration.php'; 
$sql = "SELECT ros_id FROM roster where seminar='Food' ";
$result = $conn->query($sql);
$maxrows = $result->num_rows;
?>
<?php
/* $str = '1234567890';
$shuffled = str_shuffle($str);
$num = substr($shuffled ,0,4); */
$sqlmax = "SELECT max(ros_id) as num FROM roster ";
$resultmax = $conn->query($sqlmax);
$row = $resultmax->fetch_assoc();
$num=$row['num']+1;
//echo "num is ".$num;
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="register">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Puwanat Tongjok edited by Wut">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
  	
<script>
function goBack() {
    window.history.back();
}
</script>
<script>
var x = "<?php echo $maxrows;?>";
function codeform(){
if (x >= 1000) {
    document.getElementById("RegisterformAdmin").style.display = "none";
    document.getElementById("error").style.display = "";
} else {
    document.getElementById("RegisterformAdmin").style.display = "";
}
}
window.onload = codeform;
</script>
<title>Registration System</title>
</head>
<body>

<form action="insertStaff.php" method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other">
<!--form action="#" method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other"-->

		<fieldset class="border">
		    <div class="col-md-12" align="right">
				<a href="http://www.tistr.or.th"target="_blank">TISTR</a>
		    </div>	
        <img width="100%" src="images/Food-industry600429.jpg">
        </fieldset>
		<fieldset class="border">
            <div>
            <div class="legend2">Registration Form</div>
            <legend><font color="red">Ballroom D:</font> TISTR’s From Local to Global International Forum: OPENING<br>
           <font color="red">Monday 12 June 2017,</font> <br><br>Centara Grand Hotel at Central Lad Phrao, Bangkok, Thailand<br><br>Thailand Institute of Scientific and Technological Research (TISTR)</legend>
			<!--a href="index.php"><input class="button5" type="button" value="Home"></a-->
			<div class="row">
				<!--div class="col-md-2"-->
						<a href="RegistrationStaff.php" class="btn btn-primary" ><center>Home</center></a>
				<!--/div-->
				<!--div class="col-md-3"-->
						<!--a href="#" class="btn btn-success" disabled="disabled" align="right">Forum Materials Download</a-->
				<!--/div-->
			</div>
            <!--div id="error" style="display:none;" class="error-message">
			  <p>ขออภัย ขณะนี้มีผู้ลงทะเบียนเข้ารับการอบรมเต็มแล้ว</p>
			</div-->
        <div id="registerform" style="display: ;">
			<div class="error-message">
			  <p>Please fill out this form</p>
			</div>

			<div>
                <input type="hidden" name="ros_title" id="ros_title" value="">
            </div>

			<div class="icon">
				<label class="cd-label" for="ros_name">Name</label>
			  <input class="user" type="text" name="ros_name" id="ros_name" required>
			</div>

		  <div class="icon">
				<label class="cd-label" for="ros_surname">Surname</label>
			  <input class="user" type="text" name="ros_surname" id="ros_surname" required>
			</div>
            
            <div class="icon">
				<label class="cd-label" for="ros_position">Position</label>
			  <input class="company" type="text" name="ros_position" id="ros_position" required>
			</div> 

		    <div class="icon">
		    	<label class="cd-label" for="ros_organization">Organization</label>
			  <input class="bank" type="text" name="ros_organization" id="ros_organization" required>
		    </div>
            
            <div class="icon">
			  <label class="cd-label" for="ros_tel">Tel</label>
			  <input class="tel" type="text" name="ros_tel" id="ros_tel" >
			</div>

			<div class="icon">
			  <label class="cd-label" for="ros_fax">Fax</label>
			  <input class="tel" type="text" name="ros_fax" id="ros_fax" >
			</div>
            
            <div class="icon">
			  <label class="cd-label" for="ros_mobile">Mobile</label>
			  <input class="tel" type="text" name="ros_mobile" id="ros_mobile" required>
			</div> 

		    <div class="icon">
	    	  <label class="cd-label" for="ros_email">Email</label>
			  <input class="email" type="email" name="ros_email" id="ros_email" required>
		    </div>

<div>
				<h4><font color='red'>Please Select a Date</font></h4>

				<ul class="cd-form-list">
					<li>
						<input type="radio" name="radio-button" id="cd-radio-1" value="12" checked>
						<label for="cd-radio-1">Monday 12 June 2017</label>
					</li>
				</ul>
			</div>

<hr>
<br><br>
            <div>

            <a>For Internet Explorer ==> support at least IE 11</a>
            </div>
            <div align="right">
            <input class="button6" name="Button" type="button" value="Cancel" onclick="goBack()" >
            <input class="button5" type="submit" value="Submit">
		    </div>
			<div class="row">
			      <div class="col-md-12" align="justify">
				</div>
         </div>
		 </div>
		</fieldset>
		<input name="ros_id" type="hidden" value="">
        <input name="ros_ref" type="hidden" value="B<?php echo $num ; ?>">
        <input name="ros_time" type="hidden" value="">
	</form>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
</body>
</html>