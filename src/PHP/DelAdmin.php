<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_GET['id'];
$mysql->query("DELETE FROM `admin` WHERE `admin`.`id` = '$id'");

header('Location: ../../pages/admin.php');
?>