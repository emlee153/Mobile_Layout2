//add_db.php
<?
	$fuserid = $_POST['fuserid'];
	$fname = $_POST['fname'];
	$fpasswd = $_POST['fpasswd'];
	$fpasswd_re = $_POST['fpasswd_re'];
	$fsex = $_POST['fsex'];
	$femail = $_POST['femail'];
	$userip = $_SERVER['REMOTE_ADDR'];

	include "connect_db.php";
	if($fuserid=="" || $fname=="" || $fpasswd == "" || $fpasswd_re == "" || $fpasswd!=$fpasswd_re) {
		echo "<script>
		alert('*필수 입력 사항은 반드시 입력해야 합니다. ..');
		history.back();
		</script>";
		die;
	}

	$sql = "select count(*) from user_tbl where userid='$fuserid'";
	$res = mysql_query($sql,$connect);
	$rs = mysql_fetch_row($res);
	$reg_num=$rs[0];

	if($reg_num>0){
		echo "<script>
		alert('[중복된 아이디]\r\n\r\n 다른 아이디를 선택하세요.');
		history.back();
		</script>";
		die;
	}

	$sql = "insert into user_tbl (userid, name, passwd, sex, email, date, ip_addr)";
	$sql.= "values ('$fuserid','$fname','$fpasswd','$fsex','$femail',now(),'$fuserip')";
	$res = mysql_query($sql,$connect);
	$tot_row = mysql_affected_rows();
	mysql_close($connect);

	echo "등록 성공<hr />";
	echo "생성 레코드 = ".$tot_row."개";

	if($tot_row > 0){
		echo "<script>
		alert('[등록성공]\\r\\n회원으로 등록되었습니다. ');
		location.replace('login_form.php');
		</script>";
	} else {
		echo "<script>
		alert('[등록 실패]\\r\\n 회원으로 등록을 실패했습니다. ');
		history.back();
		</script>";
	}
?>