<?
	include "session.php";

	if($ses_userid != "") {
		echo "<script>
		location.replace(login.php);
		</script>";
		die;
	}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=divixce-width, initial-scale=1.0, user-scalable-no">
    
    <title>코레일톡 모바일 페이지에 오신 것을 환영합니다.</title>
    
    <meta name="Subject" content="기차">
    <meta name="Title" content="코레일톡">
    <meta name="Description" content="열차예매정보">
    <meta name="Keywords" content="기차,열차,기차예매,열차예매,내일로,코레일톡,KTX,KTX예매,교통수단,기차표,기차시간표,열차시간표">
    <meta name="Author" content="이은미">
    
    
   
    <script type="text/javascript">
    <!--//주소창 자동 닫힘
    window.addEventListener("Load", funtion(){
                            setTimeout(loaded, 100);
                            }, false);
        funtion loaded(){
            window.scrollTo(0, 1);
        }
        //-->
    
    </script>
    <!-- 데스크탑 브라우저의 탭에 아이콘 추가 -->
    <link href="m_icon_128.png" rel="icon" /><!--또는-->
    <link href="m_icon_128.ico" rel="icon" type="image/x-icon" />
    
    
    <!-- iPhone의 반사광 효과가 없는 경우 -->
    <link href="short_apple1.png" rel="apple-touch-icon-precomposed" />
    
    
    <!--iPhone의 반사광이 있는 경우-->
    <link href="short_apple2.png" rel="apple-touch-icon" />
    
    
    <!-- iPhone icon(Retina) -->
    <link href="m_icon_114.png" sizes="114x114" rel="apple-touch-icon" />
    <!-- apple-touch-icon- 터치기반인 것.IOS 종류들을 의미함.-->
    
    
    <!-- iPad icon(Retina) -->
    <link href="apple-114x114.png" sizes="144x144" rel="apple-touch-icon" />
    
    
    <!-- Android png의 경우 -->
    <link href="favicon.png" rel="shortcut icon" />
    <!--숏컷은 바로가기 아이콘, 아이콘은 브라우저 창에서의 아이콘을 의미.-->
    
    
    <!-- Android ico의 경우 -->
    <link href="favicon.ico" rel="shortcut icon" /><!-- 또는 -->
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style>
    /* 헤더 부분 */
        *{ margin:0; padding:0; }
        body, html{ width:100%; height:100%;}
        ul,li{ list-style:none; }
        a, span, label{ text-decoration:none; font-family:"NanumGothic";}
        p{ font-family:"NanumGothic"; }
        img{ border:none; }
        p{ line-height:1.3; padding:10px; }
        
        .hd{ top:0; width:100%; height:50px; background-color:#446088; position:fixed; z-index:500; }
        .logo { display:block; width:100px; margin:0 auto; text-align:center; }
        .logo a{ display:block; width:100%; margin:0 auto;}
        .logo img {width:90px; height:auto; padding-top:14px;}
    
    
    
    #form_wrap {width:300px; height:250px; margin:25% auto 0 auto; border:3px solid #3a557e;
                    border-radius:15px; padding:10px 4px 4px 12px;}
	#form_wrap label { display:block; width:50px; float:left; height:40px; 
		line-height:40px; color:#2b2b2b; font-weight:600; }
	#fuserid, #fpasswd { display:block; width:200px; float:left; height:30px; margin-top:7px; }
	#btn_frame { clear:both; width:100%; height:100%; margin:30px auto 0 auto; }
	#btn_frame input { display:block; width:280px; margin-right:5px; height:40px; 
		line-height:40px; border:0; background:#3a557e; text-align:center; color:#fff; 
		float:left; margin-top:5px; border-radius:5px; cursor:pointer;} 
</style>
<link rel="stylesheet" href="./common.css">
<link rel="stylesheet" href="menu.css">
<script>
function chk_logform(){
	if(login_form.fuserid.value=="") {
		alert('Input ID');
		login_form.fuserid.focus();
		return false;
	} else if(login_form.fpasswd.value=="") {
		alert('Input Password');
		login_form.fpasswd.focus();
		return false;
	} else {
		return true;
	}
}

</script>
<link rel="stylesheet" href="common.css">
</head>
<body>
    <header class="hd">
        <li class="logo">
            <a href="./index.html"><img src="./src/logo2.png" alt="로고"></a>
        </li>
    </header>

	<div id="form_wrap">
	<div>LOG IN</div>
	<form name="login_form" action="login.php" method="post" onsubmit="return chk_logform();">
		<label for="fuserid">ID</label>
		<input type="text" name="fuserid" id="fuserid" size="19" title="아이디 입력"><br /><br />
		<label for="fpasswd">PW</label>
		<input type="password" name="fpasswd" id="fpasswd" size="20" title="패스워드 입력"><br/><br/>
		<div id="btn_frame">
			<input type="submit" name="submit" value="login">
			<input type="reset" name="reset" value="Reset"><br /><br />
		</div>
	</form>
	</div>
	
	<input type="checkbox" id="ck1" class="ck1" >
    <nav id="gnb">
        <ul>
            <li><a href="./sub1.html">열차여행</a></li>
            <li><a href="./sub2.html">자유여행</a></li>
            <li><a href="./sub3.html">여행상품</a></li>
            <li><a href="./sub4.html">회의실</a></li>
            <li><a href="./sub5.html">기차역정보</a></li>
            <li><a href="./login_form.php">로그인</a></li>
        </ul>
    </nav>
    <li class="menubt"><label for="ck1" class="btn1" ><img src="./src/bt.png" alt="메뉴 띄우기 버튼"></label></li>

</body>
</html>