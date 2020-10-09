<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='index1.php'</script>
<?php
exit();}
include 'Connections/registration.php'; ?>
<?php
$sql = "SELECT * FROM roster ";
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
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
    <link href="DataTable/datatables.min.css" rel="stylesheet" type="text/css" />
    <script src="DataTable/datatables.min.js" type="text/javascript"></script>

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

<form method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other">
		<!--fieldset class="border" style="width:800px;">
        <img width="100%" src="img/symposium.jpg">
        </fieldset-->
        
        <fieldset class="border" style="width:800px;">
        <div>
			<div class="legend2"><h1><font color=red>รายชื่อผู้ลงทะเบียนทุกห้อง/ทุกวัน</font></h1></div>
            <legend>TISTR’s From Local to Global International Forum</legend>
            <legend>12 - 13 มิถุนายน 2017 ณ โรงแรมเซ็นทาราแกรนด์ กรุงเทพฯ<br><br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย(วว.)</legend>

			<div class="error-message">
			  <p>รายชื่อผู้ลงทะเบียน</p>
			</div>

<div class="row col-md-12">
    <table  border="1" style="border-bottom: solid 1px #000; border-top:solid 1px #000;border-right-color: #000;" align="center" class="display" id="table_id" width="100%">
<thead>
      <tr>
	    <th width="4%">รหัส</th>
        <th>ชื่อ (Name)</th>
        <th>นามสกุล (Surname)</th>
        <th>หน่วยงาน (organization)</th>
		<th>Date</th>
		<th>สถานะ</th>
      </tr>
</thead>
<tbody>
        <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {?>
        <tr>
	      <td><?php echo $row['ros_ref'];?></td>
          <td><?php echo $row['ros_name']; ?></td>
          <td><?php echo $row['ros_surname']; ?></td>
          <td width="50%"><?php echo $row['ros_organization']; ?></td>
		  <td width="50%"><?php echo $row['datein']; ?></td>
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
        </tr>
        <?php } } else { echo "0 results"; } ?>
</tbody>
    </table>
    <br />
</div>

  </fieldset>
		
</form>
<script src="js/main.js"></script>
</body>
</html>
