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
	<title>修改演出票信息</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php 
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	session_start();
	include("../conn.php");
    ?>
<style>
.bottomtopna{
    margin-bottom:100px;
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
            <a class="navbar-brand" href="../index1.php"><img src="images/chujian (1).jpg" width="75px" height="41px"/></a> 
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
			<li style="display:inline-block;"><a href="#" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $name;?></a></li> 
			<li style="display:inline-block;"><a href="../index1.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;购票系统</a></li> 
            <li style="display:inline-block;"><a href="../unset1.php" style="color:#000;"><span class="glyphicon glyphicon-minus-sign"></span>&nbsp;退出</a></li>
        <?php
			}
		?>
	    </ul> 
    </div> 
</div>
<div class="navbar navbar-inverse float" role="navigation" id="bignav">
    <div class="container-fluid"> 
			<div class="navbar-header">
			<a class="navbar-brand" href="../index1.php" style="color:#fff; font-family:方正舒体">初见票务</a> 
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
								<li class="visible-xs" style="display:inline-block;"><a href="#" style="color:rgb(157,157,157); text-decoration:none;"></span>&nbsp;<?php echo $name;?></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="../index1.php" style="color:rgb(157,157,157);">购票系统</a></li> 
								<li class="visible-xs" style="display:inline-block;"><a href="../unset1.php"style="color:rgb(157,157,157);">退出</a></li> 
							<?php
								}
							?>
						</li>
						<li><a href="../index2.php">用户管理</a></li>
						<li><a href="order1.php">订单管理</a></li>
						<li><a href="gym1.php">场馆管理</a></li>
						<li><a href="comment1.php">评论管理</a></li>
						<li class="active"><a href="ticket1.php">演出票管理</a></li>
						<li><a href="essay1.php">文章管理</a></li>

					</ul>
			</div>
    </div>
</div>

<div class="container bottomtopna">
    <div class="row clearfix" style="background:#eee; padding:20px;">
        <div class="col-md-3 text-center" >
            <?php
                $ticket=$_GET['ticket'];
                $sql=mysqli_query($connID,"select * from tb_last_ticket where ticketname = '$ticket'");
                $result=mysqli_fetch_array($sql);
                if($sql){
            ?>
            
            <div class="row clearfix" style="border:1px solid #ccc;padding:10px;">
                <div class="col-md-12">
                    <ul class="list-unstyled">
                        <li><img src="../<?php echo $result['ticketspic'];?>" width="170px" height="220px;" style="border-radius:5px; margin-bottom:10px;"></li>
                        <li><?php echo $result['ticketname'];?></li>
                        <li><?php echo $result['ticketplace'];?></li>
                        <li><?php echo $result['tickettime'];?></li>
                    </ul>
                </div>
            </div>
            <div class="row clearfix" style="border:1px solid #ccc;padding:10px;">
                <div class="col-md-12">
                    <p><h4>演出介绍</h4></p>
                    <p class="text-left">
                        <?php $content=$result['ticketintroduce'];$replace=str_replace('\n','<br>',$content); echo $replace;?>
                    </p>
                </div>
            </div>

            <?php
                }
            ?>
        </div>
        <div class="col-md-9">
                <div class="row clearfix">
                    <form action="updateticketaction.php?ticketname=<?php echo $result['ticketname'];?>" method="post">
                        <div class="col-md-12">
                            <h4 class="text-center">修改演出票相关信息</h4>
                            <div class="row clearfix">
                                <div class="col-md-12" style="margin-top:10px;">
                                     <div class="input-group input-group-lg">
                                        <span class="input-group-addon addwarning"></span>
                                            <input name="ticket" type="text" class="form-control" placeholder="修改演出票名" value="<?php echo $result['ticketname'];?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-12" style="margin-top:10px;">
                                   <div class="input-group input-group-lg">
                                        <span class="input-group-addon addsuccess"></span>
                                            <input name="place" type="text" class="form-control" placeholder="修改演出场馆名" value="<?php echo $result['ticketplace'];?>">
                                    </div>
                                </div>
                            
                                <div class="col-md-12" style="margin-top:10px;">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon addinfo"></span>
                                            <input name="tickettime" type="text" class="form-control" placeholder="添加演出时间" value="<?php echo $result['tickettime'];?>">
                                    </div>                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <ul class="list-unstyled list-inline">
                                        <h4>选择演出票所属类型</h4>
                                        <li><input type="radio" name="tickettype"  value="演唱会">演唱会</li>
                                        <li><input type="radio" name="tickettype"  value="音乐会">音乐会</li>
                                        <li><input type="radio" name="tickettype"  value="话剧">话剧</li>
                                        <li><input type="radio" name="tickettype"  value="歌剧">歌剧</li>
                                    </ul>
                                </div>
                                <div class="col-md-12 text-center">
                                    <h4>添加演出票相关介绍</h4>
                                    <textarea name="ticketintroduce" style="width:95%; height:100%; resize:none; min-height: 120px; margin: 10px; border-radius:5px; border:1px solid #ccc;" placeholder="添加演出的相关介绍">
                                        
                                    </textarea>
                                </div>
                                <div class="col-md-12">
                                    <h3>添加演出票的大图:</h3><input id="image"  onchange="previewFile()" type="file" name="image"/>
                                </div>
                                <div class="col-md-12"><img title="" src="" height="200"></div>
                                <div class="col-md-12 text-right"> <button class="btn btn-warning" type="submit">Submit</button></div>
                            </div>
                        </div>
                    </form>
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
<script>
		function previewFile() {
			var preview = document.querySelector('img[title]');
			var file    = document.querySelector('input[type=file]').files[0];
			var reader  = new FileReader();
			reader.onloadend = function () {
				preview.src = reader.result;
			}

			if (file) {
				reader.readAsDataURL(file);
			} else {
				preview.src = "";
			}
           
		}
</script>
	
</body>
</html>
