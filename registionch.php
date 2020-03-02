<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
//session_start();
//error_reporting(0);
include("conn.php");?>
<?php
	$name=$_POST['username'];
	$tel=$_POST['tel'];
	$pwd=md5($_POST['pwd']);
	$info=mysqli_query($connID,"insert into tb_last_user(user,pwd,usertel) values('$name','$pwd','$tel')");
	//var_dump($_POST);
	if($info){
		echo "<script>alert('注册成功！！！'); window.location='login.php';</script>";
		}else{
			echo "<script>alert('注册失败！！！');window.location='login.php';</script>";
			}
	 
	 
	 
?>