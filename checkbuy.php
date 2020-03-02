<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--meta标记，作者，搜索关键字和描述内容-->
<meta name="author" content="卢漪"/>
<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn.php");
?>
<title>填写订单</title>
<link rel="stylesheet" type="text/css" href="CSS/checkbuy.css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.ma{
	font-size: 15px; 
	margin-bottom:2%;
}
.pa{
	padding-top:3%;
}
.pabottom{
	padding-bottom:3%;
}
.paleft{
	padding-left:3%;
}
.paright{
	padding-right:3%
}

.bordertop{
	border-top:1px solid #eee;
}
.borderbottom{
	border-bottom:1px solid #eee;
}
.input{
	border:none;
	height:20px; 
	line-height:20px;
	background:rgb(238,238,238);
}
.seachform{
	max-width:220px;
	}
ol li{
	margin-top:2%;
}
.middle{
	vertical-align: middle;
}
/*表格*/
table.gridtable {
	width:100%;
    font-family: verdana,arial,sans-serif;
    font-size:11px;
    color:#333333;
    border-width: 1px;
    border-color: #666666;
    border-collapse: collapse;
}
table.gridtable th {
	color:#fff;
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #666666;
    background-color:rgb(241,194,46);
}
table.gridtable td {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #666666;
    background-color: #ffffff;
}
tr th{
	text-align:center;
}
.bottomtopna{
    margin-bottom:100px;
}
</style>
</head>

<body>
<?php
	$area=$_GET['area'];
	$seat=$_GET['seat'];
	$ticket=$_GET['postticket'];
	$sql=mysqli_query($connID,"select * from tb_last_ticket where ticketname = '$ticket'");
	$result=mysqli_fetch_array($sql);
?>

<?php
if(isset($_SESSION['uname']))
$name=$_SESSION['uname'];
else
echo "<script>alert('请先登录');window.location='login.php';</script>"
?>
<div class="navbar hidden-xs" role="navigation"> 
    <div class="container"> 
        <div class="navbar-header hidden-xs displayimg"> 
            <a class="navbar-brand" href="index.php"><img src="images/chujian (1).jpg" width="75px" height="41px"/></a> 
        </div> 
        <ul class="nav navbar-nav navbar-right"> 
		<?php
			if(!isset($name)){
		?>
            <li style="display:inline-block;"><a href="login.php" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;登录</a></li> 
			<li style="display:inline-block;"><a href="checkadmin.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;后台管理</a></li> 
		<?php
			}else{
		?>
			<li style="display:inline-block;"><a href="modify.php" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $name;?></a></li> 
			<li style="display:inline-block;"><a href="checkadmin.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;后台管理</a></li> 
			<li style="display:inline-block;"><a href="unset.php" style="color:#000;"><span class="glyphicon glyphicon-minus-sign"></span>&nbsp;退出</a></li>  
		<?php
			}
		?>
	    </ul> 
    </div> 
</div>


<div class="navbar navbar-inverse float" role="navigation" id="bignav">
    <div class="container-fluid"> 
			<div class="navbar-header">
					<a class="navbar-brand" href="index.php" style="color:#fff; font-family:方正舒体">初见票务</a> 
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
								<li class="visible-xs" style="display:inline-block;"><a href="login.php" style="color:#eee;"><span class="glyphicon glyphicon-user"></span></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="registion.php" style="color:#eee;"><span class="glyphicon glyphicon-log-in"></span></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="checkadmin.php" style="color:#eee;"><span class="glyphicon glyphicon-th"></span></a></li> 
							<?php
								}else{
							?>
								<li class="visible-xs" style="display:inline-block;"><a href="modify.php" style="color:rgb(157,157,157); text-decoration:none;"></span>&nbsp;<?php echo $name;?></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="checkadmin.php" style="color:rgb(157,157,157);">后台管理</a></li> 
								<li class="visible-xs" style="display:inline-block;"><a href="unset.php"style="color:rgb(157,157,157);">退出</a></li> 
							<?php
								}
							?>
						</li>
						<li><a class="active" href="index.php" style="font-size:22px;"><strong>首页</strong></a></li>
						<li ><a href="more.php?type=navication&keyword=1">演唱会</a></li>
						<li><a href="more.php?type=navication&keyword=2">话剧</a></li>
						<li><a href="more.php?type=navication&keyword=3">音乐会</a></li>
						<li><a href="more.php?type=navication&keyword=4">歌剧</a></li>
						<li class="seachform">
							<form method="post" name="more" action="more.php" class="navbar-form navbar-left">
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

