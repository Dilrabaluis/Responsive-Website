<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
include("conn.php");
session_start();
$temp=$_SESSION['uname'];
if (isset($_POST['modifysubmit'])) {
	$user=$_SESSION['uname'];
	$username=$_POST['username'];
	$tel=$_POST['usertel'];
	$usercard=$_POST['usercard'];
	$sql="update tb_last_user set username='$username',usertel ='$tel',usercard='$usercard' where user='$user'";
	$info=mysqli_query($connID,$sql);
	if($info){
			echo "<script>alert('修改成功！！！');  window.location='modify1.php';</script>";
		
	}else{
		echo "<script>alert('修改失败！！！'); window.location='modify1.php';</script>";
	}
}
?>