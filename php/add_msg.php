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
    $leavemsg = $_POST['leavemsg'];
    $usrid = $_GET['usrid'];
    if($leavemsg ==null){
        echo "<script>alert('请输入留言内容');parent.location.href='../leavemsg.php?usrid=$usrid'; </script>";
    } else {
        $userid = $_SESSION["userid"];
        $nowdate = date("Y-m-d");
        $nowtime = date("H:i:s",time());
        $sql_add_msg = "insert into LeaveMsg (LvMsgTo,LvMsgFrom,LvMsgDate,LvMsgTime,LvMsgCont) values('$usrid','$userid','$nowdate','$nowtime','$leavemsg')";
        //echo $sql_add_msg;

        $link->query($sql_add_msg);
        echo "<script>alert('留言成功');parent.location.href='../leavemsg.php?usrid=$usrid'; </script>";
    }
} else {
    echo "<script>alert('您还未登录');parent.location.href='../login.php'; </script>";
}