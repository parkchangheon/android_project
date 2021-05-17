<?php
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $sql = "create database assi_study";
    $ret = mysqli_query($con, $sql);

    if($ret) { 
        echo "독서실 데이터 베이스가 성공적으로 생성됨.";
    } 

    mysqli_close($con);

?>
