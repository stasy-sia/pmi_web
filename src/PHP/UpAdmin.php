<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$gramm = $_POST['gramm'];
$picture = $_POST['picture'];
$cat = $_POST['cat'];
$mysql->query("UPDATE `$cat` SET `name` = '$name', `price` = '$price', `gramm` = '$gramm', `picture` = '$picture' WHERE `$cat`.`id` = $id");
header('Location: ../../pages/admin.php');
?>