<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn.php");
if(isset($_GET['username'])){
	$usname=$_GET['username'];
	$info="select * from tb_last_user where user='$usname'";
	$sql=mysqli_query($connID,$info);
	$result1=mysqli_fetch_object($sql);
	if($result1)
	echo "用户名已被占用";
else{
	echo "";
	}
}
if(isset($_GET['usertel'])){
	$ustel=$_GET['usertel'];
	$sql2=mysqli_query($connID,"select * from tb_last_user where usertel='$ustel'");
	$result2=mysqli_fetch_object($sql2);
	if($result2){
		echo "号码已被占用";
	}else{
		echo "";
	}

}


?>