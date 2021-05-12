<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    $count_yellow="select y_num from yellow_card";
    $result_set = mysqli_query($con, $count_yellow);
    $count = mysqli_num_rows($result_set);

    $yellow_count_sum=$count+1;
    $userID = $_POST["yellow_id"];
    $userName = $_POST["yellow_name"];
    $day = date("Y-m-j");

    $sql =" INSERT INTO yellow_card VALUES ('".$yellow_count_sum."','".$userID."',".$userName;
    $sql = $sql.",'".$day."')";

    $ret = mysqli_query($con, $sql);

    echo "<H1>옐로카드 입력 결과</H1>";
    if($ret) { 
        echo "옐로 카드 부여.";
    }
    else { 
        echo "옐로카드 입력 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
    }
    mysqli_close($con);

    echo "<BR> <A HREF='admin_main.html'> <--관리자 메인 화면</A> ";
?>