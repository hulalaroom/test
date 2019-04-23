<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16 0016
 * Time: 下午 1:16
 */
//php7 新属性 foreach()循环对数组内部指针不再起作用
$arr = [1,2,3];
foreach ($arr as &$val) {
    echo current($arr);// php7 全返回0
}
echo '<br>';
for($i=0;count($arr)>$i;$i++){
    echo $arr[$i];
}