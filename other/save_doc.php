<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include '../Connections/registration.php'; 


$doc_name=$_POST['doc_name'];
date_default_timezone_set('Asia/Bangkok');
for($i=0;$i<count($_FILES["file_upload"]["name"]);$i++)
{
	if($_FILES["file_upload"]["name"][$i] != "")
	{
		if(move_uploaded_file($_FILES["file_upload"]["tmp_name"][$i],"../file/".date("Ymdhis")."-$i.pdf"))
		{
			$file_upload[$i] = date("Ymdhis")."-$i.pdf";
                }		
	}

}


$strSQL = "INSERT INTO doc (doc_name, file_upload, seminar, flag) VALUES ('$doc_name', '$file_upload[0]', 'tistrcust', '1')";

//echo "strSQL is ".$strSQL;


if ($conn->query($strSQL) === TRUE) {
?>
<script>alert ('บันทึกข้อมูลเรียบร้อย');</script>
<script>window.location='../checkmember.php';</script>
<?
}else{    
?>
<script>alert ('บันทึกข้อมูลไม่สำเร็จ ');</script>
<script>window.history.go(-1);</script>
<?php
}
 
$conn->close();
?>

