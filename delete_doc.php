<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='login.php'</script>
<?php
exit();}
include("style_script.php");
include 'Connections/registration.php'; 
$sql = "SELECT * FROM doc where seminar = 'logistic2020' and flag = '1' ";
//echo "sql is ".$sql;
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

<form method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other">
		<fieldset class="border">
        <img width="100%" src="images/banner_logistic2020.jpg">
        </fieldset>
        
        <fieldset class="border">
        <div>
			<div class="legend2">ลบเอกสาร</div>
          <legend>โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal</legend>
            <legend>นอังคารที่ 22 กันยายน 2563 เวลา 08.30 -13.30 น. ณ โรงแรมเดอะ เบอร์เคลีย์ โฮเต็ล ประตูน้ำ <br><br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย (วว.)</legend>
			<a href="checkmember.php"><input class="button5" type="button" value="Home"></a>
		    <button type="button" class="btn btn-basic" onclick="Upload()"><span class="glyphicon glyphicon-list-alt"></span> UploadFile </button>
			<button type="button" class="btn btn-basic" onclick="Excel()"><span class="glyphicon glyphicon-list-alt"></span> Excel </button>
			<button type="button" class="btn btn-danger" onclick="Logout()"><span class="glyphicon glyphicon-off"></span> Logout </button>

			<div class="error-message">
			  <p>บริหารจัดการทะเบียนเอกสาร</p>
			</div>

<div>
  <table border="0" align="center" class="display nowrap" id="table_id" width="100%">
<thead>
      <tr>
        <th>รหัสเอกสาร</th>
        <th>ชื่อเอกสาร</th>
		<th>สถานะ</th>
      </tr>
</thead>
<tbody>
        <?php 

			 $i=0;
			 if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {
				 $i++;
		?>
        <tr>
		  <td width="5%"><?php echo $i; ?></td>
          <td width="24%"><a href="./file/<?php echo $row['file_upload'];?>" target="_blank"><?php echo $row['doc_name']; ?></a></td>
          <td>  <?php
                                                   if($row['flag'] == '1'){
                                                       echo "<font color=blue>".'ใช้งาน'."</font>"; 
                                                   }else{
                                                       echo "<font color=red>".'ไม่ใช้งาน'."</font>";
												   }
                                                       ?></td>
		   <td>

		    <button type="button" class="btn btn-danger" onclick="DeleteDoc('<?php echo $row['id'];?>')"><span class="glyphicon glyphicon-trash"></span> ลบ </button>
		 
		   </td>
        </tr>
        <?php } } else { echo "No Document for Downloading"; } ?>
</tbody>
    </table>
			    <!--button type="button" class="btn btn-blue" onclick="GotoCheckMember()"><span class="glyphicon glyphicon-trash"></span> กลับหน้าผู้ดูแลระบบ </button-->
    <br />
</div>

  </fieldset>
		
</form>
<script src="js/main.js"></script>
</body>
</html>
