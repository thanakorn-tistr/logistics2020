<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "root";
$dbName = "registration_logistic2020";

$Connect = mysql_connect('localhost','root','root')or die('ไม่สามารถเชื่อมต่อได้');
mysql_select_db('registration_logistic2020',$Connect)or die('ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้');
mysql_query('SET NAME UTF8');
mysql_query("SET character_set_results=utf8;");
mysql_query("SET character_set_client='utf8';");
mysql_query("SET character_set_connection='utf8';");
?>