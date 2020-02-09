<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-28
 * Time: 上午3:54
 */
header("Content-Type: text/html;charset=utf-8");
include "link.php";
$blogid = $_GET[id];
$sql_add_like = "update Blog set BlogLike = BlogLike + 1 where BlogId = '$blogid'";
echo $sql_add_like;
//$link->query($sql_add_like);
//echo "<script>parent.location.href='../blog.php?blog=$blogid'; </script>";