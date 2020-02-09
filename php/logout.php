<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-28
 * Time: 上午1:13
 */

// 开启Session
session_start();
include "link.php";
unset($_SESSION["username"]);
unset($_SESSION["userid"]);
echo "<script>alert(\"注销成功\");parent.location.href='../index.php'; </script>";