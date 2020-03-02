<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$whereuser=$_GET['user'];
$user=$_POST['postuser'];
$username=$_POST['postname'];
$pwd=md5($_POST['postpwd']);
$tel=$_POST['posttel'];
$card=$_POST['postcard'];
$sql=mysqli_query($connID,"update tb_last_user set user='$user',username='$username',pwd='$pwd',usertel='$tel',usercard='$card' where user='$whereuser'");
if($sql){
    echo "<script> alert('修改成功');window.location='index.php';</script>";
}
?>