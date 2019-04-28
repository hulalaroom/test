<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/28 0028
 * Time: 下午 8:12
 */

$conType = $_POST['cType'];
$ip = $_SERVER["REMOTE_ADDR"];
$user = $_POST['user'];
$msg = $_POST['msg'];

//初始化数据库 建表
$con = new mysqli('localhost','root','root','test');
if(!$con){
    echo '连接失败';
}
if($conType == 2){
    $sql = "
       create table `mymsg` (
       `id` int(10) unsigned AUTO_INCREMENT,
       `ip` varchar(255) not null default '',
       `user` varchar(255) not null default '',
       `msg` varchar(255) not null default '',
       `uptime` varchar(255) not null,
       primary key (`id`)  
       )  DEFAULT AUTO_INCREMENT=1 CHARSET=utf8
";
}elseif($conType ==1 ){
    $time  = time();
    $sql = "insert into (ip , user , msg , uptime) values ({$ip},{$user},{$msg},{$time})";
}
 $con->query($sql);
//查询数据库
$mysql = "select * from mymsg order by id desc limit 0,5";
$data =$con->query($mysql);
$result = mysqli_fetch_all($data);
echo  $result;
$con->close();

