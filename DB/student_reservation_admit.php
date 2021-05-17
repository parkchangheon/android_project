<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    $seat_num = $_POST["seat_num"];
    session_start();
    $sessionid=$_SESSION['u_id'];
    echo $sessionid;

    $user_sql="SELECT * FROM usertb WHERE u_id='".$_SESSION['u_id']."'";
    $user_ret=mysqli_query($con, $user_sql);
    $user_row=mysqli_fetch_array($user_ret);
    $user_name=$user_row['u_name'];


    $sql = "UPDATE seat SET su_id='".$sessionid;
    $sql = $sql."', su_name='".$user_name."' WHERE s_num='".$seat_num."' ";

    $ret = mysqli_query($con, $sql);

    echo "<H1>좌석 예약 결과</H1>";
    if($ret) { 
        echo "좌석이 성공적으로 예약됨.";
    }
    else { 
        echo "좌석예약 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
        } 
        mysqli_close($con);
        
        echo "<BR> <A HREF='student_main.php'> <--예약 화면</A> ";
?>
    