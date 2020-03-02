<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$place=$_GET['place'];
$sqlplace=mysqli_query($connID,"delete from tb_last_place where placename = '$place'");
$sqlseat=mysqli_query($connID,"delete from tb_last_seat where seatplace = '$place'");
$sqlplace=mysqli_query($connID,"delete from tb_last_ticket where ticketplace = '$place'");
if($sqlplace && $sqlseat){
    echo "<script> alert('删除成功');window.location='gym1.php';</script>";
}

?>
