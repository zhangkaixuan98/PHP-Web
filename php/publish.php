<?php
header("Content-Type: text/html;charset=utf-8");
include "link.php";
session_start();
if (isset($_POST['submit'])) {
    $qwtitle = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    date_default_timezone_set("Asia/Shanghai");
    $nowdate = date("Y-m-d");
    $nowtime = date("H:i:s",time());
    $userid = $_SESSION["userid"];
    $sql_insert_blog = "insert into Blog (BlogTitle,BlogSum,BlogCont,BlogDate,BlogTime,UsrId,ClassId) values('$qwtitle','$summary','$content','$nowdate','$nowtime','$userid','1')";
    $link ->query($sql_insert_blog);
    //echo $sql_insert_blog;
    echo "<script>alert('发表成功');parent.location.href='../index.php'; </script>";
    exit();
} else {
    echo "<script>alert('发表失败');parent.location.href='../index.php'; </script>";
}