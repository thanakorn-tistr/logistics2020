<html>
<head>
<title></title>
</head>
<body>
<?php
include ("../../other/connect_database.php");
$ID = $_POST["ID"];

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "DELETE FROM booking_member ";
			$strSQL .="WHERE bkm_id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
                        
                        $chk = 'success';
		}
	}
        
if(isset($chk)){        
        echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว')</script>";
}else{
        echo "<script>alert('ยังไม่ได้เลือกข้อมูล')</script>";
}
echo "<meta http-equiv ='refresh'content='0;URL=../booking.php?ID=$ID'>";       

mysql_close();

?>
</body>
</html>