<?php
include "php/link.php";
$classid = $_GET['classid'];
$classname = $_GET['classname'];
?>
<!doctype>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>
        <?php
        echo "search $classname";
        ?>
    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/m.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/hc-sticky.js"></script>
    <script type="text/javascript" src="js/comm.js"></script>
    <!--[if lt IE 9]><script src="js/modernizr.js"></script><![endif]-->
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
                    for($i = 1; $i < 5; $i++){
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
                    for($i = 0; $i < 4; $i++){
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
    <div class="r_box">
        <?php
            $sql_blog = "select BlogId,BlogTitle,BlogSum,BlogDate,BlogTime,BlogView,BlogLike from Blog where ClassId = '$classid' order by BlogDate desc , BlogTime desc ";
            $result = $link->query($sql_blog);
            if(list ($id,$title,$summary,$date,$time,$view,$like) = $result->fetch_row()){
                //echo "<i><a href='blog.php?blog= $id '><img src='images/$id.jpg'></a></i>";
                echo "<li><h3><a href=blog.php?blog=$id>$title</a></h3>";
                echo "<p>$summary</p>";
                echo "<p>$date &nbsp; $time &nbsp; view:$view &nbsp;like:$like</p></li>";
                while(list ($id,$title,$summary,$date,$time,$view,$like) = $result->fetch_row()){
                    //echo "<i><a href='blog.php?blog= $id '><img src='images/$id.jpg'></a></i>";
                    echo "<li><h3><a href=blog.php?blog=$id>$title</a></h3>";
                    echo "<p>$summary</p>";
                    echo "<p>$date &nbsp; $time &nbsp; view:$view &nbsp;like:$like</p></li>";
                }
            }
            else{
                echo "未查询到信息";
            }
            $sql_blog = "select BlogId,BlogTitle,BlogSum,BlogDate,BlogTime,BlogView,BlogLike from Blog order by BlogDate desc , BlogTime desc ";
            $result = $link->query($sql_blog);
            while(list ($id,$title,$summary,$date,$time,$view,$like) = $result->fetch_row()){
                //echo "<i><a href='blog.php?blog= $id '><img src='images/$id.jpg'></a></i>";
                echo "<li><h3><a href=blog.php?blog=$id>$title</a></h3>";
                echo "<p>$summary</p>";
                echo "<p>$date &nbsp; $time &nbsp; view:$view &nbsp;like:$like</p></li>";
            }
        ?>
    </div>
</article>
<footer>
    <p>&copy;2018 &nbsp;<a href="http://zhangkaixuan.cn">KaiXuan</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>