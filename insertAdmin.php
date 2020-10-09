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
$datein = $_POST['radio-button'];
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
														$mail->Username = "thanakorn@tistr.or.th";
														$mail->Password = "Thekopman523";
														$mail->From = $From;
														$mail->FromName = $FromName;
														$mail->AddAddress($AddAddress);
														$mail->Subject = $Subject;
														$mail->Body = $Body;
														$mail->Send();
}
$sql = "SELECT ros_id FROM roster where seminar='logistic2020' and valid = 1 ";
$result = $conn->query($sql);
$maxrows = $result->num_rows;

if ($maxrows < 120){
$sql = "INSERT INTO roster (ros_ref, ros_title, ros_name, ros_surname, ros_position, ros_organization, ros_tel, ros_fax, ros_mobile, ros_email, datein, seminar, ros_time, valid) VALUES ('$ref', '$title', '$name', '$surname', '$position', '$organization', '$tel', '$fax', '$mobile', '$email', '$datein', 'logistic2020', now(), 1) ";
//$sql = "INSERT INTO roster (ros_ref, ros_title, ros_name, ros_surname, ros_position, ros_organization, ros_tel, ros_fax, ros_mobile, ros_email, datein, seminar, ros_time) VALUES ('$ref', '$title', '$name', '$surname', '$position', '$organization', '$tel', '$fax', '$mobile', '$email', '$datein', 'efdb', now()) ON DUPLICATE KEY UPDATE ros_ref=ros_ref+1";
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
// $to1 = $email;
// $from1	="thanakorn@tistr.or.th";
// $fromname="โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal";
// $subject1="แจ้งผลการลงทะเบียนสัมมนาโครงการการขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal";
// //$message1="Dear Sir or Madam".$name." ".$surname.",<br><br> Thank you for your kind interest in TISTR’s From Local to Global International Forum: Food Industry 4.0”  on Monday 12 - Tuesday 13 June 2017 at Centara Grand Hotel at Central Lad Phrao, Bangkok, Thailand.<br>";
// $message1="เรียน คุณ  ".$rows['ros_name']." ".$rows['ros_surname'].",<br><br>  ท่านได้รับการยืนยันให้เข้าร่วมสัมมนาการขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal, โดยมีรหัสยืนยัน  <h2>".$rows['ros_ref']."</h2>  ในวันอังคารที่ 22 กันยายน 2563  เวลา 08.30 - 13.30 น. "."<h2>ณ โรงแรมเดอะ เบอร์เคลีย์ โฮเต็ล ประตูน้ำ กรุงเทพฯ</h2><br><br>ขอแสดงความนับถือ<br><br>โครงการการขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal<br>โทรศัพท์ 0 2577 9517<br>***กรุณาอย่าตอบกับทางอีเมลนีื***";//อาจจะต้องแก้ไขวันที่
//$message1.="Your password is  <h2>".$ref."</h2> on ".$datein."June 2017 at Room <h2>B</h2><br><br>";//อาจจะต้องแก้ไขวันที่
//$message1.="Best regards,<br><br>Food Industry 4.0 Seminar<br><br>***Don't reply to this email***";//อาจจะต้องแก้ไขวันที่
SendMailAllPerson($from1,$fromname,$to1,$subject1,$message1);
//************email to paticipate
$to = "thanakorn@tistr.or.th";
$from = "thanakorn@tistr.or.th";
$subject="โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal";
$message="เรียน ท่านผู้ดูแลระบบ"."<br><br>ขณะนี้มีผู้ลงทะเบียนเพิ่มเติมได้แก่   คุณ".$name." ".$surname."  หน่วยงาน  ".$organization."<br><br>ขอบคุณครับ<br><br>จาก Digital Team...".$date." / ".$str1;
SendMailAllPerson($from,$fromname,$to,$subject,$message);

        //echo "<script type='text/javascript'>alert('เนื่องจากผู้เข้าร่วมงานมีเป็นจำนวนมาก...กรุณารอรับการยืนยันทางอีเมลอีกครั้งค่ะ')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=checkmember.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ

    //header('Location: finished.php');
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
    header('Location: RegistrationAdmin.php');
}


$conn->close();

?>