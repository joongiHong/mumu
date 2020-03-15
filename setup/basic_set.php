<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MuMu - 음악신청서비스</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/setup.css" />
    <link rel="shortcut icon" href="../image/icon.ico" />
    <meta name="theme-color" content="#36537f" />
  </head>

  <body>
    <header>
      <img src="../image/logo.png" alt="mumu" />
      <h1>MuMu 기본정보 설정</h1>
      <hr />
    </header>
    <br />
    <br />
    <p>MuMu를 구성하기 위한 기본정보를 설정합니다.</p>
    <p>본 정보는 후에 자주 사용되오니 반드시 기억하시기 바랍니다.</p>
    <br />
    <form action="finish.php" method="POST">
      <h2>관리자 계정</h2>
      <input type="text" class="i_text" name="user_id" placeholder="아이디" />
      <br />
      <input
        type="password"
        class="i_text"
        name="user_password"
        placeholder="비밀번호"
      />
      <br />
      <br />
      <h2>테스트용 학생 계정</h2>
      <input type="number" class="i_text" name="user_num" placeholder="학번" />
      <br />
      <input type="text" class="i_text" name="user_name" placeholder="이름" />
      <br />
      <br />
      <br />
      <hr />
      <br />
      <input
        type="hidden"
        name="db_host"
        value="<?php echo $_POST['db_host']; ?>"
      />
      <input
        type="hidden"
        name="db_name"
        value="<?php echo $_POST['db_name']; ?>"
      />
      <input
        type="hidden"
        name="db_password"
        value="<?php echo $_POST['db_password']; ?>"
      />
      <input
        type="hidden"
        name="db_id"
        value="<?php echo $_POST['db_id']; ?>"
      />
      <button type="submit" classs="i_button_1">다음</button>
    </form>
  </body>
</html>
