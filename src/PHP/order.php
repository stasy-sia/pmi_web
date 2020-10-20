<?php
session_start();

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$result = $mysql->query("SELECT `name` FROM `menu` WHERE `id`='$id'");
$arr = $result->fetch_assoc();
$name = $arr['name'];

if (!isset($_SESSION['basket'][$id])) {

    $_SESSION['basket'][$id] = array('name' => $name, 'count' => 1);
}
else
    $_SESSION['basket'][$id]['count']++; // another of this item to the cart


$mysql->close();

header('Location: ../../pages/menu.php');

?>