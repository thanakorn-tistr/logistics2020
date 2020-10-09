<?php include 'Connections/registration.php'; ?>
<?php
$sql = "SELECT ros_id FROM roster where seminar='logistic2020' ";
$result = $conn->query($sql);
$maxrows = $result->num_rows;
?>
<?php
/* $str = '1234567890';
$shuffled = str_shuffle($str);
$num = substr($shuffled ,0,4); */
$sqlmax = "SELECT max(ros_id) as num FROM roster where seminar='logistic2020' ";
$resultmax = $conn->query($sqlmax);
$row = $resultmax->fetch_assoc();
//$saveid = $resultmax->insert_id;
//$num = $saveid;
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
if (x > 80) {
    document.getElementById("registerform").style.display = "none";
    document.getElementById("error").style.display = "";
} else {
    document.getElementById("registerform").style.display = "";
}
}
window.onload = codeform;
</script>
<title>Registration System</title>
</head>
<body>

<form action="insert.php" method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other">

		<fieldset class="border">
		    <div class="col-md-12" align="right">
				<a href="http://www.tistr.or.th"target="_blank">TISTR</a>
		    </div>	
        <img width="100%" src="images/banner_logistic2020.jpg">
        </fieldset>
		<fieldset class="border">
            <div>
            <div class="legend2">Registration Form</div>
            <legend>โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal <p></p>“ทิศทางโลจิสติกส์ไทยหลัง โควิด-19 ฝ่าวิกฤติเศรษฐกิจไทย ด้วยระบบโลจิสติกส์สมัยใหม่  <br>เสวนา ความปลอดภัยในการขนส่งสินค้าและวัตถุอันตราย ” <br>
           <font color="red">วันอังคารที่ 22 กันยายน 2563  เวลา 08.30 - 13.30 น.</font> <br><br> ณ โรงแรมเดอะ เบอร์เคลีย์ โฮเต็ล ประตูน้ำ กรุงเทพฯ (The Berkeley Hotel Pratunam, Thailand) <br>จัดโดย สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย (วว.)</legend>
			<!--a href="index.php"><input class="button5" type="button" value="Home"></a-->
			<div class="row">
				<!--div class="col-md-2"-->
						<a href="index.php" class="btn btn-primary" ><center>หน้าหลัก</center></a>
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
			  <input class="tel" type="text" name="ros_tel" id="ros_tel" required>
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

<hr>
<br><br>
            <div>

            <a>For Internet Explorer ==> support at least IE 11</a>
            </div>
            <div align="center">
            <input class="button6" name="Button" type="button" value="Cancel" onclick="goBack()" >
            <input class="button5" type="submit" value="Submit">
		    </div>
			<div class="row">
			      <div class="col-md-12" align="justify">
				<table class="" align="center">
					<tbody>
							<td width="10%"><span style="font-weight:bold"><br><center>Contact us</center></span><br>
								<span style="font-weight:bold"><center>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย (วว.)</center></span>
								<span style="font-weight:bold"><center>เทคโนธานี ต.คลองห้า อ.คลองหลวง จ.ปทุมธานี 12120</center></span>
								<span style="font-weight:bold"><center>คุณเอก ธนกิจวนิชกุล โทรศัพท์ 0 2577 9517</center></span><br>	
								<center>Email: training@tistr.or.th</center><p><p>
							</td>
						<tr>
					<div class="clearfix visible-lg"></div>
			    </table>
			</div>
         </div>
		 </div>
		</fieldset>
		<input name="ros_id" type="hidden" value="">
        <input name="ros_ref" type="hidden" value="logistic<?php echo $num ; ?>">
        <input name="ros_time" type="hidden" value="">
	</form>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
</body>
</html>