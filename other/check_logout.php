<?php session_start();

if($_SESSION['user_name'] <> "")
{
$sql = "SELECT * FROM member WHERE user_name = '".$_SESSION['user_name']."' ";
$result = mysql_query($sql);

$_SESSION["user_name"] = NULL; 
}
session_write_close(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script>
     alert('ออกจากระบบเรียบร้อย');
     window.location='../index.php';
 </script>