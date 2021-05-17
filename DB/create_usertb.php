<?php
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    $sql="
        create table if not exists userTB
        (
            u_id char(10) not null primary key,
            u_pw int not null,
            u_name varchar(10) not null,
            u_hp char(13) not null,
            u_addr char(10) not null,
            u_age int not null,
            u_sex char(2) not null
        )

    ";
    $ret = mysqli_query($con, $sql);

    if($ret){
        echo "user 테이블이 성공적으로 생성됨";
    }

    mysqli_close($con);

?>
