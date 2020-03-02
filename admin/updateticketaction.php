<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");

var_dump($_POST);
$ticketname=$_GET['ticketname'];
$sql=mysqli_query($connID,"select * from tb_last_ticket where ticketname = '$ticketname'");
$result=mysqli_fetch_array($sql);
if($result){
    if(isset($_FILES['image'])){
        $path="upfile/".$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
        $image="upfile/".$_FILES['image']['name'];
        $img=substr($image,3);
    }else{
        $img=$result['ticketspic'];
    }
    if(isset($_POST['ticket'])){
        $ticket=$_POST['ticket'];
    }else{
        $ticket=$result['ticketname'];
    }
    if(isset($_POST['place'])){
        $place=$_POST['place'];
    }else{
        $palce=$result['ticketplace'];
    }
    if(isset($_POST['tickettime'])){
        $tickettime=$_POST['tickettime'];
    }else{
        $tickettime=$result['tickettime'];
    }
    if(isset($_POST['tickettype'])){
        $tickettype=$_POST['tickettype'];
        $sqltype=mysqli_query($connID,"select * from tb_last_type where typeticket = '$tickettype'");
        $resulttype=mysqli_fetch_array($sqltype);
        if($resulttype){
            $tickettype=$resulttype['id'];
        }
    }else{
        $tickettype=$result['tickettype'];
    }
    if($_POST['ticketintroduce']){
        $ticketintroduce=$_POST['ticketintroduce'];
    }else{
        $ticketintroduce=$result['ticketintroduce'];
    }


    $sql1=mysqli_query($connID,"update tb_last_ticket set ticketname='$ticket',ticketintroduce='$ticketintroduce',tickettime='$tickettime',ticketplace='$place',ticketspic='$img',tickettype='$tickettype' where ticketname='$ticketname'");
    if($sql1){
        echo "<script> alert('修改成功');window.location='ticket.php';</script>";
    }
}
?>