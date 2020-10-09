<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include("connect_database.php");
//include '../Connections/registration.php'; 
	$sqlNew="SELECT * from roster where ros_id = ".$_GET['ros_id'];
	$ros_id=$_GET['ros_id'];
	echo "sqlNew is ".$sqlNew."<br>";
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
														$mail->Username = "thanakorn@tistr.or.th";
														$mail->Password = "Thekopman523";
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
WHERE  `ros_id` = ".$_GET['ros_id'];
$passw=$rows['pass'];
}
$sql_query=mysql_query($sql);
echo "sql is ".$sql;
//**************************************
// $to = $rows['ros_email'];
// $from	="thanakorn@tistr.or.th";
// $fromname="โครงการสัมมนาการขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal";
// $subject="ยืนยันการลงทะเบียนสัมมนาโครงการการขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal";
// $message="เรียน คุณ  ".$rows['ros_name']." ".$rows['ros_surname'].",<br><br>  ท่านได้รับการยืนยันให้เข้าร่วมสัมมนาโครงการการขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal, โดยมีรหัสผ่าน  <h2>".$rows['ros_ref']."</h2>  ในวันอังคารที่ 22 กันยายน 2563  เวลา 08.30 - 13.30 น. "."<h2>ณ โรงแรมเดอะ เบอร์เคลีย์ โฮเต็ล ประตูน้ำ กรุงเทพฯ</h2><br><br>ขอแสดงความนับถือ<br><br>โครงการการขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal<br>โทรศัพท์ 0 2577 9517<br>***กรุณาอย่าตอบกับทางอีเมลนี้***";//อาจจะต้องแก้ไขวันที่
//$message="เรียน คุณ  ".$rows['ros_name']." ".$rows['ros_surname'].",<br><br>  ท่านได้รับการยืนยันให้เข้าร่วมสัมมนาโครงการพัฒนาและส่งเสริมความสัมพันธ์กับลูกค้า, โดยมีรหัสผ่าน  <h2>".$rows['ros_ref']."</h2>  ในวันศุกร์ที่ 25 สิงหาคม 2560 "."<h2>ณ โรงแรมบางกอกชฎา กรุงเทพฯ </h2><br><br>ขอแสดงความนับถือ<br><br>โครงการพัฒนาและส่งเสริมความสัมพันธ์กับลูกค้า<br>Tel (66)2577-9517 , Fax + (66)2577-9009<br>***กรุณาอย่าตอบกับทางอีเมลนีื***";//อาจจะต้องแก้ไขวันที่
//$msgsp="<br><br>"." หมายเหตุ "."<br>"."1) หากท่านมีความต้องการพิเศษเพิ่มเติมกรุณาแจ้งเพิ่มได้ทางอีเมล์นี้ "."<br>";
//$msgsp .="2) เพื่อความสะดวกกรุณาเดินทางด้วยรถสาธารณะและมาก่อนเวลา"."<br>";
//$msgsp .="3) ถ้ามีการเปลี่ยนแปลงใด ๆ กรุณาแจ้งผ่านทางอีเมลหรือโทรติดต่อเจ้าหน้าที่โดยตรง"."<br>";
//$message .=$msgsp;
SendMailAllPerson($from,$fromname,$to,$subject,$message);
if($sql_query) {
        
        echo "<script type='text/javascript'>alert('Confimation successful')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=../checkmember.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
    }else{
        //echo "<script type='text/javascript'>alert('Can not confirmation!!!');window.history.go(-1);</script>" ;//ถ้าไม่สามารถบันทึกข้อมูลได้ให้กลับไปที่หน้าเดิม
    }
mysql_close();
?>