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
	<title>演出票管理</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php 
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	session_start();
	include("../conn.php");
    ?>
<style>
.gym{
    width:130px;
    height:42px;
    display: inline-block;
    padding: 9px 12px;
    margin-bottom: 0;
    font-size: 16px;
    font-weight: 350;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border-radius: 4px;
}
.gym:hover{
    opacity:0.85;
}
.gym:visited{
    background:red;
}
.addwarning{
    background-color: #f0ad4e;
    border-color: #eea236;
}
.addsuccess{
    background-color: #5cb85c;
    border-color: #4cae4c;
}
.addinfo{
    background-color: #5bc0de;
    border-color: #46b8da;

}
.tab-content{
    border-top:1px solid #999;
    padding-top:20px;
}
.addwarningbg{
    background:rgb(254,247,238);
    padding:20px;
}
.addsuccessbg{
    background:rgb(239,248,239);
    padding:20px;

}
.addinfobg{
    background:rgb(239,249,252);
    padding:20px;

}
.addred{
    background:rgb(234,67,53);
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
						<li  class="active"><a href="ticket.php">演出票管理</a></li>
						<li><a href="essay1.php">文章管理</a></li>

					</ul>
			</div>
    </div>
</div>


<div class="container bottomtopna">
    <ul id="myTab">
        <li class="active gym addwarning"><a href="#add" data-toggle="tab" style="color:#fff; text-decoration:none;">添加演出票</a></li>
        <li class="gym addinfo"><a href="#delete" data-toggle="tab"  style="color:#fff; text-decoration:none;">演出票详情</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active addwarningbg" id="add">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <form class="bs-example bs-example-form" role="form" method="post" enctype="multipart/form-data" method="post" action="addticket1.php">
                        <div class="row clearfix">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="row clearfix">
                                    <div class="col-md-10" style="margin-top:10px;">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon addwarning"></span>
                                                <input name="ticket" type="text" class="form-control" placeholder="添加演出票名" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-10" style="margin-top:10px;">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon addsuccess"></span>
                                                <input name="place" type="text" class="form-control" placeholder="添加演出场馆名" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-10" style="margin-top:10px;">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon addinfo"></span>
                                                <input name="tickettime" type="text" class="form-control" placeholder="添加演出时间 例如:2019-10-3 19:30" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <ul class="dowebok list-unstyled list-inline">
	                                <h3>选择演出票所属类型</h3>
                                    <li><input type="radio" name="tickettype"  value="演唱会" required>演唱会</li>
                                    <li><input type="radio" name="tickettype"  value="音乐会">音乐会</li>
                                    <li><input type="radio" name="tickettype"  value="话剧">话剧</li>
                                    <li><input type="radio" name="tickettype"  value="歌剧">歌剧</li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="row clearfix text-center" style="margin-top:10px;">
                            <div class="col-md-offset-1 col-md-10" style="background:#fff; border-radius:10px; padding:10px 0px;">
                                <h3>添加演出票相关介绍</h3>
                                <textarea name="ticketintroduce" style="width:90%; height:100%; resize:none; min-height: 120px; margin: 10px; border-radius:5px; border:1px solid #ccc;" placeholder="添加演出的相关介绍"></textarea>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="row clearfix" style="margin:10px; border-bottom:1px solid #eee;">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row clearfix">
                                    <div class="col-md-12"><h3>添加演出票的小图:</h3><input id="file1"  onchange="showImg('file1','img1')" type="file" name="image" required/>
                                    </div>
                                </div>
                                <div class="row clearfix" style=" margin-top:10px;">
                                    <div class="col-md-12"><img src="" height="200" id="img1"></div>
                                </div>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row clearfix">
                                    <div class="col-md-12"><h3>添加演出票的图:</h3><input id="file2"  onchange="showImg('file2','img2')" type="file" name="imagesmall" required/>
                                    </div>
                                </div>
                                <div class="row clearfix" style=" margin-top:10px;">
                                    <div class="col-md-12"><img title="" src="" height="200" id="img2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:10px;">
                            <div class="col-md-offset-1 col-md-8" ></div>
                            <button class="btn btn-warning" type="submit">Submit</button>
                        </div>
                        
                    </form>
                </div>
	        </div>
        </div>
        <div class="tab-pane fade addinfobg" id="delete">
            <table class="table table-bordered table-striped">
                <caption>所有演出票信息</caption>
                <thead>
                    <tr>
                    <th class="info">演出票名</th>
                    <th class="info">演出时间</th>
                    <th class="info">演出地点</th>
                    <th class="info">演出票类型</th>
                    <th class="info">删除</th>
                    <th class="info">修改</th>

                    </tr>
                </thead>
            
                <tbody>
                <?php
                    $sql=mysqli_query($connID,"select * from tb_last_ticket");
                    $result=mysqli_fetch_array($sql);
                    if($result){
                            do{
                                $id=$result['tickettype'];
                                $sql2=mysqli_query($connID,"select * from tb_last_type where id = '$id'");
                                $result2=mysqli_fetch_array($sql2);
                                if($result2){
                
                ?>
                    <tr>
                        <td><?php echo $result['ticketname'];?></td>
                        <td><?php echo $result['tickettime'];?></td>
                        <td><?php echo $result['ticketplace'];?></td>
                        <td><?php echo $result2['typeticket'];?></td>
                        <td>
                            <a href="deleteticket1.php?ticket=<?php echo $result['ticketname'];?>"><i class="glyphicon glyphicon-trash"></i></a>  
                        </td>
                        <td>
                            <a href="updateticket1.php?ticket=<?php echo $result['ticketname'];?>"><i class="glyphicon glyphicon-pencil"></i></a>  
                        </td>
                    </tr>
                    
                <?php
                            }
                        }while($result=mysqli_fetch_array($sql));
                }
                ?>
                </tbody>
            </table>
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
function showImg(fileid,target){
var preview = document.querySelector('#'+target);
var file = document.querySelector('#'+fileid).files[0];
var reader = new FileReader();
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


<script>
   $(function () {
      $('#myTab li:eq(0) a').tab('show');
   });
</script>
	
	
</body>
</html>
