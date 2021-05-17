<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    mysqli_close($con);
    echo "MySQL 접속 완전히 성공!!";
?>