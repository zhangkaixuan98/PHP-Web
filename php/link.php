<?php
header("Content-Type: text/html;charset=utf-8");
$link_conf = array(
        'localhost' => 'localhost',
        'root' =>  'root',
        'password' => '1998818',
        'database' => 'KaiX'
);
$link = mysqli_connect(
        $link_conf['localhost'],
        $link_conf['root'],
        $link_conf['password'],
        $link_conf['database'])or die('MySQL数据库连接失败');

$link->query("set names 'utf-8");
