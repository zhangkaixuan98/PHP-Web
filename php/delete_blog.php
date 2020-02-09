<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-27
 * Time: 下午11:28
 */

include "link.php";

$id = $_GET['id'];
$sql_blog = "delete from Blog where BlogId = '$id'";
$link->query($sql_blog);
echo "<script>alert('删除成功');parent.location.href='../index.php'; </script>";