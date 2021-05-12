<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    
    $sql = "SELECT * FROM yellow_card";


    $ret = mysqli_query($con, $sql);

    echo "<H1>옐로 카드 목록</H1>";


    echo "<TABLE BORDER=1>";
    echo "<TR>";
    echo "<TH>번호</TH> <TH>아이디</TH> <TH>이름</TH> <TH>날짜</TH>";
    echo "</TR>";

    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", $row['y_num'], "</TD>";
        echo "<TD>", $row['yu_id'], "</TD>";
        echo "<TD>", $row['yu_name'], "</TD>";
        echo "<TD>", $row['y_date'], "</TD>";
        echo "</TR>";
    }

    mysqli_close($con);
    echo "</TABLE>";


    echo "<BR> <A HREF='yellowcard_add.php'> <--옐로카드부여</A> ";
    echo "<BR> <A HREF='yellowcard_count.php'> <--옐로카드추합</A> ";
    echo "<BR> <A HREF='admin_main.html'> <--관리자 메인 화면</A> ";
?>