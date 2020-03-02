<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>文章管理</title>
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
</style>
</head>
<body>
<?php
if(isset($_SESSION['uname']))
$name=$_SESSION['uname'];
?>


<div class="navbar hidden-xs" role="navigation"> 
    <div class="container"> 
        <div class="navbar-header hidden-xs"> 
            <a class="navbar-brand" href="../index.php"><img src="images/chujian (1).jpg" width="75px" height="41px"/></a> 
        </div> 
        <ul class="nav navbar-nav navbar-right"> 
		<?php
			if(!isset($name)){
		?>
            <li style="display:inline-block;"><a href="login.php" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;登录</a></li> 
            <li style="display:inline-block;"><a href="registion.php" style="color:#000;"><span class="glyphicon glyphicon-log-in"></span>&nbsp;注册</a></li> 
			<li style="display:inline-block;"><a href="checkadmin.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;后台管理</a></li> 
		<?php
			}else{
		?>
			<li style="display:inline-block;"><a href="#" style="color:#000;"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $name;?></a></li> 
			<li style="display:inline-block;"><a href="../index.php" style="color:#000;"><span class="glyphicon glyphicon-th"></span>&nbsp;购票系统</a></li> 
            <li style="display:inline-block;"><a href="../unset.php" style="color:#000;"><span class="glyphicon glyphicon-minus-sign"></span>&nbsp;退出</a></li>  
        <?php
			}
		?>
	    </ul> 
    </div> 
</div>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid"> 
	<div class="navbar-header">
    <a class="navbar-brand" href="../index.php" style="color:#fff; font-family:方正舒体">初见票务</a> 
		<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#example-navbar-collapse">
			<span class="sr-only">切换导航</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand active" href="index.php">首页</a>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
            <li class="visible-xs">
							<?php
								if(!isset($name)){
							?>
								<li class="visible-xs" style="display:inline-block;"><a href="login.php" style="color:#eee;"><span class="glyphicon glyphicon-user"></span></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="login.php" style="color:#eee;"><span class="glyphicon glyphicon-log-in"></span></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="checkadmin.php" style="color:#eee;"><span class="glyphicon glyphicon-th"></span></a></li> 
							<?php
								}else{
							?>
								<li class="visible-xs" style="display:inline-block;"><a href="#" style="color:rgb(157,157,157); text-decoration:none;"></span>&nbsp;<?php echo $name;?></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="../index.php" style="color:rgb(157,157,157);">购票系统</a></li> 
								<li class="visible-xs" style="display:inline-block;"><a href="../unset.php"style="color:rgb(157,157,157);">退出</a></li> 
							<?php
								}
							?>
			</li>
			<li><a href="index.php">用户管理</a></li>
            <li><a href="order.php">订单管理</a></li>
            <li><a href="gym.php">场馆管理</a></li>
            <li><a href="comment.php">评论管理</a></li>
            <li><a href="ticket.php">演出票管理</a></li>
            <li class="active"><a href="essay.php">文章管理</a></li>
		</ul>
	</div>
	</div>
</nav>


<div class="container bottomtopna">
    <ul id="myTab">
        <li class="active gym addwarning"><a href="#add" data-toggle="tab" style="color:#fff; text-decoration:none;">添加文章</a></li>
        <li class="gym addinfo"><a href="#delete" data-toggle="tab"  style="color:#fff; text-decoration:none;">删除文章</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active addwarningbg" id="add">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <form class="bs-example bs-example-form" role="form" method="post" enctype="multipart/form-data" method="post" action="addessay.php">
                        <div class="row clearfix">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="row clearfix">
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon addwarning"></span>
                                                <input name="essaytitle" type="text" class="form-control" placeholder="添加文章标题" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon addsuccess"></span>
                                                <input name="essaybanner" type="text" class="form-control" placeholder="添加文章副标题" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row clearfix text-center" style="margin-top:10px;">
                            <div class="col-md-offset-1 col-md-10" style="background:#fff; border-radius:10px; padding:10px 0px;">
                                <h3>添加文章内容</h3>
                                <textarea name="essay" style="width:90%; height:100%; resize:none; min-height: 200px; margin: 10px; border-radius:5px; border:1px solid #ccc;" placeholder="添加文章内容"></textarea>
                            </div>
                        </div>                  
                        <div class="row clearfix" style="margin:10px; border-bottom:1px solid #eee;">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row clearfix">
                                    <div class="col-md-12"><h3>添加文章相关图片:</h3><input id="file1"  onchange="showImg('file1','img1')" type="file" name="image" required/>
                                    </div>
                                </div>
                                <div class="row clearfix" style=" margin-top:10px;">
                                    <div class="col-md-12"><img src="" height="200" id="img1"></div>
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
                <caption>所有文章信息</caption>
                <thead>
                    <tr>
                    <th class="info">文章标题</th>
                    <th class="info">文章副标题</th>
                    <th class="info">文章内容</th>
                    <th class="info">发表时间</th>
                    <th class="info">删除</th>
                    </tr>
                </thead>
            
                <tbody>
                <?php
                    $sql=mysqli_query($connID,"select * from tb_last_essay");
                    $result=mysqli_fetch_array($sql);
                    if($result){
                            do{
                               
                ?>
                    <tr>
                        <td><?php echo $result['essaytitle'];?></td>
                        <td><?php echo $result['essaybanner'];?></td>
                        <td>
                        <?php
                            $essay=$result['essay'];
                            if(mb_strlen($essay,'utf8')>150){
                                echo mb_substr($essay,0,20,'utf-8').'...';
                            }else{
                                echo $essay;
                            }
                        ?>
                        </td>
                        <td><?php echo $result['essaytime'];?></td>
                        <td>
                            <a href="deleteessay.php?title=<?php echo $result['essaytitle'];?>"><i class="glyphicon glyphicon-trash"></i></a>  
                        </td>
                       
                    </tr>
                    
                <?php
                          
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
