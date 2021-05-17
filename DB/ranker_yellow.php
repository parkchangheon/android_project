<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    

    $sql =" SELECT su_name, count(su_name) as cnt FROM yellow_card GROUP BY su_name";
    $ret = mysqli_query($con, $sql);


    echo "<H1>옐로 카드 순위 목록</H1>";
    echo "<TABLE BORDER=1>";
    echo "<TR>";
    echo "<TH>이름</TH><TH>갯수</TH>";
    echo "</TR>";
    
    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", $row['su_name'], "</TD>";
        echo "<TD>", $row['cnt'], "</TD>";
        echo "</TR>";
    }
    mysqli_close($con);

    echo "</TABLE>";

    echo "<BR> <A HREF='admin_main.html'> <--관리자 메인 화면</A> ";

?>