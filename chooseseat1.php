<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta标记，作者，搜索关键字和描述内容-->
	<meta name="author" content="卢漪"/>
	<meta name="keywords" content="卢漪，个人响应式网站，计算机，编程，演出票购票网站，电影，摄影，偶像罗景，喻科霖" />
	<meta name="description" content="这是卢漪的响应式购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
	<?php 
			header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
			session_start();
			include("conn.php");
	?>
<title>选购座位</title>
<style>

.ma{
	margin:3px;
}
.seat{
	width:38px;
	height:18px;
}
.seachform{
	max-width:220px;
	}
.input{
	border:none;
	height:20px; 
	line-height:20px;
	background:rgb(238,238,238);
}
@media(max-width:767px) and (min-width:100px){

	.seat{
		font-size:10px;
		width:32px;
		height:16px;
	}
}
</style>


</head>
<body>
<?php
if(isset($_SESSION['uname']))
	$name=$_SESSION['uname'];
else
	echo "<script>alert('请先登录');window.location='login1.php';</script>"
?>
<div class="navbar hidden-xs" role="navigation"> 
    <div class="container"> 
        <div class="navbar-header hidden-xs displayimg"> 
            <a class="navbar-brand" href="index1.php"><img src="images/chujian (1).jpg" width="75px" height="41px"/></a> 
        </div> 
        <ul class="nav navbar-nav navbar-right"> 
		<?php
			if(!isset($name)){
		?>
            <li style="display:inline-block;"><a href="login1.php" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;登录</a></li> 
            <li style="display:inline-block;"><a href="registion1.php" style="color:#000;"><span class="glyphicon glyphicon-log-in"></span>&nbsp;注册</a></li> 
			<li style="display:inline-block;"><a href="checkadmin1.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;后台管理</a></li> 
		<?php
			}else{
		?>
			<li style="display:inline-block;"><a href="modify1.php" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $name;?></a></li> 
			<li style="display:inline-block;"><a href="checkadmin1.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;后台管理</a></li> 
		<?php
			}
		?>
	    </ul> 
    </div> 
</div>


<div class="navbar navbar-inverse float" role="navigation" id="bignav">
    <div class="container-fluid"> 
			<div class="navbar-header">
			<a class="navbar-brand" href="index1.php" style="color:#fff; font-family:方正舒体">初见票务</a> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
							<span class="sr-only">导航</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					</button>
			</div>
			<div class="collapse navbar-collapse text-center" id="example-navbar-collapse">
					<ul class="nav navbar-nav" style="display: inline-block;float: none;">
						<li class="visible-xs">
							<?php
								if(!isset($name)){
							?>
								<li class="visible-xs" style="display:inline-block;"><a href="login1.php" style="color:#eee;"><span class="glyphicon glyphicon-user"></span></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="login1.php" style="color:#eee;"><span class="glyphicon glyphicon-log-in"></span></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="checkadmin1.php" style="color:#eee;"><span class="glyphicon glyphicon-th"></span></a></li> 
							<?php
								}else{
							?>
								<li class="visible-xs" style="display:inline-block;"><a href="modify1.php" style="color:rgb(157,157,157); text-decoration:none;"></span>&nbsp;<?php echo $name;?></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="checkadmin1.php" style="color:rgb(157,157,157);">后台管理</a></li> 
								<li class="visible-xs" style="display:inline-block;"><a href="unset1.php"style="color:rgb(157,157,157);">退出</a></li> 
							<?php
								}
							?>
						</li>
						<li><a class="active" href="index.php" style="font-size:22px;"><strong>首页</strong></a></li>
						<li ><a href="more1.php?type=navication&keyword=1">演唱会</a></li>
						<li><a href="more1.php?type=navication&keyword=2">话剧</a></li>
						<li><a href="more1.php?type=navication&keyword=3">音乐会</a></li>
						<li><a href="more1.php?type=navication&keyword=4">歌剧</a></li>
						<li class="seachform">
							<form method="post" name="more" action="more1.php" class="navbar-form navbar-left">
								<div class="input-group">
									<input type="text" name="indexsearch"  class="form-control" placeholder="Search">
									<span class="input-group-addon"><input type="submit" value="搜索" class="input"></span>
								</div>
							</form>
						</li>
					</ul>
			</div>
    </div>
</div>

