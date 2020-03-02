<?php
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("../conn.php");
$essaytitle=$_POST['essaytitle'];
$essaybanner=$_POST['essaybanner'];
$essay=$_POST['essay'];
$time=date('Y-m-d H:i:s');
$path="../essay/".$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],$path);
$image="../essay/".$_FILES['image']['name'];
$image=substr($image,3);

$sql=mysqli_query($connID,"insert into tb_last_essay(essaytitle,essaybanner,essay,essaypic,essaytime) values('$essaytitle','$essaybanner','$essay','$image','$time')");
if($sql){
    echo "<script> alert('添加成功');window.location='essay.php';</script>";
}
?>