<?php
session_start();

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$cat = $_GET['id'];
if($cat == 0) {
   $result = $mysql->query("SELECT `name`, `price` FROM `breakfast` WHERE `id`='$id'");
    $category = 'breakfast';
}
if($cat == 1) {
    $result = $mysql->query("SELECT `name`, `price` FROM `dinner` WHERE `id`='$id'");
    $category = 'dinner';
}
if($cat == 2){
    $result = $mysql->query("SELECT `name`, `price` FROM `dessert` WHERE `id`='$id'");
    $category = 'dessert';
}
if($cat == 3) {
    $result = $mysql->query("SELECT `name`, `price` FROM `drinks` WHERE `id`='$id'");
    $category = 'drinks';
}

$arr = $result->fetch_assoc();
$name = $arr['name'];
$price = $arr['price'];
if (!isset($_SESSION['basket'][$cat][$id])) {

    $_SESSION['basket'][$cat][$id] = array('id' => $id ,'name' => $name, 'price' => $price, 'count' => 1);
}
else
    $_SESSION['basket'][$cat][$id]['count']++; // another of this item to the cart
$mysql->close();

header('Location: ../../pages/menu.php');

?>