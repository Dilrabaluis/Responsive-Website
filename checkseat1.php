<?php
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
    include("conn.php");
    $ticket="【贵阳站】2019张杰“未·LIVE” 巡回演唱会";
   // var_dump($_GET);
    $seat=$_GET['orderseat'];
    //echo $seat;
    $i=$_GET['index'];
    $sql=mysqli_query($connID,"select * from tb_last_information where infoticket='$ticket'");
    $result=mysqli_fetch_array($sql);
    if($result){
        do{
            if($seat==$result['infoseat']){
                echo $i;
               
            }else{

                echo "0";
            }
       
         } while( $result=mysqli_fetch_array($sql));
    }

?>