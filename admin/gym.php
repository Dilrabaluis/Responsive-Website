<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>添加场馆</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/jquery-labelauty.css">
    
	<?php 
	header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
	session_start();
	include("../conn.php");
    ?>
<style>
.gym{
    width:120px;
    height:38px;
    display: inline-block;
    padding: 6px 12px;
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

input.labelauty + label { 
    text-align:center;
    font: 12px "Microsoft Yahei";
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
            <li class="active"><a href="gym.php">场馆管理</a></li>
            <li><a href="comment.php">评论管理</a></li>
            <li><a href="ticket.php">演出票管理</a></li>
            <li><a href="essay.php">文章管理</a></li>
		</ul>
	</div>
	</div>
</nav>


<div class="container bottomtopna">
    <ul id="myTab">
        <li class="active gym addwarning"><a href="#add" data-toggle="tab" style="color:#fff; text-decoration:none;">添加场馆</a></li>
        <li class="gym addinfo"><a href="#delete" data-toggle="tab"  style="color:#fff; text-decoration:none;">删除场馆</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active addwarningbg" id="add">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <form class="bs-example bs-example-form" role="form" name="addgym" method="post" enctype="multipart/form-data" action="upimage.php">
                        <div class="row clearfix">
                            <div class="col-md-5 col-md-offset-1">
                                <h3>添加场馆相关信息</h3>
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
                                                <input name="place" type="text" class="form-control" placeholder="添加场馆名"  required>
                                        </div>
                                        <div id="gym" syule="color:red;"></div>
                                    </div>
                                
                                    <div class="col-md-10" style="margin-top:10px;">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon addinfo"></span>
                                                <input name="ticketnum" type="text" class="form-control" placeholder="添加演出票数量" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <ul class="dowebok list-unstyled list-inline">
	                                <h3>选择VIP所需区域</h3>
                                    <li><input type="checkbox" name="VIP1" checked data-labelauty="VIP1" value="VIP1"></li>
                                    <li><input type="checkbox" name="VIP2" data-labelauty="VIP2" value="VIP2"></li>
                                    <li><input type="checkbox" name="VIP3" data-labelauty="VIP3" value="VIP3"></li>
                                    <li><input type="checkbox" name="VIP4" data-labelauty="VIP4" value="VIP4"></li>
                                    <h3>选择普通票所需区域</h3>
                                    <li><input type="checkbox" name="A" data-labelauty="A" value="A"></li>
                                    <li><input type="checkbox" name="B" data-labelauty="B" value="B"></li>
                                    <li><input type="checkbox" name="C" data-labelauty="C" value="B"></li>
                                    <li><input type="checkbox" name="D" data-labelauty="D" value="D"></li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>VIP1</h3>
                                    <div class="col-md-4"><input name="VIP1row" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="VIP1col" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="VIP1price" type="text" class="form-control" placeholder="票价"></div>   
                            </div>
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>VIP2</h3>
                                    <div class="col-md-4"><input name="VIP2row" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="VIP2col" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="VIP2price" type="text" class="form-control" placeholder="票价"></div>  
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:10px;">
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>VIP3</h3>
                                    <div class="col-md-4"><input name="VIP3row" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="VIP3col" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="VIP3price" type="text" class="form-control" placeholder="票价"></div>  
                            </div>
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>VIP4</h3>
                                    <div class="col-md-4"><input name="VIP4row" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="VIP4col" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="VIP4price" type="text" class="form-control" placeholder="票价"></div>  
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:10px;">
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>A</h3>
                                    <div class="col-md-4"><input name="Arow" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="Acol" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="Aprice" type="text" class="form-control" placeholder="票价"></div>   
                            </div>
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>B</h3>
                                    <div class="col-md-4"><input name="Brow" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="Bcol" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="Bprice" type="text" class="form-control" placeholder="票价"></div>  
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:10px;">
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>C</h3>
                                    <div class="col-md-4"><input name="Crow" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="Ccol" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="Cprice" type="text" class="form-control" placeholder="票价"></div>  
                            </div>
                            <div class="col-md-offset-1 col-md-4 text-center" style="background:#fff; border-radius:10px; padding:15px 0px;">
                                <h3>D</h3>
                                    <div class="col-md-4"><input name="Drow" type="text" class="form-control" placeholder="行数"></div>
                                    <div class="col-md-4"><input name="Dcol" type="text" class="form-control" placeholder="列数"></div>
                                    <div class="col-md-4"><input name="D price" type="text" class="form-control" placeholder="票价"></div>  
                            </div>
                        </div>
                        <div class="row clearfix" style="margin:10px; border-bottom:1px solid #eee;">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row clearfix">
                                    <div class="col-md-12"><h3>添加演出票的座位图:</h3><input id="image"  onchange="previewFile()" type="file" name="image"/>
                                    </div>
                                </div>
                                <div class="row clearfix" style=" margin-top:10px;">
                                    <div class="col-md-12"><img src="" height="200"></div>
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
                <caption>删除场馆</caption>
                <thead>
                    <tr>
                    <th class="info">场馆名</th>
                    <th class="info">场馆座位图</th>
                    <th class="info"></th>
                    </tr>
                </thead>
            
                <tbody>
                <?php
                    $sql=mysqli_query($connID,"select * from tb_last_place where placeid in (select max(placeid) from tb_last_place group by placename)");
                    $result=mysqli_fetch_array($sql);
                    if($result){
                            do{
                
                ?>
                    <tr>
                        <td><?php echo $result['placename'];?></td>
                        <td><img src="<?php echo $result['placeseatpic'];?>" class="img-responsive" width="300px;" height="220px;"></td>
                        <td>
                            <a href="deletegym.php?place=<?php echo $result['placename'];?>"><i class="glyphicon glyphicon-trash"></i></a>  
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
		function previewFile() {
			var preview = document.querySelector('img');
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

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery-labelauty.js"></script>
<script>
$(function(){
	$(':input').labelauty();
});
</script>
<script>
   $(function () {
      $('#myTab li:eq(0) a').tab('show');
   });
</script>
</body>
</html>
