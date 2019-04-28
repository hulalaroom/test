<?php

session_start();

header("content-type: image/png");

//生成白色底图
$image = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);

//在白色底图上生成4个彩色随机字符
/*1.生成4个数字
for($i=0;$i<4;$i++) {
    $fontsize = 6;
    $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
    $fontcontent = rand(0, 9);

    $x = ($i*100/4) + rand(5, 10);
    $y = rand(5, 10);

    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}*/

//2.生成随机字母数字
$captch_code = "";//将生成的验证码存入该变量中

for($i=0;$i<4;$i++) {
    $fontsize = 6;
    $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));

    //随机截取字母数字
    $data = "abcdefghijkmnopqrstuvwxyz23456789";
    $fontcontent = substr($data,rand(0,strlen($data)),1);
    $captch_code.= $fontcontent;//追加到验证码存放

    $x = ($i*100/4) + rand(5, 10);
    $y = rand(5, 10);

    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}

$_SESSION["authcode"] = $captch_code;//保存到session中

//在白色底图上生成随机点(干扰元素)
for($i=0;$i<200;$i++) {
    $pointcolor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
    imagesetpixel($image, rand(1, 29), rand(1, 29), $pointcolor);
}
//在白色底图上生成随机线(干扰元素)
for($i=0;$i<3;$i++) {
    $linecolor = imagecolorallocate($image, rand(80, 220), rand(80, 220), rand(80, 220));
    imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
}

imagepng($image);

imagedestroy($image);

?>