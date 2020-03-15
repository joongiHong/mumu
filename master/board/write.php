<?php
require '../../config.php'; 

session_start();
if ($_SESSION['user_id'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if ($_SESSION['user_grade'] == "0" or $_SESSION['user_grade'] == "3" or $_SESSION['user_grade'] == "4" or $_SESSION['user_grade'] == "5") {
  //
} else {
  echo "<script>alert('권한이 부족합니다.\\n게시판 관리는 0, 1, 3, 5부 관리자만 접근할 수 있습니다.');</script>";
  echo "<script>history.back()</script>;";
  exit;
}

$id = $_SESSION['user_id'];
$name =  $_SESSION['user_name'];
$new = $_GET['new'];
$num = $_GET['num'];

if ($new == 0) {
  $sql = "SELECT * FROM board WHERE num=$num";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $title = $row['title'];
  $content = $row['content'];
}
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>
  <body>
    <div id="user">
        <h1><?php echo $name?>님</h1>
        <a href="../../session_out.php?url=index.php"><p>로그아웃</p></a>
        |
        <a href="../user/my_password.php"><p>비밀번호 변경</p></a>
    </div>
    <header>
        <a href="../index.php"><img src="../../image/logo.png" alt="mumu"/></a>
        <br />
        <br />
        <a href="../music"><h2>신청목록</h2></a>
        <a href="../student"><h2>학생관리</h2></a>
        <a href="../board"><h2>게시판관리</h2></a>
        <a href="../setting"><h2>상세설정</h2></a>
        <hr />
    </header>
    <div id="main_content">
      <h1 class="title">글 작성과 수정</h1>
      <p>게시판에 새로운 글을 작성하고 수정합니다.</p>
      <br/>
      <form action="insert.php" method="POST" name="nse">
        <input type="text" class="i_text_1" style="width: 500px; margin-bottom: 10px;" name="title" placeholder="제목" value="<?php if ($new == 0) { echo $title; } ?>"/>
        <br/>
        <textarea name="content" id="ir1" rows="10" cols="100" class="i_textarea_1"><?php if ($new == 0) { echo $content; } ?></textarea>
        <input type="hidden" value="<?php echo $new; ?>" name="new" />
        <input type="hidden" value="<?php echo $num; ?>" name="num" />
        <br/>
        <button type="submit" class="i_button_1">작성</button>
      </form>    
    </div>
    <script
      src="https://kit.fontawesome.com/139b8c0516.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  </body>
</html>