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
				$WordSubject	="���� :: ��§ҹ��â�͹حҵ�Ҿ�ѡ�ҹ�����ѧ�Ѻ�ѭ�ҷ��������Ѻ��þԨ�ó��Թ  3 �ѹ";
		}else if($Type==2){	
				$WordSubject	="�駼š�þԨ�ó�͹��ѵԡ���� �Ţ������ :: $LeaveID";
		}else if($Type==3){	
				$WordSubject	="���� :: �駼š�úѹ�֡��������͡�ҹ��ѡ�ҹ�����ش�ҹ�Թ 3 �ѹ";
		}else if($Type==4){	
				$WordSubject	="���� :: ��§ҹ��ػ�Ū��������÷ӧҹ�ͧ��ѡ�ҹ";
		}else if($Type==5){
				$WordSubject	="����ª��;�ѡ�ҹ/�١��ҧ�����ѧ�Ѻ�ѭ�Ңͧ��ҹ<BR>�����ش�ҹ�Թ 3 �ѹ";
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
				$WordHeader	="Ẻ������ʴ��š�þԨ�óҢ�͹حҵ��/��ش�ѡ��͹��Шӻ�";
				$TableHeader	="<tr bgcolor='#6B9CFF'><td align='center' colspan='4' height='35'><font face='ms sans Serif' size='2'><B>$WordHeader<BR>(����Ţ��� :: $LeaveID)<BR>(���������ҧ��÷��ͺ)</B></FONT></td></tr>
				<tr bgcolor='#B0E5FD' height='20'><td colspan='4'><font face='ms sans Serif' size='2'> <B>�����ž�鹰ҹ�ͧ����͹حҵ��</B></FONT></td></tr>";
		}else if($Type==3){	
			//	$WordHeader	="����ª��;�ѡ�ҹ/�١��ҧ�����ѧ�Ѻ�ѭ�Ңͧ��ҹ<BR>�����ش�ҹ�Թ 3 �ѹ";
				$TableHeader	="<tr bgcolor='#6B9CFF'><td align='center' colspan='4' height='35'><font face='ms sans Serif' size='2'><B>����ª��;�ѡ�ҹ/�١��ҧ�����ѧ�Ѻ�ѭ�Ңͧ��ҹ<BR>�����ش�ҹ�Թ 3 �ѹ</B></FONT></td></tr>";
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
											<td><font face='ms sans Serif' size='2'>  <B>����-����ء� :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $NameUser ($EmpID)</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>���� :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $LEAVE_TYPE_DETAIL</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>�ҵ�����ѹ��� :</B></FONT></td>
											<td><font face='ms sans Serif' size='2'>  $LEAVE_DATE_START</FONT></td>
											<td><font face='ms sans Serif' size='2'>  <B>��������������</B></FONT></td>
											<td><font face='ms sans Serif' size='2'> $rows_main[LEAVE_TIME_START]</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td width='13%'><font face='ms sans Serif' size='2'>  <B>�֧�ѹ��� :</B></FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'>  $LEAVE_DATE_END</FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'>  <B>��������ش</B></FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'> $rows_main[LEAVE_TIME_END]</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'> <B>�˵ؼŻ�Сͺ����� :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'> $rows_main[LEAVE_MEMO]</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'> <B>�ѹ��������� :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'> $LEAVE_DATE_SEND</FONT></td>
											</tr>
											<tr bgcolor='#B0E5FD' height='20'><td colspan='4'><font face='ms sans Serif' size='2'> <B>����������ǡѺ���ѧ�Ѻ�ѭ�ҾԨ�ó�</B></FONT></td></tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>����-���ʡ�ż��Ԩ�ó�͹��ѵ� :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $DIRECTORName</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>ʶҹС�þԨ�ó� :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>  $StatusThai</FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>�˵ؼ��������㹡�þԨ�ó� :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>$rows_main[CANCLE_COMMENT]</FONT></td>
											</tr>";
		}else if($Type==3){	
											$TableBody	="	<tr bgcolor='#FFFFFF' height='20'>
											<td colspan='4'><font face='ms sans Serif' size='2'>&nbsp;&nbsp;<B>���¹  �س$NameUser</B></FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'><td colspan='4'><font face='ms sans Serif' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���. ������ª��;�ѡ�ҹ�����ѧ�Ѻ�ѭ�Ңͧ��ҹ ���Ҵ�ҹ�Թ 3 �ѹ ����ª��ʹѧ���</FONT></td></tr>
											<tr bgcolor='#FFFFFF' height='20' align='center'>
											<td width='3%'><font face='ms sans Serif' size='2'>  <B>�ӴѺ</B></FONT></td>
											<td width='5%'><font face='ms sans Serif' size='2'> <B>�Ţ�ѵ�</FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'>  <B>����-���ʡ��</B></FONT></td>
											<td width='10%'><font face='ms sans Serif' size='2'><B> ���˹�</FONT></td>
											</tr>";
		}
	return $TableBody;
}
function MessageTableBottom($Type){
			if($Type==2){	
				$TableBottom	="	<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>����к��ҡ���ӧҹ :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>���꡷����&nbsp;<a href='http://128.1.99.124/' target='_blank'>http://128.1.99.124<a></FONT></td>
											</tr>
											<tr bgcolor='#FFFFFF' height='20'>
											<td><font face='ms sans Serif' size='2'>  <B>����к��ҡ����ҹ :</B></FONT></td>
											<td colspan='3'><font face='ms sans Serif' size='2'>���꡷����&nbsp;<a href='http://hris.tistr.or.th/' target='_blank'>http://hris.tistr.or.th<a></FONT></td>
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
	$message="���� ���ͺ������� �ҡ�к������Ѻ���";
	//require("mail/class.phpmailer.php");
	SendMailAllPerson($from,$fromname,$to,$subject,$message);
?>