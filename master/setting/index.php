<?php
require '../../config.php';

session_start();
if ($_SESSION['user_id'] == "") {
  echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
  echo "<script>history.back()</script>;";
  exit;
}

if ($_SESSION['user_grade'] == "0") {
  //
} else {
  echo "<script>alert('권한이 부족합니다.\\상세 설정은 최고 관리자만 접근할 수 있습니다.');</script>";
  echo "<script>history.back()</script>;";
  exit;
}

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
    <h1><?php echo $name ?>님</h1>
    <a href="../../session_out.php?url=index.php">
      <p>로그아웃</p>
    </a>
    |
    <a href="../user/my_password.php">
      <p>비밀번호 변경</p>
    </a>
  </div>
  <header>
    <a href="../index.php"><img src="../../image/logo.png" alt="mumu" /></a>
    <br />
    <br />
    <a href="../music">
      <h2>신청목록</h2>
    </a>
    <a href="../student">
      <h2>학생관리</h2>
    </a>
    <a href="../board">
      <h2>게시판관리</h2>
    </a>
    <a href="../setting">
      <h2>상세설정</h2>
    </a>
    <hr />
  </header>
  <div id="main_content">
    <h1 class="title">상세설정</h1>
    <p>MuMu 시스템과 관련한 상세설정을 하실 수 있습니다.
      <br />설정 후에는 반드시 저장 버튼을 클릭하셔야 합니다.
    </p>
    <br />
    <form action="setting.php" method="POST" />
    <!-- DB 설정 -->
    <h2 class="title_group"><i class="fas fa-server"></i> DB 설정 <span class="badge badge-danger">주의</span></h2>
    <p>MuMu 시스템의 DB 연동과 관련된 설정입니다.</p>
    <hr />
    <label for="db_host">DB 호스트</label>
    <input type="text" class="i_text_1" name="db_host" placeholder="DB 호스트" <?php echo "value='" . $host . "'"; ?> />
    <br />
    <label for="db_username">DB 사용자 이름</label>
    <input type="text" class="i_text_1" name="db_username" placeholder="DB 사용자 이름"" <?php echo "value='" . $username . "'"; ?>/>
        <br/>
        <label for=" db_password">DB 비밀번호</label>
    <input type="text" class="i_text_1" name="db_password" placeholder="DB 비밀번호" <?php echo "value='" . $password . "'"; ?> />
    <br />
    <label for="db_name">DB 이름</label>
    <input type="text" class="i_text_1" name="db_name" placeholder="DB 이름" aria-describedby="db_name_helper" <?php echo "value='" . $db . "'"; ?> />
    <small id="db_name_helper" class="form-text text-muted">
      DB 설정은 필요하지 않은 경우 수정하지 마십시오.
    </small>
    <br />
    <div class="custom-control custom-switch">
      <input type="checkbox" name="db_utf8_yn" class="custom-control-input" id="db_utf8_yn" aria-describedby="db_utf8_yn_helper" <?php if ($su8 == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                  } ?>>
      <label class="custom-control-label" for="db_utf8_yn">강제 UTF-8 인코딩 고정 <span class="badge badge-warning">비권장</span></label>
    </div>
    <small id="db_utf8_yn_helper" class="form-text text-muted">
      인코딩에 문제가 있을 경우 통신 도중 사용되는 인코딩을 UTF-8로 고정할 수 있습니다.<br />
      단 서버에 무리를 줄 수 있습니다.
    </small>

    <br /><br />

    <!-- 보안 설정 -->
    <h2 class="title_group"><i class="fas fa-shield-alt"></i> 보안</h2>
    <p>MuMu 시스템의 보안과 관련된 설정입니다.</p>
    <hr />
    <h3 class="title_sgroup">구글 리캡차 (reCAPTCHA)</h3>
    <div class="custom-control custom-switch">
      <input type="checkbox" name="security_google_yn" class="custom-control-input" id="security_google_yn" <?php if ($recaptcha == 1) {
                                                                                                              echo "checked";
                                                                                                            } ?>>
      <label class="custom-control-label" for="security_google_yn">구글 리캡차 사용하기 <span class="badge badge-primary">추천</span></label>
    </div>
    <label for="security_google_secretkey">API 시크릿키</label>
    <input type="text" class="i_text_1" name="security_google_secretkey" placeholder="리캡차 api 시크릿키" <?php if ($recaptcha == 1) {
                                                                                                      echo "value='" . $g_secretkey . "'";
                                                                                                    } ?> />
    <br />
    <label for="security_google_sitetkey">API 사이트키</label>
    <input type="text" class="i_text_1" name="security_google_sitekey" placeholder="리캡차 api 사이트키" aria-describedby="security_google_sitekey_helper" <?php if ($recaptcha == 1) {
                                                                                                                                                      echo "value='" . $g_sitekey . "'";
                                                                                                                                                    } ?> />
    <small id="security_google_sitekey_helper" class="form-text text-muted">
      리캡차 api 사이트와 시크릿키는 리캡차 홈페이지에서 얻을 수 있습니다.
    </small>
    <br />
    <h3 class="title_sgroup">학생 인증</h3>
    <div class="custom-control custom-switch">
      <input type="checkbox" name="security_checkstudent_yn" class="custom-control-input" id="security_checkstudent_yn" <?php if ($checkstudent == 1) {
                                                                                                                          echo "checked";
                                                                                                                        } ?>>
      <label class="custom-control-label" for="security_checkstudent_yn">학생 인증 사용하기</label>
    </div>
    <small id="security_checkstudent_helper" class="form-text text-muted">
      학생 인증은 반드시 개인정보처리방침을 학생 혹은 학부모로부터 제공, 동의받은 후 진행하여야 합니다.
    </small>

    <br /><br />

    <!-- 운영 설정 -->
    <h2 class="title_group"><i class="fas fa-award"></i> 운영</h2>
    <p>MuMu 시스템의 운영과 관련된 설정입니다.</p>
    <hr />
    <h3 class="title_sgroup">서비스 일시 중단</h3>
    <div class="custom-control custom-switch">
      <input type="checkbox" name="manage_serviceoff_yn" class="custom-control-input" id="manage_serviceoff_yn" <?php if ($serviceoff == 1) {
                                                                                                                  echo "checked";
                                                                                                                } ?>>
      <label class="custom-control-label" for="manage_serviceoff_yn">서비스 일시 중단</label>
    </div>
    <label for="manage_serviceoff_reason">중단 사유</label>
    <input type="text" class="i_text_1" name="manage_serviceoff_reason" placeholder="중단 사유" aria-describedby="smanage_serviceoff_reason_helper" <?php if ($serviceoff == 1) {
                                                                                                                                                  echo "value='" . $serviceoff_r . "'";
                                                                                                                                                } ?> />
    <small id="manage_serviceoff_reason_helper" class="form-text text-muted">
      학생들의 음악 신청을 일시 중단할 수 있습니다.
    </small>
    <br />
    <h3 class="title_sgroup">관리자 계정 관리</h3>
    <a href="user_add.php" onclick="window.open(this.href, '_blank', 'width=500px,height=350px,toolbars=no,scrollbars=no'); return false;"><button class="i_button_1" style="margin-top: 0;">계정 추가</button></a>
    <a href="user_del.php" onclick="window.open(this.href, '_blank', 'width=500px,height=350px,toolbars=no,scrollbars=no'); return false;"><button class="i_button_1" style="margin-top: 0;">계정 삭제</button></a>
    <a href="user_change.php" onclick="window.open(this.href, '_blank', 'width=500px,height=350px,toolbars=no,scrollbars=no'); return false;"><button class="i_button_1" style="margin-top: 0;" aria-describedby="bbb_helper">계정 권한 변경</button></a>
    <small id="bbb_helper" class="form-text text-muted">
      관리자 페이지에 접근할 수 있는 관리자 계정을 추가 및 삭제, 권한 변경을 하실 수 있습니다.
    </small>

    <!-- 설정 저장 -->
    <br />
    <br />
    <button type="submit" class="i_button_1">저장</button>
    </form>
  </div>
  <script src="https://kit.fontawesome.com/139b8c0516.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>

</html>