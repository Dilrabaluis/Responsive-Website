<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");

$path="../tickets/".$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],$path);
$image="../tickets/".$_FILES['image']['name'];
$img=substr($image,3);

$path="../tickets/".$_FILES['imagesmall']['name'];
move_uploaded_file($_FILES['imagesmall']['tmp_name'],$path);
$imagesamll="../tickets/".$_FILES['imagesmall']['name'];
$imagesamll=substr($imagesamll,3);



$ticket=$_POST['ticket'];
$place=$_POST['place'];
$type=$_POST['tickettype'];
$sqltype=mysqli_query($connID,"select * from tb_last_type where typeticket = '$type'");
$resulttype=mysqli_fetch_array($sqltype);
if($resulttype){
    $type=$resulttype['id'];
    $tickettime=$_POST['tickettime'];
    $date=date('Y-m-d h:i:s',strtotime($tickettime));    
    $ticketintroduce=$_POST['ticketintroduce'];
    $sqlseat=mysqli_query($connID,"select * from tb_last_seat where seatplace= '$place' order by seatprice");
    $result=mysqli_fetch_array($sqlseat);
    if($result){
   
        $lowprice=$result['seatprice'];    
        $sql=mysqli_query($connID,"insert into tb_last_ticket(ticketname,ticketintroduce,tickettime,ticketplace,ticketspic,ticketlowprice,tickettype,ticketselnum,ticketbpic) values('$ticket','$ticketintroduce','$date','$place','$img','$lowprice','$type',1,'$imagesamll')");
        if($sql){
        echo "<script> alert('添加成功');window.location='ticket1.php';</script>";
        }   
    }else{
        echo "<script>alert('还没有相应的场馆，请先添加场馆');window.location='gym1.php';</script>";
    }
}

?>