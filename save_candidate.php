<?session_start();
	include("connectDB.php");
	if(!isset($_POST['submit']) || !isset($_POST['capt'])) {
	//Form not submit return error
	echo "<script>alert('กรุณากรอกอักขระให้ถูกต้องหรือกดที่ภาพเพื่อเปลี่ยนใหม่ค่ะ')</script>";
	echo"<script>history.back();</script>"; 
	exit();
	
}

//session must be start to perform check

//check input capt with session captcha
if($_SESSION['captcha']!=$_POST['capt'] || $_SESSION['captcha']=='BADCODE')
    { 
     //wrong captcha exit the program not continue.
	echo "<script>alert('กรุณากรอกอักขระให้ตรงค่ะ')</script>";
	echo"<script>history.back();</script>"; 
	 exit();
	}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
require("mail/class.phpmailer.php");
function SendMailAllPerson($From,$FromName,$AddAddress,$Subject,$Body){
														$mail = new PHPMailer();
														$mail->IsSMTP();
														$mail->IsHTML(true);
														$mail->SMTPAuth = true;
														//$mail->SMTPSecure = "tls"; //old
														$mail->SMTPSecure = "ssl";
														//$mail->CharSet = "tis-620";
														$mail->CharSet = "utf-8";
														$mail->Host = "outgoing.mail.go.th"; 
														$mail->Port = 465; 
														$mail->Username = "pvs@tistr.or.th";
														$mail->Password = "yuwadee5306";
														$mail->From = $From;
														$mail->FromName = $FromName;
														$mail->AddAddress($AddAddress);
														$mail->Subject = $Subject;
														$mail->Body = $Body;
														$mail->Send();
}
 /*   $course_id = $_Post['course_id'];
 	echo "course_id is ".$course_id;
    echo "<script>alert('เพิ่มข้อมูลเรียบร้อยค่ะ')</script>" */
