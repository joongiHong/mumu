<?php
require '../config.php';

session_start();
if ($_SESSION['user_id'] != "") {
    echo "<script>location.href='music';</script>";
    exit;
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

if ($_POST['id'] == "" or $_POST['password'] == "") {
    echo "<script>alert('아이디 혹은 비밀번호가 비어 있습니다.\\n입력하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

$id = $con->escape_string($_POST['id']);
$password = $_POST['password'];

if (mysqli_connect_errno()) {
    echo "<script>alert('MySQL 접근에 실패하였습니다.";
    echo mysqli_connect_error();
    echo "');</script>";
    exit;
}

$sql = "SELECT * FROM user WHERE id='$id'";
$re = $con->query($sql);
$info = mysqli_fetch_array($re);

if (mysqli_num_rows($re) == 1) {
    if (!password_verify($password, $info['password'])) {
        session_start();
        $_SESSION['user_id'] = "";
        echo "<script>alert('계정을 찾지 못하였습니다.\\n방송부에 문의하여 주십시오.');</script>";
        echo "<script>history.back()</script>;";
    } else {
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $info['name'];
        $_SESSION['user_grade'] = $info['grade'];
        echo "<script>alert('" . $_SESSION['user_grade'] . "');</script>";
        echo "<script>location.href='music';</script>";
    }
} else {
    session_start();
    $_SESSION['user_id'] = "";
    echo "<script>alert('계정을 찾지 못하였습니다.\\n방송부에 문의하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
}
