<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$gramm = $_POST['gramm'];
$picture = $_POST['picture'];
$category = $_POST['category'];
$mysql->query("UPDATE `admin` SET `name` = '$name', `price` = '$price', `gramm` = '$gramm', `picture` = '$picture', `category` = '$category' WHERE `admin`.`id` = $id");
header('Location: ../../pages/admin.php');
?>