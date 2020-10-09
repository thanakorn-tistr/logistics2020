<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include 'Connections/registration.php'; 
if(trim($_POST["radio-button"]) == "")
{
		echo "<script>alert('กรุณาเลือกเลือกวันที่เข้าร่วมงานด้วยค่ะ')</script>";
		echo"<script>history.back();</script>"; 
		exit();
	}
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
$memo = $_POST['memo']; //name of replace
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
//****************sql main
	$sqlNew="SELECT * from roster where ros_id =".$id;
	//echo "sqlNew is ".$sqlNew;
	$result = $conn->query($sqlNew);
	$rows = $result->fetch_array();
if ($rows["vip"]<>""){	
//****************update tbl_roster
$sql = "UPDATE roster SET ros_ref='$ref', ros_title='$title', ros_name='$name', ros_surname='$surname', ros_position='$position', ros_organization='$organization', ros_tel='$tel', ros_fax='$fax', ros_mobile='$mobile', ros_email='$email', datein='$datein', memo='$memo', valid='1', ros_time=now() where ros_id=".$id;
//****************update tbl_member
$sqlmem = "UPDATE member SET name='$ros_name', surname='$ros_surname' where ros_id=".$id;
//echo "sqlmem is ".$sqlmem;
//****************check accurate*************************
if (($conn->query($sql) === TRUE) and ($conn->query($sqlmem) === TRUE)) {
$sqlNew1 = "UPDATE  `roster` SET  
`valid` =  1, `pass` =  '$passw'
WHERE  `ros_id` = ".$ros_id;
$result = $conn->query($sqlNew1);
//**************************************
$to = $email;
$from	="thanakorn@tistr.or.th";
$fromname="Food Industry 4.0 Seminar";
$subject="แจ้งผลการเข้าร่วมสัมมนา Food Industry 4.0";
$message="เรียน คุณ".$name." ".$surname."<br><br> ท่านได้รับการยืนยันให้เข้าร่วมสัมมนา โดยมีรหัส คือ  <h2>".$ref."</h2> และเข้าร่วมสัมมนาในวันที่ ".$rows['datein']."มิถุนายน 2560 ณ  จุดลงทะเบียน <h2>B</h2> โรงแรมเซ็นทาราแกรนด์ กรุงเทพฯ<br><br>ขอบคุณมากค่ะ<br><br>Food Industry 4.0 Seminar";//อาจจะต้องแก้ไขวันที่
$msgsp="<br><br>"." หมายเหตุ "."<br>"."1) หากท่านมีความต้องการพิเศษเพิ่มเติมกรุณาแจ้งเพิ่มได้ทางอีเมล์นี้ "."<br>";
$msgsp .="2) เพื่อความสะดวกกรุณาเดินทางด้วยรถสาธารณะและมาก่อนเวลา"."<br>";
$msgsp .="3) ถ้ามีการเปลี่ยนแปลงใด ๆ กรุณาแจ้งผ่านทางอีเมลหรือโทรติดต่อเจ้าหน้าที่โดยตรง"."<br>";
$message .=$msgsp;
SendMailAllPerson($from,$fromname,$to,$subject,$message);
//************email to admin
    $date = date("Y-m-d");
    $time = date("H:i:s");
	$th=mktime(gmdate("H")+7,gmdate("i"),gmdate("m"),gmdate("d"),gmdate("Y"));
//$format="d/m/y H:i a";
 $format="H:i a";
$str1=date($format,$th);
     //echo "datestr ".$str1;
$to = "thanakorn@tistr.or.th";
$from	="thanakorn@tistr.or.th";
$fromname="Food Industry 4.0 Seminar";
$subject="แจ้งมีผู้ลงทะเบียนเพิ่มเติมในงานสัมมนา Food Industry 4.0";
$message="เรียน ท่านผู้ดูแลระบบ"."<br><br>ขณะนี้มีผู้ลงทะเบียนเพิ่มเติมได้แก่   คุณ".$name." ".$surname."  หน่วยงาน  ".$organization."ซึ่งเป็นผู้ที่ วว. ส่งจดหมายเชิญไปให้เข้าร่วมสัมมนาและมีสถานะ VIP<br><br>ขอบคุณครับ<br><br>จาก Digital Team...".$date." / ".$str1;
SendMailAllPerson($from,$fromname,$to,$subject,$message);
//if($sql_query) {
        
        echo "<script type='text/javascript'>alert('ยืนยันการเข้าร่วมงานเรียบร้อยแล้ว')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=other/check_logout.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
    //}else{
        //echo "<script type='text/javascript'>alert('ไม่สามารถยืนยันการเข้าร่วมงานได้');window.history.go(-1);</script>" ;//ถ้าไม่สามารถบันทึกข้อมูลได้ให้กลับไปที่หน้าเดิม
    //}
	  //echo "<script type='text/javascript'>alert('ไม่สามารถแก้ไขข้อมูลได้');window.history.go(-1);</script>" ;
    //header('Location: finished.php');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//} else {
//    header('Location: registrationform.php');
//}
}else{
	$sql = "SELECT ros_id FROM roster where seminar='Food' and valid=1 ";
$result = $conn->query($sql);
$maxrows = $result->num_rows;

if ($maxrows < 500){
$sql = "INSERT INTO roster (ros_ref, ros_title, ros_name, ros_surname, ros_position, ros_organization, ros_tel, ros_fax, ros_mobile, ros_email, datein, seminar) VALUES ('$ref', '$title', '$name', '$surname', '$position', '$organization', '$tel', '$fax', '$mobile', '$email', '$datein', 'Food')";
//echo "sql is ".$sql;
if ($conn->query($sql) === TRUE) {
//************email to admin
    $date = date("Y-m-d");
    $time = date("H:i:s");
	$th=mktime(gmdate("H")+7,gmdate("i"),gmdate("m"),gmdate("d"),gmdate("Y"));
//$format="d/m/y H:i a";
 $format="H:i a";
$str1=date($format,$th);
     //echo "datestr ".$str1;
$to1 = $email;
$from1	="thanakorn@tistr.or.th";
$fromname="Food Industry 4.0 Seminar";
$subject1="Registration Food Industry 4.0 Complate";
$message1="Dear Sir or Madam".$name." ".$surname.",<br><br> Thank you for your kind interest in TISTR’s From Local to Global International Forum: Food Industry 4.0”  on Monday 12 - Tuesday 13 June 2017 at Centara Grand Hotel at Central Lad Phrao, Bangkok, Thailand.<br>";
$message1.="However, many paticipants registered into seminar, please waiting for confirmation email from staff.<br><br>";
$message1.="Best regards,<br><br>Food Industry 4.0 Seminar<br><br>***Don't reply to this email***";//อาจจะต้องแก้ไขวันที่
SendMailAllPerson($from1,$fromname,$to1,$subject1,$message1);
//************email to paticipate
$to = "thanakorn@tistr.or.th";
$from	="thanakorn@tistr.or.th";
$subject="แจ้งมีผู้ลงทะเบียนเพิ่มเติมในงานสัมมนา Food Industry 4.0";
$message="เรียน ท่านผู้ดูแลระบบ"."<br><br>ขณะนี้มีผู้ลงทะเบียนเพิ่มเติมได้แก่   คุณ".$name." ".$surname."  หน่วยงาน  ".$organization."ซึ่งเป็นผู้ที่ วว. ส่งจดหมายเชิญไปให้เข้าร่วมสัมมนา ไม่ได้มีสถานะ vip<br><br>ขอบคุณครับ<br><br>จาก Digital Team...".$date." / ".$str1;
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
}
	
$conn->close();

?>