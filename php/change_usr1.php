<?php
/**
 * Created by PhpStorm.
 * User: kaixuan
 * Date: 18-6-28
 * Time: 上午2:16
 */
include "link.php";
session_start();
$userid = $_SESSION["userid"];

$usrSign = $_POST['usrSign'];
$usrSex = $_POST['usrSex '];
$usrAge = $_POST['usrAge'];
$usrCity = $_POST['usrCity'];
$usrQQ = $_POST['usrQQ'];
$usrTel = $_POST['usrTel'];
$usrMail = $_POST['usrMail'];

$sql_usr = "update Usr set UsrSignature = '$usrSign',UsrSex = '$usrSex',UsrAge = '$usrAge',UsrCity = '$usrCity',UsrQQ = '$usrQQ',UsrTel = '$usrTel',UsrMail = '$usrMail' where UsrId = '$userid'";
$link->query($sql_usr);
//echo $sql_usr;
echo "<script>alert(\"修改成功\");parent.location.href='../message.php'; </script>";