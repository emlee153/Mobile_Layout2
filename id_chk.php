<?
$fuserid=$_GET['fuserid'];
include "connect_db.php";

$sql = "select count(*) from user_tbl where userid='$fuserid' ";
$res = mysql_query($sql, $connect);
$rs = mysql_fetch_array($res);
$num = $rs[0];
mysql_close();
?>

<html>
<head>
<meta charset="utf-8" />
<title> 아이디 중복검사 </title>
</head>
<body>
<div id="frm1" style="width:350px; border:1px solid black; text-align:center; padding:5px">
	<form name="chkid_form">
		<h2 style="background-color:#3300cc; color:#fff">아이디 중복 검사</h2>
		<div style="height:120px; color:#333">
			<? if($num>0) { ?>
			[ <? echo $fuserid; ?> ] 는 사용중인 아이디입니다. <br />
			다른 아이디를 선택하세요. <br><br>
			<? } else {?>
			[ <? echo $fuserid; ?> ] 는 사용할 수 있는 아이디 입니다. <br><br>
			<? } ?>
			<input type="button" name="button" value="close" onclick="self.close();">
		</div>
	</form>
</div>
</body>
</html>