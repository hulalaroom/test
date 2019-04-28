<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/27 0027
 * Time: 下午 6:17
 */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>qwe</title>
    <script type="text/javascript"></script>
</head>

<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
    function fun1(){
        $.ajax({
            type:"POST",
            url:"view.php",
            dataType:"json",
            data:'',
            success:function (data) {
                $("#msg").empty();
                var html = '';
                $.each(data,function(index,item){
                    html += " <span class='id'>"+item.id+"</span>"
                    html += " <span class='user'>"+item.user+"</span>"
                    html += " <span class='content'>"+item.content+"</span>"
                    html += " <span class='intime'>"+item.intime+"</span>"
                    html += " </br>"
                });
                $('#msg').html(html);
            }
        })
    }
</script>
<body  ">
<!--    <form action="db.php" method="post">-->
        <div>
            留言內容：<input id="content" name="content" type="text" style="padding:18px 28px">
            留言人姓名：<input id="user" name="user" type="text">
            <button type="button" onclick="sub()">提交</button>
        </div>
        <div id="msg">
        </div>

<!--    </form>-->
    </div>
</body>
<script type="application/javascript">
    function sub() {
        var c = $('#content').val();
        var u = $('#user').val();
        $.ajax({
          type:"POST",
          url:"db.php",
          data:{content:c,user:u},
          dataType:"json",
        success:function (data) {
              console.log(data)
            $("#msg").empty();
            var html = '';
            $.each(data,function(index,item){
                html += " <span class='id'>"+item.id+"</span>"
                html += " <span class='user'>"+item.user+"</span>"
                html += " <span class='content'>"+item.content+"</span>"
                html += " <span class='intime'>"+item.intime+"</span>"
                html += " </br>"
            });
            $('#msg').html(html);
        }
        });
    }
    //初始化页面


</script>
</html>
