<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include "php/link.php";
$id = $_GET['blog'];
$sql_blog = "select Usr.UsrId,UsrName,Class.ClassId,ClassName,Blog.BlogId,BlogTitle,BlogCont,BlogDate,BlogView from Usr, Blog, Class where Usr.UsrId = Blog.UsrId and Blog.ClassId = Class.ClassId and Blog.BlogId = '$id'";
$result = $link ->query($sql_blog);
list ($usrid,$usrname,$classid,$classname,$blogid,$blogtitle,$blogcont,$blogdate,$blogview) = $result->fetch_row();

?>
<!doctype html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>
        <?php
        echo $usrname . "-" . $blogtitle;
        ?>
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
</head>
<body>
<header class="header-navigation" id="header">
    <nav><div class="logo"><a href="index.php">KaiX</a></div>
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="starlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="publish.php">Publish</a></li>
            <li><a href="follow.php">Fellow</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="message.php">Message</a></li>
        </ul>
    </nav>
</header>
<article>
    <aside>
        <div class="l_box" id="stickMe">
            <div class="about_me">
                <!--h2>About Me</h2>
                <ul>
                  <i>
                </ul>
              </div-->
                <div class="search">
                    <form action="search.php" method="post" name="searchform" id="searchform">
                        <input type="text" class="input_text" name="text" placeholder="Articles Title" value="">
                        <input type="submit" class="input_submit" name="submit" value="Search">
                    </form>
                </div>
                <div class="fenlei">
                    <h2>Class</h2>
                    <ul>
                        <?php
                        $sql_label = "select ClassId,ClassName from Class";
                        $result = $link ->query($sql_label);
                        for($i = 1; $i < 4; $i++){
                            list ($classId,$className) = $result->fetch_row();
                            echo "<li><a href='#'>$className</a></li>";
                        }
                        ?>
                        <li><a href="class_more.php">more</a></li>
                    </ul>
                </div>
                <div class="tuijian">
                    <h2>Popular Articles</h2>
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
                    <h2>Popular Label</h2>
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
                    <h2>Friendly Links</h2>
                    <ul>
                        <a href="http://www.baidu.com">Baidu</a><a href="http://www.zhangkaixuan.cn">kaixuan</a>
                    </ul>
                </div>
            </div>
    </aside>
</article>
<footer>
    <p>Copyright &copy;2018 &nbsp;<a href="http://zhangkaixuan.cn">KaiXuan</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
