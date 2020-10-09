<?php session_start(); 
$user_name=$_SESSION["user_name"];
$user_name=$w;
  $ip = $_SERVER['REMOTE_ADDR'];
  $value_ip = substr($ip,0,3);
if($user_name == '')
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <?
 	if($value_ip =='192'){
		?>
		<script>window.location="http://128.1.99.118/foodindustry/"</script>
        <?
	}else{
 ?>     
    <script>window.location="http://203.150.10.52/foodindustry/"</script>
    <?php }?>
 <!--script>window.location='http://www.tistr.or.th/54register/'</script-->
<?php
 exit();}
include 'Connections/registration.php'; ?>
<?php
$sql = "SELECT * FROM roster where user_name='$user_name' ";
$result = $conn->query($sql);
$maxrows = $result->num_rows;
$row = $result->fetch_assoc();

/* $str = '1234567890';
$shuffled = str_shuffle($str);
$num = substr($shuffled ,0,4); */
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
  	
<script>
function goBack() {
    window.history.back();
}
</script>
<script>
var x = "<?php echo $maxrows;?>";
function codeform(){
if (x >= 100) {
    document.getElementById("registerform").style.display = "none";
    document.getElementById("error").style.display = "";
} else {
    document.getElementById("registerform").style.display = "";
}
}
window.onload = codeform;
</script>
<title>ระบบลงทะเบียน</title>
</head>
<body>

<form action="edit.php" method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other"  >
		<fieldset class="border">
        <img width="100%" src="img/symposium.jpg">
        </fieldset>
        
		<fieldset class="border">
            <div>
            <div class="legend2">Registration Form</div>
            <legend>TISTR’s From Local to Global International Forum: Food Industry 4.0</legend>
            <legend>Monday 12 - Tuesday 13 June 2017, <br><br>Centara Grand Hotel at Central Lad Phrao, Bangkok, Thailand<br><br>Thailand Institute of Scientific and Technological Research (TISTR)</legend>
           </div>
            <div id="error" style="display:none;" class="error-message">
			  <p>ขออภัย ขณะนี้มีผู้ลงทะเบียนเข้ารับการอบรมเต็มแล้ว</p>
			</div>
        <div id="registerform" style="display: ;">
			<div class="error-message">
			  <p>Please fill out this form</p>
			</div>

			<div>
                <input type="hidden" name="ros_title" id="ros_title" value="">
				
            </div>

			<div class="icon">
				<label class="cd-label" for="ros_name">Name</label>
			  <input class="user" type="text" name="ros_name" id="ros_name" value="<? echo $row['ros_name'];?>" required>
			</div>

		  <div class="icon">
				<label class="cd-label" for="ros_surname">Surname</label>
			  <input class="user" type="text" name="ros_surname" id="ros_surname" value="<? echo $row['ros_surname'];?>">
			</div>
            
            <div class="icon">
				<label class="cd-label" for="ros_position">Position</label>
			  <input class="company" type="text" name="ros_position" id="ros_position" value="<? echo $row['ros_position'];?>">
			</div> 

		    <div class="icon">
		    	<label class="cd-label" for="ros_organization">Organization</label>
			  <input class="bank" type="text" name="ros_organization" id="ros_organization" value="<? echo $row['ros_organization'];?>">
		    </div>
            
            <div class="icon">
			  <label class="cd-label" for="ros_tel">Tel</label>
			  <input class="tel" type="text" name="ros_tel" id="ros_tel" value="<? echo $row['ros_tel'];?>">
			</div>

			<div class="icon">
			  <label class="cd-label" for="ros_fax">Fax</label>
			  <input class="tel" type="text" name="ros_fax" id="ros_fax" value="<? echo $row['ros_fax'];?>">
			</div>
            
            <div class="icon">
			  <label class="cd-label" for="ros_mobile">Mobile</label>
			  <input class="tel" type="text" name="ros_mobile" id="ros_mobile" value="<? echo $row['ros_mobile'];?>">
			</div> 

		    <div class="icon">
	    	  <label class="cd-label" for="ros_email">Email</label>
			  <input class="email" type="email" name="ros_email" id="ros_email" value="<? echo $row['ros_email'];?>" required>
		    </div>

<div>
				<h4><font color='red'>Please Select a Date</font></h4>

				<ul class="cd-form-list">
					<li>
						<input type="radio" name="radio-button" id="cd-radio-1" value="12" checked>
						<label for="cd-radio-1">Monday 12 June 2017</label>
					</li>
					<li>
						<input type="radio" name="radio-button" id="cd-radio-3" value="12-13">
						<label for="cd-radio-3">Monday 12 - Tuesday 13 June 2017</label>
					</li>						
					<li>
						<input type="radio" name="radio-button" id="cd-radio-2" value="13">
						<label for="cd-radio-2">Tuesday 13 June 2017</label>
					</li>

				</ul>
			</div>
			<div class="icon">
	    	  <label class="cd-label" for="memo">ระบุชื่อผู้ที่ได้รับจดหมายเชิญ แต่ไม่สามารถเข้าร่วมได้</label>
			  <input class="memo" type="text" name="memo" id="memo" value="<? echo $row['memo'];?>">
		    </div>

<hr>
<br><br>
          <div>

            <a>For Internet Explorer ==> support at least IE 11</a>
            </div>
            <div align="right">
            <input class="button6" name="Button" type="button" value="Cancel" onclick="goBack()" >
            <input class="button5" type="submit" value="Submit" >
		    </div>
            <legend>Asking for Information<br> Ms. Pimprapai Supornrat (02577-9245), Mrs. Jansuda Kampa (02577-9155)</legend>
			<legend>E-mail : tistrforum@tistr.or.th</legend>
         </div>
		</fieldset>
		<input name="ros_id" type="hidden" value="">
		<input type="hidden" name="ros_id" id="ros_id" value="<? echo $row['ros_id'];?>">
        <input name="ros_ref" type="hidden" value="B<?php echo $row['ros_id']; ?>">
        <input name="ros_time" type="hidden" value="">
	</form>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
</body>
</html>