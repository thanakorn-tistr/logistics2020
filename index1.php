<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<meta name="description" content="register">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Puwanat Tongjok edited by Wut">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/styleadmin.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
    <!--link href="DataTable/datatables.minadmin.css" rel="stylesheet" type="text/css" /-->
    <script src="DataTable/datatables.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="./js/manage.js"></script>
        <title>Login - Logistics 2020</title>
        <?php
            include("style_script.php");
        ?>
    </head>

    <body class="flat-blue login-page" style="background-color: skyblue">
        <div class="app-container">
        <div class="row content-container">
                <?//php include("header.php"); ?>
        
        <div class="container-fluid">
             <div class="side-body padding-top">
            <div class="login-box">
                <div>
                    <div class="login-form row">
                        <div class="col-sm-12 text-center login-header">
                           <img width="100%" src="images/banner_logistic2020.jpg">
                           <h4 class="username" style="text-align: center"><font color = 'red'>เข้าสู่ระบบลงทะเบียนสัมมนาโครงการ<p></p>การขับเคลื่อนระบบโลจิสติกส์<p></p>ด้วยวิทยาศาสตร์และเทคโนโลยี<p></p>แบบ New Normal</h4></font>
                        </div>
                        <div class="col-sm-12">
                            <div class="login-body">
                                <div class="progress hidden" id="login-progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        กำลังเข้าสู่ระบบ...
                                    </div>
                                </div>
                                <form action="other/check_login.php" method="POST" name="formlogin">
                                    <div class="profile-info">
                                        
                                        <p style="text-align: left">
                                            ชื่อผู้ใช้<input type="text" class="form-control" name="user_name" id="user_name" placeholder="admin@gmail.com"  required/>
                                            รหัสผ่าน<input type="password" class="form-control" name="pass" id="pass" placeholder="password" required/>
                                        </p>
                                        <div class="login-button text-center">
                                            <input type="submit" class="btn btn-primary" value="Login">
											<button type="button" class="btn btn-blue" onclick="Gotoindex()"> กลับหน้าหลัก </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
        </div>
        </div>
    </body>

</html>
