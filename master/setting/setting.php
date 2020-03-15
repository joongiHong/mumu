<?php
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

unlink("../../config.php");
$write = fopen("../../config.php", "w");

$txt = "<?php ";
fwrite($write, $txt);

// [DB 설정]
$txt = "\$host = '" . $_POST['db_host'] . "'; ";
fwrite($write, $txt);

$txt = "\$username = '" . $_POST['db_username'] . "'; ";
fwrite($write, $txt);

$txt = "\$password = '" . $_POST['db_password'] . "'; ";
fwrite($write, $txt);

$txt = "\$db = '" . $_POST['db_name'] . "'; ";
fwrite($write, $txt);

$txt = "\$con = mysqli_connect(\$host, \$username, \$password, \$db); ";
fwrite($write, $txt);

// 강제 utf8 고정 여부
if ($_POST['db_utf8_yn'] == 'on') {
    $txt = "\$su8 = 1; ";
    fwrite($write, $txt);

    $txt = 'mysqli_query($con, "set session character_set_connection=utf8;"); ';
    fwrite($write, $txt);

    $txt = 'mysqli_query($con, "set session character_set_results=utf8;"); ';
    fwrite($write, $txt);

    $txt = 'mysqli_query($con, "set session character_set_client=utf8;"); ';
    fwrite($write, $txt);
} else {
    $txt = "\$su8 = 0; ";
    fwrite($write, $txt);
}


// 구글 리캡차
if ($_POST['security_google_yn'] == 'on') {
    $txt = "\$recaptcha = 1; ";
    fwrite($write, $txt);

    $txt = "\$g_secretkey = '" . $_POST['security_google_secretkey'] . "'; ";
    fwrite($write, $txt);

    $txt = "\$g_sitekey = '" . $_POST['security_google_sitekey'] . "'; ";
    fwrite($write, $txt);
} else {
    $txt = "\$recaptcha = 0; ";
    fwrite($write, $txt);
}

// 학생 인증
if ($_POST['security_checkstudent_yn'] == 'on') {
    $txt = "\$checkstudent = 1; ";
    fwrite($write, $txt);
} else {
    $txt = "\$checkstudent = 0; ";
    fwrite($write, $txt);
}

// 서비스 중단
if ($_POST['manage_serviceoff_yn'] == 'on') {
    $txt = "\$serviceoff = 1; ";
    fwrite($write, $txt);

    $txt = "\$serviceoff_r = '" . $_POST['manage_serviceoff_reason'] . "' ;";
    fwrite($write, $txt);
} else {
    $txt = "\$serviceoff = 0; ";
    fwrite($write, $txt);
}

fclose($write);
echo "<script>alert('설정 변경이 완료되었습니다.');</script>";
echo "<script>history.back()</script>;";
