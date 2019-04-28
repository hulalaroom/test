<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/27 0027
 * Time: 下午 6:17
 */

?>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<body  onload="fun1()">
    <form action="db.php" method="post">
        <div>
            留言內容：<input id="content" name="content" type="text" style="padding:18px 28px">
            留言人姓名：<input id="user" name="user" type="text">
            <button type="button" onclick="sub()">提交</button>
        </div>
        <div id="msg">
        </div>

    </form>
    <div class="page">
<!--        --><?php
//        $page_banner = "";
//        $page = 1;
//        if ($page > 1) {
//        $page_banner = "<a href='liuyanbook.php?p=1'>首页</a>";
//        $page_banner.= "&nbsp;&nbsp;"."<a href='liuyanbook.php?p=".($page-1)."'>上一页</a>";
//        }
//        ?>
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
                $("#msg").empty();
                console.log(data)
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
</html>
