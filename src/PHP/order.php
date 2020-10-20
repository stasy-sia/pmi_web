<?php
session_start();

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$result = $mysql->query("SELECT `name` FROM `menu` WHERE `id`='$id'");
$arr = $result->fetch_assoc();
$name = $arr['name'];

if (!isset($_SESSION['basket']['id'])) {

    $_SESSION['basket'] = array('id' => $id, 'name' => $name, 'count' => 1);
}
else
    $_SESSION['basket']['count']++; // another of this item to the cart

print_r($_SESSION);

$mysql->close();

?>