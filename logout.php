<? 
 include "session.php";
 unset($_SESSION['ses_userid']);
 unset($_SESSION['ses_pass']);
 $ch1 = "<!DOCTYPE html><html><head><meta charset='utf-8'></head><body>";
 $ch2 = "</body></html>";
 echo $ch1."로그아웃 되었습니다.<br />".$ch2;
 echo "<script> alert('[logout] \\r\\n 로그인 창으로 이동할까요?');
  location.replace('login_form.php'); </script>";
?>