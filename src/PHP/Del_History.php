<?php
session_start();
require_once("functions.php");
$orderid = $_POST['orderid'];
$pdo = PDO_OPT();
$stmt = $pdo->prepare("DELETE FROM oreder_prod WHERE order_id = :orderid");
$stmt->bindParam(':orderid', $orderid);
$stmt->execute();

$stmt2 = $pdo->prepare("DELETE FROM orders WHERE id = :orderid");
$stmt2->bindParam(':orderid', $orderid);
$stmt2->execute();
header('Location: ../../pages/OrederHistory.php');
?>