<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
	session_start();
	if(isset($_SESSION['uname'])){
		if(isset($_POST['submitword'])){
			$username=$_SESSION['uname'];
			//echo $username;
			$head=$_POST['p'];
			//echo $head;
			$content=$_POST['coms'];
			//echo $content;
			$time=date('Y-m-d H:i:s');
			//echo $time;
			$ticketname=$_POST['hid'];
			//echo $ticketname;
			$type=$_POST['htype'];
			$sql=mysqli_query($connID,"insert into tb_last_comment(commentuser,commenthead,commentticket,comment,commentime) values('$username','$head','$ticketname','$content','$time')");
			//	var_dump($sql);
				if($sql){
					echo "<script>alert('评论成功');window.location='indexsearch.php?ticket=$ticketname&type=$type';</script>";
					}else{
					echo "<script>alert('评论失败');window.location='indexsearch.php?ticket=$ticketname&type=$type'</script>";
						}
		}		
	}else{
		echo "<script>alert('请先登录');window.location='index.php';</script>";
		}

?>