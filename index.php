<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MuMu - 음악신청서비스</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="shortcut icon" href="image/icon.ico" />
    <meta name="theme-color" content="#36537f">
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
      <a href="#"><img src="image/logo.png" alt="mumu" /></a>
      <!-- <a href="#"><span><i class="fas fa-user fa-2x"></i></span></a> -->
      <hr />
    </div>

    <!-- 공지사항, 광고 등 배너 공간 -->
    <div id="banner">
      <a href="#"><img src="image/banner.jpg" alt="듣고 싶은 음악이 있다면... mumu" /></a>
    </div>

    <!-- 신청 메뉴 부분 -->
    <a href="order">
      <div class="menu_1">
        <span><i class="fas fa-music fa-2x"></i></span>
        <h1>음악신청</h1>
        <p>
          점심시간에 듣고 싶은 음악을 신청해 주세요 :)<br />공정한 평가 후에
          심의 결과를 알려드립니다.<br />방송부 사정에 따라 송출되지 않을 수
          있습니다.
        </p>
      </div>
    </a>

    <!-- 선정 확인 메뉴 부분 -->
    <a href="#">
      <div class="menu_1">
        <span><i class="fas fa-check-circle fa-2x"></i></span>
        <h1>심의결과</h1>
        <p>
          신청하신 음악의 심의 결과입니다.<br />선정되지 않았더라도 실망하지 마시고<br />다음 기회를 기대해 주세요!
        </p>
      </div>
    </a>

    <div id="menu_sub">
      <!-- 규정집 부분 -->
      <a href="#">
        <div class="menu_1">
          <span><i class="fas fa-bookmark fa-2x"></i></i></span>
          <h1>규정집</h1>
          <p>
            음악 선정 과정을 투명하게 공개합니다.<br />본 규정집에 따라 심의가 진행되오니<br />신청 전 한 번 읽어주세요.
          </p>
        </div>
      </a>

      <!-- 공지사항 부분 -->
      <a href="#">
        <div class="menu_1">
          <span><i class="fas fa-chalkboard fa-2x"></i></i></span>
          <h1>공지</h1>
          <p>
            방송부나 MuMu 운영 일정과 관련한 공지입니다.<br />혹시 방송부의 새로운 소식이<br />궁금하시다면 방문해 주세요!
          </p>
        </div>
      </a>
    </div>
    <div id="footer">
      <a href="opensource.php">
        <p>본 서비스에는 오픈소스가 사용되었습니다.<br />제작자분들께 감사드립니다.</p>
      </a>
      <p>(c) 2020 <b>JoongiHong</b> (bracket) All Rights Reserved.</p>
    </div>
    <script src="https://kit.fontawesome.com/139b8c0516.js" crossorigin="anonymous"></script>
  </body>

</html>