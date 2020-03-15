<?php
require '../../config.php';

session_start();
if ($_SESSION['user_id'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n학생 인증 후 접근하여 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if ($_SESSION['user_grade'] == "0" or $_SESSION['user_grade'] == "3" or $_SESSION['user_grade'] == "4" or $_SESSION['user_grade'] == "5") {
    //
} else {
    echo "<script>alert('권한이 부족합니다.\\n게시판 관리는 0, 1, 3, 5부 관리자만 접근할 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

$content = $con->escape_string($_POST['content']);
$title = $con->escape_string($_POST['title']);
$writer = $_SESSION['user_name'];
$new = $_POST['new'];

if ($new == 0) {
    $num = $_POST['num'];
    $sql = "UPDATE board SET content='$content', title='$title' WHERE num=$num";
    $result = mysqli_query($con, $sql);
    echo "<script>alert('수정이 완료되었습니다.');</script>";
    echo "<script>location.href='index.php'</script>;";
} else {
    $num = $_POST['num'];
    $sql = "INSERT INTO board (writer, title, content) VALUES('$writer', '$title', '$content')";
    $result = mysqli_query($con, $sql);
    echo "<script>alert('작성이 완료되었습니다.');</script>";
    echo "<script>location.href='index.php'</script>;";
}
