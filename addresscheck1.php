<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
include("conn.php");
session_start();
$temp=$_SESSION['uname'];
if (isset($_POST['addresssubmit'])) {
	$senduser=$_POST['senduser'];
	$sendtel=$_POST['sendtel'];
    $postaddress=$_POST['postaddress'];
    $sendmail=$_POST['sendmail'];
	$sql="insert into tb_last_address(username,addressname,addresstel,address,addressmail) values('$temp','$senduser','$sendtel','$postaddress','$sendmail')";
	$info=mysqli_query($connID,$sql);
	if($info){
		echo "<script>alert('添加成功！！！'); window.location='modify1.php';</script>";
	}else{
		echo "<script>alert('添加失败！！！'); window.location='modify1.php';</script>";
	}
}
?>