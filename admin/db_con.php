<?php
    // mysqli
    $db_host = "kipy-db.cbclgzdkkucw.ap-northeast-2.rds.amazonaws.com";
    $db_user = "kipyadmin";
    $db_pass = "kipyadmin11";
    $db_name = "webdb";
    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    
    /*
    if (!$conn) {
        echo "<script>alert(\"DB Connection False\");</script>";
    }
    else {
        echo "<script>alert(\"DB Connection Success\");</script>";
    }
    */
    
?>
