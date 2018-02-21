<?php
	require_once("../dbconfig.php");
	
	/* 페이징 시작 */
	//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	
	/* 검색 시작 */
	
	if(isset($_GET['searchColumn'])) {
		$searchColumn = $_GET['searchColumn'];
		$subString .= '&amp;searchColumn=' . $searchColumn;
	}
	if(isset($_GET['searchText'])) {
		$searchText = $_GET['searchText'];
		$subString .= '&amp;searchText=' . $searchText;
	}
	
	if(isset($searchColumn) && isset($searchText)) {
		$searchSql = ' where ' . $searchColumn . ' like "%' . $searchText . '%"';
	} else {
		$searchSql = '';
	}
	
	/* 검색 끝 */
	
	$sql = 'select count(*) as cnt from board_free' . $searchSql;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	$allPost = $row['cnt']; //전체 게시글의 수
	
	if(empty($allPost)) {
		$emptyData = '<tr><td class="textCenter" colspan="5">글이 존재하지 않습니다.</td></tr>';
	} else {

		$onePage = 15; // 한 페이지에 보여줄 게시글의 수.
		$allPage = ceil($allPost / $onePage); //전체 페이지의 수
		
		if($page < 1 && $page > $allPage) {
?>
			<script>
				alert("존재하지 않는 페이지입니다.");
				history.back();
			</script>
<?php
			exit;
		}
	
		$oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
		$currentSection = ceil($page / $oneSection); //현재 섹션
		$allSection = ceil($allPage / $oneSection); //전체 섹션의 수
		
		$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
		
		if($currentSection == $allSection) {
			$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
		} else {
			$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
		}
		
		$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
		$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
		
		$paging = '<ul>'; // 페이징을 저장할 변수
		
		//첫 페이지가 아니라면 처음 버튼을 생성
		if($page != 1) { 
			$paging .= '<li class="page page_start"><a href="./index.php?page=1' . $subString . '">처음</a></li>';
		}
		//첫 섹션이 아니라면 이전 버튼을 생성
		if($currentSection != 1) { 
			$paging .= '<li class="page page_prev"><a href="./index.php?page=' . $prevPage . $subString . '">이전</a></li>';
		}
		
		for($i = $firstPage; $i <= $lastPage; $i++) {
			if($i == $page) {
				$paging .= '<li class="page current">' . $i . '</li>';
			} else {
				$paging .= '<li class="page"><a href="./index.php?page=' . $i . $subString . '">' . $i . '</a></li>';
			}
		}
		
		//마지막 섹션이 아니라면 다음 버튼을 생성
		if($currentSection != $allSection) { 
			$paging .= '<li class="page page_next"><a href="./index.php?page=' . $nextPage . $subString . '">다음</a></li>';
		}
		
		//마지막 페이지가 아니라면 끝 버튼을 생성
		if($page != $allPage) { 
			$paging .= '<li class="page page_end"><a href="./index.php?page=' . $allPage . $subString . '">끝</a></li>';
		}
		$paging .= '</ul>';
		
		/* 페이징 끝 */
		
		
		$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
		$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문
		
		$sql = 'select * from board_free' . $searchSql . ' order by b_no desc' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
		$result = $db->query($sql);
	}
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=divixce-width, initial-scale=1.0, user-scalable-no">
	<title>코레일톡 모바일 전용 게시판</title>
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
	<style>
	.paging ul { list-style:none; }
	.paging li { float:left; padding-right:10px; }
        
    /*팝업메뉴버튼*/
    #gnb{ position:fixed; width:100%; height:100%; display:none; 
            z-index:900; top:0; left:0;}
    #gnb ul{ display:block; background-color:#446088; width:50%; height:210px; margin:40% auto; padding-top:20px; padding-bottom:20px; }
    #gnb ul li a{ display:block; text-align:center; color:#fff; font-size:0.85em; line-height:31px; }

    .menubt{ display:block; position:fixed; width:40px; height:40px; background-color:#446088; border-radius:20px;  bottom:50px; left:30px;
    box-shadow:-1px 2px 3px #333; z-index:950}
    .menubt .btn1 { display:block; width:40px; height:40px; transition:1s; }

    #ck1{ display:none; }
    #ck1:checked ~ #gnb { display:block; }
    #ck1:checked ~ .menubt .btn1{ 
        -ms-transform: rotate(405deg);
        -webkit-transform: rotate(405deg);
        -o-transform: rotate(405deg); }
    #ck1:checked ~ #gnb{ background:rgba(0,0,0,0.3); }
	</style>
</head>

	<link rel="stylesheet" href="common.css">
<body>
<header class="hd">
    <li class="logo">
        <a href="../index.html"><img src="../src/logo2.png" alt="로고"></a>
    </li>
</header>
	<article class="boardArticle">
		<h3>자유게시판</h3>
		<div id="boardList">
			<table>
				<caption class="readHide"></caption>
				<thead>
					<tr>
						<th scope="col" class="no">번호</th>
						<th scope="col" class="title">제목</th>
						<th scope="col" class="author">작성자</th>
						<th scope="col" class="date">작성일</th>
						<th scope="col" class="hit">조회</th>
					</tr>
				</thead>
				<tbody>
						<?php
						if(isset($emptyData)) {
							echo $emptyData;
						} else {
							while($row = $result->fetch_assoc())
							{
								$datetime = explode(' ', $row['b_date']);
								$date = $datetime[0];
								$time = $datetime[1];
								if($date == Date('Y-m-d'))
									$row['b_date'] = $time;
								else
									$row['b_date'] = $date;
						?>
						<tr>
							<td class="no"><?php echo $row['b_no']?></td>
							<td class="title">
								<a href="./view.php?bno=<?php echo $row['b_no']?>"><?php echo $row['b_title']?></a>
							</td>
							<td class="author"><?php echo $row['b_id']?></td>
							<td class="date"><?php echo $row['b_date']?></td>
							<td class="hit"><?php echo $row['b_hit']?></td>
						</tr>
						<?php
							}
						}
						?>
				</tbody>
			</table>
			<div class="btnSet">
				<a href="./write.php" class="btnWrite btn">글쓰기</a>
			</div>
			<div class="paging">
				<?php echo $paging ?>
			</div>
			<div class="searchBox">
				<form action="./list.php" method="get">
					<select name="searchColumn">
						<option <?php echo $searchColumn=='b_title'?'selected="selected"':null?> value="b_title">제목</option>
						<option <?php echo $searchColumn=='b_content'?'selected="selected"':null?> value="b_content">내용</option>
						<option <?php echo $searchColumn=='b_id'?'selected="selected"':null?> value="b_id">작성자</option>
					</select>
					<input type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>">
					<button type="submit">검색</button>
				</form>
			</div>
		</div>
	</article>
</body>
</html>