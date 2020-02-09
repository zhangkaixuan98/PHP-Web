<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-28
 * Time: 上午8:59
 */

include "link.php";
session_start();
$userid = $_SESSION["userid"];
$usrid = $_GET['usrid'];
$sql_follow = "delete from UsrUsr where UsrId = '$userid' and FollowId = '$usrid'";
//echo $sql_follow;
$result = $link->query($sql_follow);
echo "<script>alert('已取消关注');parent.location.href='../leavemsg.php?usrid=$usrid'; </script>";