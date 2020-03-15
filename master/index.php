<?php 
require '../config.php'; 

session_start();
if ($_SESSION['user_id'] != "") {
    echo "<script>location.href='music';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MuMu - 음악신청서비스</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/master.css" />
    <link rel="shortcut icon" href="../image/icon.ico" />
    <meta name="theme-color" content="#36537f" />
    <?php if ($recaptcha == 1) {echo "<script src='https://www.google.com/recaptcha/api.js?render=" . $g_sitekey . "'></script>";} ?>
  </head>
  <body style="background-image: url(../image/login.jpg);">
    <div id="login">
      <span><i class="fas fa-key fa-4x"></i></i></span>
      <br/>
      <form action="login.php" method="POST">
        <input type="text" class="i_text_1" name="id" placeholder="아이디" /><br/>
        <input type="password" class="i_text_1" name="password" placeholder="비밀번호" /><br/>
        <button type="submit" class="i_button_1">로그인</button>
        <input type="hidden" id="g-recaptcha" name="g-recaptcha">
      </form>
    </div>
    <script
      src="https://kit.fontawesome.com/139b8c0516.js"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
      grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo $g_sitekey ?>', {action: 'homepage'}).then(function(token) {
          document.getElementById('g-recaptcha').value = token;
        });
      });
    </script>
  </body>
</html>
