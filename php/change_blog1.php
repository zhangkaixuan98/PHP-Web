<?php
header("Content-Type: text/html;charset=utf-8");
include "link.php";
session_start();
if (isset($_POST['submit'])) {
    $blogtitle = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $blogid = $_GET['blogid'];
    $sql_insert_blog = "update Blog set BlogTitle = '$blogtitle',BlogSum = '$summary',BlogCont = '$content' where BlogId = '$blogid'";
    $link ->query($sql_insert_blog);
    //echo $sql_insert_blog;
    //echo $blogid;
    echo "<script>alert('修改成功');parent.location.href='../blog.php?blog=$blogid'; </script>";
    exit();
} else {
    echo "<script>alert('修改失败');parent.location.href='../blog.php?blog=$blogid'; </script>";
}