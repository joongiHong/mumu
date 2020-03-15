<?php
$write = fopen("../config.php", "w");

$txt = "<?php ";
fwrite($write, $txt);

$txt = "\$host = '" . $_POST['db_host'] . "'; ";
fwrite($write, $txt);

$txt = "\$username = '" . $_POST['db_id'] . "'; ";
fwrite($write, $txt);

$txt = "\$password = '" . $_POST['db_password'] . "'; ";
fwrite($write, $txt);

$txt = "\$db = '" . $_POST['db_name'] . "'; ";
fwrite($write, $txt);

$txt = "\$con = mysqli_connect(\$host, \$username, \$password, \$db); ";
fwrite($write, $txt);

$txt = "\$su8 = 1; ";
fwrite($write, $txt);

$txt = 'mysqli_query($con, "set session character_set_connection=utf8;"); ';
fwrite($write, $txt);

$txt = 'mysqli_query($con, "set session character_set_results=utf8;"); ';
fwrite($write, $txt);

$txt = 'mysqli_query($con, "set session character_set_client=utf8;"); ';
fwrite($write, $txt);

$txt = "\$recaptcha = 0; ";
fwrite($write, $txt);

$txt = "\$checkstudent = 0; ";
fwrite($write, $txt);

$txt = "\$serviceoff = 0; ";
fwrite($write, $txt);

fclose($write);

require '../config.php';

$hash = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
$id = $_POST["user_id"];
$name = $_POST["user_name"];
$num = $_POST["user_num"];

$sql = "CREATE TABLE music (num INT PRIMARY KEY auto_increment, name VARCHAR(100) NOT NULL, singer VARCHAR(32) NOT NULL, state INT NOT NULL, date TIMESTAMP DEFAULT NOW(), reason TEXT NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$re = $con->query($sql);

$sql = "CREATE TABLE board (num INT PRIMARY KEY auto_increment, writer VARCHAR(100) NOT NULL, title VARCHAR(70) NOT NULL, content LONGTEXT NOT NULL, date TIMESTAMP DEFAULT NOW()) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$re = $con->query($sql);

$sql = "CREATE TABLE user (id VARCHAR(100) PRIMARY KEY, name VARCHAR(32) NOT NULL, password VARCHAR(200) NOT NULL, grade INT NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$re = $con->query($sql);

$sql = "CREATE TABLE student (num INT PRIMARY KEY, name VARCHAR(32) NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$re = $con->query($sql);

$sql = "INSERT INTO user (id, name, password, grade) VALUES('$id', '관리자', '$hash', 0)";
$re = $con->query($sql);

$sql = "INSERT INTO student (num, name) VALUES($num, '$name')";
$re = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MuMu - 음악신청서비스</title>
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/setup.css" />
  <link rel="shortcut icon" href="../image/icon.ico" />
  <meta name="theme-color" content="#36537f" />
</head>

<body>
  <header>
    <img src="../image/logo.png" alt="mumu" />
    <h1>설치 완료!</h1>
    <hr />
  </header>
  <br />
  <br />
  <p>MuMu를 설치하기 위한 절차가 모두 끝이 났습니다.</p>
  <p>이제 편리하게 음악 신청을 받을 수 있는 MuMu를 즐겨보세요!</p>
  <br />
  <br />
  <hr />
  <a href="../index.php"><button type="submit" classs="i_button_1">시작하기</button></a>
  </form>
</body>

</html>