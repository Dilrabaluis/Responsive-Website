<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$id=$_GET['id'];
$sqldelete=mysqli_query($connID,"delete from tb_last_comment  where commentid= '$id'");
if($sqldelete){
    echo "<script> alert('删除成功');window.location='comment1.php';</script>";
    }else{
        echo "删除失败";
    }
?>