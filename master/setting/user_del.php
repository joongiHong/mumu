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

if ($_POST['yn'] == "1") {
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $sql = "SELECT * FROM user WHERE id='$id'";
    $re = $con->query($sql);
    $info = mysqli_fetch_array($re);

    if (mysqli_num_rows($re) == 1) {
        if (!password_verify($pw, $info['password'])) {
            echo "<script>alert('비밀번호가 바르지 않습니다.');</script>";
            echo "<script>window.close();</script>;";
        } else {
            $sql = "DELETE FROM user WHERE id='$id'";
            $re = $con->query($sql);
            echo "<script>alert('삭제가 완료되었습니다.');</script>";
            echo "<script>window.close();</script>";
        }
    } else {
        echo "<script>alert('계정을 찾지 못하였습니다.\\n아이디를 확인하여 주십시오.');</script>";
        echo "<script>window.close();</script>;";
    }
}
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
</head>

<body style="padding: 10px;">
    <h1 style="color: #395382;">관리자 계정 삭제</h1>
    <p>관리자 계정을 삭제할 수 있습니다.</p>
    <form action="user_del.php" method="POST">
        <input type="text" name="id" placeholder="아이디" class="i_text_1" /><br />
        <input type="password" name="pw" placeholder="비밀번호" class="i_text_1" /><br />
        <input type="hidden" name="yn" value="1" />
        <button type="submit" class="i_button_1">삭제</button>
    </form>
</body>

</html>