<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='index1.php'</script>
<?php
exit();}
include("style_script.php");
$k=0;//check refresh
/* if($k==0){
echo "<script>alert('กรุณากดปุ่ม reflesh ถ้าข้อมูลไม่เปลี่ยนแปลงค่ะ')</script>";
}else{
	$k++;
} */
include 'Connections/registration.php'; 
//$sql = "SELECT * FROM roster where seminar = 'Food' and datein='12' and valid=1";
$sql = "SELECT * FROM roster where seminar = 'logistic2020' and valid = 1 ";
//echo "sql is ".$sql;
$result = $conn->query($sql);
$sqlcount = "SELECT distinct ros_email FROM roster where seminar = 'logistic2020' and valid = 1 ";
$resultcount = $conn->query($sqlcount);
$maxrows = $resultcount->num_rows;
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
		<fieldset class="border" style="width:800px;">
        <img width="100%" src="images/banner_logistic2020.jpg">
        </fieldset>
        
        <!--fieldset class="border"-->
		<fieldset class="border" style="width:800px;">
        <div>
			<div class="legend2">รายชื่อผู้ลงทะเบียน</div>
          <legend>โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal</legend>
            <legend><font color="red">วันอังคารที่ 22 กันยายน 2563 เวลา 08.30 - 13.30 น.</font> ณ โรงแรมเดอะ เบอร์เคลีย์ โฮเต็ล ประตูน้ำ กรุงเทพฯ
<br><br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย (วว.)</legend>
			<button type="button" class="btn btn-basic" onclick="GotoCheckMember()"><span class="glyphicon glyphicon-list-alt"></span> หน้าระบบบริหารจัดการลงทะเบียน </button>
			<!--button type="button" class="btn btn-basic" onclick="CheckMemberAll()"><span class="glyphicon glyphicon-list-alt"></span> ข้อมูลลงทะเบียนทุกห้องสัมมนา</button-->
			<button type="button" class="btn btn-basic" onclick="Excelreg()"><span class="glyphicon glyphicon-list-alt"></span> Excel </button>
			<button type="button" class="btn btn-danger" onclick="Logout()"><span class="glyphicon glyphicon-off"></span> Logout </button>


			<div class="error-message">
			  <p><font>หน้าลงทะเบียน วันที่ 22 กันยายน 2563 (Register)</p>
			</div>

<!--div>
  <table border="0" align="center" class="display nowrap" id="table_id" width="100%"-->
<div class="row col-md-12">
    <table  border="1" style="border-bottom: solid 1px #000; border-top:solid 1px #000;border-right-color: #000;" align="center" class="display" id="table_id" width="100%">
<thead>
      <tr>
	    <th width="4%">รหัส</th>
        <th>ชื่อ-นามสกุล</th>
        <th>สถานะเข้าร่วมงาน</th>
		<th>ลงทะเบียน</th>
      </tr>
</thead>
<tbody>
        <?php 
		     $x=0; //confirm member
			 $y=0; //notconfirm member
			 $z=0; //reject member
			 if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {
		?>
        <tr>
		  <td><? echo $row['ros_ref'];?></td>
          <td width="24%"><?php echo $row['ros_name']."&nbsp &nbsp".$row['ros_surname']; ?></td>
          <td>  <?php
                                                   if($row['arrived'] == 1){
                                                       echo "<font color=blue>".'ลงทะเบียนแล้ว'."</font>"; 
                                                       $x++;
                                                   }elseif($row['arrived'] == 0){
                                                       echo "<font color=red>".'ยังไม่มาลงทะเบียน'."</font>";
													   $y++;
                                                   }
                                                       ?></td>
		   <td>
		   <button type="button" class="btn btn-info" onclick="Conf('<?php echo $row['ros_id'];?>')"><span class="glyphicon glyphicon-ok"></span> ลงทะเบียน </button>
		   <button type="button" class="btn btn-warning" onclick="Undo('<?php echo $row['ros_id'];?>')"><span class="glyphicon glyphicon-edit"></span> ยกเลิก </button>
		   </td>
        </tr>
        <?php } } else { echo "0 results"; } ?>
</tbody>
    </table>
    <br />
	<? $n=$x+$y;
	$a=$x-$maxrows; //$a total
	?>
<?	//echo "<br><font color=blue>"." 1) ลงทะเบียนเข้าร่วมงานจำนวน ".$x." ราย แบ่งเป็น วว. ".$maxrows." ราย และผุ้สนใจ".$a." ราย</font><br><font color=red>2) จองไว้แต่ยังไม่ลงทะเบียนจำนวน ". $y." ราย</font><br><br><font color=blue> ห้องนี้มีจำนวนคนสำรองที่นั่งไว้ ". $n." ราย</font>";			?>
<?	echo "<br><font color=blue>"." 1) ลงทะเบียนเข้าร่วมงานจำนวน ".$x."</font><br><font color=red>2) จองไว้แต่ยังไม่ลงทะเบียนจำนวน ". $y." ราย</font><br><br><font color=blue> ห้องนี้มีจำนวนคนสำรองที่นั่งไว้ ". $n." ราย</font>";			?>

</div>

  </fieldset>
		
</form>
<script src="js/main.js"></script>
</body>
</html>
