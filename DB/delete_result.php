<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $userID = $_POST["userID"];

    $sql = "DELETE FROM usertb WHERE u_id='".$userID."'";

    $ret = mysqli_query($con, $sql);
    echo "<H1>회원 삭제 결과</H1>";

    if($ret) { 
        echo $userID." 회원이 성공적으로 삭제됨..";
        }
    else { 
        echo "데이터 삭제 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
    } 
    mysqli_close($con);

    echo "<BR><BR> <A HREF='admin_main.html'> <--초기 화면</A> ";
?>