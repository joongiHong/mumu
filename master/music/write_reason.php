<?php
require '../../config.php';

session_start();
if ($_SESSION['user_id'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if ($_SESSION['user_grade'] == "0" or $_SESSION['user_grade'] == "1" or $_SESSION['user_grade'] == "4" or $_SESSION['user_grade'] == "5") {
  //
} else {
  echo "<script>alert('권한이 부족합니다.\\n음악 관리는 0, 1, 4, 5부 관리자만 접근할 수 있습니다.');</script>";
  echo "<script>history.back()</script>;";
  exit;
}

$num = $_GET['num'];
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MuMu - 음악신청서비스</title>
    <link rel="stylesheet" href="../../css/main.css" />
    <link rel="stylesheet" href="../../css/master.css" />
    <link rel="shortcut icon" href="../../image/icon.ico" />
    <meta name="theme-color" content="#36537f" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body style="padding: 10px;">
      <h1 style="color: #395382;">사유 입력</h1>
      <p>탈락 처리시 학생들이 확인할 수 있도록 사유를 입력하실 수 있습니다.</p>
      <form action="state_change.php" method="POST">
          <input type="text" name="reason" placeholder="사유" style="width: 300px;" />
          <input type="hidden" name="num" value="<?php echo $num; ?>" />
          <button type="submit" class="i_button_2">입력</button>
      </form>
  </body>
</html>