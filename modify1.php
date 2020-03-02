<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta标记，作者，搜索关键字和描述内容-->
	<meta name="author" content="卢漪"/>
	<meta name="keywords" content="卢漪，个人响应式网站，计算机，编程，演出票购票网站，电影，摄影，偶像罗景，喻科霖" />
	<meta name="description" content="这是卢漪的响应式购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />		
	<title>个人中心</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php
        header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
        session_start();
        include("conn.php");
	?>
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
#myInput {
    background-image: url('https://static.runoob.com/images/mix/searchicon.png'); /* 搜索按钮 */
    background-position: 10px 12px; /* 定位搜索按钮 */
    background-repeat: no-repeat; /* 不重复图片*/
    width: 60%; 
    font-size: 15px; /* 加大字体 */
    padding: 12px 20px 12px 40px; 
    border: 1px solid #ddd; 
    margin-bottom: 12px; 
}
#myInput:hover{
	width:80%;
	-webkit-transition: all 1s ease-in-out;
    -moz-transition: all 1s ease-in-out;
	-o-transition: all 1s ease-in-out;
    transition: all 1s ease-in-out;
}
.border{
	padding:20px;
	border:1px solid #eee;
}


.tab{
	display:none;
}
.section{
	border:1px solid #eee;
	margin-top:5%;
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
@media(min-width:437px){
	.dis{
	margin-right:13px;
	}
}
@media(max-width:436px){
	.disxs{
	margin-right:0px;
	}
	.container{
		height:180%;
	}
	.container ul li{
		font-size:12px;
		width:80px;
		height:14px;
	}
	.container ul{
		margin-bottom:30px;
	}
	
}
</style>

<script>
function inputcard(form){
    var card = form.usercard.value;
    var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    if(!(reg.test(card))){
        document.getElementById("carddiv").innerHTML="身份证格式不对!";
        //alert("注册密码长度应大于等于6!");
        form.usercard.select();
        return(false);
    }else{
        document.getElementById("carddiv").innerHTML="";
        }
}
function inputtel(form){
    var sMobile = form.sendtel.value; 
    var m = /^1[3|5|8][0-9]{9}$/;
    if(!(m.test(sMobile))){ 
        document.getElementById("addteldiv").innerHTML="电话号码格式不对!";
        form.sendtel.select();
        return false; 
    }else{
        document.getElementById("addteldiv").innerHTML="";
        } 
}
</script>
<script>	
//检测密码
function inputpwd(form){
	if(form.pwd.value.length<7){
		document.getElementById("pass").innerHTML="密码大于6位!";
		/*alert("注册密码长度应大于等于6!");*/
		form.pwd.select();
		return(false);
	}else{
		document.getElementById("pass").innerHTML="";
	}
}
function checkpwdbool(form){
  //确认密码
	if(form.pwd.value!=form.checkpwd.value){
		document.getElementById("checkpass").innerHTML="密码不一致!";
		/*alert("密码与重复密码不同!");*/
		form.checkpwd.select();
		return(false);
	}else{
		document.getElementById("checkpass").innerHTML="";
	}
}
</script>
</head>
<body>
<?php
if(isset($_SESSION['uname']))
$name=$_SESSION['uname'];
else echo "<script> alert('请先登录');window.location='login1.php';</script>"
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
			<li style="display:inline-block;"><a href="checkadmin1.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;后台管理</a></li> 
		<?php
			}else{
		?>
			<li style="display:inline-block;"><a href="modify1.php" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $name;?></a></li> 
			<li style="display:inline-block;"><a href="checkadmin1.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;后台管理</a></li> 
			<li style="display:inline-block;"><a href="unset1.php" style="color:#000;"><span class="glyphicon glyphicon-minus-sign"></span>&nbsp;退出</a></li>  
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
								<li class="visible-xs" style="display:inline-block;"><a href="registion1.php" style="color:#eee;"><span class="glyphicon glyphicon-log-in"></span></a></li>
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
						<li><a class="active" href="index1.php" style="font-size:22px;"><strong>首页</strong></a></li>
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



<div class="container" style="margin-bottom:80px;margin-top:50px;">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<ul class="nav nav-pills" id="ul">
				<li class="dis disxs"><a href="#" style="background:rgb(241,194,46); color:#fff;">个人信息</a></li>
				<li class="dis disxs"><a href="#" style="background:rgb(22,195,176); color:#fff;">查看订单</a></li>
				<li class="dis disxs"><a href="#" style="background:rgb(45,179,217); color:#fff;">收货地址</a></li>
				<li class="dis disxs"><a href="#" style="background:rgb(253,77,64); color:#fff;">账号设置</a></li>	
			</ul>
		</div>
	</div>
	<div class="row clearfix" style="background:#eee; margin-top:10px; padding:17px 10px;">
		<div class="col-md-12 column" id="change">
			<div class="row clearfix ">
				<div class="col-md-12 section">
					<div class="roe clearfix">
						<div class="col-md-8 col-md-offset-2">
							<?php
								$u=$_SESSION['uname'];
								$sql=mysqli_query($connID,"select * from tb_last_user where user='$u'");
								$result=mysqli_fetch_array($sql);
								$sqladmin=mysqli_query($connID,"select * from tb_last_admin where adminame='$u'");
								$resultadmin=mysqli_fetch_array($sqladmin);
								if($result){
							?>
							<form method="post"  class="bs-example bs-example-form" role="form" name="modify"  action="modifychk1.php">
								<div class="row clearfix">
									<div class="col-md-6" style="margin-top:5px;">
										<div class="input-group">
											<span class="input-group-addon">真实姓名</span>
											<input name="username" type="text" class="form-control" value="<?php echo $result['username'];?>" required>
										</div>
									</div>
								
									<div class="col-md-6" style="margin-top:5px;">
										<div class="input-group">
											<span class="input-group-addon">电话号码</span>
											<input name="usertel" type="text" class="form-control" value="<?php echo $result['usertel'];?>" required>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">	
									<div class="col-md-6" style="margin-top:5px;">
										<div class="input-group">
											<span class="input-group-addon">身份证号</span>
											<input name="usercard" onBlur="inputcard(modify)" class="form-control"  value="<?php echo $result['usercard'];?>"  type="text" required>
												
										</div>
										<div class="text-right" id="teldiv" style="font-size:10px; color:red;"></div>	
									</div>
									

								</div>
							
								<div class="row clearfix">
									<div class="col-md-12" style="margin-top:10px;">
										<input type="submit" name="modifysubmit" class="btn btn-warning" value="确认提交">
									</div>
								</div>
							</form>
							<?php
							}else if($resultadmin){
								echo "暂无个人信息";
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row clearfix ">
				<div class="col-md-12 section tab">
					<div class="row clearfix">
						<div class="col-md-12 column">
						<?php 
									$sqlgoods=mysqli_query($connID,"select * from tb_last_order where orderusername = '$u'");
									$resultgoods=mysqli_fetch_array($sqlgoods);
									if($resultgoods){
										
								?>
							<table class="gridtable text-center">
								<tr>
    								<th>商品名称</th><th>单价</th><th>数量</th><th>下单时间</th><th>价格小计（元）</th>
								</tr>
								<?php
								do{
											$infotorderid=$resultgoods['orderid'];
											$sqlinfo=mysqli_query($connID,"select * from tb_last_information where inforderid = '$infotorderid'");
											$resultinfo=mysqli_fetch_array($sqlinfo);
											if($resultinfo){
								?>
							
								<tr>
    								<td><?php echo $resultinfo['infoticket']; ?></td><td><?php echo $resultinfo['infoprice'];?></td><td><?php echo $resultgoods['ordernum'];?></td><td><?php echo $resultgoods['ordertime'];?></td><td><?php echo $resultinfo['infoprice']*$resultgoods['ordernum'];?></td>
								</tr>
							
								<?php
										}
									}while($resultgoods=mysqli_fetch_array($sqlgoods));
								
							?>
							</table>
							<?php
								}else{
									echo "暂无订单";
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row clearfix ">
						<div class="col-md-10 col-md-offset-1 section tab">
							<div class="row clearfix" style="border-bottom:1px solid #ccc;">
								<div class="col-md-10 col-md-offset-1">
									<?php
										$u=$_SESSION['uname'];
										$sqladdress=mysqli_query($connID,"select * from tb_last_address where username='$u'");
										$resultaddress=mysqli_fetch_array($sqladdress);
										$num_rows=mysqli_num_rows($sqladdress);
										if($resultaddress){

									?>
									<div class="row clearfix">
										<div class="col-md-12">
											<table class="table table-bordered table-striped">
												<caption>全部地址</caption>
												<thead>
													<tr style="background:rgb(241,194,46);color:#fff;font-size:14px;">
														<th>收货人名</th>
														<th>收货号码</th>
														<th>收货邮编</th>
														<th>详细地址</th>
														<th>删除</th>
													</tr>
												</thead>
											
												<tbody>
												<?php
													
													
															do{
												
												?>
													<tr>
														<td><?php echo $resultaddress['addressname'];?></td>
														<td><?php echo $resultaddress['addresstel']; ?></td>
														<td><?php echo $resultaddress['addressmail'];?></td>
														<td><?php echo $resultaddress['address'];?></td>
														<td><a href="deleteaddress1.php?id=<?php echo $resultaddress['addressid'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
														
													</tr>
													
												<?php
														}while($resultaddress=mysqli_fetch_array($sqladdress));
												
												?>
												</tbody>
											</table>
										</div>		
									</div>
									<?php
									}
									?>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-md-10 col-md-offset-1">
									<h3>添加收货地址</h3>
									<form method="post" name="addaddress"  action="addresscheck1.php">
										<div class="row clearfix">
											<div class="col-md-6" style="margin-top:5px;">
												<div class="input-group">
													<span class="input-group-addon">收货人</span>
													<input name="senduser"  class="form-control" type="text" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-group" style="margin-top:5px;">
													<span class="input-group-addon">收货电话</span>
													<input name="sendtel" onBlur="inputtel(addaddress)" class="form-control" type="text" required>
												</div>
												<div class="text-right" id="addteldiv" style="font-size:10px; color:red;"></div>
											</div>
										</div>
										<div class="row clearfix" style="margin-top:5px;">	
											<div class="col-md-6">
												<div class="input-group">
													<span class="input-group-addon">收货邮编</span>
													<input name="sendmail" class="form-control" type="text"  required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-group" style="margin-top:5px;">
													<span class="input-group-addon">收货地址</span>
													<input name="postaddress" class="form-control" type="text"  required>
												</div>
											</div>	
										</div>
										
										<div class="row clearfix">
											<div class="col-md-12" style="margin-top:10px;">
													<input type="submit" name="addresssubmit" class="btn btn-warning" value="确认提交">
											</div>
										</div>
									</form>
									
								</div>
							</div>
							
						</div>
				
			</div>
			<div class="row clearfix ">
				<div class="col-md-12 section tab">
					<div class="row clearfix">
						<div class="col-md-8 col-md-offset-2">
							<form name="pwdform" action="pwdcheck1.php" method="post">
							<div class="row clearfix">
								<div class="col-md-6">
									<div class="row clearfix">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">新密码</span>
												<input name="pwd" type="password"  class="form-control"  onBlur="inputpwd(pwdform)" required>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-md-12 text-left" id="pass" style="font-size:12px; color:red; padding-left:5%;"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row clearfix">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">确认密码</span>
												<input name="checkpwd" type="password"  class="form-control"   onBlur="checkpwdbool(pwdform)" required>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-md-12 text-left" id="checkpass" style="font-size:12px; color:red; padding-left:5%;"></div>
									</div>
								</div>
							</div>
							<div class="row clearfix" style="margin-top:10px;">
								<div class="col-md-6">
									<input type="submit" name="pwdsubmit" class="btn btn-warning" value="提交">
								</div>
							</div>
								
							</form>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2" id="webpage3"></div>
					</div>
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

<script type="text/javascript">
    var lis = document.getElementById("ul").getElementsByTagName("li");
    var divs = document.getElementById("change").getElementsByClassName("section");
    for(var i=0; i<lis.length; i++){
        lis[i].index = i;
        lis[i].onclick = function(){
        for(var i=0; i<divs.length; i++){
                divs[i].style.display="none";
        }
              divs[this.index].style.display = "block";
      	}
    }
</script> 

<script src="js/ajax.js"></script>
</body>
</html>
