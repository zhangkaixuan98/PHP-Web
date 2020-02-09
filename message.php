<?php
header("Content-Type: text/html;charset=utf-8");
include "php/link.php";
session_start();
if (isset ( $_SESSION ["username"]) && isset ( $_SESSION ["userid"])){
    $userid = $_SESSION["userid"];
} else {
    echo "<script>alert('您还未登录');parent.location.href='login.php'; </script>";
}
?>
<!doctype html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
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
            <div class="about_me">
                <?php
                $sql_usr = "select UsrName,UsrImage,UsrSignature,UsrSex,UsrAge,UsrPrvn,UsrCity,UsrQQ,UsrTel,UsrMail from Usr where UsrId = '$userid'";
                $result = $link->query($sql_usr);
                list($usrName,$usrImage,$usrSign,$usrSex,$usrAge,$usrPrvn,$usrCity,$usrQQ,$usrTel,$usrMail) = $result->fetch_row();
                echo "  <h2>个人信息
                        <a href='php/logout.php' style='float: right;'>注销&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <a  href='php/change_usr.php' style='float: right;'>修改&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </h2>";
                echo "<ul><b>
                         昵&nbsp;&nbsp;称：$usrName<br>
                         性&nbsp;&nbsp;别：男<br>
                         年&nbsp;&nbsp;龄：$usrAge<br>
                         签&nbsp;&nbsp;名：$usrSign<br><br>
                         城&nbsp;&nbsp;市：新乡<br>
                         Q&nbsp;Q&nbsp;&nbsp;：$usrQQ<br>
                         电&nbsp;&nbsp;话：$usrTel<br>
                         邮&nbsp;&nbsp;箱：$usrMail<br>
                         </b></ul>";
                ?>
            </div>
            <div class="tuijian">
                <h2>我的文章</h2>
                <ul>
                    <?php
                    $sql_blog = "select BlogId,BlogTitle from Blog where UsrId = '$userid' order by BlogDate desc ";
                    $result = $link ->query($sql_blog);
                    while(list ($id,$Title) = $result->fetch_row()){
                        echo "<li><a href=blog.php?blog=$id>$Title</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </aside>
    <div class="r_box">
        <?php
        $sql_comment = <<<GOD
select LvMsgId,LvMsgCont,UsrId,UsrName,LvMsgDate,LvMsgTime
from Usr,LeaveMsg
where UsrId = LvMsgFrom and LvMsgFrom and LvMsgTo = '$userid'
order by LvMsgDate desc ,LvMsgTime desc ;
GOD;
        $result = $link->query($sql_comment);
        while(list ($msgid,$content,$usrid,$usrname,$cmtdate,$cmttime) = $result->fetch_row()){
            echo "<li><h1><a href='leavemsg.php?usrid=$usrid'>$usrname</a></h1>";
            echo "<p>&nbsp;&nbsp;$content<br>$cmtdate&nbsp;&nbsp;$cmttime";
            echo "<a href='php/delect_leavemsg.php?id=$msgid' style='float: right;'>删除</a></p></li>";
        }
        ?>
    </div>
</article>
<footer>
    <p>Copyright &copy;2018 &nbsp;<a href="http://zhangkaixuan.cn">KaiXuan</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
