<?php
require '../../config.php';

session_start();
if ($_SESSION['user_id'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if ($_SESSION['user_grade'] == "0" or $_SESSION['user_grade'] == "2" or $_SESSION['user_grade'] == "5") {
  //
} else {
  echo "<script>alert('권한이 부족합니다.\\학생 관리는 0, 2, 5부 관리자만 접근할 수 있습니다.');</script>";
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
      <h1 style="color: #395382;">학생 정보 수정</h1>
      <p>학생 정보를 수정할 수 있습니다.<br/>단 학번은 수정할 수 없습니다.</p>
      <form action="insert.php" method="POST">
          <input type="text" name="name" placeholder="이름" />
          <input type="hidden" name="num" value="<?php echo $num; ?>" />
          <button type="submit" class="i_button_2">수정</button>
      </form>
  </body>
</html>