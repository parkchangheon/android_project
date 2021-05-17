<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    

    $sql = "SELECT * FROM usertb WHERE u_id='".$_GET['userID']."'";

    $ret = mysqli_query($con, $sql);

    if($ret) { 
        $count = mysqli_num_rows($ret);
        if($count==0) { 
            echo $_GET['userID']." 아이디의 회원이 없음!!!"."<BR>";
            echo "<BR> <A HREF='admin_main.html'> <--초기 화면</A> ";
            exit();
        } 
    } 

    else { 
        echo "데이터 검색 실패!!!"."<BR>";
        echo "실패 원인 :".mysqli_error($con);
        echo "<BR> <A HREF='admin_main.html'> <--초기 화면</A> ";
        exit();
    } 


    $row = mysqli_fetch_array($ret);
    $userID = $row['u_id'];
    $userPw = $row["u_pw"];
    $userName = $row["u_name"];
    $user_phone = $row["u_hp"];
    $addr = $row["u_addr"];
    $age = $row["u_age"];
    $sex = $row["u_sex"];
?> 


<HTML> 
    <HEAD> 
        <META http-equiv="content-type" content="text/html; charset=utf-8"> 
    </HEAD> 


    <BODY> 
        <H1>회원 정보 수정</H1> 

        <FORM METHOD="post" ACTION="update_result.php"> 

        아이디 : <INPUT TYPE="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <BR> 
        비밀번호 : <INPUT TYPE="text" NAME="userPw" VALUE=<?php echo $userPw ?>> <BR> 
        이름 : <INPUT TYPE="text" NAME="userName" VALUE=<?php echo $userName ?>> <BR> 
        전화번호 : <INPUT TYPE="text" NAME="user_phone" VALUE=<?php echo $user_phone ?>> <BR> 
        주소 : <INPUT TYPE="text" NAME="addr" VALUE=<?php echo $addr ?>> <BR> 
        나이 : <INPUT TYPE="text" NAME="age" VALUE=<?php echo $age ?>> <BR> 
        성별 : <INPUT TYPE="text" NAME="sex" VALUE=<?php echo $sex ?>> <BR> 
        <BR><BR> 

        <INPUT TYPE="submit" VALUE="정보 수정"> 

        </FORM> 
    </BODY> 
</HTML>