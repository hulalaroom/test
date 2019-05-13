<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/25 0025
 * Time: 下午 9:01
 */

$Fruit = array(
    'apple'=>'苹果',
    'banana'=>'香蕉',
);
json_encode(['Fruit '=>array($Fruit)]);

//date_default_timezone_set('PRC');
 date('Y-m-d H:i:s',time()-86400);
$meail = '12w-121@qq.tf';
$regex3 = ' /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/';
if(preg_match($regex3,$meail)){
}else{
}
function foo()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs\n";
    echo '</br>';
    echo 'tttt';
}

foo(1, 2, 3);
echo "
<select id='select_id' onchange='a()' >
        <option value=”1”>text1</option>
        <option value=”8”>text2</option>
        <option value=”3”>text3</option>
        <option value=”4”>text4</option>
</select>
    <script>
    function a() {
       var sel = document.getElementById('select_id');
       var sid=sel.selectedIndex;
       console.log(sid)
        console.log(sel[sid].value+'-'+sel[sid].innerHTML)
    }
</script>
";
echo "
<form id=”form_id” onclick='a()'>
    <input type='radio'  name=”month” value=1/ >
    <input type='radio'  name=”month” value=2/ >
    <input type='radio'  name=”month” value=3/ >
    <input type='radio'  name=”month” value=4/ >
</form>
<script>
function a() {
  var checked =document.getElementsByName('month');
    for(var index=0;index<checked.length;index++){
    if(checked[index].checked==true){
        var a = checked[index].value;
     console.log(a);
    }
  }
}
    // var a = $(\"input[name='radio']:checked\").val();
</script>

";

