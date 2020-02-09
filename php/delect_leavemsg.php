<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-27
 * Time: 下午4:46
 */
include "link.php";

$id = $_GET['id'];
$sql_msg = "delete from LeaveMsg where LvMsgId = '$id'";
//echo "$sql_msg";
$link->query($sql_msg);
echo "<script>alert('删除成功');parent.location.href='../message.php'; </script>";