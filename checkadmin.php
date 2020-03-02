<?php 
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
	session_start();
    $username=$_SESSION['uname'];
    //var_dump();
    $sql=mysqli_query($connID,"select * from tb_last_admin where adminame = '$username'");
    $result=mysqli_fetch_array($sql);
    if($result){
        echo "<script>window.location='index2.php'</script>";
    }else{
        echo "<script> alert('请先登录管理员身份');window.location='adminlog.php';</script>";
    }


	 	
	 ?>
	