

<?php 
    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");

    $sql ="SELECT * FROM userTB WHERE u_id='".$_GET['userID']."'";

    
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
    $userName = $row['u_name'];
?>

<HTML> 
    <HEAD> 회원 삭제 화면
        <META http-equiv="content-type" content="text/html; charset=utf-8"> 
    </HEAD> 


    <BODY>
        <H1>회원 삭제</H1> 
        <FORM METHOD="post" ACTION="delete_result.php"> 
            아이디 : <INPUT TYPE="text" NAME="userID" VALUE=<?php echo $userID ?> > <BR>
            이름 : <INPUT TYPE="text" NAME="userName" VALUE=<?php echo $userName ?>> 
            <BR>
            <BR><BR> 
            위 회원을 삭제하겠습니까?
            <INPUT TYPE="submit" VALUE="회원 삭제"> 
        </FORM> 
    </BODY> 
</HTML>
