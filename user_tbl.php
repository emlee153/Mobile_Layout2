<?
include "connect_db.php";

/* 데이터 베이스에 존재하는 테이블 검색 */
if($result == 1) {
	$tb_name = mysql_list_tables("apm_db");
	$tb_count = mysql_num_rows($tb_name);
	for($a=0; $a<$tb_count;$a++)
	if(mysql_tablename($tb_name,$a) == "user_tbl")	{
		$flag = "ok";
		break;
	}
}
/*테이블이 존재하지 않을때는 아래를 실행 */
if($flag != "ok") {
	$sql = "create table user_tbl(no int primary key not null auto_increment,
	userid varchar(12) not null, name varchar(12) not null, passwd varchar(12),
	sex char(1), email varchar(30), date datetime,
	ip_addr varchar(30)) DEFAULT CHARACTER SET utf8";

	$sql2 = "create table board_free (
	b_no int unsigned not null primary key auto_increment,
	b_title varchar(100) not null,	b_content text not null,
	b_date datetime not null,	b_hit int unsigned not null default 0,
	b_id varchar(20) not null,	b_password varchar(100) not null
	) DEFAULT CHARACTER SET utf8";

	$result = mysql_query($sql, $connect) or die("user_tbl 테이블이 이미 존재 합니다.");
	$result2 = mysql_query($sql2, $connect) or die("board_free 테이블이 이미 존재 합니다.
	<meta charset='utf-8'><script> alert(' 테이블이 이미 존재 합니다.');
	location.replace('success.php');
	</script>");

}
echo "테이블이 만들어졌습니다. <br />";
mysql_close($connect);
?>