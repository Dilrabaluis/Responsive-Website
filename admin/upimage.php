<?php
    header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
    session_start();
    include("../conn.php");
    $path="upfile/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
    $image="upfile/".$_FILES['image']['name'];

    $ticket=$_POST['ticket'];
    $place=$_POST['place'];
    $ticketnum=$_POST['ticketnum'];
    $sqseat=mysqli_query($connID,"select * from tb_last_seat where seatplace = '$place'");
    $resultseat=mysqli_fetch_array($sqseat);
   
    if($resultseat){
        $sqlplace=mysqli_query($connID,"select * from tb_last_place where placename = '$place'");
        $resultplace=mysqli_fetch_array($sqlplace);
        if($sqlplace){
            $imageplace=$resultplace['placeseatpic'];
            $numplace=$resultplace['placeticketnum'];
            $sql=mysqli_query($connID,"insert into tb_last_place(placename,placeseatpic,placeticketnum) values('$place','$imageplace','$numplace')");
            echo "<script>alert('已有此场馆信息，将按此场馆之前信息进行安排');window.location='gym1.php'</script>";
        }
    }else{
        $sql=mysqli_query($connID,"insert into tb_last_place(placename,placeseatpic,placeticketnum) values('$place','$image','$ticketnum')");
        if(isset($_POST['VIP1'])){
            $VIP1=$_POST['VIP1'];
            $VIP1row=$_POST['VIP1row'];
            $VIP1col=$_POST['VIP1col'];
            $VIP1price=$_POST['VIP1price'];
            $sqlV1=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$VIP1','$VIP1col','$VIP1row','$VIP1price')");
        }

        if(isset($_POST['VIP2'])){
            $VIP2=$_POST['VIP2'];
            $VIP2row=$_POST['VIP2row'];
            $VIP2col=$_POST['VIP2col'];
            $VIP2price=$_POST['VIP2price'];
            $sqlV3=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$VIP2','$VIP2col','$VIP2row','$VIP2price')");
        }

        if(isset($_POST['VIP3'])){
            $VIP3=$_PSOT['VIP3'];
            $VIP3row=$_POST['VIP3row'];
            $VIP3col=$_POST['VIP3col'];
            $VIP3price=$_POST['VIP3price'];
            $sqlV3=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$VIP3','$VIP3col','$VIP3row','$VIP3price')");
        }
        if(isset($_POST['VIP4'])){
            $VIP4=$_POST['VIP4'];
            $VIP4row=$_POST['VIP4row'];
            $VIP4col=$_POST['VIP4col'];
            $VIP4price=$_POST['VIP4price'];
            $sqlV4=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$VIP4','$VIP4col','$VIP4row','$VIP4price')");
        }
        if(isset($_POST['A'])){
            $A=$_POST['A'];
            $Arow=$_POST['Arow'];
            $Acol=$_POST['Acol'];
            $Aprice=$_POST['Aprice'];
            $sqlA=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$A','$Acol','$Arow','$Aprice')");
        }
        if(isset($_POST['B'])){
            $B=$_POST['B'];
            $Brow=$_POST['Brow'];
            $Bcol=$_POST['Bcol'];
            $Bprice=$_POST['Bprice'];
            $sqlB=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$B','$Bcol','$Brow','$Bprice')");
        }
        if(isset($_POST['C'])){
            $C=$_POST['C'];
            $Crow=$_POST['Crow'];
            $Ccol=$_POST['Ccol'];
            $Cprice=$_POST['Cprice'];
            $sqlC=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$C','$Ccol','$Crow','$Cprice')");
        }
        if(isset($_POST['D'])){
            $D=$_POST['D'];
            $Drow=$_POST['Drow'];
            $Dcol=$_POST['Dcol'];
            $Dprice=$_POST['Dprice'];
            $sqlD=mysqli_query($connID,"insert into tb_last_seat(seatplace,seatarea,col,row,seatprice) values('$place','$D','$Dcol','$Drow','$Dprice')");
        }
        echo "<script>alert('添加成功！');window.location='gym1.php'</script>";
    
}

     
?>