<?php
require '../config.php';

session_start();
if ($checkstudent == 1) {
    if ($_SESSION['s_num'] == "") {
        echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
        echo "<script>history.back()</script>;";
        exit;
    }
}

if ($recaptcha == 1) {
    $data = array(
        'secret' => $g_secretkey,
        'response' => $_POST['g-recaptcha']
    );

    $url = "https://www.google.com/recaptcha/api/siteverify";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $chch = curl_exec($ch);
    curl_close($ch);

    $chk = json_decode($chch, true);

    if (!$chk['success']) {
        echo "<script>alert('리캡챠 인증에 실패하였습니다.\\n정상 접근하시기 바랍니다.');</script>";
        echo "<script>history.back()</script>;";
        exit;
    }
}

if ($_POST['m_name'] == "" or $_POST['m_singer'] == "") {
    echo "<script>alert(음악 제목이나 가수가 비어 있습니다.\\n입력하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

$m_name = $_POST['m_name'];
$m_singer = $_POST['m_singer'];

if (mysqli_connect_errno()) {
    echo "<script>alert('MySQL 접근에 실패하였습니다.";
    echo mysqli_connect_error();
    echo "');</script>";
}

$sql = "INSERT INTO music (name, singer, state, reason) VALUES('$m_name', '$m_singer', 0, '심의 중입니다.')";
$re = $con->query($sql);

if ($re) {
    $sql = "SELECT * FROM music WHERE name='$m_name' AND singer='$m_singer' ORDER BY num DESC";
    $re = $con->query($sql);
    $m_info = mysqli_fetch_array($re);
    echo "<script>location.href='finish.php?name=";
    echo $m_info['name'];
    echo "&singer=";
    echo $m_info['singer'];
    echo "&num=";
    echo $m_info['num'];
    echo "';</script>";
} else {
    echo "<script>alert('음악 신청에 실패하였습니다.\\n방송부에 문의하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
}