if(trim($_POST["candidate_fname"]) == "")
{
		echo "<script>alert('กรุณาเลือกกรอกชื่อด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	} 
if(trim($_POST["candidate_lname"]) == "")
{
		echo "<script>alert('กรุณาเลือกกรอกนามสกุลด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	} 
if(trim($_POST["position_name"]) == "")
{
		echo "<script>alert('กรุณาเลือกกรอกตำแหน่งด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	} 
if(trim($_POST["candidate_email"]) == "")
{
		echo "<script>alert('กรุณาเลือกใส่อีเมลด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	} 
	if(trim($_POST["nameofentry"]) == "")
{
		echo "<script>alert('กรุณาระบุ ชื่อผู้แจ้งด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
		if(trim($_POST["positionentry"]) == "")
{
		echo "<script>alert('กรุณาระบุตำแหน่งด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	} 
			if(trim($_POST["emailentry"]) == "")
{
		echo "<script>alert('กรุณาระบุอีเมลผู้ประสานงานด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
				if(trim($_POST["emergencyentry"]) == "")
{
		echo "<script>alert('กรุณาระบุเบอร์โทรฉุกเฉินด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
					if(trim($_POST["mobileentry"]) == "")
{
		echo "<script>alert('กรุณาระบุเบอร์มือถือด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
						if(trim($_POST["companyname"]) == "")
{
		echo "<script>alert('กรุณาระบุชื่อหน่วยงานด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
					if(trim($_POST["newsentry"]) == "")
{
		echo "<script>alert('กรุณาระบุแหล่งที่ท่านทราบข่าวอบรมด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
					if(trim($_POST["taxentry"]) == "")
{
		echo "<script>alert('กรุณาระบุรหัสผู้เสียภาษีด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
					if(trim($_POST["branchentry"]) == "")
{
		echo "<script>alert('กรุณาระบุลำดับสาขาด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
					if(trim($_POST["typeofbusiness"]) == "")
{
		echo "<script>alert('กรุณาระบุประเภทธุรกิจด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
						if(trim($_POST["address_no"]) == "")
{
		echo "<script>alert('กรุณาระบุที่อยู่ออกใบเสร็จด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
						if(trim($_POST["province"]) == "")
{
		echo "<script>alert('กรุณาระบุรหัสจังหวัดด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
						if(trim($_POST["zipcodeentry"]) == "")
{
		echo "<script>alert('กรุณาระบุรหัสไปรษณีย์ด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
						if(trim($_POST["telephoneentry"]) == "")
{
		echo "<script>alert('กรุณาระบุเบอร์โทรศัพท์ด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
//define email record	
	$x=1;
	if($_POST["candidate_fname1"]<> "") $x=$x+1;
    if($_POST["candidate_fname2"]<> "") $x=$x+1;
    if($_POST["candidate_fname3"]<> "") $x=$x+1;
	//echo "x is ".$x."<br>";
	$sqlNew="SELECT * from tbform_course where course_id ='$course_id' ";
	$result=mysql_query($sqlNew);	
	$rows=mysql_fetch_array($result);
	//$name_course=iconv('TIS-620','UTF-8',$rows["name_course"]);
	$name_course=$rows["name_course"];
	//echo "name_course is ".$name_course."<br>";
//random password
function random_password($len)
{
	srand((double)microtime()*10000000);
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++)
	{
		$ret_str.= $chars[rand()%$num];
		$ret_str.=""; 
	}
	return $ret_str; 
}
$passw = random_password(7); // echo random_password(8); 
//email config
$from	="pvs@tistr.or.th";
$fromname="หน่วยบริการฝึกอบรม      สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย";
$subject="แจ้งผลการลงทะเบียนฝึกอบรม";
$msgsp="<br><br>"." หมายเหตุ "."<br>"."1) หากท่านมีความต้องการพิเศษเพิ่มเติมกรุณาแจ้งเพิ่มได้ทางอีเมล์นี้ "."<br>";
$msgsp .="2) เพื่อความสะดวกกรุณาเดินทางด้วยรถสาธารณะและมาก่อนเวลา"."<br>";
$msgsp .="3) ถ้ามีการเปลี่ยนแปลงใด ๆ กรุณาแจ้งผ่านทางอีเมลหรือโทรติดต่อเจ้าหน้าที่โดยตรง"."<br>";
$msgsp .="4) กรณีมีการเปลี่ยนแปลงผู้เข้าอบรมกรุณาแจ้งผ่านทางอีเมลนี้";

//loop insert data
for($i=1;$i<=$x;$i++)
{
	//echo "i is ".$i."<br>";
   $sqlstr= "INSERT INTO  operator(USER_ID,USER_PASSWORD,title_name,operator_fname,operator_lname,operator_tel,agencies,agencies_tel,address_no,road,sub_district,district,province,zip_code,fax,email,typeofbusiness,positionentry,newentry,companyname,taxentry,branchentry,addressentry,wwwentry,journey,flag) VALUES"; 
   $sqlstrre="'$telephoneentry','$nameofentry','$mobileentry','$address_no','$road','$sub_district','$district','$province','$zipcodeentry','$faxentry','$emailentry','$typeofbusiness','$positionentry','$newsentry','$companyname','$taxentry','$branchentry','$addressentry','$wwwentry','$journey','public') ";
   if($i==1){
	//declare email   
	$to="$candidate_email";
    $message="เรียน คุณ".$candidate_fname." ".$candidate_lname."<br><br>"."ตามที่ท่านได้ลงทะเบียนฝึกอบรมกับทาง วว. ในหลักสูตรรหัส ".$course_id."   ชื่อหลักสูตร ".$name_course."  นั้น<br>"." ทาง วว. ขอแจ้งว่าท่านสามารถส่งใบยืนยันการชำระเงินได้ทางอีเมลฉบับนี้ "."<br>";
    $message .= "<br> รวมเป็นค่าใช้จ่ายทั้งสิ้น ".number_format($price,2)." บาท";
	//check useroperator
    $sqlCheckUser = "SELECT * FROM operator where USER_ID='$candidate_email' ORDER BY USER_ID ASC LIMIT 0,1 ";
	$resultCheckUser			=  mysql_query($sqlCheckUser);	
	$rowsCheckUser				=   mysql_fetch_array($resultCheckUser);
	if($rowsCheckUser['USER_ID']!=""){
		$passw = $rowsCheckUser['USER_PASSWORD'];
	}else{	
        $passw = random_password(7);
		$sqlstr .= " ('$candidate_email','$passw','$title_name','$candidate_fname','$candidate_lname',";
        $sqlstr .=$sqlstrre;
        $dbquery = mysql_query($sqlstr);
	}
    $message .= "<br>"."ชื่อผู้ใช้งาน (username) คือ ".$candidate_email."<br>"." รหัสผ่าน (password) คือ ".$passw."<br><br><br>"."ขอแสดงความนับถือ"."<br><br>"."นพวรรณ หาแก้ว, เอก ธนกิจวนิชกุล"."<br>"."หน่วยบริการฝึกอบรม  โทร.02-5779517";
    $message .=$msgsp;
    $sqlreg = "INSERT INTO  register_course(courseID,user_id,date_regis,price,regis_verify,regis_dateverify,flag,status,amount)
    VALUES ('$course_id','$candidate_email',Now(),'$price','training@tistr.or.th',Now(),'public','Y',1) ";
	$dbquery = mysql_query($sqlreg);
 //echo "sql is ".$sqlstr."<br>";
    $sql = "INSERT INTO  candidate(register_course_id,title_name,candidate_fname,candidate_lname,position_name,food,flag,candidate_email,candidate_tel) 
	VALUES ('$course_id','$title_name','$candidate_fname','$candidate_lname','$position_name','$food','public','$candidate_email','$mobileentry')";
	$dbquery = mysql_query($sql);
 //echo "<br>"."sql_regiscourse is ".$sqlreg."<br>";	
	SendMailAllPerson($from,$fromname,$to,$subject,$message);
   }
   if($i==2){
	//declare email 
	$to1="$candidate_email1";
	$message1="เรียน คุณ".$candidate_fname1." ".$candidate_lname1."<br><br>"."ตามที่ท่านได้ลงทะเบียนฝึกอบรมกับทาง วว. ในหลักสูตรรหัส ".$course_id."   ชื่อหลักสูตร ".$name_course."  นั้น<br>"." ทาง วว. ขอแจ้งว่าท่านสามารถส่งใบยืนยันการชำระเงินได้ทางอีเมลฉบับนี้ "."<br>";
    $message1 .= "<br> รวมเป็นค่าใช้จ่ายทั้งสิ้น ".number_format($price,2)." บาท";
    $sqlCheckUser = "SELECT * FROM operator where USER_ID='$candidate_email1' ORDER BY USER_ID ASC LIMIT 0,1 ";
	$resultCheckUser			=  mysql_query($sqlCheckUser);	
	$rowsCheckUser				=   mysql_fetch_array($resultCheckUser);
	if($rowsCheckUser['USER_ID']!=""){
		$passw1 = $rowsCheckUser['USER_PASSWORD'];
	}else{
        $passw1 = random_password(7);
		$sqlstr .= " ('$candidate_email1','$passw1','$title_name1','$candidate_fname1','$candidate_lname1',";
		$sqlstr .=$sqlstrre;
		$dbquery = mysql_query($sqlstr);
	}
    $message1 .= "<br>"."ชื่อผู้ใช้งาน (username) คือ ".$candidate_email1."<br>"." รหัสผ่าน (password) คือ ".$passw1."<br><br><br>"."ขอแสดงความนับถือ"."<br><br>"."นพวรรณ หาแก้ว, เอก ธนกิจวนิชกุล"."<br>"."หน่วยบริการฝึกอบรม  โทร.02-5779517";
    $message1 .=$msgsp; 
    $sqlreg = "INSERT INTO  register_course(courseID,user_id,date_regis,price,regis_verify,regis_dateverify,flag,status,amount)
    VALUES ('$course_id','$candidate_email1',Now(),'$price','training@tistr.or.th',Now(),'public','Y',1) ";
    $dbquery = mysql_query($sqlreg);
  //echo "sql is ".$sqlstr."<br>";
    $sql = "INSERT INTO  candidate(register_course_id,title_name,candidate_fname,candidate_lname,position_name,food,flag,candidate_email,candidate_tel) 
	VALUES ('$course_id','$title_name1','$candidate_fname1','$candidate_lname1','$position_name1','$food1','public','$candidate_email1','$mobileentry')";
	$dbquery = mysql_query($sql);
  //echo "<br>"."sql_regiscourse is ".$sqlreg."<br>";
	SendMailAllPerson($from,$fromname,$to1,$subject,$message1);
   }
  if($i==3){
	//declare email 
	$to2="$candidate_email2";
    $message2="เรียน คุณ".$candidate_fname2." ".$candidate_lname2."<br><br>"."ตามที่ท่านได้ลงทะเบียนฝึกอบรมกับทาง วว. ในหลักสูตรรหัส ".$course_id."   ชื่อหลักสูตร ".$name_course."  นั้น<br>"." ทาง วว. ขอแจ้งว่าท่านสามารถส่งใบยืนยันการชำระเงินทางอีเมลฉบับนี้ "."<br>";
    $message2 .= "<br> รวมเป็นค่าใช้จ่ายทั้งสิ้น ".number_format($price,2)." บาท";
	//check useroperator
    $sqlCheckUser = "SELECT * FROM operator where USER_ID='$candidate_email2' ORDER BY USER_ID ASC LIMIT 0,1 ";
	$resultCheckUser			=  mysql_query($sqlCheckUser);	
	$rowsCheckUser				=   mysql_fetch_array($resultCheckUser);
	if($rowsCheckUser['USER_ID']!=""){
      $passw2 = $rowsCheckUser['USER_PASSWORD'];
    }else{
	  $passw2 = random_password(7);
	  $sqlstr .= " ('$candidate_email2','$passw2','$title_name2','$candidate_fname2','$candidate_lname2',";
      $sqlstr .=$sqlstrre;
      $dbquery = mysql_query($sqlstr);
	}
    $message2 .= "<br>"."ชื่อผู้ใช้งาน (username) คือ ".$candidate_email2."<br>"." รหัสผ่าน (password) คือ ".$passw2."<br><br><br>"."ขอแสดงความนับถือ"."<br><br>"."นพวรรณ หาแก้ว, เอก ธนกิจวนิชกุล"."<br>"."หน่วยบริการฝึกอบรม  โทร.02-5779517";
    $message2 .=$msgsp;
    $sqlreg = "INSERT INTO  register_course(courseID,user_id,date_regis,price,regis_verify,regis_dateverify,flag,status,amount)
    VALUES ('$course_id','$candidate_email2',Now(),'$price','training@tistr.or.th',Now(),'public','Y',1) ";
	$dbquery = mysql_query($sqlreg);
  //echo "sql is ".$sqlstr."<br>";
    $sql = "INSERT INTO  candidate(register_course_id,title_name,candidate_fname,candidate_lname,position_name,food,flag,candidate_email,candidate_tel) 
	VALUES ('$course_id','$title_name2','$candidate_fname2','$candidate_lname2','$position_name2','$food','public','$candidate_email2','$mobileentry')";
	$dbquery = mysql_query($sql);
  //echo "<br>"."sql_regiscourse is ".$sqlreg."<br>";
	SendMailAllPerson($from,$fromname,$to2,$subject,$message2);
   }
    if($i==4){
	  //declare email 
	    $to3="$candidate_email3";
        $message3="เรียน คุณ".$candidate_fname3." ".$candidate_lname3."<br><br>"."ตามที่ท่านได้ลงทะเบียนฝึกอบรมกับทาง วว. ในหลักสูตรรหัส ".$course_id."   ชื่อหลักสูตร ".$name_course."  นั้น<br>"." ทาง วว. ขอแจ้งว่าท่านสามารถส่งใบยืนยันการชำระเงินได้ทางอีเมล์ฉบับนี้ "."<br>";
        $message3 .= "<br> รวมเป็นค่าใช้จ่ายทั้งสิ้น ".number_format($price,2)." บาท";
		//check useroperator
        $sqlCheckUser = "SELECT * FROM operator where USER_ID='$candidate_email3' ORDER BY USER_ID ASC LIMIT 0,1 ";
		$resultCheckUser			=  mysql_query($sqlCheckUser);	
		$rowsCheckUser				=   mysql_fetch_array($resultCheckUser);
	if($rowsCheckUser['USER_ID']!=""){	
	    $passw3 = $rowsCheckUser['USER_PASSWORD'];
    }else{
        $passw3 = random_password(7);
		$sqlstr .= " ('$candidate_email3','$passw3','$title_name3','$candidate_fname3','$candidate_lname3',";
		$sqlstr .=$sqlstrre;
		$dbquery = mysql_query($sqlstr);
	}
        $message3 .= "<br>"."ชื่อผู้ใช้งาน (username) คือ ".$candidate_email3."<br>"." รหัสผ่าน (password) คือ ".$passw3."<br><br><br>"."ขอแสดงความนับถือ"."<br><br>"."นพวรรณ หาแก้ว, เอก ธนกิจวนิชกุล"."<br>"."หน่วยบริการฝึกอบรม  โทร.02-5779517";
        $message3 .=$msgsp;
        $sqlreg = "INSERT INTO  register_course(courseID,user_id,date_regis,price,regis_verify,regis_dateverify,flag,status,amount)
        VALUES ('$course_id','$candidate_email3',Now(),'$price','training@tistr.or.th',Now(),'public','Y',1) ";
	    $dbquery = mysql_query($sqlreg);
    //echo "sql is ".$sqlstr."<br>";
        $sql = "INSERT INTO  candidate(register_course_id,title_name,candidate_fname,candidate_lname,position_name,food,flag,candidate_email,candidate_tel) 
	    VALUES ('$course_id','$title_name3','$candidate_fname3','$candidate_lname3','$position_name3','$food','public','$candidate_email3','$mobileentry')";
	    $dbquery = mysql_query($sql);
	//echo "<br>"."sql_regiscourse is ".$sqlreg."<br>";
	SendMailAllPerson($from,$fromname,$to3,$subject,$message3);
   }
}
  if($emailentry<>$candidate_email){
  $passw4 = random_password(7);
  $totalprice=$price*$x;
  $to4="$emailentry";
  $message4="เรียน คุณ".$nameofentry."  (ในฐานะผู้ประสานงาน)<br><br>"."ตามที่ท่านได้ลงทะเบียนฝึกอบรมกับทาง วว. ในหลักสูตรรหัส ".$course_id."   ชื่อหลักสูตร ".$name_course."  นั้น<br>"." ทาง วว. ขอแจ้งว่าท่านสามารถส่งใบยืนยันการชำระเงินได้ตาม link "."<br>";
  $message4 .= "<br>"."รายชื่อผู้ลงทะเบียนมีดังนี้  ".$candidate_fname." ".$candidate_lname.",".$candidate_fname1." ".$candidate_lname1.",".$candidate_fname2." ".$candidate_lname2.",".$candidate_fname3." ".$candidate_lname3;
  $message4 .= "<br> รวมเป็นค่าใช้จ่ายทั้งสิ้น ".number_format($totalprice,2)." บาท";
  $message4 .= "<br><br>"."ชื่อผู้ใช้งาน (username) คือ ".$emailentry."<br>"." รหัสผ่าน (password) คือ ".$passw4;

  $message4 .= "<br><br><br>"."ขอแสดงความนับถือ"."<br><br>"."นพวรรณ หาแก้ว, เอก ธนกิจวนิชกุล"."<br>"."หน่วยบริการฝึกอบรม  โทร.02-5779517";
  $message4 .=$msgsp;
  SendMailAllPerson($from,$fromname,$to4,$subject,$message4);
  }
	//}
	echo "<script>alert ('ท่านได้ลงทะเบียนเรียบร้อยแล้ว');</script>";
	echo "<script>window.location='http://128.1.99.118/knowledge/'</script>";
	

?>
