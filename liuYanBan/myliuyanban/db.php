<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/27 0027
 * Time: 下午 6:26
 */
$db = new mysqli('127.0.0.1','root','root','test');
if($db->connect_errno){
    echo '連接失敗';
}
$db->query("set names UTF8 ");

$content = $_POST['content'];
$user = $_POST['user'];
$ip = $_SERVER["REMOTE_ADDR"];
//$page = empty($_POST['page'])?1:$_POST['page'];
//$limit = ($page-1)*5;
//$page = $page*5;
$time = time();
$sql = "insert into msg (content , user , intime ,ip ) values ('{$user}' ,'{$content}' ,'{$time}' ,'{$ip}') ";
$a = $db->query($sql);

//查數據
$sql2 =" select * from `msg` order by id desc ";
$redata = $db->query($sql2);
$result = mysqli_fetch_all($redata,1);
foreach ($result as $k=>$v){
    $data[]=$v;
    $data[$k]['intime'] = date('Y-m-d h:i:s',$v['intime']);
}
echo json_encode($data);



