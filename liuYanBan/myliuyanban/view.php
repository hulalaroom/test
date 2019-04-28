<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/28 0028
 * Time: 上午 10:20
 */
$db = new mysqli('127.0.0.1','root','root','test');
if($db->connect_errno){
    echo '連接失敗';
}
$db->query("set names UTF8 ");

$page = empty($_POST['page'])?1:$_POST['page'];
$limit = ($page-1)*5;
$page = $page*5;

//查數據
$sql2 =" select * from `msg` group by id desc ";
$redata = $db->query($sql2);
$result = mysqli_fetch_all($redata,1);
foreach ($result as $k=> $v){
    $data[]=$v;
    $data[$k]['intime'] = date('Y-m-d h:i:s',$v['intime']);
}
echo json_encode($data);