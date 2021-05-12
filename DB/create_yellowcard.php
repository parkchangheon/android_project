<?php
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    $sql="
        create table if not exists yellow_card
        (
            y_num int not null primary key,
            yu_id char(10) not null ,
            yu_name varchar(10) not null,
            y_date DATE
        )

    ";
    $ret = mysqli_query($con, $sql);

    if($ret){
        echo "yellowcard 테이블이 성공적으로 생성됨";
    }

    mysqli_close($con);

?>
