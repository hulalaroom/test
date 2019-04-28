<?php
$host = "localhost";
$dbuser = "root";
$password = "root";
$dbname = "test";

$db = new mysqli($host, $dbuser, $password, $dbname);
if ($db->connect_errno != 0) {
    die("连接数据库失败！");
}
$db->query("set names UTF8");
?>