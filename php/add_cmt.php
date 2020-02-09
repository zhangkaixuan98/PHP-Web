<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-28
 * Time: 上午3:54
 */
header("Content-Type: text/html;charset=utf-8");
include "link.php";
session_start();
if (isset ( $_SESSION ["username"]) && isset ( $_SESSION ["userid"])){
    $cmtcont = $_POST['comment'];
    $blogid = $_GET['blogid'];
    if($cmtcont ==null){
        echo "<script>alert('请输入评论内容');parent.location.href='../blog.php?blog=$blogid'; </script>";
    } else {
        $userid = $_SESSION["userid"];
        $nowdate = date("Y-m-d");
        $nowtime = date("H:i:s",time());
        $sql_add_cmt = "insert into Comment (UsrId,BlogId,CmtDate,CmtTime,CmtCont) values ('$userid','$blogid','$nowdate','$nowtime','$cmtcont')";
        $link->query($sql_add_cmt);
        echo "<script>alert('评论成功');parent.location.href='../blog.php?blog=$blogid'; </script>";
    }
} else {
    echo "<script>alert('您还未登录');parent.location.href='../login.php'; </script>";
}