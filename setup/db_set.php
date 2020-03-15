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
      <h1>DB 기본정보 설정</h1>
      <hr />
    </header>
    <br />
    <br />
    <p>DB 기존 정보를 입력하여 주시기 바랍니다.</p>
    <p>자세히 모를 경우 담당자에게 문의해 주시기 바랍니다.</p>
    <br />
    <form action="basic_set.php" method="POST">
      <b>DB 호스트</b>
      <input
        type="text"
        class="i_text"
        name="db_host"
        placeholder="localhost"
      />
      <br />
      <b>DB 이름</b>
      <input type="text" class="i_text" name="db_name" placeholder="mumu" />
      <br />
      <b>DB 사용자 아이디</b>
      <input type="text" class="i_text" name="db_id" placeholder="root" />
      <br />
      <b>DB 사용자 비밀번호</b>
      <input
        type="password"
        class="i_text"
        name="db_password"
        placeholder="password"
      />
      <br />
      <br />
      <br />
      <hr />
      <br />
      <button type="submit" classs="i_button_1">다음</button>
    </form>
  </body>
</html>
