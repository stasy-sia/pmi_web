<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_GET['id'];
$category = $_GET['cat'];
$mysql->query("DELETE FROM `$category` WHERE `$category`.`id` = '$id'");

header('Location: ../../pages/admin.php');
?>