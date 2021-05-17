<?php 
session_start();
    $userid=$_POST['admin_id'];
    $userpassword=$_POST['admin_pw'];

    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    

    $sql="select * from admin where a_id= '$userid'";
    $ret =mysqli_query($con,$sql);
    if($ret->num_rows==1){
        $row = mysqli_fetch_array($ret);
        if($row['a_pw']==$userpassword){
            $_SESSION['a_id']=$userid;
            if(isset($_SESSION['a_id'])){
                header('Location:admin_main.html');
            }
            else{
                echo "세션실패";
            }
        }
        else{
            echo "아이디나 비번 오류";
        }
        
    }
    else{
        echo"아이디나 비번 오류";
    }

?>
