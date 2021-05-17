<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    $sql = "SELECT * FROM seat";
    $ret = mysqli_query($con, $sql);

    session_start();
    $sessionid=$_SESSION['u_id'];
    $user_sql = "SELECT * FROM usertb WHERE u_id='".$_SESSION['u_id']."'";
    $user_ret = mysqli_query($con, $user_sql);
    $user_row=mysqli_fetch_array($user_ret);
    $user_sex=$user_row['u_sex'];

    echo "<H1>좌석 현황</H1>";

    echo "<TABLE BORDER=1>";
    echo "<TR>";
    echo "<TH>좌석 번호</TH>  <TH>이용 성별</TH> <TH>좌석현황</TH>";
    echo "</TR>";

    while($row = mysqli_fetch_array($ret)) {
        if($row['s_sex']==$user_sex){
            echo "<TR>";
            echo "<TD>", $row['s_num'], "</TD>";
            echo "<TD>", $row['s_sex'], "</TD>";
            if(is_null($row['su_name'])){
                echo "<TD>", "예약 가능</A></TD>";
            }
            else{
                echo "<TD>", "이용중</A></TD>";
            }
            echo "</TR>";
        }
    }

    mysqli_close($con);
    echo "</TABLE>";

    echo "<A HREF='student_reservation.php'> <--예약 하러 가기</A> ";


?>