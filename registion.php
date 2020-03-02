<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="卢漪"/>
	<meta name="keywords" content="卢漪，个人网站，计算机，编程，购票网站，电影，摄影，偶像罗景文" />
	<meta name="description" content="这是卢漪的购票网站，重庆师范大学，计算机与信息科学学院，计算机科学与技术，重庆，大足，双桥，在校学生"  />
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Registion</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<link rel="stylesheet" href="register.css" type="text/css" media="all">	
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/registion.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<script src="js/ajax.js"></script>
<script>
	
				//检测密码
	function inputpwd(form){
		if(form.pwd.value.length<6){
	 		document.getElementById("pass").innerHTML="注册密码大于等于6!";
	 		/*alert("注册密码长度应大于等于6!");*/
	 		form.pwd.select();
	 		return(false);
	 	}else{
	 		document.getElementById("pass").innerHTML="√";
		}
	}
	function checkpwdbool(form){
  			//确认密码
		if(form.pwd.value!=form.checkpwd.value){
			 document.getElementById("checkpass").innerHTML="密码与重复密码不同!";
	 		/*alert("密码与重复密码不同!");*/
	 		form.checkpwd.select();
	 		return(false);
	 	}else{
	 		document.getElementById("checkpass").innerHTML="√";
		}
	}

</script>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-5 col-md-offset-4">
			<div class="row clearfix title">
				<div class="col-md-10">
					用户注册
				</div>
				<div class="col-md-2"></div>
			</div>
            <div class="row clearfix">
                <form name="regis" method="post" action="registionch.php">
					<div class="row clearfix">
                    	<div class="col-md-9 login-ic">
                        	<i class="glyphicon glyphicon-user icon"></i>
					    	<input type="text"  name="username" class="input" onBlur="checkName(regis)" autocomplete="off" required/>
                        	<div class="clear" bor></div>
						</div>
						<div class="col-md-3" id="user"></div>
					</div>
					
					<div class="row clearfix">
                    	<div class="col-md-9 login-ic">
					    	<i class="glyphicon glyphicon-earphone icon"></i>
						    <input type="text"   name="tel" class="input" onBlur="checkTel(regis)" required/>
						    <div class="clear"> </div>
						</div>
						<div class="col-md-3" id="phone"></div>
					</div>
            
                    <div class="row clearfix">
                    	<div class="col-md-9 login-ic">
					    <i class="glyphicon glyphicon-lock icon"></i>
					    <input type="password"   name="pwd" class="input" onBlur="inputpwd(regis)" autocomplete="off" required/>
						<div class="clear" > </div>
						</div>
						<div class="col-md-3" id="pass"></div>
					</div>
                    
					<div class="row clearfix">
                    	<div class="col-md-9 login-ic">
					 	   	<i class="glyphicon glyphicon-check icon"></i>
					 	   	<input type="password"   name="checkpwd" class="input" onBlur="checkpwdbool(regis)"  autocomplete="off" required/>
							<div class="clear" > </div>
						</div>
						<div class="col-md-3" id="checkpass"></div>
					</div>
					
					<div class="row clearfix">
	                    <div class="col-md-9 log-bwn">
						    <input type="submit" name="submit"  value="Registion" >
						</div>
						<div class="col-md-3"></div>
					</div>
                </form>
            </div>

		</div>
		
	</div>


</div>





</body>
</html>

