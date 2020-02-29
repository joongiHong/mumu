<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MuMu - 음악신청서비스</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/content.css" />
    <link rel="shortcut icon" href="../image/icon.ico" />
    <meta name="theme-color" content="#36537f" />
    <!-- PC 버전 관련 안내
    <script lang="javascript">
        var filter = "win16|win32|win64|mac|macintel"; 
        if ( navigator.platform ) { 
            if ( filter.indexOf( navigator.platform.toLowerCase() ) >= 0 ) {
                alert('본 페이지는 모바일에 최적화 되어 있습니다.\n일부 콘텐츠가 보기 어려울 수 있습니다.'); 
            }
        }
    </script>
    -->
  </head>

  <body>
    <!-- 메뉴 부분 -->
    <div id="header">
      <a href="../index.php"><img src="../image/logo.png" alt="mumu"/></a>
      <!-- <a href="#"><span><i class="fas fa-user fa-2x"></i></span></a> -->
      <hr />
    </div>

    <!-- 제목 부분 -->
    <div class="headline">
      <h1>음악신청</h1>
    </div>

    <!-- 설명 부분 -->
    <div class="subtitle">
      <p>
        본교 학생 여부를 확인하기 위하여<br />
        학생 인증을 진행합니다.<br />
        이름과 학번을 입력해 주십시오.
      </p>
    </div>

    <!-- 입력 폼 부분 -->
    <div class="content_2">
      <form action="check_user.php" method="POST">
        <div class="i_text">
          <span><i class="fas fa-user"></i></span>
          <input type="number" name="u_num" placeholder="학번" />
        </div>
        <div class="i_text">
          <span><i class="fas fa-address-card"></i></span>
          <input type="name" name="u_name" placeholder="이름" />
        </div>
        <div class="i_button_1">
          <button type="submit">학생 인증</button>
        </div>
      </form>
    </div>

    <div id="footer">
      <a href="../opensource.php">
        <p>
          본 서비스에는 오픈소스가 사용되었습니다.<br />제작자분들께
          감사드립니다.
        </p>
      </a>
      <p>(c) 2020 <b>JoongiHong</b> (bracket) All Rights Reserved.</p>
    </div>
    <script
      src="https://kit.fontawesome.com/139b8c0516.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
