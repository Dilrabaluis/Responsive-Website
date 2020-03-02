<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$orderid=$_GET['orderid'];
    $sqldelete1=mysqli_query($connID,"delete from tb_last_order  where orderid= '$orderid'");
    $sqldelete2=mysqli_query($connID,"delete from tb_last_information where inforderid= '$orderid'");
    if($sqldelete1 && $sqldelete2){
        echo "<script> alert('删除成功');window.location='order1.php';</script>";
    }else{
        echo "shibai";
    }
?>