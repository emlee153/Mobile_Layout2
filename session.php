<?
session_start();
/*로그인을 유지시키기 위해 필요한 session*/
$fuserid = $_POST['fuserid'];
$fpasswd = $_POST['fpasswd'];

$_SESSION['ses_userid'] = $fuserid;
$_SESSION['ses_pass'] = $fpasswd;

?>