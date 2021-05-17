<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    $seat_num = $_POST["seat_num"];

    $y_sql="SELECT *FROM seat WHERE s_num= '$seat_num'";
    $y_ret =mysqli_query($con,$y_sql);
    $y_row = mysqli_fetch_array($y_ret);

    $y_id=$y_row['su_id'];
    $y_name=$y_row['su_name'];

    $yy_sql="SELECT * FROM yellow_card";
    $yy_ret =mysqli_query($con,$yy_sql);
    $count=mysqli_num_rows($yy_ret)+1;

    $yi_sql =" INSERT INTO yellow_card VALUES ('".$count."','".$y_id."','".$y_name."')";
    $yi_ret =mysqli_query($con,$yi_sql);


    $sql = "UPDATE seat SET su_id=NULL, su_name=NULL WHERE s_num='".$seat_num."' ";

    $ret = mysqli_query($con, $sql);

    echo "<H1>좌석 퇴출 결과</H1>";
    if($ret) { 
        echo "좌석이 성공적으로 퇴출됨.";
    }
    else { 
        echo "좌석퇴출 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
        } 
        mysqli_close($con);
        
        echo "<BR> <A HREF='admin_main.html'> <--관리자 홈 화면</A> ";
?>
    