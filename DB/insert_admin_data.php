<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $sql ="
        insert into admin values
        ('admin1','1234','이개똥'),
        ('admin2','1111','박개똥'),
        ('admin3','2222','홍길똥')
    ";

    $ret = mysqli_query($con, $sql);

    if($ret) {
        echo "관리자 데이터가 성공적으로 입력됨.";
    } 
    else { 
        echo "관리자 데이터 입력 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
    } 

    mysqli_close($con);
?>