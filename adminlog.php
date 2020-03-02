<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="卢漪"/>
	<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
	<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Log in</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body{
    background:rgb(239,110,53);
    }
.container-fluid{
    background:url("images/bg.jpg") no-repeat top right;
}
.login-page {
	
	padding: 18% 0 0 0;
	margin:0 auto;
   
}
.form {
    border-radius:5px;
	position: relative;
	z-index: 1;
	background:rgba(255,255,255,0.5);
	max-width: 360px;
	margin: 0 auto ;
	padding: 45px;
	text-align: center;
	box-shadow: 0 0 30px 0 rgba(255,255,255, 0.7);
}
.form input {
	font-family: "Roboto", sans-serif;
	outline: 0;
	background: #f2f2f2;
	width: 100%;
	border: 0;
	margin: 0 0 15px 0;
	padding: 15px;
	box-sizing: border-box;
	font-size: 14px;
}
.form .submitlog {
	font-family: "Microsoft YaHei", "Roboto", sans-serif;
	text-transform: uppercase;
	outline: 0;
	background:rgba(239,110,53,0.8);
	width: 100%;
	border: 0;
	padding: 15px;
	color: #FFFFFF;
	font-size: 14px;
	-webkit-transition: all 0.3 ease;
	transition: all 0.3 ease;
	cursor: pointer;
}
.form .submitlog:hover, .form .submitlog:active, .form .submitlog:focus {
	background:rgba(239,110,53,1);
}
.form .message {
	margin: 15px 0 0 0;
	color: #b3b3b3;
	font-size: 12px;
}
.form .message a {
	color: #fff;
	text-decoration: none;
}
.form .register-form {
	display: none;
}

p.center {
	color: #fff;
	font-family: "Microsoft YaHei";
}

@media(max-width:628px){
	.container-fluid{
    background:none;
    padding-bottom:100px;
	}
}

</style>
<script src="js/ajax.js"></script>
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
<div class="container-fluid" style="padding-bottom:120px;">
    <div class="container">
		<div id="wrapper" class="login-page center-block">
			<div id="login_form" class="form" method="post">
				<form class="register-form" name="regis" method="post" action="registionadmin.php" >
                    <p><h4 style="font-weight:bold; color:#fff">管理员注册</h4></p>
					<div class="row clearfix">
						<div class="col-md-12">
							<input type="text" name="username"  placeholder="用户名" onBlur="checkName(regis)" required/>
						</div>
						
					</div>
					<div class="row clearfix">
						<div class="col-md-12 text-left" id="user" style="font-size:12px; color:red; padding-left:5%;"></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12">
							<input type="password" name="pwd" placeholder="密码" onBlur="inputpwd(regis)"  />
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 text-left" id="pass" style="font-size:12px; color:red; padding-left:5%;"></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12">
							<input type="password" name="checkpwd" placeholder="确认密码" onBlur="checkpwdbool(regis)" required/>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12">
							<input type="submit" class="submitlog" id="create" value="创建账户">
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-11">
							<p class="message">已经有了一个账户? <a href="#">立刻登录</a></p>
						</div>
					</div>
				</form>
				<form class="login-form" method="post" action="checkuser.php">
                        <p><h4 style="font-weight:bold; color:#fff">管理员登录</h4></p>
						<input type="text" name="username" placeholder="用户名" value="admin" id="user_name" required/>
						<input type="password" name="pwd"   placeholder="密码" value="1111111" id="password" required/>
                        <input name="submitlog" class="submitlog" type=submit id="login" value="登录">
                        <a href="login.php"><input type="button" class="submitlog" value="用户登录" style="color:#000;"/></a>
						<p class="message">还没有账户? <a href="#">立刻创建</a></p>
				</form>
			</div>
		</div>
    </div>
</div>
<div class="container-fluid hidden-xs"  style="background:#000; color:#fff;padding-top:20px; padding-bottom:20px;">
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
<div class="container-fluid footer"  style="background:rgba(0,0,0,0.9); color:#fff; height:60px;">	
		<div class="row clearfix text-center">
			<div class="col-md-11 column" >
				Creative By 卢漪LUYI © 2019 
			</div>
		</div>
</div>
    <script type="text/javascript">
	$(function(){
		$("#create").click(function(){
			check_register();
			return false;
		})
		$("#login").click(function(){
			check_login();
			return false;
		})
		$('.message a').click(function () {
		    $('form').animate({
		        height: 'toggle',
		        opacity: 'toggle'
		    }, 'slow');
		});
	})
	</script>
</body>
</html>
