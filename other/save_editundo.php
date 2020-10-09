<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
 include("connect_database.php");

//$ros_id=$_POST['ros_id'];

$sql = "UPDATE  `roster` SET  
`valid` =  0
WHERE  `ros_id` = ".$ros_id;
$sql_query=mysql_query($sql);

if($sql_query) {
        
        echo "<script type='text/javascript'>alert('ยกเลิกยืนยันการเข้าร่วมงานเรียบร้อยแล้ว')</script>";
        echo "<meta http-equiv ='refresh'content='0;URL=../checkmember.php'>"; //เมื่อแก้ไขข้อมูลเรียบร้อยแล้วสั่งให้ลิงค์ไปตำแหน่งที่เราต้องการ
    }else{
        echo "<script type='text/javascript'>alert('ไม่สามารถยกเลิกยืนยันการเข้าร่วมงานได้');window.history.go(-1);</script>" ;//ถ้าไม่สามารถบันทึกข้อมูลได้ให้กลับไปที่หน้าเดิม
    }
mysql_close();
?>