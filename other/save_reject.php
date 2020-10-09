<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
 include("connect_database.php");
	$sqlNew="SELECT * from roster where ros_id =".$ros_id;
	//$result = $conn->query($sqlNew);
	//$rows = $result->fetch_array();
	$result=mysql_query($sqlNew);	
	$rows=mysql_fetch_array($result);
//$ros_id=$_POST['ros_id'];
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
$sql = "UPDATE  `roster` SET  
`valid` =  2
WHERE  `ros_id` = ".$ros_id;
$sql_query=mysql_query($sql);
//echo "sql is ".$sql;
//**************************************
$to = $rows['ros_email'];
$from	="thanakorn@tistr.or.th";
$fromname="โครงการการทดสอบอาหารปลอดภัยฯในภูมิภาคอาเซียน";
$subject="แจ้งผลการเข้าร่วมสัมมนา";
$message="เรียน คุณ".$rows['ros_name']." ".$rows['ros_surname']."<br><br> ทางคณะผู้จัดงานขอขอบคุณเป็นอย่างสูง ที่ท่านได้กรุณาสละเวลาลงทะเบียนเข้าร่วมงาน โครงการการทดสอบอาหารปลอดภัยฯในภูมิภาคอาเซียน";
$msgsp="แต่เนื่องจากมีผู้สัมครเข้าร่วมงานเกินจำนวนที่กำหนด ทางคณะผู้จัดงานจึงไม่สามารถตอบรับการลงทะเบียนของท่านได้ "."<br><br>";
$msgsp.="ทางคณะผู้จัดงานหวังเป็นอย่างยิ่งว่าจะได้มีโอกาสร่วมงานกับท่านในคราวต่อไป"."<br>";
$msgsp.="จึงเรียนมาเพื่อทราบและขออภัยในความไม่สะดวก";
$msgsp.="<br><br>"." ขอแสดงความนับถือ "."<br>"."โครงการการทดสอบอาหารปลอดภัยฯในภูมิภาคอาเซียน"."<br>โทรศัพท์ 0 2323 1672-80 ต่อ 107, 0 2577 9301 โทรสาร 0 2323 9165<br>***กรุณาอย่าตอบกับทางอีเมลนีื***";
$message .=$msgsp;
SendMailAllPerson($from,$fromname,$to,$subject,$message);



if($sql_query) {
        
        echo "<script type='text/javascript'>alert('ปฏิเสธการเข้าร่วมงานเรียบร้อยแล้ว')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=../checkmember.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
    }else{
        echo "<script type='text/javascript'>alert('ไม่สามารถปฏิเสธการเข้าร่วมงานได้');window.history.go(-1);</script>" ;//ถ้าไม่สามารถบันทึกข้อมูลได้ให้กลับไปที่หน้าเดิม
    }
mysql_close();
?>