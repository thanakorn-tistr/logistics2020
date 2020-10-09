<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='index1.php'</script>
<?php
exit();}
include("style_script.php");
/* $k=0;//check refresh
if($k==0){
echo "<script>alert('กรุณากดปุ่ม reflesh ถ้าข้อมูลไม่เปลี่ยนแปลงค่ะ')</script>";
}else{
	$k++;
} */
include 'Connections/registration.php'; 
$sql = "SELECT * FROM roster where seminar = 'logistic2020' ";
$result = $conn->query($sql);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="register">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Puwanat Tongjok edited by Wut">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/styleadmin.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
    <!--link href="DataTable/datatables.minadmin.css" rel="stylesheet" type="text/css" /-->
    <script src="DataTable/datatables.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="./js/manage.js"></script>


<script>
$(document).ready( function () {
    $('#table_id').DataTable({
        "pagingType": "full_numbers",
		"scrollX": true
    });
} );
</script>
<title>ระบบลงทะเบียน</title>
</head>
<body>
<center>
<form method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other">
        <fieldset class="border" style="width:1200px;">
        <div>
			<div class="legend2">รายชื่อผู้ลงทะเบียน</div>
           <legend>โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal<center><p></p><br>“ทิศทางโลจิสติกส์ไทยหลัง โควิด-19 ฝ่าวิกฤติเศรษฐกิจไทย ด้วยระบบโลจิสติกส์สมัยใหม่  <br>เสวนา ความปลอดภัยในการขนส่งสินค้าและวัตถุอันตราย”</legend>
           <br><br>
		   <legend>วันอังคารที่ 22 กันยายน 2563  เวลา 08.30 - 13.30 น. <br><br>ณ โรงแรมเดอะ เบอร์เคลีย์ โฮเต็ล ประตูน้ำ กรุงเทพฯ<br><br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย (วว.)</legend>
		   <button type="button" class="btn btn-basic" onclick="Upload()"><span class="glyphicon glyphicon-list-alt"></span> UploadFile </button>
		   <button type="button" class="btn btn-basic" onclick="GotoDeleteDoc()"><span class="glyphicon glyphicon-list-alt"></span> DeleteFile </button>
		   <button type="button" class="btn btn-basic" onclick="Excel()"><span class="glyphicon glyphicon-list-alt"></span> Excel </button>
		   <!--button type="button" class="btn btn-basic" onclick="Graph()"><span class="glyphicon glyphicon-list-alt"></span> ดูภาพรวม </button-->
		   <button type="button" class="btn btn-basic" onclick="Regis()"><span class="glyphicon glyphicon-user"></span>Admin วันที่ 22</button>
		   <!--button type="button" class="btn btn-basic" onclick="Regis13()"><span class="glyphicon glyphicon-user"></span>Admin วันที่ 13</button-->
		   <button type="button" class="btn btn-basic" onclick="RegistrationAdmin()"><span class="glyphicon glyphicon-list-alt"></span> ลงทะเบียนเพิ่ม</button>
		   <button type="button" class="btn btn-danger" onclick="Logout()"><span class="glyphicon glyphicon-off"></span> Logout </button>

			<div class="error-message">
			  <p>บริหารจัดการทะเบียนผู้เข้าร่วมงาน</p>
			</div>
 
<div class="row col-md-12">
    <table  border="1" style="border-bottom: solid 1px #000; border-top:solid 1px #000;border-right-color: #000;" align="center" class="display" id="table_id" width="100%">
<thead>
      <tr>
	    <th width="5%">Inv</th>
		<th width="4%">รหัส</th>
        <th width="15%">ชื่อ-นามสกุล</th>
        <th width="10%">ตำแหน่ง</th>
		<th width="15%">หน่วยงาน</th>
		<th width="10%">เบอร์โทร</th>
		<th width="10%">อีเมล</th>
        <th width="10%">สถานะ</th>
		<th>ยืนยันการเข้าร่วม</th>
      </tr>
</thead>
<tbody>
        <?php 
		     $x=0; //confirm member
			 $y=0; //notconfirm member
			 $z=0; //reject member
			 
			 if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {
				 $markred="";
				 if (empty($row['user_name'])) {$markred="<font color='red'>*</font>";}
		?>
        <tr>
		  <td><?php echo $markred; ?></td>
		  <td><?php echo $row['ros_ref']; ?></td>
          <td><?php echo $row['ros_name']."&nbsp &nbsp".$row['ros_surname']; ?></td>
		  <td><?php echo $row['ros_position']; ?></td>
		  <td><?php echo $row['ros_organization']; ?></td>
		  <td><?php echo $row['ros_mobile']; ?></td>
		  <td><?php echo $row['ros_email']; ?></td>
         <td>  <?php
                                                   if($row['valid'] == '1'){
                                                       echo "<font color=blue>".'ยืนยันการเข้าร่วม'."</font>"; 
                                                       $x++;
                                                   }  elseif($row['valid'] == '0'){
                                                       echo "<font color=red>".'ยังไม่ยืนยัน'."</font>";
													   $y++;
                                                   }else{
                                                       echo "<font color=orange>".'ปฏิเสธ'."</font>";
													   $z++;													   
												   }
                                                       ?></td>
		   <td>
		   <input type="hidden" id="ros_id" name="ros_id" value="<?php echo $row['ros_id'];?>">
		   <button type="button" class="btn btn-info" onclick="EditBkM('<?php echo $row['ros_id'];?>')"><span class="glyphicon glyphicon-ok"></span> ยืนยัน </button>
		   <button type="button" class="btn btn-warning" onclick="Reject('<?php echo $row['ros_id'];?>')"><span class="glyphicon glyphicon-edit"></span>ปฎิเสธ  </button>
		    <button type="button" class="btn btn-danger" onclick="GotoDeleteBooking('<?php echo $row['ros_id'];?>')"><span class="glyphicon glyphicon-trash"></span> ลบ </button>
		   </td>
        </tr>
        <?php } } else { echo "0 results"; } ?>
</tbody>
    </table>
    <br />
	<? echo "<font color='red'>*</font><font color='green'> หมายถึง ผู้ที่สมัครเข้ามาร่วมสัมมนาโดยไม่มีจดหมายเชิญ</font>";?><br />
<?	echo "<br><font color=blue>"." 1) ยืนยันจำนวน ".$x." ราย</font><br><font color=red>2) ไม่ยืนยันจำนวน ". $y."ราย</font><br><font color=orange>3) ปฏิเสธจำนวน ". $z." ราย</font>";			?>
</div>

  </fieldset>
		
</form>
<script src="js/main.js"></script>

</body>
</html>
