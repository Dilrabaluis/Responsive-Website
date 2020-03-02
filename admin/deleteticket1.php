<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$ticket=$_GET['ticket'];
$sqldelete=mysqli_query($connID,"delete from tb_last_ticket where ticketname = '$ticket'");
    if($sqldelete){
        echo "<script> alert('删除成功');window.location='ticket1.php';</script>";
}

?>