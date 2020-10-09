<?php

include("style_script.php");

include 'Connections/registration.php'; 
$sql = "SELECT * FROM doc where seminar = 'Food' and flag = '1' order by id DESC ";
//echo "sql is ".$sql;
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
<title>Registrations Food Industry System</title>
</head>
<body>

<form method="POST" name="form1" id="form1" class="cd-form floating-labels floating-label-other">
		<fieldset class="border">
        <img width="100%" src="img/symposium.jpg">
        </fieldset>
    
        <fieldset class="border">
        <div align="center">
			<div class="legend2"></div>
            <legend>TISTR’s From Local to Global International Forum: Food Industry 4.0</legend>
            <legend>Monday 12 - Tuesday 13 June 2017, <br> Centara Grand Hotel at Central Lad Phrao, Bangkok, Thailand.<br><br>Thailand Institute of Scientific and Technological Research (TISTR)</legend>
           
			<div class="error-message">
                <a href="index.php"><p>Download Document</p></a>
			</div>
<div>
  <table border="0" align="center" class="display nowrap" id="table_id" width="100%">


<tbody>

        <?php 
		
		     $i=0;
			 if ($result->num_rows > 0) { 
			 ?>
			 <thead>
				<tr>
					<th>No.</th>
					<th>Document</th>
				</tr>
					<tr></tr>
			</thead>
			<?
			 while($row = $result->fetch_assoc()) {
				 $i++;
		?>
		
        <tr style="height: 40px;">
		  <td width="5%"><?php echo $i; ?></td>
          <td width="24%"><a href="./file/<?php echo $row['file_upload'];?>" target="_blank"><?php echo $row['doc_name']; ?></a></td>
        </tr>
        <?php } } else { echo "No document download"; } ?>
</tbody>
    </table>
<br/>
<br/>
</div>
            <legend>Asking for Information</legend>
            <legend>Phone + (66)2577-9155, 9132  Fax + (66)2577-9177, 9132</legend>
            <legend>Email: tistrforum@tistr.or.th</legend>
            <a href="https://www.google.com/maps/place/Centara Grand Hotel at Central Lad Phrao, Bangkok/@
				 13.817900,100.559982,17z/data=!3m1!4b1!4m5!3m4!1s0x30e29c159e3544e3:0x709a5bb981c416ef!8m2!3d13.817879!4d100.560036" target = "_blank"><input class="button2" type="button" value="Google Map"></a>
			<a href="index.php"><input class="button4" type="button" value="Home"></a>
         </div>
		</fieldset>
		
</form>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
</body>
</html>