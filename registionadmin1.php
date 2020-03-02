<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
//session_start();
//error_reporting(0);
include("conn.php");?>
<?php
	$name=$_POST['username'];
    $pwd=md5($_POST['pwd']);
    var_dump($_POST);
	$info=mysqli_query($connID,"insert into tb_last_admin(adminame,adminpwd) values('$name','$pwd')");
	//var_dump($_POST);
	if($info){
		echo "<script>alert('注册成功！！！'); window.location='login1.php';</script>";
		}else{
			echo "<script>alert('注册失败！！！');</script>";
			}
?>