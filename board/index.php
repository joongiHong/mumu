<?php require '../config.php'; ?>
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
      <h1>공지사항</h1>
    </div>

    <!-- 설명 부분 -->
    <div class="subtitle">
      <p>
        방송부나 MuMu 관련 소식을<br />
        알려드립니다.
      </p>
    </div>

    <!-- 목록 부분 -->
    <div class="content_2">
      <?php
      $sql = "SELECT * FROM board ORDER BY num DESC";
      $result = mysqli_query($con, $sql);
      while($row = mysqli_fetch_array($result)) {
        echo '<a href="view.php?num='.$row['num'].'">';
        echo '<div class="board_div">';
        echo '<p>'.$row['date'].'</p>';
        echo '<h3>'.addslashes($row['title']).'</h3>';
        echo '</div>';
        echo '</a>';
      }
      ?>
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
    <script type="text/javascript">
      grecaptcha.ready(function() {
        grecaptcha
          .execute("<?php echo $g_sitekey ?>", {
            action: "homepage"
          })
          .then(function(token) {
            document.getElementById("g-recaptcha").value = token;
          });
      });
    </script>
  </body>
</html>
