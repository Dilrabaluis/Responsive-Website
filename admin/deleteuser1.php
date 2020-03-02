<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$username=$_GET['user'];
$sql=mysqli_query($connID,"select * from tb_last_user where user = '$username'");
$result=mysqli_fetch_array($sql);
if($result){
    $sqldelete=mysqli_query($connID,"delete from tb_last_user where user = '$username'");
    if($sqldelete){
        echo "<script> alert('删除成功');window.location='../index2.php';</script>";
    }
}

?>
