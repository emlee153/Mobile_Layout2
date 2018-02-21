<?php
	include_once("../dbconfig.php");
	$bNo = $_GET['bno'];

	session_start();
	$fuserid = $_SESSION['ses_userid'];
	$fpasswd = $_SESSION['ses_pass'];

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql = 'update board_free set b_hit = b_hit + 1 where b_no = ' . $bNo;
		$result = $db->query($sql); 
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php 
		} else {
			setcookie('board_free_' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}
	
	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bNo;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=divixce-width, initial-scale=1.0, user-scalable-no">
    <title>게시판</title>
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
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
</head>
<body>
	<article class="boardArticle">
		<h3>게시판 글쓰기</h3>
		<div id="boardView">
			<h3 id="boardTitle"><?php echo $row['b_title']?></h3>
			<div id="boardInfo">
				<span id="boardID">작성자: <?php echo $row['b_id']?></span>
				<span id="boardDate">작성일: <?php echo $row['b_date']?></span>
				<span id="boardHit">조회: <?php echo $row['b_hit']?></span>
			</div>
			<div id="boardContent"><?php echo $row['b_content']?></div>
			<div class="btnSet">
				<? if($fuserid == 'admin') {	?>
					<a href="./write.php?bno=<?php echo $bNo?>">수정</a>
					<a href="./delete.php?bno=<?php echo $bNo?>">삭제</a>
				<? } ?>
				<a href="./list.php">목록</a>
			</div>
		</div>
	</article>
</body>
</html>