<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='index.php'</script>
<?php
exit();}
include 'Connections/registration.php'; ?>
<?php
$sql = "SELECT * FROM roster where seminar = 'Food' ";
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
		<fieldset class="border">
        <img width="100%" src="images/banner6.jpg">
        </fieldset>
        
        <fieldset class="border">
        <div>
			<div class="legend2">รายชื่อผู้ลงทะเบียน</div>
            <legend>โครงการเสริมสร้างศักยภาพห้องปฏิบัติการทดสอบผลิตภัณฑ์ SMEs ให้มีคุณภาพตามมาตรฐานสากล</legend>
            <legend>11 กุมภาพันธ์ 2562 ณ โรงแรมแคนทารี โคราช จังหวัดนครราชสีมา<br><br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย(วว.)</legend>

			<div class="error-message">
			  <p>รายชื่อผู้ลงทะเบียน</p>
			</div>

<div>
  <table border="0" align="center" class="display nowrap" id="table_id" width="100%">
<thead>
      <tr>
        <th>ชื่อ (Name)</th>
        <th>นามสกุล (Surname)</th>
        <th>หน่วยงาน (organization)</th>
      </tr>
</thead>
<tbody>
        <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {?>
        <tr>
          <td><?php echo $row['ros_name']; ?></td>
          <td><?php echo $row['ros_surname']; ?></td>
          <td width="50%"><?php echo $row['ros_organization']; ?></td>
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
