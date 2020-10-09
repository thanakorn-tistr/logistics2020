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
$sqlmail = "SELECT ros_id FROM roster where ros_email=$email ";
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
														$mail->Username = "tistrcustomer@tistr.or.th";
														$mail->Password = "Tistr2017";
														$mail->From = $From;
														$mail->FromName = $FromName;
														$mail->AddAddress($AddAddress);
														$mail->Subject = $Subject;
														$mail->Body = $Body;
														$mail->Send();
}
$sql = "SELECT ros_id FROM roster where seminar='tistrcust' and valid = 1 ";
$result = $conn->query($sql);
$maxrows = $result->num_rows;

if ($maxrows <= 50){
$sql = "INSERT INTO roster (ros_ref, ros_title, ros_name, ros_surname, ros_position, ros_organization, ros_tel, ros_fax, ros_mobile, ros_email, datein, seminar, ros_time) VALUES ('$ref', '$title', '$name', '$surname', '$position', '$organization', '$tel', '$fax', '$mobile', '$email', '$datein', 'tistrcust', now()) ";
//$sql = "INSERT INTO roster (ros_ref, ros_title, ros_name, ros_surname, ros_position, ros_organization, ros_tel, ros_fax, ros_mobile, ros_email, datein, seminar, ros_time) VALUES ('$ref', '$title', '$name', '$surname', '$position', '$organization', '$tel', '$fax', '$mobile', '$email', '$datein', 'Food', now()) ON DUPLICATE KEY UPDATE ros_ref=ros_ref+1";
//echo "sql is ".$sql;
if ($conn->query($sql) === TRUE) {
//update

//************email to admin
    $date = date("Y-m-d");
    $time = date("H:i:s");
	$th=mktime(gmdate("H")+7,gmdate("i"),gmdate("m"),gmdate("d"),gmdate("Y"));
//$format="d/m/y H:i a";
 $format="H:i a";
$str1=date($format,$th);
     //echo "datestr ".$str1;
$to1 = $email;
$from1	="tistrcustomer@tistr.or.th";
$fromname="โครงการพัฒนาและส่งเสริมความสัมพันธ์กับลูกค้า";
$subject1="ลงทะเบียนโครงการพัฒนาและส่งเสริมความสัมพันธ์กับลูกค้า";
$message1="เรียน คุณ ".$name." ".$surname.",<br><br> ขอบคุณท่านผู้มีอุปการะคุณที่สนใจโครงการพัฒนาและส่งเสริมความสัมพันธ์กับลูกค้า  <br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย <br> อย่างไรก็ตามเนื่องจากมีผู้ลงทะเบียนจำนวนมาก ดังนั้นโปรดรออีเมลเพื่อยืนยันการเข้าร่วมงานอีกครั้งหนึ่ง<br><br>";
$message1.="ขอแสดงคามนับถือ<br><br>โครงการพัฒนาและส่งเสริมความสัมพันธ์กับลูกค้า<br>Tel (66)2577-9517 , Fax + (66)2577-9009<br>***กรุณาอย่าตอบกับทางอีเมลนีื***";//อาจจะต้องแก้ไขวันที่
SendMailAllPerson($from1,$fromname,$to1,$subject1,$message1);
//************email to paticipate
$to = "tistrcustomer@tistr.or.th";
$from	="tistrcustomer@tistr.or.th";
$subject="แจ้งมีผู้ลงทะเบียนเพิ่มเติมในงานสัมมนาโครงการพัฒนาและส่งเสริมความสัมพันธ์กับลูกค้า ";
$message="เรียน ท่านผู้ดูแลระบบ"."<br><br>ขณะนี้มีผู้ลงทะเบียนเพิ่มเติมได้แก่   คุณ".$name." ".$surname."  หน่วยงาน  ".$organization."<br><br>ขอบคุณครับ<br><br>จาก Digital Team...".$date." / ".$str1;
SendMailAllPerson($from,$fromname,$to,$subject,$message);

        echo "<script type='text/javascript'>alert('เนื่องจากผู้เข้าร่วมงานมีเป็นจำนวนมาก...กรุณารอรับการยืนยันทางอีเมลอีกครั้งค่ะ')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=finished.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ

    //header('Location: finished.php');
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
    header('Location: registrationform.php');
}


$conn->close();

?>