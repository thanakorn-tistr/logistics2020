<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
        ini_set('display_errors', 1);
        error_reporting(~0);

        include("connect_database.php");
        $conn = new mysqli($serverName, $userName, $userPassword, $dbName);
        
        $strSQL2 = "SELECT * FROM booking ORDER BY booking_id DESC LIMIT 0,1";
        $objQuery2 = mysql_query($strSQL2);
        $objResult2 = mysql_fetch_array($objQuery2);

        $c = $objResult2["booking_id"];
        $z = $c+1;
        
        $training_id = (isset($_POST["training_id"])) ? $_POST["training_id"] : '';

        // Create connection
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO booking ( training_id, comp_name, comp_status, identity_code, branch_num, type_bussiness, address_receipt, province
            ,zip_code,tel,fax,website,mem_num,name_booking,position,email,emergency_contact,emergency_tel,topic_from,accommodation) 
		VALUES ('$training_id','" . $_POST["comp_name"] . "','" . $_POST["comp_status"] . "','" . $_POST["identity_code"] . "','" . $_POST["branch_num"] . "','" . $_POST["type_bussiness"] . "'"
                . ",'" . $_POST["address_receipt"] . "','" . $_POST["province"] . "','" . $_POST["zip_code"] . "'"
                . ",'" . $_POST["tel"] . "','" . $_POST["fax"] . "','" . $_POST["website"] . "'"
                . ",'" . $_POST["mem_num"] . "','" . $_POST["name_booking"] . "','" . $_POST["position"] . "','" . $_POST["email"] . "'"
                . ",'" . $_POST["emergency_contact"] . "','" . $_POST["emergency_tel"] . "','" . $_POST["topic_from"] . "'"
                . ",'" . $_POST["accommodation"] . "')";
        if ($conn->query($sql) === TRUE) {
            $chk = 'true';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        if ($_POST["name1"] == !NULL) {
            $food1 = (isset($_POST["food1"])) ? $_POST["food1"] : '';
            $sql2 = "INSERT INTO booking_member (training_id, `group`, name, department, food, status) 
                    VALUES ('" . $_POST["training_id"] . "','$z','" . $_POST["name1"] . "','" . $_POST["department1"] . "','$food1','ยังไม่แน่นอน')";

            if ($conn->query($sql2) === TRUE) {
                $chk2 = 'true';
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        };
        if ($_POST["name2"] == !NULL) {
            $food2 = (isset($_POST["food2"])) ? $_POST["food2"] : '';
            $sql3 = "INSERT INTO booking_member (training_id, `group`, name, department, food, status) 
                    VALUES ('" . $_POST["training_id"] . "','$z','" . $_POST["name2"] . "','" . $_POST["department2"] . "','$food2','ยังไม่แน่นอน')";

            if ($conn->query($sql3) === TRUE) {
                $chk3 = 'true';
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
        };
        if ($_POST["name3"] == !NULL) {
            $food3 = (isset($_POST["food3"])) ? $_POST["food3"] : '';
            $sql4 = "INSERT INTO booking_member (training_id, `group`, name, department, food, status) 
                    VALUES ('" . $_POST["training_id"] . "','$z','" . $_POST["name3"] . "','" . $_POST["department3"] . "','$food3','ยังไม่แน่นอน')";

            if ($conn->query($sql4) === TRUE) {
                $chk4 = 'true';
            } else {
                echo "Error: " . $sql4 . "<br>" . $conn->error;
            }
        };
        if ($_POST["name4"] == !NULL) {
            $food4 = (isset($_POST["food4"])) ? $_POST["food4"] : '';
            $sql5 = "INSERT INTO booking_member (training_id, `group`, name, department, food, status) 
                    VALUES ('" . $_POST["training_id"] . "','$z','" . $_POST["name4"] . "','" . $_POST["department4"] . "','$food4','ยังไม่แน่นอน')";

            if ($conn->query($sql5) === TRUE) {
                $chk5 = 'true';
            } else {
                echo "Error: " . $sql5 . "<br>" . $conn->error;
            }
        };
        if ($_POST["name5"] == !NULL) {
            $food5 = (isset($_POST["food5"])) ? $_POST["food5"] : '';
            $sql6 = "INSERT INTO booking_member (training_id, `group`, name, department, food, status) 
                    VALUES ('" . $_POST["training_id"] . "','$z','" . $_POST["name5"] . "','" . $_POST["department5"] . "','$food5','ยังไม่แน่นอน')";

            if ($conn->query($sql6) === TRUE) {
                $chk6 = 'true';
            } else {
                echo "Error: " . $sql6 . "<br>" . $conn->error;
            }
            echo "<".$food5.">";
        };


?>
        
<script>alert ('บันทึกข้อมูลเรียบร้อย');</script>
<script>window.location='../public.php';</script>

<?php
        $conn->close();
?>
    </body>
</html>
