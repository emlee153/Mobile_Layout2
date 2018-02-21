<?
$host = "localhost";
$user = "root";
$passwd = "apmsetup";
/*데이터베이스를 연결하고 사용하게 해줌_회원관리*/
$connect = mysql_connect($host, $user, $passwd) or die ("mysql Server Connection Error");
mysql_select_db('mobile',$connect) or die ("DB Connection Error");
?>