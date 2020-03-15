<?php
require '../../config.php';

session_start();
if ($_SESSION['user_id'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}


$id = $_SESSION['user_id'];
$old = $_POST['oldpassword'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "SELECT * FROM user WHERE id='$id'";
$re = $con->query($sql);
$info = mysqli_fetch_array($re);

if (mysqli_num_rows($re) == 1) {
    if (!password_verify($old, $info['password'])) {
        echo "<script>alert('기존 비밀번호가 바르지 않습니다.');</script>";
        echo "<script>history.back()</script>;";
    } else {
        $sql = "UPDATE user SET password='$hash' WHERE id='$id'";
        $re = $con->query($sql);
        echo "<script>alert('변경이 완료되었습니다.');</script>";
        echo "<script>location.href='../music';</script>";
    }
} else {
    echo "<script>alert('계정을 찾지 못하였습니다.\\n세션이 만료된 것 같습니다.');</script>";
    echo "<script>history.back()</script>;";
}
