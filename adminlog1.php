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
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body>

<section class="main">
	<div class="layer">
		
		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="index1.php">"Frist View"</a></h1>
			</div>
			<div class="links">
				<ul class="links-unordered-list">
					<li class="active">
						<a href="#" class="">Login</a>
					</li>
					
					<!-- <li class="">
						<a href="adminregistion1.php" class="" style=" color:#fff;">Register</a>
					</li>
					 -->
				</ul>
			</div>
		</div>
		<div class="content-w3ls">
			<div class="text-center" style="font-size:36px; font-weight:bold; color:#fff; margin-bottom:3%; ">
				管理员登录
			</div>
			<div class="content-bottom">
				<form method="post" action="checkuser1.php">
					<div class="field-group">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="username" id="text1" type="text" value="admin" placeholder="Admin_name" required>
						</div>
					</div>
					

					<div class="field-group">
						<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="pwd" id="myInput" type="Password" value="1111111" placeholder="Password" required>
						</div>
					</div>
					<div class="wthree-field">
						<button type="submit" name="submitlog" class="btn">Login</button>
					</div>
					<ul class="list-login">
						<li class="">
							<a href="registion1.php" class="">Create Account</a>
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
<!-- //Body -->
</html>
