<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include("other/connect_database.php");
//include '../Connections/registration.php'; 
	$sqlNew="SELECT * from roster where ros_id = ".$_GET['ros_id'];
	//$result = $conn->query($sqlNew);
	//$rows = $result->fetch_array();
	$result=mysql_query($sqlNew);	
	$rows=mysql_fetch_array($result);
//*******************************************************create password code

//**************************************update table
$sql = "UPDATE  `roster` SET  
`arrived` =  1
WHERE  `ros_id` = ".$_GET['ros_id'];
$sql_query=mysql_query($sql);
//echo "sql is ".$sql;
//**************************************
if($sql_query) {
        
        echo "<script type='text/javascript'>alert('ลงทะเบียนเข้าร่วมงานเรียบร้อยแล้วค่ะ')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=admin_reg.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
    }else{
        echo "<script type='text/javascript'>alert('ไม่สามารถยืนยันการเข้าร่วมงานได้');window.history.go(-1);</script>" ;//ถ้าไม่สามารถบันทึกข้อมูลได้ให้กลับไปที่หน้าเดิม
    }
mysql_close();
?>