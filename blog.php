<?php
include "php/link.php";
session_start();
$userid = $_SESSION["userid"];
$username =$_SESSION["username"];
$id = $_GET['blog'];
$sql_add_view = "update Blog set BlogView = BlogView +1 where BlogId = '$id'";
$link->query($sql_add_view);
$sql_blog = "select Usr.UsrId,UsrName,Class.ClassId,ClassName,Blog.BlogId,BlogTitle,BlogSum,BlogCont,BlogDate,BlogView,BlogLike from Usr, Blog, Class where Usr.UsrId = Blog.UsrId and Blog.ClassId = Class.ClassId and Blog.BlogId = '$id'";
$result = $link ->query($sql_blog);
list ($usrid,$blogusrname,$classid,$classname,$blogid,$blogtitle,$summary,$blogcont,$blogdate,$blogview,$bloglike) = $result->fetch_row();

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
    <div class="infosbox">
    <div class="newsview">
      <h3 class="news_title">
          <?php
          echo $blogtitle;
          ?>
      </h3>
      <div class="bloginfo">
        <ul>
          <li class="author">Author:
              <a href="#">
                  <?php
                  echo "<a href='leavemsg.php?usrid=$usrid'>$blogusrname</a>";
                  ?>
              </a></li>
          <li class="lmname">Class:
              <a href="#">
                  <?php
                  echo $classname;
                  ?>
              </a></li>
          <li class="timer">Time:
              <?php
              echo $blogdate;
              ?>
          </li>
          <li class="view">View:
              <?php
              echo $blogview;
              ?>
          </li>
            <?php
            if ($userid == $usrid){
                echo "<a href='php/delete_blog.php?id=$blogid' style='float: right;'>&nbsp;&nbsp;&nbsp;删除</a>";
                echo "<a href='php/change_blog.php?blogid=$blogid' style='float: right;'>编辑&nbsp;&nbsp;&nbsp;</a>";
            }
            ?>
        </ul>
      </div>
      <div class="tags">
          <?php
          $sql_label = "select Label.LableId,LabelName from BlogLabel,Label where BlogLabel.BlogId = '$blogid' and BlogLabel.LableId = Label.LableId";
          $result = $link ->query($sql_label);
          while (list($labelid,$labelname) = $result->fetch_row()){
              echo "<a href = # >$labelname</a>";
          }
          ?>
     </div>
      <div class="news_about"><strong>Summary:</strong>
          <?php
          echo $summary;
          ?>
      </div>
      <div class="news_con"><br>
          <?php
          echo $blogcont;
          ?>
        &nbsp; </div>
    </div>
        <div class="share">
            <form method="post" action="php/add_like.php">
                <input type="submit" hidden>
            </form>
            <?php
            echo "<p class='diggit'><a action='php/add_like.php?blogid=$blogid'>Like</a>($bloglike)</p>";
            ?>

        </div>
    <div class="news_pl">
      <h2>Comment</h2>
        <ul><?php
                echo "<form method='post' action='php/add_cmt.php?blogid=$blogid'>";
            ?>
              <input type="text" name="comment" style=" width: 300px"><input type="submit" value="评论"><hr>
          </form>
          <?php
          $sql_cmt = "select UsrName,CmtId,CmtDate,CmtTime,CmtCont from Usr,Comment where Usr.UsrId = Comment.UsrId and BlogId = '$blogid' order by CmtDate desc ,CmtTime desc ";
          $result = $link ->query($sql_cmt);
          while (list($cmtusrname,$cmtid,$cmtdate,$cmttime,$cmtcont) = $result->fetch_row()){
              echo "$cmtusrname<br>$cmtcont<br>$cmtdate&nbsp;$cmttime";
              if($cmtusrname==$username){
                  echo "<a style='float: right;' href='php/delete_cmt.php?cmtid=$cmtid&blogid=$blogid'>删除&nbsp;&nbsp;&nbsp;&nbsp;</a><hr>";
              } elseif($blogusrname==$username){
                  echo "<a style='float: right;' href='php/delete_cmt.php?cmtid=$cmtid&blogid=$blogid'>删除&nbsp;&nbsp;&nbsp;&nbsp;</a><hr>";
              }else {
                  echo "<hr>";
              }
          }
          ?>

      </ul>
    </div>
  </div>
</article>
<footer>
    <p>Copyright &copy;2018 &nbsp;<a href="http://zhangkaixuan.cn">KaiXuan</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
