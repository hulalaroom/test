<?php
include('class_input.php');
include('dbcontent.php');
//include('str.php');

$content = $_POST["content"];
$user = $_POST["user"];


//对输入的内容和留言人进行检测，不能含有李星和王瑶两个名字
$input = new input();

//检测显示的结果

$is = $input->post($content);
if ($is == false) {
    die("留言内容不能为空或者存在禁止关键字!");
}

$is = $input->post($user);
if ($is == false) {
    die("留言人不能为空或者存在禁止关键字！");
}



//将留言内容写入数据库
$time = time();
$sql = "insert into msg (content, user, intime) values ('{$content}','{$user}','{$time}')";

$is = $db->query($sql);

header("location:liuyanbook.php");//跳回主页
?>