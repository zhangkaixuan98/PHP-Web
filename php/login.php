<?php
// 开启Session
session_start();
include "link.php";
// 处理用户登录信息
if (isset($_POST['submit'])) {
    //接收用户的登录信息
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // 判断提交的登录信息
    if ($username == "Username" || $username == null) {
        // 若为空,视为未填写,提示错误,并3秒后返回登录界面
        //header('refresh:1; url=login.php');
        echo "<script>alert(\"请输入用户名\");parent.location.href='../login.php'; </script>";
        exit;
    } else if ($password == null || $password == 'Password') {
        # 用户名或密码错误,同空的处理方式
        //header('refresh:3; url=login.php');
        echo "<script>alert(\"请输入密码\");parent.location.href='../login.php'; </script>";
        exit;
    } else {
        $sql_usr = "select UsrId,UsrName,UsrPasswd from Usr where UsrName = '$username'";
        //echo $sql_usr;
        $result = $link->query($sql_usr);
        if (list ($id, $name, $pwd) = $result->fetch_row()) {
            if ($pwd == $password && $username ==$name) {
                $_SESSION["username"] = $username;
                $_SESSION["userid"] = $id;
                echo "<script>alert(\"登陆成功\");parent.location.href='../index.php'; </script>";
            } else {
                echo "<script>alert(\"用户名或，密码错误\");parent.location.href='../login.php'; </script>";
            }
        } else {
            echo "<script>alert(\"此用户名未注册\");parent.location.href='../login.php'; </script>";
        }
    }
}