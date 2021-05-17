<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    
    $sql = "SELECT * FROM seat";


    $ret = mysqli_query($con, $sql);

    echo "<H1>좌석목록</H1>";


    echo "<TABLE BORDER=1>";
    echo "<TR>";
    echo "<TH>좌석 번호</TH>  <TH>이용 성별</TH>  <TH>아이디</TH>  <TH>이름</TH>  <TH>퇴출</TH>";
    echo "</TR>";

    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", $row['s_num'], "</TD>";
        echo "<TD>", $row['s_sex'], "</TD>";
        echo "<TD>", $row['su_id'], "</TD>";
        echo "<TD>", $row['su_name'], "</TD>";
        if (!is_null($row['su_id'])){
            echo "<TD>", "<A HREF='kick.php?userID=", $row['su_id'], "'>퇴출</A></TD>";
        }
        else{
            echo "<TD>", "공석</A></TD>";
        }
        
        echo "</TR>";
    }

    mysqli_close($con);
    echo "</TABLE>";


    echo "<BR> <A HREF='admin_main.html'> <--관리자 메인 화면</A> ";
?>