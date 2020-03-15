<?php
require '../config.php';

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

if ($_POST['u_num'] == "" or $_POST['u_name'] == "") {
    echo "<script>alert('학번 혹은 이름이 비어 있습니다.\\n입력하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

$u_num = $con->escape_string($_POST['u_num']);
$u_name = $con->escape_string($_POST['u_name']);

if (mysqli_connect_errno()) {
    echo "<script>alert('MySQL 접근에 실패하였습니다.";
    echo mysqli_connect_error();
    echo "');</script>";
    exit;
}

$sql = "SELECT * FROM student WHERE num='$u_num'";
$re = $con->query($sql);

if (mysqli_num_rows($re) == 1) {
    $sql = "SELECT * FROM student WHERE num='$u_num' AND name='$u_name'";
    $re = $con->query($sql);

    if (mysqli_num_rows($re) == 1) {
        session_start();
        $_SESSION['s_num'] = $u_num;
        echo "<script>location.href='order.php';</script>";
    } else {
        session_start();
        $_SESSION['s_num'] = "";
        echo "<script>alert('학생 정보를 찾지 못하였습니다.\\n방송부에 문의하여 주십시오.');</script>";
        echo "<script>history.back()</script>;";
    }
} else {
    session_start();
    $_SESSION['s_num'] = "";
    echo "<script>alert('학생 정보를 찾지 못하였습니다.\\n방송부에 문의하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
}
