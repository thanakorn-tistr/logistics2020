<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='index1.php'</script>
<?php
exit();}
include("style_script.php");
//Mysql Normal here
$objConnect = mysql_connect("localhost","root","Devp@ssw0rd");
mysql_select_db("registration") or die(mysql_error());
$sqltot = "SELECT * FROM roster ";
$resultEdit	 = mysql_query($sqltot);
$arrived=0;
$arrfood=0;
$arrfoods=0;
$arrrbm=0;
$arrtistr54=0;

//****************************Day 12
$sqltot1 = "SELECT * FROM roster where arrived=1 ";
$resultEdit1	 = mysql_query($sqltot1);
while($rows1	 = mysql_fetch_array($resultEdit1)){
	
    $arrived++;
	  if(($rows1['seminar']=='Food') and ($rows1['arrived']==1) and ($rows1['datein']='12' or $rows1['datein']='12-13')){
		  $arrfood++;
	  }elseif (($rows1['seminar']=='RMB&RBI') and ($rows1['arrived']==1) and ($rows1['datein']='12' or $rows1['datein']='12-13')){
		  $arrrbm++;
	  }elseif (($rows1['seminar']=='Foodsafety') and ($rows1['arrived']==1)){
		  //$arrfoods++;
	  }elseif (($rows1['seminar']=='TISTR54') and ($rows1['arrived']==1)){
		  $arrtistr54++;
	  }

}
$sumarrived12=$arrfood+$arrfoods+$arrrbm+$arrtistr54;
$arrived13=0;
$arrfood13=0;
$arrfoods13=0;
$arrrbm13=0;
$sqltot1 = "SELECT * FROM roster where arrived=1 ";
$resultEdit1	 = mysql_query($sqltot1);
while($rows1	 = mysql_fetch_array($resultEdit1)){
	
    $arrived13++;
	  if(($rows1['seminar']=='Food') and ($rows1['datein']=='13' or $rows1['datein']=='12-13')){
		  $arrfood13++;
	  }elseif (($rows1['seminar']=='RMB&RBI')  and ($rows1['datein']=='13' or $rows1['datein']=='12-13')){
		  $arrrbm13++;
	  }elseif ($rows1['seminar']=='Foodsafety') {
		  $arrfoods13++;
	  }

}
$sumarrived13=$arrfood13+$arrfoods13+$arrrbm13;
//******************************
$pr="PR";
$fi="FoodIndustry";
$r="RMB&RBI";
$fs="Foodsafety";
$invitedg=0;
$noninvig=0;
$xxg=0; //FoodIndustry
$yyg=0; //RMB&RBI
$nng=0; //Foodsafety
$prg=0; //PR
$xxcg=0; //FoodIndustry confirm
$yycg=0; //RMB&RBI confirm
$nncg=0; //Foodsafety confirm
$prcg=0; //PR confirm
$xxng=0; //FoodIndustry Noninvite
$yyng=0; //RMB&RBI Noninvite
$nnng=0; //Foodsafety Noninvite
$xxncg=0; //FoodIndustry Noninvite Confirm
$yyncg=0; //RMB&RBI Noninvite Confirm
$nnncg=0; //Foodsafety Noninvite Confirm
$zzg=0;
$head1="Invite Confirmed (".date('d-m-Y').")";
$head2="NonInvite Confirmed (".date('d-m-Y').")";
while($rows	 = mysql_fetch_array($resultEdit)){
if (!empty($rows['user_name'])) {
    $invitedg++;
	  if($rows['seminar']=='Food'){
		  $xxg++;
		  if($rows['valid']==1) $xxcg++;
	  }elseif ($rows['seminar']=='RMB&RBI'){
		  $yyg++;
		  if($rows['valid']==1) $yycg++;
	  }elseif($rows['seminar']=='Foodsafety'){
		  $nng++;
		  if($rows['valid']==1) $nncg++;
	  }elseif($rows['seminar']=='TISTR54'){
		  $prg++;
		  if($rows['valid']==1) $prcg++;
	  }
   }else{
	$noninviteg++;   
	 if($rows['seminar']=='Food'){
		  $xxng++;
		  if($rows['valid']==1) $xxncg++;
	  }elseif ($rows['seminar']=='RMB&RBI'){
		  $yyng++;
		  if($rows['valid']==1) $yyncg++;
	  }elseif($rows['seminar']=='Foodsafety'){
		  $nnng++;
		  if($rows['valid']==1) $nnncg++;
	  }
   }
}
mysql_close($objConnect);
//Mysqli here
include 'Connections/registration.php'; 
$sqltot = "SELECT * FROM roster ";
$resulttot = $conn->query($sqltot);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="register">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Puwanat Tongjok edited by Wut">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <script src="jquery-1.10.2.min.js"></script>
    <!--link href="DataTable/datatables.minadmin.css" rel="stylesheet" type="text/css" /-->
	<script type="text/javascript" src="./js/manage.js"></script>
   <script src="./js/highcharts.js" type="text/javascript"></script>
   <script src="./js/modules/exprting.js"></script>
