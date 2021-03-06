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

$sql = "SELECT * FROM music WHERE state=0";
$re = $con->query($sql);

$m_num = mysqli_num_rows($re);
$id = $_SESSION['user_id'];
$name =  $_SESSION['user_name'];
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
      <h1 class="title">학생추가</h1>
      <p>서버 상에 학생을 추가할 수 있습니다.</p>
      <a href="add.php" onclick="window.open(this.href, '_blank', 'width=500px,height=50px,toolbars=no,scrollbars=no'); return false;"><button class="i_button_1" style="margin: 0;">학생추가</button></a>
      <br/>
      <br/>
      <h1 class="title">학생목록</h1>
      <p>서버 상에 등록된 학생목록을 열람하거나 관리할 수 있습니다.</p>
      <br/>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">학번</th>
            <th scope="col">이름</th>
            <th scope="col">관리</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM student ORDER BY num ASC";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_array($result)) {
            $kkey = "window.open(this.href, '_blank', 'width=500px,height=50px,toolbars=no,scrollbars=no'); return false;";
            echo '<tr>';
            echo '<th scope="row">'.$row['num'].'</th>';
            echo '<th style="color:'.$color.';">'.$row['name'].'</th>';
            echo '<th><a href="delete.php?num='.$row['num'].'"><button class="i_button_3">삭제</button></a> <a href="change.php?num='.$row['num'].'" onclick="'.$kkey.'"><button class="i_button_2">수정</button></a></th>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
    <script
      src="https://kit.fontawesome.com/139b8c0516.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  </body>
</html>