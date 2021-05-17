<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    $userID = $_POST["u_id"];
    $userPW =$_POST["u_pw"];
    $userName = $_POST["u_name"];
    $phone_num = $_POST["u_hp"];
    $addr = $_POST["u_addr"];
    $age = $_POST["u_age"];
    $sex = $_POST["u_sex"];

    $sql =" INSERT INTO usertb VALUES ('".$userID."','".$userPW."','".$userName."',".$phone_num;
    $sql = $sql.",'".$addr."','".$age."','".$sex."')";

    $ret = mysqli_query($con, $sql);

    echo "<H1>신규 회원 입력 결과</H1>";
    if($ret) { 
        echo "데이터가 성공적으로 입력됨.";
    }
    else { 
        echo "데이터 입력 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
    }
    mysqli_close($con);

    echo "<BR> <A HREF='admin_main.html'> <--관리자 메인 화면</A> ";
?>