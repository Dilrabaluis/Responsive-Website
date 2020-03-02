<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--meta标记，作者，搜索关键字和描述内容-->
<meta name="author" content="卢漪"/>
<meta name="keywords" content="个人网站" />
<meta name="description" content="这是卢漪的购票网站"  />
<meta name="author" content="卢漪"/>
<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php 
header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn.php");
?>
<title>商品详情</title>
<link rel="stylesheet" type="text/css" href="CSS/indexsearch.css">
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
.middle{
	vertical-align: middle;
}
#myTab li{
	border:2px solid #ccc;
}
#myTab li a{
	color:#ccc;
}
#myTab>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #fff;
    background-color: rgb(240,173,78);
}
.nav-pills>li>a {
    border-radius: 0px;
}
.addwarningbg{
    background:rgb(254,247,238);
    padding:20px;
}
.minwidthimg{
	min-width:140px;
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
.seachform{
	max-width:220px;
	}
</style>
</head>

<body>
<?php
if(isset($_SESSION['uname']))
$name=$_SESSION['uname'];
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

<div class="container">
	<?php 
		$postticket=$_GET['ticket'];
		$sql=mysqli_query($connID,"select * from tb_last_ticket where ticketname = '$postticket'");
		$result=mysqli_fetch_array($sql);
		if($result){
	?>
	<div class="row clearfix visible-lg visible-md visible-sm">
		<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1  col-lg-10 col-lg-offset-1  column">
			<div class="row clearfix" style="padding-left:1%; padding-top:2%; padding-bottom:2%; color:#999; background:#eee; ">
				<?php echo $result['ticketname'];?>
			</div>
			<div class="row clearfix bordertop borderbottom" style="padding-top:2%; padding-bottom:2%">
				<div class="col-md-4 col-sm-4  col-lg-4  text-center" >
					<img class="img-rounded img-responsive" alt="140x140" src="<?php echo $result['ticketspic']; ?>" width="300px;"height="230px;" />
				</div>
				<div class="col-md-8 col-sm-8  col-lg-8  column " style="padding-top:5%;">
					<ul class="list-unstyled">
						<li style="margin:10px;">
							<h4>“<?php echo $result['ticketname']; ?>”</h4>
						</li>
						
						<li style="margin:20px;">
							演出时间 <span class="addwarningbg" style="border:2px solid #eee; padding:8px;"><?php echo $result['tickettime']; ?></span>
						</li>
						<li style="margin:30px 20px;">
							演出地点 <span  class="addwarningbg" style="border:2px solid #eee; padding:8px;"><?php echo $result['ticketplace']; ?></span>
						</li>
						
						<li style="margin:30px 20px 10px 20px; ">
							<ul class="list-unstyled list-inline" >
							票价
							<?php
								$place=$result['ticketplace'];
								//echo $place;
								$sqlnum=mysqli_query($connID,"select seatprice from  tb_last_seat where seatplace ='$place' group by seatprice");
								$resultnum=mysqli_fetch_array($sqlnum);
								if($resultnum){
									do{
							?>
								<li class="addwarningbg" style="border:2px solid #eee; padding:10px; text-align:center;width:65px; height:35px; margin-left:10px;"><?php echo $resultnum['seatprice'];?></li>
								
							<?php
									}while($resultnum=mysqli_fetch_array($sqlnum));
								}else{
									echo "";}
							?>
							</ul>
						</li>
					
						<li style="margin:10px;"><a href="chooseseat.php?ticket=<?php echo $result['ticketname'];?>&place=<?php echo $result['ticketplace'];?>" target="_blank"><button name="submitnum" class="btn btn-warning" style="width:160px; height:40px; margin-top:20px;">选购座位</button></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row clearfix visible-xs">
		<div class="col-xs-10 col-xs-offset-1 column">
			<div class="row clearfix" style="padding-left:1%; padding-top:2%; padding-bottom:2%; color:#999; background:#eee; ">
				<?php echo $result['ticketname'];?>
			</div>
			<div class="row clearfix bordertop borderbottom" style="padding-top:2%; padding-bottom:2%">
				<div class="col-xs-5 text-center" >
					<img class="img-rounded img-responsive minwidthimg" alt="140x140" src="<?php echo $result['ticketspic']; ?>" width="300px;"height="230px;" />
				</div>
				<div class="col-xs-7 column " style="padding-top:5%; padding-left:14%;">
					<ul class="list-unstyled">				
						<li style="margin:10px;">
							<p class="text-danger">演出时间:</p> <p><span style="padding:2px;"><?php echo $result['tickettime']; ?></span></p>
						</li>
						<li style="margin:10px;">
							<p class="text-danger">演出地点:</p> <p><span  style="padding:2px;"><?php echo $result['ticketplace']; ?></span></p>
						</li>
					<ul>
				</div>
			</div>
			<div class="row clearfix bordertop borderbottom" style="padding-top:2%; padding-bottom:2%">
				<div class="col-xs-12">
					<ul class="list-unstyled">
						<li style="margin:10px;">
							<ul class="list-unstyled list-inline" >
							票价
							<?php
							
								$place=$result['ticketplace'];
								//echo $place;
								$sqlnum=mysqli_query($connID,"select seatprice from  tb_last_seat where seatplace ='$place' group by seatprice");
								$resultnum=mysqli_fetch_array($sqlnum);
								if($resultnum){
									do{
							?>
								<li class="addwarningbg" style="border:1px solid #eee; padding:2px; text-align:center;width:42px; height:23px; margin-left:1px;"><?php echo $resultnum['seatprice'];?></li>
								
							<?php
									}while($resultnum=mysqli_fetch_array($sqlnum));
								}else{
									echo "222";}
							?>
							</ul>
						</li>
					
						<li ><a href="chooseseat.php?ticket=<?php echo $result['ticketname'];?>&place=<?php echo $result['ticketplace'];?>" target="_blank"><button name="submitnum" class="btn btn-warning" style="width:160px; height:40px; margin-top:20px;">选购座位</button></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-9 column">
					<div class="row clearfix paright paleft">
						<div class="col-md-12 column">
							<div class="row clearfix">
								<div class="col-md-12">
								<div class="row clearfix" style="margin-top:10px;">
									<div class="col-md-12">
										<ul id="myTab" class="nav nav-pills text-center">
											<li class="active"><a href="#home" data-toggle="tab">演出介绍</a></li>
											<li style="margin-left:20px;" ><a href="#ios" data-toggle="tab">演出评论</a></li>
										</ul>
									</div>	
								</div>
								<div id="myTabContent" class="tab-content" style="margin-top:15px;">
									<div class="tab-pane fade in active" style="border:2px double #eee;" id="home">
										<h3 style="text-align:center;">演出介绍</h3>
        						    	<p style="color:#666; padding:10px 50px;"><?php $content=$result['ticketintroduce'];$replace=str_replace('\n','<br>',$content); echo $replace;?></p>
										<p style="text-align:center;" class="hidden-xs"><img src="<?php echo $result['ticketbpic'];?>" width="530px;" height="280px;" style="border-radius:8px;"></p>  
									</div>
									<div class="tab-pane fade" id="ios" style="border:2px double #eee; padding:10px 50px;" id="home">
										<h3>Leave Your Word Here</h3>
      									<p>
              								<form action="checkcomment.php" method="post" name="comment">
                								<p>Your Name:<?php if(isset($_SESSION['uname']))echo $_SESSION['uname']; else echo "123";?></p>
            							    	<p>Your Icon:
													<div class="visible-lg visible-md visible-sm">
														<div class="col-md-12 col-sm-12 col-lg-12">
															<label class="b">
																<input name="p"  type="radio" value="head/1.jpg" checked>
																<img src="head/1.jpg" width="45px" height="45px"> 
															</label>
				
															<label class="b" >
																<input name="p"  type="radio" value="head/2.jpg" >
																<img src="head/2.jpg" width="45px" height="45px"> 
															</label>
									
															<label class="b">
																<input name="p" type="radio" value="head/3.jpg" >
																<img src="head/3.jpg" width="45px" height="45px"> 
															</label>
				
															<label class="b">
																<input name="p" type="radio" value="head/4.jpg" >
																<img src="head/4.jpg" width="45px" height="45px"> 
															</label>
				
															<label class="b">
																<input name="p" type="radio" value="head/5.jpg" >
																<img src="head/5.jpg" width="45px" height="45px"> 
															</label>

															<label class="b">
																<input name="p"  type="radio" value="head/1.jpg" checked>
																<img src="head/1.jpg" width="45px" height="45px"> 
															</label>
														</div>
													</div>
													<div class="visible-xs">
														<div class="col-xs-12">
															<label class="b">
																<input name="p"  type="radio" value="head/1.jpg" checked>
																<img src="head/1.jpg" width="45px" height="45px"> 
															</label>
				
															<label class="b" >
																<input name="p"  type="radio" value="head/2.jpg" >
																<img src="head/2.jpg" width="45px" height="45px"> 
															</label>
									
															<label class="b">
																<input name="p" type="radio" value="head/3.jpg" >
																<img src="head/3.jpg" width="45px" height="45px"> 
															</label>
														</div>
														
														<div class="col-xs-12">
															<label class="b">
																<input name="p" type="radio" value="head/4.jpg" >
																<img src="head/4.jpg" width="45px" height="45px"> 
															</label>
				
															<label class="b">
																<input name="p" type="radio" value="head/5.jpg" >
																<img src="head/5.jpg" width="45px" height="45px"> 
															</label>

															<label class="b">
																<input name="p"  type="radio" value="head/1.jpg" checked>
																<img src="head/1.jpg" width="45px" height="45px"> 
															</label>
														</div>
													</div>

                								</p>
                								<p><textarea name="coms" class="comsword" style="width:100%; height:100%; resize:none; min-height: 120px; margin: 10px 0px;"></textarea></p>
                								<input type="hidden" name="hid" value="<?php echo $result['ticketname'];?>">

                								<input type="hidden" name="htype" value="<?php echo $result['tickettype'];?>">
                								<p><input type="submit" name="submitword" value="Submit it" class="btn btn-warning"></p>
											
                							</form>
										</p>
                					
              						  <?php
											$ticket=$result['ticketname'];
											$sqlcomment=mysqli_query($connID,"select * from tb_last_comment where commentticket='$ticket' order by commentime desc limit 0,4");
										  	$resultcomment=mysqli_fetch_array($sqlcomment);
											if($resultcomment==false){
										?>
                
										<p style="text-align:center; margin-top:3%;">暂无评论</p>
              							<?php
											}else{
												do{
										?>
      								  	<p>
                 							<table border="1px" cellpadding="0" cellspacing="0">
                	  							<tr>
        											<td><img src="<?php echo $resultcomment['commenthead'];?>" width="80px" height="80px;"></td>
                    								<td class="text-left"><?php echo $resultcomment['comment'];?></td>
        										</tr>
              								    <tr>
             								    	<td><?php echo $resultcomment['commentuser'];?></td>
                  									<td></td>
                 								</tr>
                 								<tr>
                 									<td style=" color:#ccc;"><?php echo $resultcomment['commentime'];?></td>
                  								</tr>
        		  							</table>
       			 						</p>
        								<?php
											}while($resultcomment=mysqli_fetch_array($sqlcomment));
										}

										?>
									</div>

									
								</div>

							</div>
							</div>
						</div>
					</div>
				</div>



				
				<div class="col-md-3 column" sytle="box-shadow:0px 0px 6px #eee;">
					<div class="row clearfix visible-lg visible-md">
						<div class="col-md-12 column">
							<div class="row clearfix">
								<div class="col-md-12 column">
									<h3>
										相关推荐
									</h3>
								</div>
							</div>
							<?php 
								$type=$_GET['type'];
								$sqlrecomment=mysqli_query($connID,"select * from tb_last_ticket where tickettype='$type' order by tickettime desc limit 0,3");
								//var_dump($sql);
								$resultrecomment=mysqli_fetch_array($sqlrecomment);
								if($resultrecomment==true){
									do{
							?>
							<div class="row clearfix" style=" box-shadow:0px 0px 6px #eee;">
								<div class="col-md-12 column">
									<div class="row clearfix">
										<div class="col-md-6 column">
											<a href="indexsearch.php?ticket=<?php echo $resultrecomment['ticketname'];?>&type=<?php echo $resultrecomment['tickettype'];?>"><img alt="140x140" src="<?php echo $resultrecomment['ticketspic']?>"  width="100px;" height="130px;" style="border-radius:4px;"/></a>
										</div>
										<div class="col-md-6 column" style="font-size:12px;">
											
												<p>
													<?php echo $resultrecomment['ticketname'];?>
												</p>
												<p>
													<?php echo $resultrecomment['tickettime'];?>
												</p>
												<p>
													<?php echo $resultrecomment['ticketplace'];?>
												</p>
												<p>
													<span style="font-size:14px; color:red;"><?php echo $resultrecomment['ticketlowprice'];?></span>起
												</p>
										</div>
									</div>
								</div>
							</div>
							<?php
								}while($resultrecomment=mysqli_fetch_array($sqlrecomment));
							}else{
								echo "暂无相关推荐";
							}
							?>
						</div>
					</div>

					<div class="row clearfix visible-sm">
						<div class="col-sm-12 column">
							<div class="row clearfix">
								<div class="col-sm-12 column text-center">
									<h3>
										相关推荐
									</h3>
								</div>
							</div>
							<div class="row clearfix" style=" box-shadow:0px 0px 6px #eee;">
							<?php 
								$type=$_GET['type'];
								$sqlrecomment=mysqli_query($connID,"select * from tb_last_ticket where tickettype='$type' order by tickettime desc limit 0,4");
								//var_dump($sql);
								$resultrecomment=mysqli_fetch_array($sqlrecomment);
								if($resultrecomment==true){
									do{
							?>
							
								<div class="col-sm-3 column">
									<div class="row clearfix">
										<div class="col-sm-12 column">
											<a href="indexsearch.php?ticket=<?php echo $resultrecomment['ticketname'];?>&type=<?php echo $resultrecomment['tickettype'];?>"><img alt="140x140" src="<?php echo $resultrecomment['ticketspic']?>"  width="100px;" height="130px;" style="border-radius:4px;"/></a>
										</div>
										<div class="col-sm-12 column" style="font-size:12px;">
											
												<p>
													<?php echo $resultrecomment['ticketname'];?>
												</p>
												<p>
													<?php echo $resultrecomment['tickettime'];?>
												</p>
												<p>
													<?php echo $resultrecomment['ticketplace'];?>
												</p>
												<p>
													<span style="font-size:14px; color:red;"><?php echo $resultrecomment['ticketlowprice'];?></span>起
												</p>
										</div>
									</div>
								</div>
							
							<?php
								}while($resultrecomment=mysqli_fetch_array($sqlrecomment));
							}else{
								echo "暂无相关推荐";
							}
							?>
							</div>
						</div>
					</div>


					<div class="row clearfix visible-xs">
						<div class="col-xs-12 column">
							<div class="row clearfix">
								<div class="col-xs-12 column text-center">
									<h3>
										相关推荐
									</h3>
								</div>
							</div>
							<div class="row clearfix" style=" box-shadow:0px 0px 6px #eee;">
							<?php 
								$type=$_GET['type'];
								$sqlrecomment=mysqli_query($connID,"select * from tb_last_ticket where tickettype='$type' order by tickettime desc limit 0,4");
								//var_dump($sql);
								$resultrecomment=mysqli_fetch_array($sqlrecomment);
								if($resultrecomment==true){
									do{
							?>
							
								<div class="col-xs-6 column">
									<div class="row clearfix">
										<div class="col-xs-12 column">
											<a href="indexsearch.php?ticket=<?php echo $resultrecomment['ticketname'];?>&type=<?php echo $resultrecomment['tickettype'];?>"><img alt="140x140" src="<?php echo $resultrecomment['ticketspic']?>"  width="100px;" height="130px;" style="border-radius:4px;"/></a>
										</div>
										<div class="col-xs-12 column" style="font-size:12px;">
											
												<p>
													<?php echo $resultrecomment['ticketname'];?>
												</p>
												<p>
													<?php echo $resultrecomment['tickettime'];?>
												</p>
												<p>
													<?php echo $resultrecomment['ticketplace'];?>
												</p>
												<p>
													<span style="font-size:14px; color:red;"><?php echo $resultrecomment['ticketlowprice'];?></span>起
												</p>
										</div>
									</div>
								</div>
							
							<?php
								}while($resultrecomment=mysqli_fetch_array($sqlrecomment));
							}else{
								echo "暂无相关推荐";
							}
							?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php
	}
	?>
</div>
<div class="container-fluid"  style="background:#000; color:#fff;paddinf-top:10px; padding-bottom:20px;">
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
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column" >
				Creative By 卢漪LUYI © 2019 
			</div>
		</div>
	</div>
</div>
<script>
    $(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            // 获取已激活的标签页的名称
            var activeTab = $(e.target).text();
            // 获取前一个激活的标签页的名称
            var previousTab = $(e.relatedTarget).text();
            $(".active-tab span").html(activeTab);
            $(".previous-tab span").html(previousTab);
        });
    });
</script>
	
<script type="text/javascript">
    function jia() {
        var add=document.getElementById("num");
        var a=add.value;
        a++;
        add.value=a;
    }
    function jian() {
        var sub=document.getElementById("num");
        var b=sub.value;
        b--;
        if(b>1){sub.value=b--}else {sub.value=1}
    }
</script>
</body>
</html>