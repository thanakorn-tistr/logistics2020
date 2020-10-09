<?php
$Connect = mysql_connect('localhost','root','1234')or die('ไม่สามารถเชื่อมต่อได้');
mysql_select_db('training',$Connect)or die('ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้');
mysql_query('SET NAME UTF8');
mysql_query("SET character_set_results=utf8;");
mysql_query("SET character_set_client='utf8';");
mysql_query("SET character_set_connection='utf8';");
?>