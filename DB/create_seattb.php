<?php
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    $sql="
        create table if not exists seat
        (
            s_num int not null primary key,
            s_sex char(2) not null,
            su_id varchar(10),
            su_name char(13)  
        )

    ";
    $ret = mysqli_query($con, $sql);

    if($ret){
        echo "seat 테이블이 성공적으로 생성됨";
    }

    mysqli_close($con);

?>
