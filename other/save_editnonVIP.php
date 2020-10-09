<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include("connect_database.php");
//include '../Connections/registration.php'; 
	$sqlNew="SELECT * from roster where ros_id =".$ros_id;
	//$result = $conn->query($sqlNew);
	//$rows = $result->fetch_array();
	$result=mysql_query($sqlNew);	
	$rows=mysql_fetch_array($result);
//*******************************************************create password code
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
//*******************************************************create email
require("../mail/class.phpmailer.php");
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
														$mail->Username = "tistrforum@tistr.or.th";
														$mail->Password = "Tistrforum2017";
														$mail->From = $From;
														$mail->FromName = $FromName;
														$mail->AddAddress($AddAddress);
														$mail->Subject = $Subject;
														$mail->Body = $Body;
														$mail->Send();
}
//**************************************update table
if (empty($rows['pass'])){
$sql = "UPDATE  `roster` SET  
`valid` =  1, `pass` =  '$passw'
WHERE  `ros_id` = ".$ros_id;
}else{
$sql = "UPDATE  `roster` SET  
`valid` =  1
WHERE  `ros_id` = ".$ros_id;
$passw=$rows['pass'];
}
$sql_query=mysql_query($sql);
//echo "sql is ".$sql;
//**************************************
$to = $rows['ros_email'];
$from	="tistrforum@tistr.or.th";
$fromname="Food Industry 4.0 Seminar";
$subject="แจ้งผลการเข้าร่วมสัมมนา Food Industry 4.0";
$message="เรียน คุณ".$rows['ros_name']." ".$rows['ros_surname']."<br><br> ท่านได้รับการยืนยันให้เข้าร่วมสัมมนา โดยมีรหัสผ่านลับ คือ  ".$passw." ในวันที่ ".$rows['datein']."มิถุนายน 2560 ณ โรงแรมเซ็นทาราแกรนด์ กรุงเทพฯ<br><br>ขอบคุณมากค่ะ<br><br>Food Industry 4.0 Seminar";//อาจจะต้องแก้ไขวันที่
$msgsp="<br><br>"." หมายเหตุ "."<br>"."1) หากท่านมีความต้องการพิเศษเพิ่มเติมกรุณาแจ้งเพิ่มได้ทางอีเมล์นี้ "."<br>";
$msgsp .="2) เพื่อความสะดวกกรุณาเดินทางด้วยรถสาธารณะและมาก่อนเวลา"."<br>";
$msgsp .="3) ถ้ามีการเปลี่ยนแปลงใด ๆ กรุณาแจ้งผ่านทางอีเมลหรือโทรติดต่อเจ้าหน้าที่โดยตรง"."<br>";
$message .=$msgsp;
SendMailAllPerson($from,$fromname,$to,$subject,$message);
if($sql_query) {
        
        echo "<script type='text/javascript'>alert('ยืนยันการเข้าร่วมงานเรียบร้อยแล้ว')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=../checkmember.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
    }else{
        echo "<script type='text/javascript'>alert('ไม่สามารถยืนยันการเข้าร่วมงานได้');window.history.go(-1);</script>" ;//ถ้าไม่สามารถบันทึกข้อมูลได้ให้กลับไปที่หน้าเดิม
    }
mysql_close();
?>