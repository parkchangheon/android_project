<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    
    $sql = "SELECT * FROM usertb";


    $ret = mysqli_query($con, $sql);

    echo "<H1>회원 검색 결과</H1>";


    echo "<TABLE BORDER=1>";
    echo "<TR>";
    echo "<TH>아이디</TH><TH>비밀번호</TH> <TH>이름</TH> <TH>전화번호</TH> <TH>주소</TH>";
    echo "<TH>나이</TH> <TH>성별</TH> <TH>수정</TH> <TH>삭제</TH>";
    echo "</TR>";

    while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
        echo "<TD>", $row['u_id'], "</TD>";
        echo "<TD>", $row['u_pw'], "</TD>";
        echo "<TD>", $row['u_name'], "</TD>";
        echo "<TD>", $row['u_hp'], "</TD>";
        echo "<TD>", $row['u_addr'], "</TD>";
        echo "<TD>", $row['u_age'], "</TD>";
        echo "<TD>", $row['u_sex'], "</TD>";
        echo "<TD>", "<A HREF='update.php?userID=", $row['u_id'], "'>수정</A></TD>";
        echo "<TD>", "<A HREF='delete.php?userID=", $row['u_id'], "'>삭제</A></TD>";
        echo "</TR>";
    }

    mysqli_close($con);
    echo "</TABLE>";


    echo "<BR> <A HREF='admin_main.html'> <--관리자 메인 화면</A> ";
?>