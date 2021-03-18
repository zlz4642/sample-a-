<?php
    require_once("./db_con.php");
    session_start();
    $title = $_POST["title"];
    $message = $_POST["message"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];


    $insert_sql = "INSERT INTO Message (Title, Message, EmailAddress, PhoneNumber, date) VALUES ('$title','$message','$email','$phone', DATE_FORMAT(CURDATE() , '%Y-%m-%d'))";
    if (mysqli_query($conn,$insert_sql)){
        
        $CNT = "SET @CNT=0";
        $conn->query($CNT);
        $Auto_Increment = "UPDATE Message SET No = @CNT:=@CNT+1";
        $conn->query($Auto_Increment);

        echo "<script>alert(\"정상적으로 등록되었습니다.\");</script>";
        echo "<script>location.replace('/');</script>";
        exit;
    } else {
	    echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('/');</script>";
        exit;
    }
?>





