<?php
 include("other/connect_database.php");
 $strSQL = "select * from tb_training";
 $objQuery = mysql_query($strSQL);
?>
<html>

    <head>
        <title>หน่วยฝึกอบรม</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
        <!-- CSS Libs -->
        <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap-switch.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/css/checkbox3.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/css/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../lib/css/select2.min.css">
        <!-- CSS App -->
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/themes/flat-blue.css">
        <!-- Javascript Libs -->
        <script type="text/javascript" src="../lib/js/jquery.min.js"></script>
        <script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../lib/js/Chart.min.js"></script>
        <script type="text/javascript" src="../lib/js/bootstrap-switch.min.js"></script>
        <script type="text/javascript" src="../lib/js/jquery.matchHeight-min.js"></script>
        <script type="text/javascript" src="../lib/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../lib/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../lib/js/select2.full.min.js"></script>
        <script type="text/javascript" src="../lib/js/ace/ace.js"></script>
        <script type="text/javascript" src="../lib/js/ace/mode-html.js"></script>
        <script type="text/javascript" src="../lib/js/ace/theme-github.js"></script>
        <!-- Javascript -->
        <script type="text/javascript" src="../js/app.js"></script>
        <script type="text/javascript" src="../js/index.js"></script>
    </head>

    <body class="flat-blue">
        <div class="app-container">
            <div class="row content-container">
                <nav class="navbar navbar-default navbar-top" style="background-color: white">
                    <div class="container-fluid" style="padding-right: 60px;">
                        <div class="navbar-header">

                            <ol class="breadcrumb navbar-breadcrumb">
                                <li class="active">หน่วยฝึกอบรม</li>
                            </ol>
                            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                                <i class="fa fa-th icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                            <li class="">
                                <a href="index.html">
                                    หน้าแรก
                                </a>
                            </li>
                            <li >
                                <a href="service.php">
                                    บริการ
                                </a>
                            </li>
                            <li >
                                <a href="#">
                                    Admin
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <div class="container-fluid">
                    <div class="padding-top">

                        <div class="row">


                            <!--                            <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="card card-info">
                                                                <div class="card-header">
                                                                    <div class="card-body half-padding">
                                                                        <h2 class="no-margin font-weight-300">แสดงรายการหลักสูตรฝึกอบรม</h2>
                                                                        <div class="clear-both"></div>
                                                                    </div>
                                                                    <div class="clear-both"></div>
                                                                </div>
                                                                <div class="card-body no-padding">
                                                                    <ul class="message-list">
                                                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center">
                                                                            <font size="4">กรุณาระบุคำที่ต้องการค้นหา : </font><input type="text" placeholder="ค้นหา ..." autofocus required>
                                                                            <button type="submit" class="btn btn-default" style="padding-top: 2px;padding-bottom: 1px;">ค้นหา</button>
                                                                        </div>
                                                                        
                                                                        <li>
                            
                                                                            <div class="card-body half-padding">
                                                                                <h4 class="no-margin font-weight-300" style="text-align: center"></h4>
                                                                                <div class="clear-both"></div>
                                                                            </div>
                            
                                                                        </li>
                                                                         
                            
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>-->

                            <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-header">

                                        <div class="card-title">
                                            <div class="title">แสดงรายการหลักสูตรฝึกอบรม</div>
                                        </div>
                                    </div>
                                    <center>
                                        <br>
                                        <button type="button" class="btn btn-info">กรอกข้อมูลสมัครบริการ</button>
                                        <button type="button" class="btn btn-primary">กรอกข้อมูลสำหรับลูกค้าที่ลงทะเบียนแล้ว</button>
                                    </center>

                                    <div class="card-body">


                                        <table class="datatable table table-striped" cellspacing="0" width="100%" >
                                            <thead >
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รหัส</th>
                                                    <th>หลักสูตร</th>
                                                    <th>จำนวนวัน</th>
                                                    <th>คน/รุ่น</th>
                                                    <th>ไฟล์</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รหัส</th>
                                                    <th>หลักสูตร</th>
                                                    <th>จำนวนวัน</th>
                                                    <th>คน/รุ่น</th>
                                                    <th>ไฟล์</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                                $i=1;
                                                while ($objResult = mysql_fetch_array($objQuery)){    
                                                    
                                                ?>
                                                <tr style="text-align: center">
                                                    <td ><?php echo $i; ?></td>
                                                
                                                    
                                                    <td><?php echo "<b>".$objResult["training_code"]."</b>"; ?></td>
                                                    <td style="width: 50%;text-align: left"><a href="#"><?php echo $objResult["training_name"]; ?></a></td>
                                                    <td ><?php echo $objResult["training_day"]; ?></td>
                                                    <td ><?php echo $objResult["training_people"]; ?></td>
                                                    <td ><i class="fa fa-file-pdf-o"></i></td>
                                                    

                                                </tr>
                                                <?php
                                     $i++;
                                    }
                                    ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <div class="card-body half-padding">
                                            <h4 class="no-margin font-weight-300" style="text-align: center">บริการฝึกอบรม</h4>
                                            <div class="clear-both"></div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="card-body no-padding">
                                        <ul class="message-list">
                                            <a href="#">
                                                <li>

                                                    <div class="card-body half-padding">
                                                        <h5 class="no-margin font-weight-300" >
                                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> กลับสู่หน้าหลัก วว.</h5>
                                                        <div class="clear-both"></div>
                                                    </div>

                                                </li>
                                            </a>
                                            <a href="index.html">
                                                <li>

                                                    <div class="card-body half-padding">
                                                        <h5 class="no-margin font-weight-300" >
                                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> กลับสู่หน้าฝึกอบรม</h5>
                                                        <div class="clear-both"></div>
                                                    </div>

                                                </li>
                                            </a>
                                            <a href="public.php">
                                                <li>

                                                    <div class="card-body half-padding">
                                                        <h5 class="no-margin font-weight-300" >
                                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Public Training</h5>
                                                        <div class="clear-both"></div>
                                                    </div>

                                                </li>
                                            </a>
                                            <a href="#">
                                                <li>

                                                    <div class="card-body half-padding">
                                                        <h5 class="no-margin font-weight-300" >
                                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> เงื่อนไขการฝึกอบรม</h5>
                                                        <div class="clear-both"></div>
                                                    </div>

                                                </li>
                                            </a>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-header">

                                        <div class="card-title">
                                            <div class="title">ติดต่อเรา </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="message-list">
                                            ** กล่อง Contact Us **

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-header">

                                        <div class="card-title">
                                            <div class="title">ติดต่อสอบถามเพิ่มเติม</div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="message-list">
                                            <h4>
                                                คุณ <br>
                                                โทร. : <br>
                                                แฟกซ์ : <br>
                                                e-mail : <br>
                                            </h4>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <footer class="app-footer">
                <div class="wrapper">
                    <span class="pull-right">กลับสู่ด้านบน <a href="#"><i class="fa fa-long-arrow-up"></i></a></span>  2015 Copyright.
                </div>
            </footer>
        </div>

    </body>

</html>