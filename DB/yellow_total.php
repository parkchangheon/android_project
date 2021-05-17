<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    

    $sql =" SELECT * FROM yellow_card";
    $t_sql=" SELECT COUNT(*)FROM yellow_card";

    $ret = mysqli_query($con, $sql);
    $t_ret = mysqli_query($con, $sql);
    $count=mysqli_num_rows($ret);
    


    echo "<H1>옐로 카드 부여 목록</H1>";
    echo "<TABLE BORDER=1>";
    echo "<TR>";
    echo "<TH>번호</TH><TH>아이디</TH> <TH>이름</TH>";
    echo "</TR>";
    
    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", $row['y_num'], "</TD>";
        echo "<TD>", $row['su_id'], "</TD>";
        echo "<TD>", $row['su_name'], "</TD>";
        echo "</TR>";
    }
    echo "<H2> 총 옐로카드 받은 학생의 수 :",$count,"</H2>";
    mysqli_close($con);

    echo "</TABLE>";

    echo "<BR> <A HREF='admin_main.html'> <--관리자 메인 화면</A> ";
    echo "<BR> <A HREF='ranker_yellow.php'> <--옐로카드 순위 </A> ";

?>