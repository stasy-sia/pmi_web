<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
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
$mysql->query("INSERT INTO `$cat` (`name`, `price`, `gramm`, `picture`, `category`) VALUES ('$name', '$price', '$gramm', '$picture', '$category')");

header('Location: ../../pages/admin.php');
?>