<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	include("conn.php");
	session_start();
	
	$ticket=$_GET['ticket'];
	$tickettime=$_GET['tickettime'];
	$createtime=date("Y-m-d H:i:m");
	$price=$_GET['orderprice'];
	$ticketnum=$_GET['ticketnum'];
	$user=$_SESSION['uname'];
	$seat=$_GET['seat'];
	$area=$_GET['area'];
	$getname=$_POST['getname'];
	$getphone=$_POST['getphone'];
	$getaddress=$_POST['getaddress'];
	$getpost=$_POST['getpost'];
	$sql1=mysqli_query($connID,"select * from tb_last_ticket where ticketname='$ticket'");
	$result1=mysqli_fetch_array($sql1);

	if (!$result1) {
		echo "<script> alert('页面出错');</script>";	
	}else{
		$gym=$result1['ticketplace'];
		$sql2=mysqli_query($connID,"select * from tb_last_place where placename='$gym'");
		$result2=mysqli_fetch_array($sql2);
		$nowticketnum=$result1['ticketselnum']+$ticketnum;
		$remainum=$result2['placeticketnum']-$ticketnum;
		$sqlorder=mysqli_query($connID,"insert into tb_last_order(ordertime,orderprice,ordernum,orderusername,ordergetname) values('$createtime','$price','$ticketnum','$user','$getname') ");

		if($sqlorder){
			
			$sqlsearch=mysqli_query($connID,"select * from tb_last_order order by ordertime desc");
			$resultsearch=mysqli_fetch_array($sqlsearch);
			if($resultsearch){
				$orderid=$resultsearch['orderid'];
				$gym=$result1['ticketplace'];
				$sqlinfo=mysqli_query($connID,"insert into tb_last_information(infoseat,infoticket,infoarea,infoprice,inforderid,infotime,infogym) values('$seat','$ticket','$area','$price','$orderid','$tickettime','$gym')");
				$sqladdress=mysqli_query($connID,"insert into tb_last_address(username,addressname,address,addresstel,addressmail) values('$user','$getname','$getaddress','$getphone','$getpost')");
				$sqlselnum=mysqli_query($connID,"update tb_last_ticket set ticketselnum='$nowticketnum' where ticketname='$ticket'");
				$sqlnownum=mysqli_query($connID,"update tb_last_place set placeticketnum='$remainum' where placename='$gym'");
				if( $sqlinfo && $sqlselnum && $sqlnownum && $sqladdress){
					echo "<script>alert('下单成功！！！');window.location='index1.php';</script>";
				}else{
					echo "下单失败";
				}

			}
		}
		

	
	}
	
?>