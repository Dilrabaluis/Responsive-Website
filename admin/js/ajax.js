// JavaScript Document
var xmlObj=false;
function checkName(form){//检测用户名
    if(form.postuser.value==""){
        document.getElementById("user").innerHTML="用户名为空";
        return false;
  }else	if(window.ActiveObject){
               xmlObj=new ActiveObject("Microsoft.XMLHTTP");
               }else if(window.XMLHttpRequest){
                   xmlObj=new XMLHttpRequest();
                   }
                   xmlObj.onreadystatechange=callBackFun;
                   xmlObj.open('GET','../registionajax1.php?username='+form.postuser.value,true);
                   xmlObj.send(null);
                   function callBackFun(){
                       if(xmlObj.readyState==4&&xmlObj.status==200){
                           document.getElementById("user").innerHTML=xmlObj.responseText;
                          //alert(xmlObj.responseText);
                           }
                       }
                  
   }

	function checkTel(form){//检测电话号码
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if (!myreg.test(form.posttel.value)) {
			document.getElementById("phone").innerHTML="号码无效";
            return false;
        }else
				 if(window.ActiveObject){
					 xmlObj=new ActiveObject("Microsoft.XMLHTTP");
					 }else if(window.XMLHttpRequest){
						 xmlObj=new XMLHttpRequest();
						 }
						 xmlObj.onreadystatechange=callBackFun;
						 xmlObj.open('GET','../registionajax1.php?usertel='+form.posttel.value,true);
						 xmlObj.send(null);
						 function callBackFun(){
							 if(xmlObj.readyState==4&&xmlObj.status==200){
								 document.getElementById("phone").innerHTML=xmlObj.responseText;
								 //alert(xmlObj.responseText);
								 }
							 }
	}
