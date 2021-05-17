<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    $userID = $_POST["userID"];
    $userPw = $_POST["userPw"];
    $userName = $_POST["userName"];
    $user_phone = $_POST["user_phone"];
    $addr = $_POST["addr"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];

    $sql = "UPDATE userTB SET u_pw=".$userPw;
    $sql = $sql.", u_name='".$userName."', u_hp='".$user_phone."',u_addr='".$addr;
    $sql = $sql."', u_age=".$age.", u_sex='".$sex."' WHERE u_id='".$userID."'";

    $ret = mysqli_query($con, $sql);

    echo "<H1>회원 정보 수정 결과</H1>";
    if($ret) { 
        echo "데이터가 성공적으로 수정됨.";
    }
    else { 
        echo "데이터 수정 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
        } 
        mysqli_close($con);
        
        echo "<BR> <A HREF='admin_main.html'> <--초기 화면</A> ";
?>
    