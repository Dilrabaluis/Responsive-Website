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
	<title>后台管理</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php 
		header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
		session_start();
		include("conn.php");
	?>
<style>
.addsuccessbg{
    background:rgb(239,248,239);
    padding:20px;

}
.bottomtopna{
    margin-bottom:100px;
}
tr td{
	word-break:break-all;
}
</style>
</head>
<body>
<?php
if(isset($_SESSION['uname']))
	$name=$_SESSION['uname'];
else{
	echo "<script>alert('请先进入管理员登录'); window.location='adminlog1.php'</script>";
}
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
			<li style="display:inline-block;"><a href="#" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $name;?></a></li> 
			<li style="display:inline-block;"><a href="index1.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;购票系统</a></li> 
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
								<li class="visible-xs" style="display:inline-block;"><a href="login1.php" style="color:#eee;"><span class="glyphicon glyphicon-log-in"></span></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="checkadmin1.php" style="color:#eee;"><span class="glyphicon glyphicon-th"></span></a></li> 
							<?php
								}else{
							?>
								<li class="visible-xs" style="display:inline-block;"><a href="#" style="color:rgb(157,157,157); text-decoration:none;"></span>&nbsp;<?php echo $name;?></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="index1.php" style="color:rgb(157,157,157);">购票系统</a></li> 
								<li class="visible-xs" style="display:inline-block;"><a href="unset1.php"style="color:rgb(157,157,157);">退出</a></li> 
							<?php
								}
							?>
						</li>
						<li class="active"><a href="index2.php">用户管理</a></li>
						<li><a href="admin/order1.php">订单管理</a></li>
						<li><a href="admin/gym1.php">场馆管理</a></li>
						<li><a href="admin/comment1.php">评论管理</a></li>
						<li><a href="admin/ticket1.php">演出票管理</a></li>
						<li><a href="admin/essay1.php">文章管理</a></li>

					</ul>
			</div>
    </div>
</div>

<div class="container addsuccessbg bottomtopna">
    <table class="table table-bordered table-striped">
        <caption>用户管理</caption>
        <thead>
            <tr>
            <th class="success">用户昵称</th>
            <th class="success">真实姓名</th>
            <th class="success">电话</th>
            <th class="success">身份证号</th>
            <th class="success">删除</th>
            <th class="success">修改</th>
            <th class="success">添加</th>
            </tr>
        </thead>
      
        <tbody>
        <?php
            $sql=mysqli_query($connID,"select * from tb_last_user");
            $result=mysqli_fetch_array($sql);
            if($result){
                do{
           
        ?>
            <tr>
                <td><?php echo $result['user'];?></td>
                <td><?php echo $result['username'];?></td>
                <td><?php echo $result['usertel'];?></td>
                <td><?php echo $result['usercard'];?></td>
                
                <td class="text-center">
                    <a href="admin/deleteuser1.php?user=<?php echo $result['user'];?>" style="color:red;"><i class="glyphicon glyphicon-trash"></i></a>  
                </td>
                <td class="text-center">
                    <a href="admin/updateuser1.php?user=<?php echo $result['user'];?>" style="color:#000;"><i class="glyphicon glyphicon-pencil"></i></a>  
                </td>
                <td class="text-center">
                    <a href="admin/updateuser1.php?user=<?php echo $_SESSION['uname'];?>"><i class="glyphicon glyphicon-plus"></i></a>  
                </td>
            </tr>
            
        <?php
            }while($result=mysqli_fetch_array($sql));
        }
        ?>
        </tbody>
    </table>
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
