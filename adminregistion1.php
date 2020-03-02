
<!DOCTYPE html>
<head>
    <title>Login</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="卢漪"/>
	<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
	<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="JS/ajax.js"></script>
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
    <link rel="stylesheet" href="CSS/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<section class="mainres">
	<div class="layer">
		
		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="index1.php">"Frist View"</a></h1>
			</div>
			<div class="links">
				<ul class="links-unordered-list">
					<li >
						<a href="adminlog1.php" class="">Login</a>
					</li>
					
					<li class="active">
						<a href="register.php" style=" color:#fff;">Register</a>
					</li>
					
				</ul>
			</div>
		</div>
		<div class="content-w3ls">
			<div class="text-center">
				<p style="font-size:30px; font-weight:bold; color:#fff; margin-bottom:3%;">管理员注册</p>
			</div>
			<div class="content-bottom">
				<form method="post" action="registionadmin1.php" name="regis">
					<div class="field-group">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="username" type="text" placeholder="Admin_name" onBlur="checkName(regis)" required>
						</div>
					</div>
					<div id="user" style="font-size:15px; color:red; padding-left:5%;"></div>
					<div class="field-group">
						<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="pwd" id="myInput" type="Password" placeholder="Password" onBlur="inputpwd(regis)" required>
						</div>
                    </div>
					<div id="pass" style="font-size:15px; color:red; padding-left:5%;"></div>
                    <div class="field-group">
						<span class="glyphicon glyphicon-check" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="checkpwd" id="myInput" type="Password" placeholder="Check Password" onBlur="checkpwdbool(regis)" required>
						</div>
                    </div>
					<div id="checkpass" style="font-size:15px; color:red; padding-left:5%;"></div>
					<div id="phone" style="font-size:15px; color:red; padding-left:5%;"></div>
					<div class="wthree-field">
						<button type="submit" name="submitlog" class="btn">Register</button>
					</div>
					<ul class="list-login">
						<li class="">
							<a href="login1.php" class="">Login Now</a>
						</li>
						<li>
							<a href="#" class="text-right">forgot password?</a>
						</li>
						<li class="clearfix"></li>
					</ul>
				</form>
			</div>
		</div>
		
    </div>
</section>
</body>
</html>
