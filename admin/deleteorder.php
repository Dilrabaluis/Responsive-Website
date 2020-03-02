<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$area=$_GET['area'];
$seat=$_GET['seat'];
    $sqldelete1=mysqli_query($connID,"delete from tb_last_order  where orderarea= '$area' && orderseat='$seat'");
    $sqldelete2=mysqli_query($connID,"delete from tb_last_information where infoarea= '$area' && infoseat='$seat' ");
    if($sqldelete1 && $sqldelete2){
        echo "<script> alert('删除成功');window.location='order.php';</script>";
    }else{
        echo "shibai";
    }
?>