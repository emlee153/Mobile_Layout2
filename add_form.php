<!DOCTYPE html>
<html>
<head>
<title>회원가입 페이지 </title>
<meta charset="utf-8" />
<style>
    *{margin:0; padding:0;}
    body,html{background-color:#c7d0d8;}
	/*헤더영역*/
	.hd{position:fixed; background-color:#fff; top:0; width:100%; height:65px; margin:0 auto; text-align:center; z-index:900; border-bottom:3px solid #3a557e;}
    .hd .menuicon{position:absolute; width:40px; height:40px; background-image:url("./img/menuicon.png"); background-position:center center; background-repeat:no-repeat; top:13px; left:20px; }
    .hd img{width:63px; height:63px;}
    /**/
    
    #form_wrap { width:400px; height:600px; margin:10% auto 0 auto; padding:30px 20px 30px 60px;
                border:3px solid #3a557e; border-radius:15px;}
	#form_wrap label { display:block; width:100px; float:left; height:40px;
	 margin-top:30px; line-height:40px; color:#2b2b2b; font-weight:600; }
	#fuserid, #fname, #fpasswd, #fpasswd_re { display:block; width:200px; float:left;
	 height:40px; margin-top:30px; }
	#form_wrap #pw_label { line-height:20px; }
	#ck_btn1 { display:block; width:80px; float:left; margin-top:33px; margin-left:10px; height:40px; 
		line-height:40px; 	text-align:center;}
	#btn_frame { clear:both; padding-top:30px;	 }
	#btn_frame input { display:block; width:150px; margin-right:50px; 	height:40px; 
		line-height:40px; border:0; background:#3a557e; text-align:center; color:#fff; 
		float:left; margin-top:30px; border-radius:20px; cursor:pointer; } 
	.radio_frame { clear:both; padding-top:40px; }
	#form_wrap .radio_frame label { width:70px; margin-top:0px; line-height:20px; }
	#form_wrap .radio_frame input[type=radio] { display:block; width:30px; float:left;
	 margin-top:0;	line-height:20px; }
	#form_wrap #email_box label { display:block; width:100px; float:left; height:40px;
	 margin-top:0px; line-height:40px; color:#2b2b2b; font-weight:600; }
	#form_wrap #email_box input { display:block; width:200px; float:left;
	 height:40px; margin-top:0px; }
</style>
<script>
function chk_input() {
	if(user_form.fuserid.value=="") {
		alert("Input your ID");
		user_form.fuserid.focus();
		return false;
	} else if(user_form.fname.value=="") {
		alert("Input your Name");
		user_form.fname.focus();
		return false;
	} else if(user_form.fpasswd.value=="") {
		alert("Input Password");
		user_form.fpasswd.focus();
		return false;
	} else if(user_form.fpasswd_re.value=="") {
		alert("Input Password one more");
		user_form.fpasswd_re.focus();
		return false;
	} else if(user_form.fpasswd.value != user_form.fpasswd_re.value) {
		alert("[Password] not match, please rewrite your PW");
		user_form.fpasswd.value="";
		user_form.fpasswd_re.value="";
		user_form.fpasswd.focus();
		return false;
	} else {
		return true;
	}
}
</script>
</head>
<body>
    <header class="hd">
        <div class="menuicon"></div>
        <a href="index.html"><img src="./img/logo1.png" alt="로고"></a>
    </header>
    
	<div id="form_wrap">
	<form name="user_form" action="add_db.php" method="post" onsubmit="return chk_input()">
		<label for="fuserid">ID</label>
		<input type="text" name="fuserid" id="fuserid" size="12" maxlength="12" onblur="if(fuserid.value!='') chk_id();">
		<input type="button" name="button" value="ID check" id="ck_btn1" onclick="chk_id();">
		<script>
		function chk_id() {
			if(user_form.fuserid.value=='') {
				alert('Input ID');
				user_form.fuserid.focus();
			} else {
				window.open('id_chk.php?fuserid='+user_form.fuserid.value,'IDwin','width=400,height=200');
			}
		}
		</script>
		<br /><br />
		<label for="fname">Name</label>
		<input type="text" name="fname" id="fname" size="12" maxlength="10"> <br /><br />
		<label for="fpasswd">Password</label>
		<input type="password" name="fpasswd" id="fpasswd" size="12" maxlength="10"> <br /><br />
		<label for="fpassword_re" id="pw_label">Confirming Password</label>
		<input type="password" name="fpasswd_re" id="fpasswd_re" size="12" maxlength="10" onblur="chk_passwd()"> <br />
		<br /><br /><br />
		<div class="radio_frame">
			<label for="" style="clear:both; width:100px">Sex</label>
			<input type="radio" name="fsex" value="m" id="man" checked> <label for="man">Man</label> 
			<input type="radio" name="fsex" value="w" id="woman"> <label for="woman">Woman</label> <br />
			<br />
		</div>
		<div class="radio_frame" id="email_box">
			<label for="femail">E-mail</label>
			<input type="text" name="femail" size="30" maxlength="30"> <br /><br /><br />
		</div>
		<div id="btn_frame">
			<input type="submit" name="smt" value="가입하기"> 
			<input type="reset" name="rst" value="다시작성">
		</div>
	</form>
	</div>
</body>
</html>