<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-28
 * Time: 上午3:32
 */

include "link.php";

$cmtid = $_GET['cmtid'];
$blogid = $_GET['blogid'];
$sql_cmt = "delete from Comment where CmtId = '$cmtid'";
//echo $sql_cmt;
$link->query($sql_cmt);
echo "<script>alert('删除成功');parent.location.href='../blog.php?blog=$blogid'; </script>";