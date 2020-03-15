<?php
require '../config.php';

if ($_POST['m_num'] == "") {
    echo "<script>alert('고유번호가 비어 있습니다.\\n입력하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if (preg_match('/(and|or|--|where|from|select|union|drop|delete)/i', $_POST['m_num'])) {
    echo "<script>alert('보안 상의 이유로 금지된 문자열이 있습니다\\n학번과 이름만을 입력하시기 바랍니다.\\n정보보호를 위해 협조 바랍니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

$m_num = $_POST['m_num'];

if (mysqli_connect_errno()) {
    echo "<script>alert('MySQL 접근에 실패하였습니다.";
    echo mysqli_connect_error();
    echo "');</script>";
}

$sql = "SELECT * FROM music WHERE num='$m_num'";
$re = $con->query($sql);

if (mysqli_num_rows($re) == 1) {
    $sql = "SELECT * FROM music WHERE num='$m_num'";
    $re = $con->query($sql);
    $m_info = mysqli_fetch_array($re);
    echo "<script>location.href='finish.php?name=";
    echo addslashes($m_info['name']);
    echo "&singer=";
    echo addslashes($m_info['singer']);
    echo "&num=";
    echo $m_info['num'];
    echo "&state=";
    echo $m_info['state'];
    echo "&reason=";
    echo addslashes($m_info['reason']);
    echo "';</script>";
} else {
    echo "<script>alert('올바르지 않은 고유번호입니다.\\n다시 한번 확인하여 주십시오.');</script>";
    echo "<script>history.back()</script>;";
}
