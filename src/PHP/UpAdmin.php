<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$gramm = $_POST['gramm'];
$picture = $_POST['picture'];
$cat = $_POST['category'];
if($cat == 'breakfast')
    $category = 'Завтрак';
if($cat == 'dinner')
    $category = 'Обед';
if($cat == 'dessert')
    $category = 'Десерты';
if($cat == 'drinks')
    $category = 'Напитки';
$mysql->query("UPDATE `$cat` SET `name` = '$name', `price` = '$price', `gramm` = '$gramm', `picture` = '$picture', `category` = '$category' WHERE `$cat`.`id` = $id");
header('Location: ../../pages/admin.php');
?>