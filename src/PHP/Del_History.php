<?php
session_start();
$mysql = new mysqli('localhost', 'root', 'root', 'regist');
$orderid = $_POST['orderid'];
$mysql->query("DELETE FROM `oreder_prod` WHERE `order_id` = '$orderid'");
$mysql->query("DELETE FROM `orders` WHERE `id` = '$orderid'");
header('Location: ../../pages/OrederHistory.php');
?>