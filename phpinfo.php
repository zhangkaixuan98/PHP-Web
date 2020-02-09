<?php
header("Content-Type: text/html;charset=utf-8");

$nowdate = date("Y",time());
$nowtime = date("H:i:s",time());
echo $nowdate.$nowtime;
phpinfo();
?>