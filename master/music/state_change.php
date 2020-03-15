<?php
require '../../config.php';

session_start();
if ($_SESSION['user_id'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if ($_SESSION['user_grade'] == "0" or $_SESSION['user_grade'] == "1" or $_SESSION['user_grade'] == "4" or $_SESSION['user_grade'] == "5") {
    //
} else {
    echo "<script>alert('권한이 부족합니다.\\n음악 관리는 0, 1, 4, 5부 관리자만 접근할 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

$yn = $_GET['yn'];
$num = $_GET['num'];

if ($yn == 'y') {
    $sql = "UPDATE music SET state=1 WHERE num=$num";
    $result = mysqli_query($con, $sql);
    echo "<script>alert('수정이 완료되었습니다.');</script>";
    echo "<script>history.back()</script>;";
} else if ($yn == 'n') {
    $sql = "UPDATE music SET state=2 WHERE num=$num";
    $result = mysqli_query($con, $sql);
    echo "<script>alert('수정이 완료되었습니다.');</script>";
    echo "<script>history.back()</script>;";
} else {
    $num = $_POST['num'];
    $reason = $con->escape_string($_POST['reason']);
    $sql = "UPDATE music SET reason='$reason' WHERE num=$num";
    $result = mysqli_query($con, $sql);
    echo "<script>alert('수정이 완료되었습니다.');</script>";
    echo "<script>window.close()</script>;";
}
