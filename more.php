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
include("conn.php");?>
<title>查看更多</title>
<link rel="stylesheet" type="text/css" href="CSS/more.css">
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
.btn{
	width:30%;
}
.section{
	margin-top:1%;
}
.boxdiv{
	border:1px solid #eeeeee;
	padding:1%;
	margin:2% 4%;
	box-shadow:1px 1px 5px #eee;
	
}
.boxdivpa{
	padding-top:20%;
}
.fontcolor{
	font-size:20px;
	color:rgb(221,78,66);
}
div a:hover{
	text-decoration:none;
	color:rgb(221,78,66);
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
$name=$_SESSION['uname']
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
	<div class="row clearfix visible-lg visible-md">
		<div class="col-md-12 col-sm-12 column">
			<div class="panel-group" id="panel-116719">
				<div class="panel panel-default">
					<div class="panel-heading text-right">
						<div class="col-md-1 col-sm-1 "><strong>按城市：</strong></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=广州">广州</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=上海">上海</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=重庆">重庆</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=东莞">东莞</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=南京">南京</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=佛山">佛山</a></div>
						<a class="panel-title collapsed" href="#panel-element-908198" data-toggle="collapse" data-parent="#panel-116719">更多</a>
					</div>
					<div class="panel-collapse collapse" id="panel-element-908198">
						<div class="panel-body">
							<div class="row clearfix">
								<div class="col-md-1 col-sm-1"><a href="more.php?type=place&keyword=长春">长春</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=常德">常德</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=长沙">长沙</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=常州">常州</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=大理">大理</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=大连">大连</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=达州">达州</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=福州">福州</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=甘南">甘南</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=广元">广元</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=贵阳">贵阳</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=海东">海东</a></div>
								<div class="col-md-1 col-sm-1"><a href="more.php?type=place&keyword=哈尔滨">哈尔滨</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=杭州">杭州</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=汉中">汉中</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=合肥">合肥</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=衡阳">衡阳</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=贺州">贺州</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=淮安">淮安</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=黄山">黄山</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=呼伦贝尔">呼伦贝尔</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=湖州">湖州</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=嘉兴">嘉兴</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=吉林">吉林</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=济南">济南</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=荆州">荆州</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=济宁">济宁</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=九江">九江</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=开封">开封</a></div>
								<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=昆明">昆明</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading text-right">
						<div class="col-md-1 col-sm-1 "><strong>按人物：</strong></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=林俊杰">林俊杰</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=五月天">五月天</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=吴青峰">吴青峰</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=邓紫棋">邓紫棋</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=林宥嘉">林宥嘉</a></div>
						<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=孙燕姿">孙燕姿</a></div>
						<a class="panel-title" href="#panel-element-93967" data-toggle="collapse" data-parent="#panel-116719">更多</a>
					</div>
					<div class="panel-collapse collapse" id="panel-element-93967">
						<div class="panel-body">
							<div class="col-md-1 col-sm-1 "><a href="more.php?keyword=李宗盛">李宗盛</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=吴亦凡">吴亦凡</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=莫文蔚">莫文蔚</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=韩雪">韩雪</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=周杰伦">周杰伦</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=吴克群">吴克群</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=A-Lin">A-Lin</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=花粥">花粥</a></div>
							<div class="col-md-1 col-sm-1" ><a href="more.php?type=other&keyword=华晨宇">华晨宇</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=毛不易">毛不易</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=陈奕迅">陈奕迅</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=李荣浩">李荣浩</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=蔡健雅">蔡健雅</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=田馥甄">田馥甄</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=张学友">张学友</a></div>
							<div class="col-md-1 col-sm-1 "><a href="more.php?type=other&keyword=汪苏泷">汪苏泷</a></div>
							<div class="col-md-1 col-sm-1" ><a href="more.php?type=other&keyword=张杰">张杰</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row clearfix text-center">
		<div class="col-md-12 column">
			<div class="row clearfix">
			<?php 
			if(isset($_POST['indexsearch'])){
				//if(isset($_POST['submit'])){
					$gettype="other";
					$getkeyword=$_POST['indexsearch'];
				}else{
					$gettype=$_GET['type'];
					$getkeyword=$_GET['keyword'];
				}
				//echo $getkeyword;
				
				if($getkeyword==''){
					echo "搜索内容为空";
				}else{
					if($gettype=='other'){
						$result=mysqli_query($connID,"select * from tb_last_ticket where ticketname like '%".$getkeyword."%' ");
						$row=mysqli_fetch_array($result);  
						//echo $getkeyword;
					}else if($gettype=='navication'){
						$result=mysqli_query($connID,"select * from tb_last_ticket where tickettype = '$getkeyword' ");
						$row=mysqli_fetch_array($result);  
					} 
						if($row){
							do{
			?>

				<div class="col-md-5 col-sm-5 visible-lg visible-md  visible-sm column boxdiv">
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 column">
							<div class="row clearfix ">
								<div class="col-md-6 col-sm-6 column text-center">
									<a href="indexsearch.php?ticket=<?php echo $row['ticketname'];?>&type=<?php echo $row['tickettype'];?>"><img alt="140x140" src="<?php echo $row['ticketspic']?>"  width="150px;" height="210px;"/></a>
								</div>
								<div class="col-md-6 col-sm-6 column">
									<ol class="list-unstyled text-left">
										<li class="boxdivpa">
											<?php echo $row['ticketname'];?>
										</li>
										<li>
											<?php echo $row['tickettime'];?>
										</li>
										<li>
											<?php echo $row['ticketplace'];?>
										</li>
										<li class="boxdivpa text-right">
											<strong class="fontcolor"><?php echo $row['ticketlowprice'];?></strong>元起
										</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix boxdiv">
						<div class="col-md-9 col-sm-9 column">
							<ul class="list-unstyled list-inline">
								<li>
									Lorem 
								</li>
								<li>
									Consectetur 
								</li>
								<li>
									Integer 
								</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="col-xs-11 visible-xs column boxdiv">
					<div class="row clearfix">
						<div class=" col-xs-12 column">
							<div class="row clearfix ">
								<div class="col-xs-5 column text-center">
									<a href="indexsearch.php?ticket=<?php echo $row['ticketname'];?>&type=<?php echo $row['tickettype'];?>"><img alt="140x140" src="<?php echo $row['ticketspic']?>"  width="150px;" height="210px;"/></a>
								</div>
								<div class="col-xs-7 column" style="padding-left:8%;">
									<ol class="list-unstyled text-left">
										<li class="boxdivpa">
											<?php echo $row['ticketname'];?>
										</li>
										<li>
											<?php echo $row['tickettime'];?>
										</li>
										<li>
											<?php echo $row['ticketplace'];?>
										</li>
										<li class="boxdivpa text-right">
											<strong class="fontcolor"><?php echo $row['ticketlowprice'];?></strong>元起
										</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix boxdiv">
						<div class="col-xs-9 column">
							<ul class="list-unstyled list-inline">
								<li>
									Lorem 
								</li>
								<li>
									Consectetur 
								</li>
							</ul>
						</div>
					</div>
				</div>

				<?php
							}while($row=mysqli_fetch_array($result));
						}else{
							echo "暂无相关演出";
						}
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