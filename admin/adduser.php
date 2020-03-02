<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$user=$_POST['postuser'];
$username=$_POST['postname'];
$pwd=md5($_POST['postpwdadd']);
$tel=$_POST['posttel'];
$card=$_POST['postcardadd'];
$year=$_POST['postyear'];
$month=$_POST['postmonth'];
$day=$_POST['postday'];
$sql=mysqli_query($connID,"insert into tb_last_user(user,username,pwd,usertel,usercard,year,month,day) values('$user','$username','$pwd','$tel','$card','$year','$month','$day')");
if($sql){
    echo "<script> alert('添加成功');window.location='index.php';</script>";
}
?>