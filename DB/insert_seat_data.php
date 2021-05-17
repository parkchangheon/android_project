<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $sql ="
        insert into seat values
        (1,'남성',NULL,NULL),
        (2,'남성',NULL,NULL),
        (3,'남성',NULL,NULL),
        (4,'남성',NULL,NULL),
        (5,'남성',NULL,NULL),
        (6,'남성',NULL,NULL),
        (7,'남성',NULL,NULL),
        (8,'남성',NULL,NULL),
        (9,'남성',NULL,NULL),
        (10,'남성',NULL,NULL),

        (11,'여성',NULL,NULL),
        (12,'여성',NULL,NULL),
        (13,'여성',NULL,NULL),
        (14,'여성',NULL,NULL),
        (15,'여성',NULL,NULL),
        (16,'여성',NULL,NULL),
        (17,'여성',NULL,NULL),
        (18,'여성',NULL,NULL),
        (19,'여성',NULL,NULL),
        (20,'여성',NULL,NULL)
    ";

    $ret = mysqli_query($con, $sql);

    if($ret) {
        echo "seat 데이터가 성공적으로 입력됨.";
    } 
    else { 
        echo "seat 데이터 입력 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
    } 

    mysqli_close($con);
?>