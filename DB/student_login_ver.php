<?php 
session_start();
    $userid=$_POST['student_id'];
    $userpassword=$_POST['student_pw'];

    $db_host = "localhost";
    $db_user = "id201601649";
    $db_password = "pw201601649";
    $db_name = "assi_study";
    $con = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("MySQL 접속 실패!!");
    
    $sql="select * from usertb where u_id= '$userid'";
    $ret =mysqli_query($con,$sql);
    if($ret->num_rows==1){
        $row = mysqli_fetch_array($ret);
        if($row['u_pw']==$userpassword){
            $_SESSION['u_id']=$userid;
            
            if(isset($_SESSION['u_id'])){
                
                header('Location:student_main.php');
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
