<?
require("mail/class.phpmailer.php");
function SendMailAllPerson($From,$FromName,$AddAddress,$Subject,$Body){
														$mail = new PHPMailer();
														$mail->IsSMTP();
														$mail->IsHTML(true);
														$mail->SMTPAuth = true;
														//$mail->SMTPSecure = "tls"; //old
														$mail->SMTPSecure = "ssl";
														$mail->CharSet = "tis-620";
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
function MessageSubjectMail($Type,$LeaveID){
		if($Type==1){	
				$WordSubject	="นำส่ง :: รายงานการขออนุญาตลาพนักงานภายใต้บังคับบัญชาที่ไม่ได้รับการพิจารณาเกิน  3 วัน";
		}else if($Type==2){	
				$WordSubject	="แจ้งผลการพิจารณาอนุมัติการลา เลขที่ใบลา :: $LeaveID";
		}else if($Type==3){	
				$WordSubject	="นำส่ง :: แจ้งผลการบันทึกเวลาเข้าออกงานพนักงานที่หยุดงานเกิน 3 วัน";
		}else if($Type==4){	
				$WordSubject	="นำส่ง :: รายงานสรุปผลชั่วโมงการทำงานของพนักงาน";
		}else if($Type==5){
				$WordSubject	="แจ้งรายชื่อพนักงาน/ลูกจ้างภายใต้บังคับบัญชาของท่าน<BR>ที่หยุดงานเกิน 3 วัน";
		}
return $WordSubject;
}
function MessageTableTop($Type){
		if($Type==2){	
				$TableTop	="<table width='650' border='0' align='center' cellpadding='2' cellspacing='1' bgcolor='#CCCCCC'>";
		}
	return $TableTop;
}
function MessageTableHeader($Type,$LeaveID){
		if($Type==2){	
				$WordHeader	="แบบฟอร์มแสดงผลการพิจารณาขออนุญาตลา/หยุดพักผ่อนประจำปี";
				$TableHeader	="<tr bgcolor='#6B9CFF'><td align='center' colspan='4' height='35'><font face='ms sans Serif' size='2'><B>$WordHeader<BR>(ใบลาเลขที่ :: $LeaveID)<BR>(อยู่ระหว่างการทดสอบ)</B></FONT></td></tr>
				<tr bgcolor='#B0E5FD' height='20'><td colspan='4'><font face='ms sans Serif' size='2'> <B>ข้อมูลพื้นฐานของผู้ขออนุญาตลา</B></FONT></td></tr>";
		}else if($Type==3){	
			//	$WordHeader	="แจ้งรายชื่อพนักงาน/ลูกจ้างภายใต้บังคับบัญชาของท่าน<BR>ที่หยุดงานเกิน 3 วัน";
				$TableHeader	="<tr bgcolor='#6B9CFF'><td align='center' colspan='4' height='35'><font face='ms sans Serif' size='2'><B>แจ้งรายชื่อพนักงาน/ลูกจ้างภายใต้บังคับบัญชาของท่าน<BR>ที่หยุดงานเกิน 3 วัน</B></FONT></td></tr>";
		}
	return $TableHeader;
}
function MessageTableBody($EmpID,$Type,$LeaveID){
	include("includes/config.inc.php");
		if($Type==2){	
				$sql_main = "SELECT  *,LEAVE_EMPLOYEE.LEAVE_DETAIL_ID,day(LEAVE_DATE_START) AS DDS,month(LEAVE_DATE_START) AS MMS,year(LEAVE_DATE_START) AS YYS,day(LEAVE_DATE_END) AS DDE,month(LEAVE_DATE_END) AS MME,year(LEAVE_DATE_END) AS YYE,day(LEAVE_DATE_SEND) AS DDSD,month(LEAVE_DATE_SEND) AS MMSD,year(LEAVE_DATE_SEND) AS YYSD  FROM    LEAVE_EMPLOYEE WHERE LEAVE_EMPLOYEE.LEAVE_CODE='$LeaveID' AND LEAVE_EMPLOYEE.EmpID='$EmpID'"; 
				$result_main					=$db_tm->sql_query($sql_main);
				$rows_main					=$db_tm-> sql_fetchrow($result_main);
				$sql_emp 				= "SELECT    *,Employee.EmpID, Employee.TitleName, Employee.EmpName, Employee.EmpLName
				FROM Employee WHERE EmpID='$rows_main[EmpID]'"; 
				$result_emp				=  $db_tm->sql_query($sql_emp);
				$rows_emp	 			=	 $db_tm->sql_fetchrow($result_emp);
				$sql_emppos					= "SELECT * FROM Master_Position  where MainPositionID='$rows_emp[MainPositionID]'";
				$result_emppos		    	=  $db_tm->sql_query($sql_emppos);
				$rows_emppos					=  $db_tm->sql_fetchrow($result_emppos);
				$sql_type="SELECT * FROM LEAVE_TYPE where LEAVE_TYPE_ID = '$rows_main[LEAVE_TYPE_ID]'";
				$result_type				=  $db_tm->sql_query($sql_type);
				$rows_type				=  $db_tm->sql_fetchrow($result_type);
				$sql_under	 				= "SELECT     Employee.EmpID, Employee.TitleName, Employee.EmpName, Employee.EmpLName
				FROM Employee WHERE EmpID='$rows_main[DIRECTOR_ID]'"; 
				$result_under			=  $db_tm->sql_query($sql_under);
				$rows_under	 			=	 $db_tm->sql_fetchrow($result_under);
				$sql_status 				= "SELECT   *   FROM  Master_SystemStatus WHERE Master_SystemStatus.StatusCode = '$rows_main[LEAVE_DOCSTATUS]'"; 
				$result_status			=  $db_tm->sql_query($sql_status);
				$rows_status	 			=	 $db_tm->sql_fetchrow($result_status);
				$StatusThai								=$rows_status['StatusThai'];
				$DIRECTORName					=$rows_under['TitleName'].$rows_under['EmpName']."&nbsp;&nbsp;".$rows_under['EmpLName'];
				$NameUser								=$rows_emp['TitleName'].$rows_emp['EmpName']."&nbsp;&nbsp;".$rows_emp['EmpLName'];
				$LEAVE_TYPE_DETAIL		=$rows_type['LEAVE_TYPE_DETAIL'];
				$LEAVE_DATE_START			=$rows_main['DDS']."/".$rows_main['MMS']."/".$rows_main['YYS'];
				$LEAVE_DATE_END	 			=$rows_main['DDE']."/".$rows_main['MME']."/".$rows_main['YYE'];
				$LEAVE_DATE_SEND			=$rows_main['DDSD']."/".$rows_main['MMSD']."/".$rows_main['YYSD'];
				$TableBody	="	<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>ชื่อ-นามสุกล :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $NameUser ($EmpID)</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>ขอลา :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $LEAVE_TYPE_DETAIL</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>ลาตั้งแต่วันที่ :</B></FONT></td>
											<td><font face='ms sans Serif' size='2'>  $LEAVE_DATE_START</FONT></td>
											<td><font face='ms sans Serif' size='2'>  <B>เริ่มตั้งแต่เวลา</B></FONT></td>
											<td><font face='ms sans Serif' size='2'> $rows_main[LEAVE_TIME_START]</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td width='13%'><font face='ms sans Serif' size='2'>  <B>ถึงวันที่ :</B></FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'>  $LEAVE_DATE_END</FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'>  <B>เวลาสิ้นสุด</B></FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'> $rows_main[LEAVE_TIME_END]</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'> <B>เหตุผลประกอบการลา :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'> $rows_main[LEAVE_MEMO]</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'> <B>วันที่ยื่นใบลา :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'> $LEAVE_DATE_SEND</FONT></td>
											</tr>
											<tr bgcolor='#B0E5FD' height='20'><td colspan='4'><font face='ms sans Serif' size='2'> <B>ข้อมูลเกี่ยวกับผู้บังคับบัญชาพิจารณา</B></FONT></td></tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>ชื่อ-นามสกุลผู้พิจารณาอนุมัติ :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $DIRECTORName</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>สถานะการพิจารณา :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $StatusThai</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>เหตุผลเพิ่มเติมในการพิจารณา :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>$rows_main[CANCLE_COMMENT]</FONT></td>
											</tr>";
		}else if($Type==3){	
											$TableBody	="	<tr bgcolor='#FFFFFF' height='20'>
											<td colspan='4'><font face='ms sans Serif' size='2'>&nbsp;&nbsp;<B>เรียน  คุณ$NameUser</B></FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'><td colspan='4'><font face='ms sans Serif' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กบค. ขอส่งรายชื่อพนักงานภายใต้บังคับบัญชาของท่าน ที่ขาดงานเกิน 3 วัน มีรายชื่อดังนี้</FONT></td></tr>
											<tr bgcolor='#FFFFFF' height='20' align='center'>
											<td width='3%'><font face='ms sans Serif' size='2'>  <B>ลำดับ</B></FONT></td>
											<td width='5%'><font face='ms sans Serif' size='2'> <B>เลขบัตร</FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'>  <B>ชื่อ-นามสกุล</B></FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'><B> ตำแหน่ง</FONT></td>
											</tr>";
		}
	return $TableBody;
}
function MessageTableBottom($Type){
			if($Type==2){	
				$TableBottom	="	<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>เข้าระบบจากที่ทำงาน :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>คลิ๊กที่นี้&nbsp;<a href='http://128.1.99.124/' target='_blank'>http://128.1.99.124<a></FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>เข้าระบบจากที่บ้าน :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>คลิ๊กที่นี้&nbsp;<a href='http://hris.tistr.or.th/' target='_blank'>http://hris.tistr.or.th<a></FONT></td>
											</tr></table>";
			}
	return $TableBottom;
}
	//$messageHeadTable=MessageHeadTable($rows_checkmail['EmpID'],3,$rows_checkmail['LEAVE_CODE']);
	//$message=$messageHeadTable;
	$from	="pvs@tistr.or.th";
	$fromname="Leave Online System";
	//$to=$rows_checkmail['EmailContact'];
	$to="pvs@tistr.or.th";
	//$subject=MessageSubjectMail(2,$rows_checkmail['LEAVE_CODE']);
	$subject="wut email";
	$message="วีระ ทดสอบส่งเมลล์ จากระบบลาได้รับไหม";
	//require("mail/class.phpmailer.php");
	SendMailAllPerson($from,$fromname,$to,$subject,$message);
?>