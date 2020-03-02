<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>修改用户信息</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ajax.js"></script>
    <?php 
		header( "Content-type:text/html; charset=utf-8" ); //设置文件编码格式
		session_start();
		include("../conn.php");
	?>
<style>
.select{
    width:60px;
    height:24px;
}
.ma{
    margin-top:20px;
}
.bottomtopna{
    margin-bottom:100px;
}
</style>
</head>
<body>
<script>
//检测密码
function inputpwd(form){
    if(form.postpwd.value.length<7){
        document.getElementById("pwddiv").innerHTML="注册密码大于等于6!";
        //alert("注册密码长度应大于等于6!");
        form.postpwd.select();
        return(false);
    }else{
        document.getElementById("pwddiv").innerHTML="";
    }
}
function inputcard(form){
    var card = form.postcard.value;
    var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    if(!(reg.test(card))){
        document.getElementById("carddiv").innerHTML="身份证格式不对!";
        //alert("注册密码长度应大于等于6!");
        form.postcard.select();
        return(false);
    }else{
        document.getElementById("carddiv").innerHTML="";
        }
}

</script>

<script>
//检测密码
function inputpwdadd(form){
    if(form.postpwdadd.value.length<7){
        document.getElementById("pwddiv1").innerHTML="注册密码大于等于6!";
        //alert("注册密码长度应大于等于6!");
        form.postpwdadd.select();
        return(false);
    }else{
        document.getElementById("pwddiv1").innerHTML="";
    }
}
function inputcardadd(form){
    var card = form.postcardadd.value;
    var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    if(!(reg.test(card))){
        document.getElementById("carddiv1").innerHTML="身份证格式不对!";
        //alert("注册密码长度应大于等于6!");
        form.postcardadd.select();
        return(false);
    }else{
        document.getElementById("carddiv1").innerHTML="";
        }
}

</script>
<?php
if(isset($_SESSION['uname']))
$name=$_SESSION['uname'];
?>

<div class="navbar hidden-xs" role="navigation"> 
    <div class="container"> 
        <div class="navbar-header hidden-xs displayimg"> 
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
		<a class="navbar-brand" href="index.php">首页</a>
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
								<li class="visible-xs" style="display:inline-block;"><a href="modify.php" style="color:rgb(157,157,157); text-decoration:none;"></span>&nbsp;<?php echo $name;?></a></li>
								<li class="visible-xs" style="display:inline-block;"><a href="../index.php" style="color:rgb(157,157,157);">购票系统</a></li> 
								<li class="visible-xs" style="display:inline-block;"><a href="../unset.php"style="color:rgb(157,157,157);">退出</a></li> 
							<?php
								}
							?>
			</li>
			<li class="active"><a href="index.php">用户管理</a></li>
            <li><a href="order.php">订单管理</a></li>
            <li><a href="gym.php">场馆管理</a></li>
            <li><a href="comment.php">评论管理</a></li>
            <li><a href="ticket.php">演出票管理</a></li>
            <li><a href="essay.php">文章管理</a></li>
		</ul>
	</div>
	</div>
</nav>
<?php

