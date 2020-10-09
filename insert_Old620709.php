<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include 'Connections/registration.php'; ?>
<?php
$id = $_POST['ros_id'];
$ref = $_POST['ros_ref'];
$title = $_POST['ros_title'];
$name = $_POST['ros_name'];
$surname = $_POST['ros_surname'];
$position = $_POST['ros_position'];
$organization = $_POST['ros_organization'];
$tel = $_POST['ros_tel'];
$fax = $_POST['ros_fax'];
$mobile = $_POST['ros_mobile'];
$email = $_POST['ros_email'];
$time = $_POST['ros_time'];
$datein = "25";
$sqlmail = "SELECT ros_id FROM roster where ros_email=$email and seminar='sfst'";
$resultemail = $conn->query($sqlmail);
//*******************************************************create email
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
														$mail->Username = "thanakorn@tistr.or.th";
														$mail->Password = "Thekopman999";
														$mail->From = $From;
														$mail->FromName = $FromName;
														$mail->AddAddress($AddAddress);
														$mail->Subject = $Subject;
														$mail->Body = $Body;
														$mail->Send();
}
$sql = "SELECT ros_id FROM roster where seminar='sfst' and valid = 1 ";
$result = $conn->query($sql);
$maxrows = $result->num_rows;


if ($maxrows <= 80){
$sql = "INSERT INTO roster (ros_ref, ros_title, ros_name, ros_surname, ros_position, ros_organization, ros_tel, ros_fax, ros_mobile, ros_email, datein, seminar, ros_time, valid) VALUES ('$ref', '$title', '$name', '$surname', '$position', '$organization', '$tel', '$fax', '$mobile', '$email', '$datein', 'sfst', now(), 1) ";
//$sql = "INSERT INTO roster (ros_ref, ros_title, ros_name, ros_surname, ros_position, ros_organization, ros_tel, ros_fax, ros_mobile, ros_email, datein, seminar, ros_time) VALUES ('$ref', '$title', '$name', '$surname', '$position', '$organization', '$tel', '$fax', '$mobile', '$email', '$datein', 'Food', now()) ON DUPLICATE KEY UPDATE ros_ref=ros_ref+1";
//echo "sql is ".$sql;
if ($conn->query($sql) === TRUE) {
//update
	$querynew="SELECT ros_id FROM `roster` ORDER BY ros_id desc limit 1";
	//echo "sql is ".$querynew."<br>";
	$rowsnew = $conn->query($querynew);
	$row2 = $rowsnew->fetch_assoc();
	//$resultnew=mysql_query($querynew) or die(mysql_error().":<br />");	
	//$rowsnew=mysql_fetch_array($resultnew);
	//$id=$rowsnew['ros_id'];
	$id=$row2['ros_id'];
	$sql1 = "SELECT * FROM roster where ros_id = $id";
	//echo "sql is ".$sql1."<br>";
    $rowsnew2 = $conn->query($sql1);
	$rows = $rowsnew2->fetch_assoc();
//************email to admin
    $date = date("Y-m-d");
    $time = date("H:i:s");
	$th=mktime(gmdate("H")+7,gmdate("i"),gmdate("m"),gmdate("d"),gmdate("Y"));
//$format="d/m/y H:i a";
 $format="H:i a";
$str1=date($format,$th);
     //echo "datestr ".$str1;
$to = $email;
$from	="thanakorn@tistr.or.th";
$fromname="โครงการการทดสอบอาหารปลอดภัย(การปลอมปนในน้ำผลไม้)ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN";
$subject="ยืนยันการลงทะเบียนสัมมนาโครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN";
$message="เรียน คุณ  ".$rows['ros_name']." ".$rows['ros_surname'].",<br><br>  ท่านได้รับการยืนยันให้เข้าร่วมสัมมนาโครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN, โดยมีรหัสผ่าน  <h2>".$rows['ros_ref']."</h2>  ในวันอังคารที่ 23 กรกฏาคม 2562 "."<h2>ณ โรงแรมเดอะ เบอร์เคลีย์ โฮเต็ล ประตูน้ำ (The Berkeley Hotel Pratunam, Thailand)</h2><br><br>ขอแสดงความนับถือ<br><br>โครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN <br>โทรศัพท์ 0 2323 1672-80 ต่อ 107, 0 2577 9301 , โทรสาร 0 2323 9165<br>***กรุณาอย่าตอบกับทางอีเมลนีื***";//อาจจะต้องแก้ไขวันที่
//$msgsp="<br><br>"." หมายเหตุ "."<br>"."1) หากท่านมีความต้องการพิเศษเพิ่มเติมกรุณาแจ้งเพิ่มได้ทางอีเมล์นี้ "."<br>";
//$msgsp .="2) เพื่อความสะดวกกรุณาเดินทางด้วยรถสาธารณะและมาก่อนเวลา"."<br>";
//$msgsp .="3) ถ้ามีการเปลี่ยนแปลงใด ๆ กรุณาแจ้งผ่านทางอีเมลหรือโทรติดต่อเจ้าหน้าที่โดยตรง"."<br>";
//$message .=$msgsp;
SendMailAllPerson($from,$fromname,$to,$subject,$message);
$to3 = "thanakorn@tistr.or.th";
$from3	="thanakorn@tistr.or.th";
$subject3="แจ้งมีผู้ลงทะเบียนเพิ่มเติมงานสัมมนาโครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN ";
$message3="เรียน ท่านผู้ดูแลระบบ"."<br><br>ขณะนี้มีผู้ลงทะเบียนเพิ่มเติมและอยู่ในช่วง 70 ท่าน ระบบได้ตอบรับอัตโนมัติได้แก่   คุณ".$rows['ros_name']." ".$rows['ros_surname']."  โดยมีรหัสผ่าน  <h2>".$rows['ros_ref']."</h2>. หน่วยงาน  ".$organization."<br><br>ขอบคุณครับ<br><br>จาก Digital Team...".$date." / ".$str1;
SendMailAllPerson($from3,$fromname,$to3,$subject3,$message3);
    //header('Location: finished.php');
	//echo "<script type='text/javascript'>alert('Confimation successful')</script>";
	//echo "<meta http-equiv ='refresh'content='0;URL=finished.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
    //header('Location: registrationform.php');
$to1 = $email;
$from1	="thanakorn@tistr.or.th";
$fromname="โครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN";
$subject1="ลงทะเบียนโครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN";
$message1="เรียน คุณ ".$name." ".$surname.",<br><br> ขอบคุณท่านผู้มีอุปการะคุณที่สนใจเข้าร่วมสัมมนาโครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN  <br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย <br> อย่างไรก็ตามเนื่องจากมีผู้ลงทะเบียนจำนวนมาก ดังนั้นโปรดรออีเมลเพื่อยืนยันการเข้าร่วมงานอีกครั้งหนึ่ง<br><br>";
$message1.="ขอแสดงคามนับถือ<br><br>โครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN<br>โทรศัพท์ 0 2323 1672-80 ต่อ 107, 0 2577 9301 , โทรสาร 0 2323 9165<br>***กรุณาอย่าตอบกับทางอีเมลนีื***";//อาจจะต้องแก้ไขวันที่
SendMailAllPerson($from1,$fromname,$to1,$subject1,$message1);
//************email to paticipate
$to2 = "thanakorn@tistr.or.th";
$from2	="thanakorn@tistr.or.th";
$subject2="แจ้งมีผู้ลงทะเบียนเพิ่มเติมในงานสัมมนาโครงการการทดสอบอาหารปลอดภัย (การปลอมปนในน้ำผลไม้) ในภูมิภาคอาเซียน Food safety testing (fruit juice adulteration) in ASEAN ";
$message2="เรียน ท่านผู้ดูแลระบบ"."<br><br>ขณะนี้มีผู้ลงทะเบียนเพิ่มเติมได้แก่   คุณ".$rows['ros_name']." ".$rows['ros_surname']."  หน่วยงาน  ".$organization."<br><br>ขอบคุณครับ<br><br>จาก Digital Team...".$date." / ".$str1;
SendMailAllPerson($from2,$fromname,$to2,$subject2,$message2);

        echo "<script type='text/javascript'>alert('เนื่องจากผู้เข้าร่วมงานมีเป็นจำนวนมาก...กรุณารอรับการยืนยันทางอีเมลอีกครั้งค่ะ')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=finished.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
}


$conn->close();

?>