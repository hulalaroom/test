
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/28 0028
 * Time: 下午 8:54
 */
?>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<body onload="fun2()">
<div >
    <form >
        <div>
            用户： <input id="user" type="text">
            留言内容 ：<input id="msg" type="text">
            <button onclick="fun1()" value="">提交</button>
        </div>
        <div id="content">


        </div>
    </form>
</div>
</body>
<script>
    function fun1() {
        $.ajax({
            type:"POST",
            url:"linuxban.php",
            data:{cType:1,user:$("#user").value,msg:$("#msg").value},
            dataType:"json",
            success:function(data){
                console.log(data)
                $("#content").empty();
                var html = '';
                $.each(data,function(index,item){
                    html += "<span>"+item.ip+"</span>";
                })
                $("#content").html(html)
            }
    });


    }
</script>