<script type="text/javascript">
   var chart
$(function () {
  chart = new Highcharts.Chart({
		    chart: {
			  renderTo: 'chartContainer',
			  type: 'column',
			  showAxes: true
            },
            title: {
                text: '<? echo $head1; ?>'
            },
            subtitle: {
                text: 'Source data: Digital Team'
            },

            xAxis: {
                categories: ['<?="PR";?>', '<?="FoodIndustry";?>', '<?="RMB&RBI";?>', '<?="Foodsafety";?>'],
                title: {
                    text: 'Seminar',
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Paticipation'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
 		column: {
 		    dataLabels:{
			enabled: true
		    }
		}
            },
            series: [{
               name: 'Seminar',
                data: [
				['<?="PR";?>', <?=$prcg;?>], 
				['<?="FoodIndustry";?>', <?=$xxcg;?>], 
				['<?="RMB&RBI";?>', <?=$yycg;?>], 
				['<?="Foodsafety";?>', <?=$nncg;?>]
   ] }]

        });
    });
   </script>
<script type="text/javascript">
   var chart
$(function () {
  chart = new Highcharts.Chart({
		    chart: {
			  renderTo: 'chartContainer1',
			  type: 'pie',
			  showAxes: true
            },
            title: {
                text: '<? echo $head2; ?>'
            },
            subtitle: {
                text: 'Source data: Digital Team'
            },

            xAxis: {
                categories: ['<?="PR";?>', '<?="FoodIndustry";?>', '<?="RMB&RBI";?>', '<?="Foodsafety";?>'],
                title: {
                    text: 'Seminar',
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Paticipation'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
 		column: {
 		    dataLabels:{
			enabled: true
		    }
		}
            },
            series: [{
               name: 'Seminar',
                data: [
				['<?="PR";?>', <?=0;?>], 
				['<?="FoodIndustry";?>', <?=$xxncg;?>], 
				['<?="RMB&RBI";?>', <?=$yyncg;?>], 
				['<?="Foodsafety";?>', <?=$nnncg;?>]
   ] }]

        });
    });
   </script>   
<title>ระบบลงทะเบียน</title>
</head>
<body>


        <center>
			<h1><font color='blue'><strong>สรุปจำนวนผู้ลงทะเบียนเข้าร่วมสัมมนา</strong></font><br></h1><br>
           <font color='blue'>TISTR’s From Local to Global International Forum: FoodIndustry 12-13 มิถุนายน 2017 ณ โรงแรมเซ็นทาราแกรนด์ กรุงเทพฯ<br><br>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย(วว.)</font>
		   <div></div>
		   <button type="button" class="btn btn-basic" onclick="GotoCheckMember()"><span class="glyphicon glyphicon-list-alt"></span> Home </button>
		   <button type="button" class="btn btn-danger" onclick="Logout()"><span class="glyphicon glyphicon-off"></span> Logout </button>
            </center>
<div class="row col-md-12">
<?	
$invited=0;
$noninvi=0;
$xx=0; //FoodIndustry
$yy=0; //RMB&RBI
$nn=0; //Foodsafety
$pr=0; //PR
$xxc=0; //FoodIndustry confirm
$yyc=0; //RMB&RBI confirm
$nnc=0; //Foodsafety confirm
$prc=0; //PR confirm
$xxn=0; //FoodIndustry Noninvite
$yyn=0; //RMB&RBI Noninvite
$nnn=0; //Foodsafety Noninvite
$xxnc=0; //FoodIndustry Noninvite Confirm
$yync=0; //RMB&RBI Noninvite Confirm
$nnnc=0; //Foodsafety Noninvite Confirm
$zz=0;
while($row2 = $resulttot->fetch_assoc()){
if (!empty($row2['user_name'])) {
    $invited++;
	  if($row2['seminar']=='Food'){
		  $xx++;
		  if($row2['valid']==1) $xxc++;
	  }elseif ($row2['seminar']=='RMB&RBI'){
		  $yy++;
		  if($row2['valid']==1) $yyc++;
	  }elseif($row2['seminar']=='Foodsafety'){
		  $nn++;
		  if($row2['valid']==1) $nnc++;
	  }elseif($row2['seminar']=='TISTR54'){
		  $pr++;
		  if($row2['valid']==1) $prc++;
	  }
   }else{
	$noninvite++;   
	 if($row2['seminar']=='Food'){
		  $xxn++;
		  if($row2['valid']==1) $xxnc++;
	  }elseif ($row2['seminar']=='RMB&RBI'){
		  $yyn++;
		  if($row2['valid']==1) $yync++;
	  }elseif($row2['seminar']=='Foodsafety'){
		  $nnn++;
		  if($row2['valid']==1) $nnnc++;
	  }
   }
}
$sum=$xxnc+$yync+$nnnc+$xxc+$yyc+$nnc;
if($sumarrived13==0){
	$sumarrived13==0.00;
}
echo "<center><h1><font color=blue><u>จำนวนผู้ลงทะเบียนทุกห้อง ".$sum." คน</u></font></h1><br></center>";
//echo "<center><h1><font color=blue><u>จำนวนผู้เข้าร่วมสัมมนาวันที่ 12 มิย. 2560 รวมทั้งสิ้น ".$sumarrived12." คน</u></font></h1><br></center>";
//echo "<center><h1><font color=Green><u>จำนวนผู้เข้าร่วมสัมมนาวันที่ 13 มิย. 2560 รวมทั้งสิ้น ".$sumarrived13." คน</u></font></h1><br></center>";
?>
<table align="center" border="1" width="80%" bgcolor="#FFFF99"> 
<tbody><tr bgcolor="#999999" height="20"><td colspan="6" height="44" bgcolor="#F5F5F5" align="left"><strong><center><font size="6" color='Black'>รายละเอียดจำนวนผู้เข้าร่วมสัมมนาจริงแยกตามวัน</font></center></strong></td></tr>
       <tr bgcolor="#999999" height="20">
	    <td  height="44" bgcolor="#F5F5F5" align="left"><strong><center><font size="6" color='Black'>Date</font></center></strong></td>
		<td  height="44" bgcolor="#F5F5F5" align="left"><strong><center><font size="6" color='Black'>RBM&RBI</font></center></strong></td>
		<td  height="44" bgcolor="#F5F5F5" align="left"><strong><center><font size="6" color='Black'>FoodIndustry</font></center></strong></td>
	    <td  height="44" bgcolor="#F5F5F5" align="left"><strong><center><font size="6" color='Black'>FoodSafety</font></center></strong></td>
	   	<td  height="44" bgcolor="#F5F5F5" align="left"><strong><center><font size="6" color='Black'>TISTR54</font></center></strong></td>
	    <td  height="44" bgcolor="#F5F5F5" align="left"><strong><center><font size="6" color='Black'>รวมคนต่อวัน</font></center></strong></td>
	   </tr> 
  <tr>
        <td><center><h4><? echo "12 มิย. 2560";?></h4></center></td>
		<td><center><h4><? echo $arrrbm;?></h4></center></td>
		<td><center><h4><? echo $arrfood;?></h4></center></td>
		<td><center><h4><? echo $arrfoods;?></h4></center></td>
		<td><center><h4><? echo $arrtistr54;?></h4></center></td>
		<td><center><h4><? echo $sumarrived12;?></h4></center></td>
   </tr>
   <tr>
        <td><center><h4><? echo "13 มิย. 2560";?></h4></center></td>
		<td><center><h4><? echo $arrrbm13;?></h4></center></td>
		<td><center><h4><? echo $arrfood13;?></h4></center></td>
		<td><center><h4><? echo $arrfoods13;?></h4></center></td>
		<td><center><h4><? echo "0";?></h4></center></td>
		<td><center><h4><? echo $sumarrived13;?></h4></center></td>
   </tr>
 </tbody>
</table>
</br><p><p>	
<hr>

<table align="center" border="1" width="80%" bgcolor="#FFFF99"> 
<tbody><tr><td colspan="11" height="43" bgcolor="#0033CC" align="left"><strong><center><font size="6" color='white'>Invited All Seminar</font></center></strong></td></tr> 
      <tr bgcolor="#999999" height="20">
		<td><font color='#FFFF99'><center>Department</center></font></td>
	    <td><font color='white'><center>PR</center></font></td>
		<td><font color='blue'><center>Confirm PR</center></font></td>
        <td><font color='white'><center>FoodIndustry (B)</center></font></td>
		<td><font color='blue'><center>Confirm FoodIndustry</center></font></td>
        <td><font color='white'><center>RMB&RBI (A)</font></center></td>
        <td><font color='blue'><center>Confirm RMB&RBI</center></font></td>
		<td><font color='white'><center>Foodsafety (C)</center></font></td>
		<td><font color='blue'><center>Confirm Foodsafety</center></font></td>	
        <td><font color='blue'><center>Total Invited</center></font></td>			
		<td><font color='#FFFF99'><center>Total Confirmed</center></font></td>
      </tr>
   <tr>
        <td bgcolor="#999999"><font color='white'><center>Amount</center></font></td>
        <td><center><? echo $pr;?></center></td>
        <td><center><? echo $prc;?></center></td>
        <td><center><? echo $xx;?></center></td>
        <td><center><? echo $xxc;?></center></td>
		<td><center><? echo $yy;?></center></td>
		<td><center><? echo $yyc;?></center></td>
		<td><center><? echo $nn;?></center></td>
		<td><center><? echo $nnc;?></center></td>	
        <td><center><? echo $invited;?></center></td>			
		<td><center><? echo $xxc+$yyc+$nnc;?></center></td>
   </tr>
 </tbody>
</table>
</br><p><p>	
<hr>
<table align="center" border="1" width="80%" bgcolor="#FFFF99"> 
	<tbody>
		<tr>
			<td><div style="width: 100%; height: 300px;" id="chartContainer"></div></td>
		</tr>
	</tbody>
</table>
</br><p><p>	
</br><p><p>	
<hr>
<table align="center" border="1" width="80%" bgcolor="#FFFF99"> 
<tbody><tr><td colspan="11" height="43" bgcolor="#FF9900" align="left"><strong><center><font size="6" color='white'>Non-Invite All Seminar</font></center></strong></td></tr> 
      <tr bgcolor="#999999" height="20">
		<td><font color='#FFFF99'><center>Department</center></font></td>
	    <td><font color='white'><center>PR</center></font></td>
		<td><font color='blue'><center>Confirm PR</center></font></td>
        <td><font color='white'><center>FoodIndustry (B)</center></font></td>
		<td><font color='blue'><center>Confirm FoodIndustry</center></font></td>
        <td><font color='white'><center>RMB&RBI (A)</font></center></td>
        <td><font color='blue'><center>Confirm RMB&RBI</center></font></td>
		<td><font color='white'><center>Foodsafety (C)</center></font></td>
		<td><font color='blue'><center>Confirm Foodsafety</center></font></td>	
        <td><font color='blue'><center>Total NonInvited</center></font></td>			
		<td><font color='#FFFF99'><center>Total Confirmed</center></font></td>
      </tr>
   <tr>
        <td bgcolor="#999999"><font color='white'><center>Amount</center></font></td>
        <td><center><? echo "0";?></center></td>
		<td><center><? echo "0";?></center></td>
        <td><center><? echo $xxn;?></center></td>
		<td><center><? echo $xxnc;?></center></td>
		<td><center><? echo $yyn;?></center></td>
        <td><center><? echo $yync;?></center></td>
		<td><center><? echo $nnn;?></center></td>
		<td><center><? echo $nnnc;?></center></td>	
		<td><center><? echo $noninvite;?></center></td>				
		<td><center><? echo $xxnc+$yync+$nnnc;?></center></td>
   </tr>
</tbody>
</table>
</br><p><p>	
</br><p><p>
<table align="center" border="1" width="80%" bgcolor="#FFFF99"> 
	<tbody>
		<tr>
			<td><div style="width: 100%; height: 300px;" id="chartContainer1"></div></td>
		</tr>
	</tbody>
</table>
<script src="js/main.js"></script>
			
</body>
</html>
