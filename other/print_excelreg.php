<?php
//include '../Connections/registration.php'; 

$strExcelFileName = "logistic2020-Extra".".xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");
//$sql = mysql_query("select * from roster ORDER BY valid DESC");
//$num = mysql_num_rows($sql);
include '../Connections/registration.php'; 
$sql = "SELECT * FROM roster where seminar='logistic2020' and valid = 1 ORDER BY arrived DESC ";
$result = $conn->query($sql);
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
        <strong>รายงานชื่อผู้เข้าร่วมงาน(เพิ่มเติม) โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal วันอังคารที่ 22 กันยายน 2563 ณ โรงแรมเดอะเบอร์เคลีย์ ประตูน้ำ กรุงเทพฯ</strong><br><br>
        <div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
        <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse"><tr>
			<td><center><strong>ลำดับ</strong></center></td>
			<td><center><strong>รหัส</strong></center></td>
			<td><center><strong>วันที่เข้าร่วม</strong></center></td>
			<td><center><strong>ชื่อ</strong></center></td>
			<td><center><strong>นามสกุล</strong></center></td>
			<td><center><strong>หน่วยงาน</strong></center></td>
			<td><center><strong>เบอร์โทร</strong></center></td>
			<td><center><strong>Email</strong></center></td>
			<td><center><strong>สถานะ</strong></center></td>
                            <?php
							$num = 10;
                            $i = 1;
							$x=0; //confirm member
							$y=0; //notconfirm member
							$z=0; //sum all
                           // if ($num > 0) {
                                while($objResult = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                <td align="center" valign="middle"><?php echo $i++; ?>.</td>
                                <td align="center" valign="middle"><?php echo $objResult['ros_ref']; ?></td>
								<td align="center" valign="middle"><?php echo '22 ก.ย. 2563'; ?></td>
								<td align="center" valign="middle"><?php echo $objResult['ros_name']; ?></td>
								<td align="center" valign="middle"><?php echo $objResult['ros_surname']; ?></td>
								<td align="center" valign="middle"><?php echo $objResult['ros_organization']; ?></td>
								<td align="center" valign="middle"><?php echo $objResult['ros_mobile']; ?></td>
								<td align="center" valign="middle"><?php echo $objResult['ros_email']; ?></td>
                                <td>  <?php
                                                   if($objResult['arrived'] == 1){
                                                       echo "<font color=blue>".'มาลงทะเบียนในงาน'."</font>"; 
                                                       $x++;
                                                   }elseif ($row['arrived'] == 0) {
                                                       echo "<font color=red>".'ยังไม่ลงทะเบียน'."</font>";
													   $y++;
                                                   }
                                                       ?></td>
                                                        </tr></center>
                                                       
                                                        <?php
                                                    }
                                                //}
                                                ?>
                                            </table>
                                            <script>
                                            </script>
                                            </div>
											<?$z=$x+$y;?>
											<?	echo "<br><font color=blue>"." 1) ลงทะเบียนเข้าร่วมงานจำนวน ".$x." ราย</font><br><font color=red>2) จองไว้แต่ยังไม่ลงทะเบียนจำนวน ". $y." ราย</font><br><font color=orange> ห้องนี้มีจำนวนคนสำรองที่นั่งไว้  ". $z." ราย</font>";			?>
                                            <script>
                                                window.onbeforeunload = function () {
                                                    return false;
                                                };
                                                setTimeout(function () {
                                                    window.close();
                                                }, 10000);
                                            </script>
                                            </body>
                                            </html>