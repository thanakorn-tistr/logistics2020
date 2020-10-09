<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 include("connect_database.php");

//$setting=$_GET['setting'];

$ros_id = $_GET['ros_id'];
$sql = "delete from roster  where ros_id=".$ros_id;
$result = mysql_query($sql);

echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว')</script>";
echo "<meta http-equiv ='refresh'content='0;URL=../checkmember.php'>"; 

mysql_close();



?>