<?php 
$ticket=$_GET['ticket'];
$place=$_GET['place'];
?>
<div class="container">
	<div class="row clearfix" style="border:1px solid #eee;">
		<div class="col-md-8 col-md-offset-2 text-right">
			<?php 
				$sqlplace=mysqli_query($connID,"select * from tb_last_place where placename='$place'");
				$resultplace=mysqli_fetch_array($sqlplace);
				if($resultplace){
			?>
			<img class="img-responsive" src="../res/admin/<?php echo $resultplace['placeseatpic'];?>" width="100%;">
			<?php
				}
			?>
		</div>
		<div class="col-md-12">
			<div class="row clearfix" >
				<?php
					$sql=mysqli_query($connID,"select * from tb_last_seat where seatplace='$place'");
					$result=mysqli_fetch_array($sql);
					if($result){
						do{
				?>
				
					<div class="col-md-6 text-center" style="border:1px solid #eee;box-shadow:0px 0px 5px #eee; padding-top:10px;padding-bottom:10px;">
						<div class="row clearfix">
							<div class="col-md-12 text-danger" style="font-size:20px;"><?php echo $result['seatarea'];?></div>
						</div>
						<div class="row clearfix">
							<div class="col-md-12 ">
							<?php 
								$area=$result['seatarea'];
								$row=$result['row'];
								$col=$result['col'];
								for($i=0;$i<$row;$i++){
									for($j=0;$j<$col;$j++){
										$seatn=($i+1)."-".($j+1);
										$sqlnum=mysqli_query($connID,"select * from tb_last_information where infoseat='$seatn' && infoarea='$area' && infoticket= '$ticket'");
										$resultnum=mysqli_fetch_array($sqlnum);
										$sqlprice=mysqli_query($connID,"select * from tb_last_seat where seatplace='$place' && seatarea='$area'");
										$resultprice=mysqli_fetch_array($sqlprice);
										if($resultnum && $resultprice){
							?>
										<div class="btn btn-xs ma seat" style="background:#ccc;"><?php echo $seatn;?></div>
							<?php
										}else{
							?>
										<a href="checkbuy1.php?postticket=<?php echo $ticket;?>&orderprice=<?php echo $resultprice['seatprice'];?>&ticketnum=1&seat=<?php echo $seatn?>&area=<?php echo $area?>"><div class="btn btn-xs btn-warning ma seat"><?php echo $seatn;?></div></a>
							<?php
										}
							
									}
									echo "<br />";			
								}
							?>
							</div>
						</div>
					</div>
				
				<?php
					}while($result=mysqli_fetch_array($sql));
				}
				?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid visible-lg visible-md"  style="background:#000; color:#fff;paddinf-top:10px; padding-bottom:20px;">
	<div class="container">
		<div class="row clearfix text-center visible-lg" style="margin-top:20px;">
			<div class="col-md-3 column">
				<ol class="list-unstyled">
					<li>
					<strong>帮助中心</strong>
					</li>
					<li>
					预售演出
					</li>
					<li>
					关于座位
					</li>
					<li>
					配送方式
					</li>
					<li>
					无票赔付
					</li>
					<li>
					订票提示
					</li>
				</ol>
			</div>
			<div class="col-md-3 column">
				<ol class="list-unstyled">
					<li>
					<strong>关于我们</strong>
					</li>
					<li>
					联系我们
					</li>
					<li>
					大事记
					</li>
					<li>
					公司介绍
					</li>
					<li>
					问题反馈
					</li>
					<li>
					隐私协议
					</li>
				</ol>
			</div>
			<div class="col-md-3 column">
				<ol class="list-unstyled">
					<li>
					<strong>关注我们</strong>
					</li>
					<li  onClick="changePic1()">
						微信公众号
					</li>
					<li onClick="changePic2()">
						官方微博
					</li>
				</ol>
			</div>
			<div class="col-md-3 column">
				<div class="row clearfix  text-left" id="code">
					<img src="images/weixin.jpg" width="160px;" height="220px;" style="border-radius:5px;"/>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid"  style="background:rgba(0,0,0,0.9); color:#fff; padding-top:1%;padding-bottom:5%;">	
	<div class="row clearfix text-center">
		<div class="col-md-11 column" >
			Creative By 卢漪LUYI © 2019 
		</div>
	</div>
</div>


</body>
</html>
