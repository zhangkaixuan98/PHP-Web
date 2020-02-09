<?php
header("Content-Type: text/html;charset=utf-8");
include "php/link.php";
session_start();
if (isset ( $_SESSION ["username"])&&isset ( $_SESSION ["userid"])){

} else {
    echo "<script>alert('您还未登录');parent.location.href='login.php'; </script>";
}
?>
<!doctype html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <title>
    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/base.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/info.css" rel="stylesheet">
    <link href="css/m.css" rel="stylesheet">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/hc-sticky.js"></script>
    <script type="text/javascript" src="js/comm.js"></script>
    <!--[if lt IE 9]><script src="js/modernizr.js"></script><![endif]-->
    <script type="text/javascript">
        function checkForm(){
            var title = document.getElementById("title").value;
            var content = document.getElementById("content").value;
            if ( title  == "" || title  == null ){
                alert("请输入标题");
                return false;
            } else if ( content  == "" || content  == null ) {
                alert("请输入内容");
                return false;
            } else return true;
        }
    </script>
</head>
<body>
<header class="header-navigation" id="header">
    <nav><div class="logo"><a href="index.php">KaiX</a></div>
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="starlist">
            <li><a href="index.php">首页</a></li>
            <li><a href="search.php">搜索</a></li>
            <li><a href="publish.php">发表</a></li>
            <!--li><a href="follow.php">Fellow</a></li-->
            <!--li><a href="profile.php">个人主页</a></li-->
            <li><a href="message.php">消息</a></li>
        </ul>
    </nav>
</header>
<article>
    <aside>
        <div class="l_box" id="stickMe">
            <div class="search">
                <form action="search.php" method="post" name="searchform" id="searchform">
                    <input type="text" class="input_text" name="text" placeholder="文章标题" value="">
                    <input type="submit" class="input_submit" name="submit" value="搜索">
                </form>
            </div>
            <div class="fenlei">
                <h2>热门分类</h2>
                <ul>
                    <?php
                    $sql_label = "select ClassId,ClassName from Class";
                    $result = $link ->query($sql_label);
                    for($i = 1; $i < 4; $i++){
                        list ($classId,$className) = $result->fetch_row();
                        echo "<li><a href='search_class.php?classid=$classId&classname=$className '>$className</a></li>";
                    }
                    ?>
                    <li><a href="class_more.php">更多</a></li>
            </div>
            <div class="tuijian">
                <h2>热门文章</h2>
                <ul>
                    <?php
                    $sql_blog = "select BlogId,BlogTitle from Blog order by BlogView desc ";
                    $result = $link ->query($sql_blog);
                    for($i = 0; $i < 5; $i++){
                        list ($id,$Title) = $result->fetch_row();
                        echo "<li><a href=blog.php?blog=$id>$Title</a></li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="cloud">
                <h2>文章标签</h2>
                <ul>
                    <?php
                    $sql_label = "select LabelName from Label order by LabelView";
                    $result = $link ->query($sql_label);
                    for($i = 1; $i < 7; $i++){
                        list ($name) = $result->fetch_row();
                        echo "<a href=#>$name</a>";
                    }
                    ?>
                </ul>
            </div>
            <div class="links">
                <h2>友情链接</h2>
                <ul>
                    <a href="http://www.baidu.com">Baidu</a><a href="http://www.zhangkaixuan.cn">kaixuan</a>
                </ul>
            </div>
        </div>
    </aside>
    <div class="infosbox">
        <form method="post" action="php/publish.php" onsubmit="return checkForm()">
            <div class="newsview">
                <h3 class="news_title"><strong>Title:</strong><br><input id="title" name = title value="" style="width: 200px;height: 25px" ></h3>
                <div class="news_about"><strong>Summary:</strong><br><textarea id="summary" name="summary" style="height: 85px; width: 599px; margin: 0px;"></textarea></div>
                <div class="news_con"><strong>Content:</strong><br><textarea id="content" name="content" style="height: 364px; width: 616px; margin: 0px;"></textarea></div>
                <input type="submit" name="submit" value="发表">
            </div>
        </form>
    </div>
</article>
<footer>
    <p>Copyright &copy;2018 &nbsp;<a href="http://zhangkaixuan.cn">KaiXuan</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>