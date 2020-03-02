<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$title=$_GET['title'];
$sqldelete=mysqli_query($connID,"delete from tb_last_essay where essaytitle= '$title'");
if($sqldelete){
    echo "<script> alert('删除成功');window.location='essay.php';</script>";
    }else{
        echo "删除失败";
    }
?>