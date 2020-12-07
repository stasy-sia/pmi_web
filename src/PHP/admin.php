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

//$mysql->query("INSERT INTO `$cat` (`name`, `price`, `gramm`, `picture`, `category`) VALUES ('$name', '$price', '$gramm', '$picture', '$category')");
/*
$result = $mysql->query("SELECT * FROM `$cat` WHERE name = '$name' AND picture = '$picture' ");
$find = $result->fetch_assoc();
$id_picture = $find['id'];*/

$uploadDir = "../../assets/images/$cat/";
$uploadFile = $uploadDir . basename($picture);
$upload = $_SESSION['name_file'][1];
move_uploaded_file($upload, $uploadFile);
unset($_SESSION['name_file']);
//header('Location: ../../pages/admin.php');
?>