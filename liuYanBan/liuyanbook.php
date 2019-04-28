<?php
//日期
$weekday = ["日","一","二","三","四","五","六"];
date_default_timezone_set('Asia/Shanghai');
$now = getdate(time());
$week=$now['wday'];
$date = date("Y年m月d日  星期$weekday[$week]");
//echo $date;

//设置页码变量
//默认首页p=1
$page= empty($_GET['p']) ? 1: $_GET['p'];
//页码
$showPage = 3;
//计算偏移量
$pageoffset = ($showPage-1)/2;

//连接数据库，取数据
$host = "127.0.0.1";
$dbuser = "root";
$password = "root";
$dbname = "test";
$db = new mysqli($host, $dbuser, $password, $dbname);

if ($db->connect_errno != 0) {
    echo "连接失败:";
    echo $db->connect_error;
    exit;
}

//分页
$db->query("set names utf8");
$limit =  ($page-1) * 5;
$sql = "select * from msg order by id desc limit {$limit},5";

$mysqli_result = $db->query($sql);


if ($mysqli_result == false) {
    echo "SQL错误！";
    exit;
}
//var_dump($mysqli_result);

//总页数
$total_sql = "select count(*) from msg";
$total_result = $db->query($total_sql);
$total_array = mysqli_fetch_array($total_result,MYSQLI_ASSOC);
$total = $total_array["count(*)"];
//var_dump($total_result) ;
//计算页数
$total_pages = ceil($total/5);
//echo $total_pages;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>三态电子商务有限公司</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript"></script>
</head>
<body>
<div class="contentout">
    <div class="date"><?php echo $date;?></div>

    <div class="h">
        <h1>三态电子商务有限公司</h1>
        <h2>留言板</h2>
    </div>
    <div class="all">
        <div class="add">
            <form action="liuyan.php" method="post">
                <textarea name="content" class="content" cols="60" rows="8"></textarea><br>
                留言人：<input style="padding:6px 8px"; name="user" class="user" type="text"/>
                <input class="btn" type="submit" value="提交留言"/>
        </div>
        </form>

        <!--留言内容-->
        <?php
        while($row = mysqli_fetch_array($mysqli_result,MYSQLI_ASSOC)) {
            ?>


            <div class="msg">
                <div class="info">
                    <span class="user"><?php echo $row["user"];?></span>
                    <span class="num"><?php echo "&nbsp;&nbsp;".$row["id"]."楼";?></span>
                    <span class="time"><?php echo date("Y-m-d H:i:s",$row["intime"]);?></span>
                </div>
                <div class="content">
                    <?php echo $row["content"];?>
                </div>
            </div>
            <?php
        }
        ?>

    </div>

    //页码部分
    <div class="page">
        <?php
        $page_banner = "";
        if ($page > 1) {
            $page_banner = "<a href='liuyanbook.php?p=1'>首页</a>";
            $page_banner.= "&nbsp;&nbsp;"."<a href='liuyanbook.php?p=".($page-1)."'>上一页</a>";
        }

        //初始化前面页码数据
        $start = 1;
        $end = $total_pages;
        if ($total_pages > $showPage) {
            if($page > $pageoffset + 1) {
                $page_banner.="...";
            }
            if ($page > $pageoffset) {
                $start = $page - $pageoffset;
                $end = $total_pages > $page + $pageoffset ? $page + $pageoffset : $total_pages;
            } else {
                $start = 1;
                $end = $total_pages > $showPage ? $showPage : $total_pages;
            }
            if ($page + $pageoffset > $total_pages) {
                $start = $start - ($page + $pageoffset - $total_pages);
            }
        }

        //显示前面的页码
        for($i=$start;$i<$end;$i++) {
            $page_banner.= "&nbsp;&nbsp;"."<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
        }

        //显示尾部省略
        if ($total_pages > $showPage && $total_pages > $page + $pageoffset) {
            $page_banner.="...";
        }

        if ($page < $total_pages) {
            $page_banner.= "&nbsp;&nbsp;"."<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
            $page_banner.= "&nbsp;&nbsp;"."<a href='liuyanbook.php?p=".$total_pages."'>尾页</a>";
        }

        //页码部分字符拼接
        $page_banner.= "&nbsp;&nbsp;"."共".$total_pages."页";
        $page_banner.= "&nbsp;&nbsp;"."共".$total."条留言";
        $page_banner.= "<form action='liuyanbook.php' method='get' style= display:inline>";
        $page_banner.= "&nbsp;&nbsp;"."跳转到第<input type='text' size='1' name='p'>页";
        $page_banner.= "<input type='submit' value='确定'>";
        $page_banner.= "</form>";
        echo  $page_banner;
        ?>
    </div>
</div>
</body>
</html>