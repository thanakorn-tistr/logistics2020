<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        include("style_script.php");
        ?>
        <script type="text/javascript" src="./js/manage.js"></script>
		
        
    </head>
    <?php
   // include("./admin_header.php");
   include("./other/connect_database.php");
    $ID = $_GET["ID"];
   $sql = "SELECT * FROM roster Order by valid DESC ";
	//echo "sql is ".$sql."<br>";
    $objQuery = mysql_query($sql);
    $objResult = mysql_fetch_array($objQuery);
	
    ?>
    <body class="flat-blue">
        <div class="app-container">
            <div class="row content-container" style="margin-left: 50px;margin-right: 50px"> 
                <div class="card card-success">
                    <div class="card-header">

                        <div class="card-title">
                            <div class="title">
                             
                            </div>
                        </div>
                    </div>
                    <div class="panel-body panel-collapse collapse in" id="collapse8">
        <div class="container">
            <form name="bkm_booking" action="other/correct_member.php" method="post" >
                <!--input type="hidden" name="ID" value="<?php echo $ID;?>" readonly-->
                <table class="datatable table table-striped" cellspacing="0" width="100%"  >
                    <thead>
                        <tr>
						  <th></th>
                            <th style="text-align: center">เลือก</th>
                           <!--th  style="text-align: center">ลำดับ</th-->   
						   <th style="text-align: center">ชื่อ</th>
                            <th style="text-align: center">นามสกุล</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">เบอร์โทร</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">ยืนยันสถานะ</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
						<th></th>
                            <th style="text-align: center">เลือก</th>
                            <!--th  style="text-align: center">ลำดับ</th-->
                            <th style="text-align: center">ชื่อ</th>
                            <th style="text-align: center">นามสกุล</th>
                            <th style="text-align: center">หน่วยงาน</th>
                            <th style="text-align: center">เบอร์โทร</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">ยืนยันสถานะ</th>
                            

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($objResult = mysql_fetch_array($objQuery)) {
                            ?>
                            <tr>
							<td style="text-align: center"> <?php echo $i; ?></td>
                                <td align="center">
                                    <input type="checkbox" name="chkDel[]" value="<?php echo $objResult["ros_id"]; ?>">
                                </td>
                                
                                <td style="text-align: center"> <?php echo $objResult["ros_name"]; ?></td>
                                <td style="text-align: center"> <?php echo $objResult["ros_surname"]; ?></td>
                                <td style="text-align: center"> <?php echo $objResult["ros_organization"]; ?></td>
                                <td style="text-align: center"><?php echo $objResult["ros_mobile"]; ?></td>
								<td style="text-align: center"><?php echo $objResult["ros_email"]; ?></td>
                                <td style="text-align: center">
                                    <?php
                                                   if($objResult['valid'] == '1'){
                                                       echo 'ยืนยันการเข้าร่วม'; 
                                                   }  else {
                                                       echo 'ยังไม่ยืนยัน';
                                                   }
                                                       ?>
                                </td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-info" onclick="EditBkM('<?php echo $objResult['ros_id'];?>')"><span class="glyphicon glyphicon-edit"></span> ยืนยัน </button>
                                    <button type="button" class="btn btn-danger" onclick="GotoDeleteBooking('<?php echo $objResult['ros_id'];?>')"><span class="glyphicon glyphicon-trash"></span> ลบ </button>
                                </td>

                                
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>

                    </tbody>
                </table>
                &nbsp;
                <button type="submit" class="btn btn-success" value="update"><span class="glyphicon glyphicon-edit"></span> ยืนยันข้อมูลที่เลือก </button>
            </form>
        </div>
                    </div>
                </div>
                 </div>
            <footer class="app-footer">
                <div class="wrapper">
                    <span class="pull-right"><a href="#">กลับสู่ด้านบน <i class="fa fa-long-arrow-up"></i></a></span>  2015 Copyright.
                </div>
            </footer>
        </div>
    </body>
</html>
