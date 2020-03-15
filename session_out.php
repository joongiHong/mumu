<?php
$url = $_GET['url'];
session_start();
$_SESSION = array();

echo "<script>location.href='" . $url . "';</script>";
