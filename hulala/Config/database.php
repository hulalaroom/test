<?php
namespace app\config;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23 0023
 * Time: 下午 8:26
 */
class  DB{
    function database(){
        $link = mysqli_connect('localhost','root','root','test');
        var_dump($link);

//1、连接数据库

        if (!$link) {

            exit('连接数据库失败');}

//2、判断数据库是否连接成功

        mysqli_set_charset($link,'utf8');

//3、设置字符集

        mysqli_select_db($link,'bbs');

//4、选择数据库

        $sql = "CREATE TABLE `tx_user` (
          `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
          `QQ` int(11)  NOT NULL DEFAULT '' COMMENT '唯一QQ号',
          `user_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '用户名',
          `sex` tinyint(2)  NOT NULL DEFAULT '' COMMENT '性别',
          `mobile` int(11)  NOT NULL DEFAULT '' COMMENT '电话',
          `create_time` int(11) DEFAULT '0',
          `update_time` int(11) DEFAULT '0',
         
        ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

//5、准备sql语句

        $res = mysqli_query($link,$sql);

//6、发送sql语句

        $result = mysqli_fetch_assoc($res);

        $result = mysqli_fetch_assoc($res);

//7、处理结果集

        mysqli_close($link);

//8、关闭数据库
    }
}
$log = new DB();
$log->database();
