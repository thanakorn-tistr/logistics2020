<?php session_start(); 
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
include("connect_database.php");
$user_name = $_REQUEST['user_name'];	
$rpassword = $_REQUEST['pass'];

$SQLuser = "SELECT * FROM member WHERE user_name = '".mysql_real_escape_string($_REQUEST['user_name'])."' ";
	
$Queryuser = mysql_query($SQLuser) or die (mysql_error());
$Resultuser = mysql_fetch_array($Queryuser);

$SQLpass = "SELECT * FROM member WHERE password = '".mysql_real_escape_string($_REQUEST['pass'])."' ";
    
$Querypass = mysql_query($SQLpass) or die (mysql_error());
$Resultpass = mysql_fetch_array($Querypass);

$SQL = "SELECT * FROM member WHERE user_name = '".mysql_real_escape_string($_REQUEST['user_name'])."' 
	and password = '".mysql_real_escape_string($_REQUEST['pass'])."'";
$Query = mysql_query($SQL) or die (mysql_error());
$Result = mysql_fetch_array($Query);


	if($Result["status"]=='USER')
	{
		  $_SESSION["user_name"] = $Result["user_name"];
                  $_SESSION["status"] = $Result["status"];
		  
		  
		  session_write_close();
		  
           
			//echo "<script>window.location='../admin/admin.php'</script>";		
            echo "<script>window.location='/FoodIndustry/registrationEdit.php'</script>";		
		  }elseif($Result["status"]=='ADMIN'){
			  
		  $_SESSION["user_name"] = $Result["user_name"];
                  $_SESSION["status"] = $Result["status"];
		  
		  
		  session_write_close();
		  
          
//                  echo "<script>window.top.window.showResult('0');</script>";
			echo "<script>window.location='../checkmember.php'</script>";		

		  }elseif($Result["status"]=='REG'){
			  
		  $_SESSION["user_name"] = $Result["user_name"];
                  $_SESSION["status"] = $Result["status"];
		  
		  
		  session_write_close();
		  
          
//                  echo "<script>window.top.window.showResult('0');</script>";
			echo "<script>window.location='../RegistrationStaff.php'</script>";		

		  }else
		  {
			echo "<script>alert('username หรือ password ไม่ถูกต้องค่ะ')</script>";
			echo"<script>history.back();</script>"; 
			exit();
		  
		  }

if(!$Resultuser)
	{
		unset($_SESSION['user_name']); 
		unset($_SESSION['status']);
        session_destroy();
        
//                echo "<script>window.top.window.showResult('1');</script>";
                
		echo "<script>window.location='../index.php'</script>";
	}
        
if(!$Resultpass)
	{
		unset($_SESSION['user_name']); 
		unset($_SESSION['status']);
        session_destroy();
        
//                echo "<script>window.top.window.showResult('1');</script>";
                
		echo "<script>window.location='../index.php'</script>";
	}        


mysql_close(); 
?>
