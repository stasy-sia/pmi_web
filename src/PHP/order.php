<?php
session_start();

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$cat = $_GET['id'];
$result = $mysql->query("SELECT `name`, `price`,`picture` FROM `menu` WHERE `id`='$id'");
$arr = $result->fetch_assoc();
$name = $arr['name'];
$price = $arr['price'];
$picture = $arr['picture'];
if (!isset($_SESSION['basket'][$cat][$id])) {

    $_SESSION['basket'][$cat][$id] = array('id' => $id ,'name' => $name, 'price' => $price, 'count' => 1, 'picture' => $picture);
}
else
    $_SESSION['basket'][$cat][$id]['count']++; // another of this item to the cart
$mysql->close();

header('Location: ../../pages/menu.php');

?>