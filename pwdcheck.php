<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
    session_start();
    if(isset($_POST['pwdsubmit'])){
        $temp=$_SESSION['uname'];
       // echo $temp;
        $pwd=$_POST['pwd'];
        $checkpwd=$_POST['checkpwd'];
        if($pwd==$checkpwd){
            $pwd=md5($_POST['pwd']);
            
            $sql="update tb_last_user set pwd='$pwd' where user='$temp'";
            $info=mysqli_query($connID,$sql);
            if($info){
                echo "<script>alert('修改成功！！！'); window.location='login.php';</script>";
                unset($_SESSION['uname']);
            }else{
                echo "<script>alert('修改失败！！！'); window.location='modify.php';</script>";
            }
        }else{
            echo "<script>alert('密码不一致，请重新设置');window.location='modify.php';</script>";
        }
    
    }
    ?>