<div class="container bottomtopna">
	<div class="row clearfix">
		<div class=" hidden-xs col-sm-12 col-lg-12 col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-8 col-md-offset-2 col-lg-8  col-lg-offset-2 col-sm-12 column">
					<form name="infomation" action="producebuy.php?ticket=<?php echo $ticket?>&tickettime=<?php echo $result['tickettime'];?>&ticketnum=<?php echo $_GET['ticketnum'];?>&orderprice=<?php echo $_GET['orderprice'];?>&seat=<?php echo $seat;?>&area=<?php echo $area;?>" method="post">
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 col-lg-12 column">
							<div class="row clearfix">
								<div class="col-md-12 col-sm-12 col-lg-12 column"><strong>填写收货信息</strong></div>
							</div>
							<div class="row clearfix">
								<div class="col-md-6 col-sm-6 col-lg-6 controls controls-row" style="margin-top:2%;">
									<div class=" input-group input-group-lg " >
										<span class="input-group-addon glyphicon glyphicon-user" style="color:#fff; background:rgb(241,194,46);top:-0.5px;"></span>
										<input type="text" name="getname" class="form-control" placeholder="收货人名" value="<?php echo $_SESSION['uname'];?>">
									</div>
								</div>
								
								<?php 
								
								$username=$_SESSION['uname'];
								$sqltel=mysqli_query($connID,"select * from tb_last_user where user = '$username'");
								$resulttel=mysqli_fetch_array($sqltel);
								if($resulttel){
								?>

								<div class="col-md-6 col-sm-6 col-lg-6 controls controls-row" style="margin-top:2%;">
									<div class="input-group input-group-lg " >
										<span class="input-group-addon glyphicon glyphicon-earphone" style="color:#fff; background:rgb(22,195,176); top:-0.5px;"></span>
										<input type="text" name="getphone" class="form-control" value="<?php echo $resulttel['usertel'];?>" placeholder="收货人名">
									</div>
								</div>
								<?php
								}else{
								?>
								<div class="col-md-6 col-sm-6 col-lg-6 controls controls-row" style="margin-top:2%;">
									<div class="input-group input-group-lg " >
										<span class="input-group-addon glyphicon glyphicon-earphone" style="color:#fff; background:rgb(22,195,176); top:-0.5px;"></span>
										<input type="text" name="getphone" class="form-control" placeholder="收货号码">
									</div>
								</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 col-lg-12 column">
							<div class="row clearfix">
								<div class="col-md-6 col-sm-6 col-lg-6 controls controls-row" style="margin-top:2%;">
									<div class=" input-group input-group-lg " >
										<span class="input-group-addon glyphicon glyphicon-home" style="color:#fff; background:rgb(45,179,217); top:-0.5px;"></span>
										<input type="text" name="getaddress" class="form-control" placeholder="收货地址">
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-lg-6 controls controls-row" style="margin-top:2%;">
									<div class="input-group input-group-lg " >
										<span class="input-group-addon glyphicon glyphicon-send" style="color:#fff; background:rgb(253,77,64); top:-0.5px;"></span>
										<input type="text" name="getpost" class="form-control" placeholder="邮编">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 col-lg-12 column">
							<textarea name="notice" style="width:100%; height:100%; resize:none; min-height: 120px; margin: 10px 0px; color:#999;" placeholder="如果需要，请添加备注"></textarea>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 col-lg-12 column"><strong>商品清单</strong></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 col-lg-12 column">
							<?php 
								if($result){
							?>
							<table class="gridtable text-center">
								<tr>
    								<th>商品名称</th><th>价格</th><th>数量</th><th>价格小计（元）</th>
								</tr>
								<tr>
    								<td><?php echo $result['ticketname']; echo $result['tickettime']; echo $result['ticketplace'];?></td><td><?php echo $_GET['orderprice'];?></td><td><?php echo $_GET['ticketnum'];?></td><td><?php echo $_GET['orderprice']* $_GET['ticketnum']; ?></td>
								</tr>
							</table>
							<?php
								}
							?>
						</div>
					</div>
					<div class="row clearfix" style="margin-top:1%;">
						<div class="col-md-12 col-sm-12 col-lg-12">待支付总额：<span style="font-size:16px; color:rgb(253,77,64);">￥<?php echo $_GET['orderprice']* $_GET['ticketnum']; ?></span></div>
					</div>
					<div class="row clearfix" style="margin-top:1%;">
						<div class="col-md-12 col-sm-12 col-lg-12">
							<input type="submit"class="btn btn-warning" value=" 立即支付 "/>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>


		<div class=" visible-xs col-xs-12 column">
			<div class="row clearfix">
				<div class="col-xs-12 column">
					<form name="infomation" action="producebuy.php?ticket=<?php echo $ticket?>&tickettime=<?php echo $result['tickettime'];?>&ticketnum=<?php echo $_GET['ticketnum'];?>&orderprice=<?php echo $_GET['orderprice'];?>&seat=<?php echo $seat;?>&area=<?php echo $area;?>" method="post">
					<div class="row clearfix">
						<div class="col-xs-12 column">
							<div class="row clearfix">
								<div class="col-xs-12 column"><strong>填写收货信息</strong></div>
							</div>
							<div class="row clearfix">
								<div class="col-xs-12 controls controls-row" style="margin-top:2%;">
									<div class=" input-group input-group-sm " >
										<span class="input-group-addon glyphicon glyphicon-user" style="color:#fff; background:rgb(241,194,46);top:-0.5px;"></span>
										<input type="text" name="getname" class="form-control" placeholder="收货人名" value="<?php echo $_SESSION['uname'];?>">
									</div>
								</div>
								
								<?php 
								
								$username=$_SESSION['uname'];
								$sqltel=mysqli_query($connID,"select * from tb_last_user where user = '$username'");
								$resulttel=mysqli_fetch_array($sqltel);
								if($resulttel){
								?>

								<div class="col-xs-12 controls controls-row" style="margin-top:2%;">
									<div class="input-group input-group-sm " >
										<span class="input-group-addon glyphicon glyphicon-earphone" style="color:#fff; background:rgb(22,195,176); top:-0.5px;"></span>
										<input type="text" name="getphone" class="form-control" value="<?php echo $resulttel['usertel'];?>">
									</div>
								</div>
								<?php
								}else{
								?>
								<div class="col-md-12 controls controls-row" style="margin-top:2%;">
									<div class="input-group input-group-sm " >
										<span class="input-group-addon glyphicon glyphicon-earphone" style="color:#fff; background:rgb(22,195,176); top:-0.5px;"></span>
										<input type="text" name="getphone" class="form-control" placeholder="收货号码">
									</div>
								</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-xs-12 column">
							<div class="row clearfix">
								<div class="col-xs-12 controls controls-row" style="margin-top:2%;">
									<div class=" input-group input-group-sm " >
										<span class="input-group-addon glyphicon glyphicon-home" style="color:#fff; background:rgb(45,179,217); top:-0.5px;"></span>
										<input type="text" name="getaddress" class="form-control" placeholder="收货地址">
									</div>
								</div>
								<div class="col-xs-12 controls controls-row" style="margin-top:2%;">
									<div class="input-group input-group-sm " >
										<span class="input-group-addon glyphicon glyphicon-send" style="color:#fff; background:rgb(253,77,64); top:-0.5px;"></span>
										<input type="text" name="getpost" class="form-control" placeholder="邮编">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-xs-12 column">
							<textarea name="notice" style="width:100%; height:100%; resize:none; min-height: 120px; margin: 10px 0px; color:#999;" placeholder="如果需要，请添加备注"></textarea>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-xs-12 column"><strong>商品清单</strong></div>
					</div>
					<div class="row clearfix">
						<div class="col-xs-12 column">
								<div class="row clearfix">
									<div class="col-xs-12 text-center">
										<?php
											if($result){
										?>

										<table class="gridtable text-center">
											<tr>
												<th>商品名称</th><td><?php echo $result['ticketname']; echo $result['tickettime']; echo $result['ticketplace'];?></td>
											</tr>
											<tr>
												<th>价格</th><td><?php echo $_GET['orderprice']; ?></td>
											</tr>
											<tr>
												<th>数量</th><td><?php echo $_GET['ticketnum']; ?></td>
											</tr>
											<tr>
												<th>价格小计（元）</th><td><?php echo $_GET['orderprice']* $_GET['ticketnum']; ?></td>
											</tr>
											
										</table>
										<?php
											}
										?>
									</div>
								</div>
								
						</div>
					</div>
					<div class="row clearfix" style="margin-top:1%;">
						<div class="col-xs-12 ">待支付总额：<span style="font-size:16px; color:rgb(253,77,64);">￥<?php echo $_GET['orderprice']* $_GET['ticketnum']; ?></span></div>
					</div>
					<div class="row clearfix" style="margin-top:1%;">
						<div class="col-xs-12">
							<input type="submit"class="btn btn-warning" value=" 立即支付 "/>
						</div>
					</div>
				</form>
				</div>
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