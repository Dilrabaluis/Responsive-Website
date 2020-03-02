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
	<title>首页</title>
	<link rel="stylesheet" href="CSS/index.css">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<?php 
		header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
		session_start();
		include("conn.php");
	?>
<style>
.fixednav {  
    position: fixed;  
    top: 0px;  
    left: 0px;  
    width: 100%;  
    z-index: 999;  
}  
.float{
	clear:both;
}
.img {
	border-radius:5px;
    transition: All 0.4s ease-in-out;
    -webkit-transition: All 0.4s ease-in-out;
    -moz-transition: All 0.4s ease-in-out;
    -o-transition: All 0.4s ease-in-out;
        }

.img:hover {
    transform: scale(1.2);
	-webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    -ms-transform: scale(1.2);
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
@media(min-width:767px) and (max-width:768px){
	.displayimg{
		display:none;
	}
}
</style>
</head>
<body>
<script>
	function changePic1(){
		var myImg1=document.getElementsByTagName("img")[8];
		myImg1=myImg1.setAttribute("src","images/weixin.jpg");
		alert(myImg1);
	}
	function changePic2(){
		var myImg2=document.getElementsByTagName("img")[8];
		myImg2=myImg2.setAttribute("src","images/weibo.jpg");
		
	}
</script>

<script>
//固定导航栏  
$(function(){  
var nav=$(".navbar"); //得到导航对象  
var win=$(window); //得到窗口对象  
var sc=$(document);//得到document文档对象。  
win.scroll(function(){  
  if(sc.scrollTop()>=100){  
    nav.addClass("fixednav");   
  }else{  
   nav.removeClass("fixednav");  
  }  
})    
})  
</script>  
<?php
if(isset($_SESSION['uname']))
$name=$_SESSION['uname'];
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
			<a class="navbar-brand visible-xs" href="index1.php" style="color:#fff; font-family:方正舒体">初见票务</a> 
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
								<li class="visible-xs" style="display:inline-block;"><a href="login1.php" style="color:#eee;">登录</a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="registion1.php" style="color:#eee;">注册</a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="checkadmin1.php" style="color:#eee;">后台管理</a></li> 
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

<div class="container-fluid visible-lg">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="carousel slide" id="carousel-348560">
				<ol class="carousel-indicators">
					<li data-target="#carousel-348560" data-slide-to="0">
					</li>
					<li class="active" data-target="#carousel-348560" data-slide-to="1">
					</li>
					<li data-target="#carousel-348560" data-slide-to="2">
					</li>
				</ol>
				<div class="carousel-inner text-center">
					<div class="item text-center">
						<img alt="" src="images/1.jpg" width="100%"/>
					</div>
					<div class="item active">
						<img alt="" src="images/2.jpg" width="100%"/>
					</div>
					<div class="item">
						<img alt="" src="images/2.png" width="100%"/>
					</div>
				</div> <a class="left carousel-control" href="#carousel-348560" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-348560" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column">
			<h3>
				近期推荐
			</h3>
		</div>
	</div>
	<div class="row clearfix visible-lg visible-md"  style="border-bottom:1px solid #ccc;">
		<?php
			$sqltime=mysqli_query($connID,"select * from tb_last_ticket order by tickettime desc limit 0,3");
			$resulttime=mysqli_fetch_array($sqltime);
			if($resulttime==false){
				echo "暂无近期推荐!";
			}
			else{
				do{
		?>
		<div class="col-md-2 column" >
			<div class="row clearfix">
				<div class="col-md-6 column">
					<a href="indexsearch1.php?ticket=<?php echo $resulttime['ticketname']?>&type=<?php echo $resulttime['tickettype'];?>" target="_blank"><img class="img" alt="140x140" src="<?php echo $resulttime['ticketspic'];?>" width="150px;" height="230px;" /></a>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<p>
						<strong><?php echo $resulttime['ticketname'];?></strong>
					</p>
					<p>
						<strong style="color:red;"><?php echo $resulttime['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		
		<?php
			}while($resulttime=mysqli_fetch_array($sqltime));
		}
		?>
		<div class="col-md-6 visible-lg visible-md">
			<div class="row clearfix text-center"><h4>热度TOP</h4></div>
			<?php

			$sqlhot=mysqli_query($connID,"select * from tb_last_ticket order by ticketselnum desc limit 0,4");
			$resulthot=mysqli_fetch_array($sqlhot);
			if($resulthot==false){
				echo "暂无热门推送!";
			}
			else{
				do{
			?>
			<div class="row clearfix" style="margin-top:10px; ">
				<div class="col-md-6">
					<p class="text-right"><?php echo $resulthot['ticketname'];?></p>
				</div>
				<div class="col-md-6">
					<div class="progress progress-striped">
   						<div class="progress-bar progress-bar-warning" role="progressbar"  aria-valuemin="0" aria-valuemax="100"style="width: <?php echo $resulthot['ticketselnum'];?>%;">
    					</div>
					</div>	
				</div>	
			</div>
			<?php
				}while($resulthot=mysqli_fetch_array($sqlhot));
			}
			?>			
		</div>
	</div>

	<div class="row clearfix visible-sm" style="border-bottom:1px solid #ccc;">
		<?php
			$sqltime=mysqli_query($connID,"select * from tb_last_ticket order by tickettime desc limit 0,3");
			$resulttime=mysqli_fetch_array($sqltime);
			if($resulttime==false){
				echo "暂无近期推荐!";
			}
			else{
				do{
		?>
		<div class="col-sm-4 column">
			<div class="row clearfix text-center" style="margin-top:5px;">
				<div class="col-sm-11 column text-center">
					<a href="indexsearch1.php?ticket=<?php echo $resulttime['ticketname']?>&type=<?php echo $resulttime['tickettype'];?>" target="_blank"><img alt="140x140" class="img" src="<?php echo $resulttime['ticketspic'];?>" width="150px;" height="230px;" /></a>
				</div>
			</div>
			<div class="row clearfix text-center"> 
				<div class="col-sm-11 column">
					<p>
						<strong><?php 
									$text=$resulttime['ticketname'];
									if(mb_strlen($text, 'utf8') > 18)
										echo mb_substr($text, 0, 18, 'utf8').'...';
									else 
										echo $text
								?>
						</strong>
					</p>
					<p>
						<strong style="color:red;"><?php echo $resulttime['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>	
		<?php
			}while($resulttime=mysqli_fetch_array($sqltime));
		}
		?>
	</div>


	<div class="row clearfix visible-xs" style="border-bottom:1px solid #ccc;">
		<?php
			$sqltime=mysqli_query($connID,"select * from tb_last_ticket order by tickettime desc limit 0,2");
			$resulttime=mysqli_fetch_array($sqltime);
			if($resulttime==false){
				echo "暂无近期推荐!";
			}
			else{
				do{
		?>
		<div class="col-xs-6 column">
			<div class="row clearfix text-center" style="margin-top:5px;">
				<div class="col-xs-12 column text-center">
					<a href="indexsearch1.php?ticket=<?php echo $resulttime['ticketname']?>&type=<?php echo $resulttime['tickettype'];?>" target="_blank"><img alt="140x140" class="img" src="<?php echo $resulttime['ticketspic'];?>" width="150px;" height="230px;" /></a>
				</div>
			</div>
			<div class="row clearfix text-center"> 
				<div class="col-xs-12 column">
					<p>
						<strong><?php 
									$text=$resulttime['ticketname'];
									if(mb_strlen($text, 'utf8') > 18)
										echo mb_substr($text, 0, 18, 'utf8').'...';
									else 
										echo $text
								?>
						</strong>
					</p>
					<p>
						<strong style="color:red;"><?php echo $resulttime['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		
		<?php
			}while($resulttime=mysqli_fetch_array($sqltime));
		}
		?>
	</div>



	<div class="row clearfix">
		<div class="col-md-6 col-sm-6 col-xs-6 column"><h3 style="font-size:25px;">演唱会</h3></div>
		<div class="col-md-6 col-sm-6 col-xs-6 column text-right"><h3 style="font-size:16px;"><a href="more1.php?type=navication&keyword=1" style="color:#000; text-decoration:none;">查看全部</a></h3></div>
	</div>
	<div class="row clearfix visible-lg visible-md" style="border-bottom:1px solid #ccc;">
		<?php
		$sql=mysqli_query($connID,"select * from tb_last_ticket where tickettype='1' limit 0,6");
		$result=mysqli_fetch_array($sql);
		if($result==false){
			echo "暂无演唱会!";
		}
		else{
			do{
		?>
		<div class="col-md-2 column">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<a href="indexsearch1.php?ticket=<?php echo $result['ticketname'];?>&type=<?php echo $result['tickettype'];?>"><img class="img" alt="140x140" src="<?php echo $result['ticketspic']?>" width="150px;" height="230px;"/></a>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 column">
					<p class="pa">
						<strong><?php echo $result['ticketname']; ?></strong>
					</p>
					<p class="text-error text-center">
						<strong style="color:red;"><?php echo $result['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		<?php
			}while($result=mysqli_fetch_array($sql));
		}
		?>
	</div>

	<div class="row clearfix visible-sm" style="border-bottom:1px solid #ccc;">
		<?php
		$sql=mysqli_query($connID,"select * from tb_last_ticket where tickettype='1' limit 0,6");
		$result=mysqli_fetch_array($sql);
		if($result==false){
			echo "暂无演唱会!";
		}
		else{
			do{
		?>
		<div class="col-xs-4 col-sm-4 column">
			<div class="row clearfix">
				<div class="col-xs-12 col-sm-12 column text-center">
					<a href="indexsearch1.php?ticket=<?php echo $result['ticketname'];?>&type=<?php echo $result['tickettype'];?>"><img class="img" alt="140x140" src="<?php echo $result['ticketspic']?>" width="150px;" height="230px;"/></a>
				</div>
			</div>
			<div class="row clearfix text-center">
				<div class="col-xs-12 col-sm-12 column">
					<p class="pa">
						<strong>
							<?php 
						
								$text2=$result['ticketname'];
								if(mb_strlen($text2, 'utf8') > 18)
									echo mb_substr($text2, 0, 18, 'utf8').'...';
								else 
									echo $text2;
											
							?>
						</strong>
					</p>
					<p class="text-error text-center">
						<strong style="color:red;"><?php echo $result['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		<?php
			}while($result=mysqli_fetch_array($sql));
		}
		?>
	</div>

	<div class="row clearfix visible-xs" style="border-bottom:1px solid #ccc;">
		<?php
		$sql=mysqli_query($connID,"select * from tb_last_ticket where tickettype='1' limit 0,2");
		$result=mysqli_fetch_array($sql);
		if($result==false){
			echo "暂无演唱会!";
		}
		else{
			do{
		?>
		<div class="col-xs-6 column">
			<div class="row clearfix">
				<div class="col-xs-12 column text-center">
					<a href="indexsearch1.php?ticket=<?php echo $result['ticketname'];?>&type=<?php echo $result['tickettype'];?>"><img class="img" alt="140x140" src="<?php echo $result['ticketspic']?>" width="150px;" height="230px;"/></a>
				</div>
			</div>
			<div class="row clearfix text-center">
				<div class="col-xs-12 column">
					<p class="pa">
						<strong>
							<?php 
						
								$text2=$result['ticketname'];
								if(mb_strlen($text2, 'utf8') > 18)
									echo mb_substr($text2, 0, 18, 'utf8').'...';
								else 
									echo $text2;
											
							?>
						</strong>
					</p>
					<p class="text-error text-center">
						<strong style="color:red;"><?php echo $result['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		<?php
			}while($result=mysqli_fetch_array($sql));
		}
		?>
	</div>


	<div class="row clearfix">
		<div class="col-md-6 col-sm-6 col-xs-6 column"><h3 style="font-size:25px;">话剧</h3></div>
		<div class="col-md-6 col-sm-6 col-xs-6 column text-right"><h3 style="font-size:16px;"><a href="more1.php?type=navication&keyword=2" style="color:#000; text-decoration:none;">查看全部</a></h3></div>			
	</div>
	<div class="row clearfix visible-lg visible-md" style="border-bottom:1px solid #ccc; padding-bottom:10px;">
		<div class="col-md-3 column visible-lg">
			<img alt="140x140" src="images/31.jpg" width="240px;" height="230px;" />
		</div>
		<?php
		$sqlhuaju=mysqli_query($connID,"select * from tb_last_ticket where tickettype='2' limit 0,2");
		$resulthuaju=mysqli_fetch_array($sqlhuaju);
		if($resulthuaju==false){
			echo "暂无话剧!";
		}
		else{
			do{
		?>
		<div class="col-md-4 column">
			<div class="row clearfix">
				<div class="col-md-6 column">
					<a href="indexsearch1.php?ticket=<?php echo $resulthuaju['ticketname'];?>&type=<?php echo $resulthuaju['tickettype'];?>"><img class="img"  alt="140x140" src="<?php echo $resulthuaju['ticketspic']?>" width="150px;" height="230px;"/></a>
				</div>
				<div class="col-md-6 column">
					<p style="padding-top:25%;">
						<?php echo $resulthuaju['ticketname'];?>
					</p>
					
					<p>
						<?php echo $resulthuaju['ticketplace'];?>
					</p>
					<p>
						<strong style="color:red;"><?php echo $resulthuaju['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		<?php
			}while($resulthuaju=mysqli_fetch_array($sqlhuaju));
		}
		?>
	</div>


	<div class="row clearfix visible-sm" style="border-bottom:1px solid #ccc;padding-bottom:10px;">
		<?php
		$sqlhuaju=mysqli_query($connID,"select * from tb_last_ticket where tickettype='2' limit 0,2");
		$resulthuaju=mysqli_fetch_array($sqlhuaju);
		if($resulthuaju==false){
			echo "暂无话剧!";
		}
		else{
			do{
		?>
		<div class="col-sm-6 column">
			<div class="row clearfix">
				<div class="col-sm-6 column">
					<a href="indexsearch1.php?ticket=<?php echo $resulthuaju['ticketname'];?>&type=<?php echo $resulthuaju['tickettype'];?>"><img class="img"  alt="140x140" src="<?php echo $resulthuaju['ticketspic']?>" width="150px;" height="230px;"/></a>
				</div>
				<div class="col-sm-6 column">
					<p style="padding-top:25%;">
						<?php 
							$text4=$resulthuaju['ticketname'];
							if(mb_strlen($text4, 'utf8') > 18)
								echo mb_substr($text4, 0, 18, 'utf8').'...';
							else 
								echo $text4;
						?>
					</p>
					<p >
						<?php echo $resulthuaju['ticketplace'];?>
					</p>
					<p >
						<strong style="color:red;"><?php echo $resulthuaju['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		<?php
			}while($resulthuaju=mysqli_fetch_array($sqlhuaju));
		}
		?>
	</div>

		
	<div class="row clearfix visible-xs" style="border-bottom:1px solid #ccc; padding-bottom:10px;">
		<?php
		$sqlhuaju=mysqli_query($connID,"select * from tb_last_ticket where tickettype='2' limit 0,4");
		$resulthuaju=mysqli_fetch_array($sqlhuaju);
		if($resulthuaju==false){
			echo "暂无话剧!";
		}
		else{
			do{
		?>
		<div class="col-xs-6 column">
			<div class="row clearfix">
				<div class="col-xs-12 column text-center">
					<a href="indexsearch1.php?ticket=<?php echo $resulthuaju['ticketname'];?>&type=<?php echo $resulthuaju['tickettype'];?>"><img class="img" alt="140x140" src="<?php echo $resulthuaju['ticketspic']?>" width="150px;" height="230px;"/></a>
					<p  class="text-center" style="padding-top:5%;">
						<strong>
						<?php 
								$text4=$resulthuaju['ticketname'];
								if(mb_strlen($text4, 'utf8') > 18)
									echo mb_substr($text4, 0, 18, 'utf8').'...';
								else 
									echo $text4;
						?></strong>
					</p>
					<p  class="text-center" >
						<strong style="color:red"><?php echo $resulthuaju['ticketlowprice'];?></strong>元起
					</p>
				</div>
			</div>
		</div>
		<?php
			}while($resulthuaju=mysqli_fetch_array($sqlhuaju));
		}
		?>
	</div>


	<div class="row clearfix">
		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 column"><h3 style="font-size:25px;">专题推荐</h3></div>
		<div class="col-md-6  col-lg-6 col-sm-6 col-xs-6  column text-right"><h3 style="font-size:16px;"><a href="moreessay1.php" style="color:#000; text-decoration:none;">查看全部</a></h3></div>
	</div>
	<div class="row clearfix visible-lg visible-md">
		<div class="col-md-12 col-lg-12 column">
			<div class="row">
			<?php 
			$sqlessay=mysqli_query($connID,"select * from tb_last_essay order by essaytime desc limit 0,3");
			$resultessay=mysqli_fetch_array($sqlessay);
			if($resultessay==false){
				echo "暂无专题!";
			}
			else{
				do{
			?>
				<div class="col-lg-4 col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="<?php echo $resultessay['essaypic'];?>" />
						<div class="caption">
							<h4>
								<?php echo $resultessay['essaytitle'];?>
							</h4>
							<h5>
								<?php echo $resultessay['essaybanner'];?>
							</h5>
							<p>
								 <a class="btn btn-warning" href="essay1.php?title=<?php echo $resultessay['essaytitle'];?>">enter</a>
							</p>
						</div>
					</div>
				</div>
			<?php
				}while($resultessay=mysqli_fetch_array($sqlessay));
			}
			?>

			</div>
		</div>
	</div>

	<div class="row clearfix visible-sm">
		<div class="col-sm-12 column">
			<div class="row">
			<?php 
			$sqlessay=mysqli_query($connID,"select * from tb_last_essay order by essaytime desc limit 0,2");
			$resultessay=mysqli_fetch_array($sqlessay);
			if($resultessay==false){
				echo "暂无专题!";
			}
			else{
				do{
			?>
				<div class="col-sm-6">
					<div class="thumbnail">
						<img alt="300x200" src="<?php echo $resultessay['essaypic'];?>" />
						<div class="caption">
							<h4>
								<?php echo $resultessay['essaytitle'];?>
							</h4>
							<h5>
								<?php echo $resultessay['essaybanner'];?>
							</h5>
							<p>
								 <a class="btn btn-warning" href="essay1.php?title=<?php echo $resultessay['essaytitle'];?>">enter</a>
							</p>
						</div>
					</div>
				</div>
			<?php
				}while($resultessay=mysqli_fetch_array($sqlessay));
			}
			?>

			</div>
		</div>
	</div>


	<div class="row clearfix visible-xs">
		<div class="col-xs-12 column">
			<div class="row">
			<?php 
			$sqlessay=mysqli_query($connID,"select * from tb_last_essay order by essaytime desc limit 0,1");
			$resultessay=mysqli_fetch_array($sqlessay);
			if($resultessay==false){
				echo "暂无专题!";
			}
			else{
				do{
			?>
				<div class="col-xs-12" style="max-width:400px;">
					<div class="thumbnail">
						<img alt="300x200" src="<?php echo $resultessay['essaypic'];?>" />
						<div class="caption">
							<h4>
								<?php echo $resultessay['essaytitle'];?>
							</h4>
							<h5>
								<?php echo $resultessay['essaybanner'];?>
							</h5>
							<p>
								 <a class="btn btn-warning" href="essay1.php?title=<?php echo $resultessay['essaytitle'];?>">enter</a>
							</p>
						</div>
					</div>
				</div>
			<?php
				}while($resultessay=mysqli_fetch_array($sqlessay));
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