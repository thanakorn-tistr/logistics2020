<?php session_start();
if($_SESSION['user_name'] == "")
 {
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <script>alert ('กรุณาเข้าสู่ระบบ')</script>
 <script>window.location='index1.php'</script>
<?php
exit();}
?>
<html>

    <head>
        <title></title>
        <?php
        include("style_script.php");
        ?>
    </head>
    <?php
    include 'Connections/registration.php'; 
   
    ?>
    <body class="flat-blue">
    <div class="app-container">
            <div class="row content-container">
                <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="title">Upload File โครงการสัมมนา การขับเคลื่อนระบบโลจิสติกส์ ด้วยวิทยาศาสตร์และเทคโนโลยีแบบ New Normal</div>
                            </div>
                        </div>
                          <div class="card-body ">
                            <div class="row">
                                <div class=" col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
                                    <form action="other/save_doc.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
									   <div class="form-group">
                                          <label class="control-label col-sm-3" >ชื่อเอกสาร:</label>
                                              <div class="col-lg-6 col-sm-6">
                                                   <input type="text" class="form-control" name="doc_name" placeholder="กรุณากรอกเอกสาร" required autofocus>
                                              </div>
                                       </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">เอกสาร:</label>
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile"></label>
                                                    <input type="file" name="file_upload[]" id="file_upload" multiple>

                                                </div>
                                            </div>
                                        </div>            

                                        <div class="form-group"> 
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">บันทึก</button>&nbsp;
                                                <button type="button" class="btn btn-default" onclick="window.location = 'checkmember.php'">ยกเลิก</button>
												<button type="button" class="btn btn-default" onclick="window.location = 'checkmember.php'">Home</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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