if($_GET['user']!=$_SESSION['uname']){

?>
<div class="container bottomtopna" style="background:#eee; padding:10px; border-radius:5px;">
    <div class="row clearfix">
        <div class="col-md-8 col-md-offset-2">
            <?php
                $u=$_GET['user'];
                $sql=mysqli_query($connID,"select * from tb_last_user where user='$u'");
                $result=mysqli_fetch_array($sql);
                if($result){

               
            ?>
            <form class="bs-example bs-example-form" method="post" role="form" name="updateform" action="updateuseraction.php?user=<?php echo $_GET['user'];?>">
                <div class="row clearfix ma">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">用户名</span>
                            <input type="text" name="postuser" onBlur="checkName(updateform)" class="form-control" value="<?php echo $result['user'];?>">
                        </div>
                        <div class="text-right" id="user" style="font-size:10px; color:red;"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >真实姓名</span>
                            <input type="text" name="postname" class="form-control" value="<?php echo $result['username'];?>">
                        </div>
                    </div>
                </div>
                <div class="row clearfix ma">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >密码</span>
                            <input type="password" name="postpwd" onBlur="inputpwd(updateform)" class="form-control" value="<?php echo $result['pwd'];?>">
                        </div>
                        <div class="text-right" id="pwddiv" style="font-size:10px; color:red;"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >身份证号</span>
                            <input type="text" name="postcard" onBlur="inputcard(updateform)" class="form-control" value="<?php echo $result['usercard'];?>">
                        </div>
                        <div class="text-right" id="carddiv" style="font-size:10px; color:red;"></div>
                    </div>
                </div>
                <div class="row clearfix ma">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >电话</span>
                            <input type="text" name="posttel" onBlur="checkTeluodate(updateform)" class="form-control" value="<?php echo $result['usertel'];?>">
                        </div>
                        <div class="text-right" id="phone" style="font-size:10px; color:red;"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">出生年月</span>
                                <div class="form-control">
                                    <select  id="year" class="select" name="postyear">
											<?php
												for($i=1950;$i<=2019;$i++){
											?>
											<option value="<?php echo $i;?>" required><?php echo $i;?></option>
											
											<?php
												}
											?>
									</select>
									<select  id="month" class="select" name="postmonth">
											<?php
												for($i=1;$i<=12;$i++){
											?>
											<option value="<?php echo $i;?>" required><?php echo $i;?></option>
											<?php
												}
											?>
									</select>
									<select  id="day" class="select" name="postday">
											<?php
												for($i=1;$i<=31;$i++){
											?>
											<option value="<?php echo $i;?>" required><?php echo $i;?></option>
											
											<?php
												}
											?>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-warning ma" value="确认修改">
                    </div>
                </div>
            </form>
        <?php
                }
        ?>
        </div>
    </div>
</div>

<?php  
}else{
?>
<div class="container bottomtopna" style="background:#eee; padding:10px; border-radius:5px;">
    <div class="row clearfix">
        <div class="col-md-8 col-md-offset-2">
            <form class="bs-example bs-example-form" method="post" role="form" name="addform" action="adduser.php">
                <div class="row clearfix ma">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">用户名</span>
                            <input type="text" name="postuser" onBlur="checkName(addform)"  class="form-control" placeholder="昵称">
                        </div>
                        <div class="text-right" id="user" style="font-size:10px; color:red;"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >真实姓名</span>
                            <input type="text" name="postname" class="form-control" placeholder="真实姓名">
                        </div>
                    </div>
                </div>
                <div class="row clearfix ma">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >密码</span>
                            <input type="password" name="postpwdadd" onBlur="inputpwdadd(addform)" class="form-control" placeholder="六位以上">
                        </div>
                        <div class="text-right" id="pwddiv1" style="font-size:10px; color:red;"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >身份证号</span>
                            <input type="text" name="postcardadd" onBlur="inputcardadd(addform)" class="form-control" placeholder="身份证号">
                        </div>
                        <div class="text-right" id="carddiv1" style="font-size:10px; color:red;"></div>
                    </div>
                </div>
                <div class="row clearfix ma">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" >电话</span>
                            <input type="text" name="posttel" onBlur="checkTel(addform)" class="form-control" placeholder="电话">
                        </div>
                        <div class="text-right" id="phone" style="font-size:10px; color:red;"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">出生年月</span>
                                <div class="form-control">
                                    <select  id="year" class="select" name="postyear">
											<?php
												for($i=1950;$i<=2019;$i++){
											?>
											<option required><?php echo $i?></option>
											
											<?php
												}
											?>
									</select>
									<select  id="month" class="select" name="postmonth">
											<?php
												for($i=1;$i<=12;$i++){
											?>
											<option required><?php echo $i?></option>
											<?php
												}
											?>
									</select>
									<select  id="day" class="select" name="postday">
											<?php
												for($i=1;$i<=365;$i++){
											?>
											<option required><?php echo $i?></option>
											
											<?php
												}
											?>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-warning ma" value="确认添加">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
}
?>
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
