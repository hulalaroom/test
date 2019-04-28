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
var_dump($user);
die;

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
    $sql2121= "CREATE TABLE `msg` (
	`id` INT (10) NOT NULL auto_increment,
	`content` VARCHAR (100) NOT NULL,
	`qq` CHAR (20),
	`user` VARCHAR (40) NOT NULL,
	`intime` VARCHAR (40) NOT NULL,
	`ip` VARCHAR (20) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `qq` (`qq`)
) ENGINE = INNODB AUTO_INCREMENT = 1 CHARSET = utf8;";
}elseif($conType ==1 ){
    $time  = time();
    $sql = "insert into mymsg (ip , user , msg , uptime) values ('{$ip}','{$user}','{$msg}','{$time}')";
}
 $a = $con->query($sql);
//查询数据库
$mysql = "select * from mymsg order by id desc ";
$data =$con->query($mysql);
$result = mysqli_fetch_all($data);
echo  json_encode($result);
$con->close();

